@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    @include('includes.sidebar')
                    @if ($type == 'Add')
                        <div class="col-md-8">
                            <div class="card">
                                <form id="userForm" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstName">First Name</label>
                                                <input type="text" name="firstName" class="form-control" id="firstName"
                                                    placeholder="Enter first name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastName">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName"
                                                    placeholder="Enter last name" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    placeholder="Enter email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="tel" name="phone" class="form-control" id="phone"
                                                    placeholder="Enter Phone number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dateOfBirth">Date of Birth</label>
                                                <input type="date" class="form-control" id="dateOfBirth"
                                                    name="dateOfBirth">
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Address">Address</label>
                                                <input type="text" name="address" class="form-control" id="address"
                                                    placeholder="Enter address" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="Sex">Sex</label>
                                                <select class="form-control" id="sex" name="sex">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="primaryLegalCounsel">Primary Legal Counsel</label>
                                                <input type="text" name="primaryLegalCounsel" class="form-control"
                                                    id="primaryLegalCounsel" placeholder="Enter primary legal counsel">
                                            </div>
                                        </div>
                                 
                                 
                                 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="profileImage">Profile Image</label>
                                                <input type="file" name="profileImage" class="form-control-file" id="profileImage">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="primaryLegalCounsel">Case Details</label>
                                              <textarea class="form-control" name="case_details" id="case_details" col="6"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
                                </form>
                            </div>
                        </div>
                    @elseif($type == 'All')
                        <div class="col-md-8">
                            <h1>All Clients</h1>
                            <input type="text" id="filterInput" class="form-control" placeholder="Filter by last name">
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                        
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Sex</th>
                                            <th>Date of Birth</th>
                                        </tr>
                                    </thead>
                                    <tbody id="clientList">
                                        <!-- Clients data will be inserted here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif


                </div>



            </div>
        </div>
    </div>






    @push('custom-scripts')
        <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#userForm').submit(function(e) {
        e.preventDefault(); // Prevent default form submission

        // Create FormData object
        var formData = new FormData(this);

        // Send AJAX request
        $.ajax({
            url: '{{ route('createUser') }}',
            type: 'POST',
            data: formData,
            contentType: false, // Don't set content type
            processData: false, // Don't process data
            success: function(response) {
                // Handle success
                alert('Success: ' + response.message);
                // window.location.href = "{{ route('account') }}";
            },
            error: function(xhr, status, error) {
    if (xhr.status === 422) {
        // If status code is 422 (Unprocessable Entity), it means there are validation errors
        var errors = xhr.responseJSON.errors;

        // Iterate through validation errors and display them to the user
        var errorMessage = '';
        $.each(errors, function(key, value) {
            errorMessage += value[0] + '<br>'; // Display only the first error message for each field
        });

        // Display the error message to the user
        alert('Validation Error(s): ' + errorMessage);
    } else {
        // For other errors, display a generic error message
        alert('Error: ' + error);
    }
}
        });
    });

                $.ajax({
                    url: '{{ route('getClients') }}',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        displayClients(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

                $('#filterInput').on('input', function() {
                    var filterValue = $(this).val().toLowerCase();
                    $('#clientList tr').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(filterValue) > -1);
                    });
                });
            });

            function displayClients(clients) {
    var clientList = $('#clientList');
    clientList.empty();
    $.each(clients, function(index, client) {
        var row = '<tr>' +
            '<td>' + client.id + '</td>' +
            '<td>' + client.firstName + '</td>' +
            '<td>' + client.lastName + '</td>' +
            '<td>' + client.email + '</td>' +
            '<td>' + client.phone + '</td>' +
            '<td>' + client.address + '</td>' +
            '<td>' + client.sex + '</td>' +
            '<td>' + client.dateOfBirth + '</td>' +
            '<td><a href="/client-details/' + client.id + '">View</a></td>' + // Add this line for the link
            '</tr>';
        clientList.append(row);
    });
}

        </script>
    @endpush
@endsection()
