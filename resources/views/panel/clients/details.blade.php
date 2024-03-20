@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
           @include('includes.sidebar')
            <div class="col-md-8">
                <h1>Client Details</h1>
                <div class="">
                    <img src="{{asset('uploads/'.$user->profileImage)}}" style="display:block;margin:0 auto;height:70px;width:70px;border-radius:10px">
                </div>
                <p>First Name: {{ $user->firstName }}</p>
                <p>Last Name: {{ $user->lastName }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Mobile: {{ $user->phone }}</p>
                <p>Address: {{ $user->address }}</p>
                <p>Primary Legal Counsel: {{ $user->primaryLegalCounsel }}</p>
                <!-- Display other user details as needed -->


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
                // Handle errors
                alert('Error: ' + error);
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
            '<td><a href="/client-detail/' + client.id + '">View</a></td>' + // Add this line for the link
            '</tr>';
        clientList.append(row);
    });
}

        </script>
    @endpush
@endsection()
