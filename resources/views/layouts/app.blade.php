<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Home' }}</title>
    <link rel="stylesheet" href="{{ asset('assets/bs4/css/bootstrap.min.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="{{ route('home') }}">Sembako Online</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link text-white" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-link text-white" href="{{ route('products.index') }}">Produk</a>
                </div>
            </div>
        </div>
      </nav>

    @yield('content')

    <script src="{{ asset('assets/bs4/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/bs4/js/bootstrap.min.js') }}"></script>
</body>
</html>