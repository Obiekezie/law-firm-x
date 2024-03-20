@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    @include('includes.sidebar')
                    <div class="col-md-4">
                        <div class="card">
                            lorem
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            lorem
                          </div>
                    </div>

                </div>



            </div>
        </div>
    </div>






    @push('custom-scripts')
        <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#submitBtn').click(function(e) {
                    e.preventDefault(); // Prevent default form submission

                    // Get form data
                    var formData = {
                        email: $('#email').val(),
                        password: $('#password').val(),
                        _token: $('input[name="_token"]').val() // Assuming you have CSRF token
                    };

                    // Send AJAX request
                    $.ajax({
                        url: '{{ route('postLogin') }}', // Replace 'your_controller_route' with your actual route
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            // Handle success
                            alert('Success: ' + response.message);
                            window.location.href = "{{ route('account') }}";
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            alert('Error: ' + error);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection()
