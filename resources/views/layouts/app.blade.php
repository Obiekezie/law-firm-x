<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Law Firm X</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('snackbar/custom-loader.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('snackbar/snackbar.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Law Firm X</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
            </li>
       
          </ul>
        </div>
      </nav>
    @yield('content')

    @stack('custom-scripts')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>


<script>
// Get the Toast button
var toastButton = document.getElementById("toast-btn");
// Get the Toast element
var toastElement = document.getElementsByClassName("toast")[0];

toastButton.onclick = function() {
    $('.toast').toast('show');
}


</script>
<script src="{{ asset('snackbar/snackbar.min.js') }}"></script>

<script src="{{ asset('snackbar/custom-snackbar.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
