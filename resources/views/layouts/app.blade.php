<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Home' }}</title>
    <link rel="stylesheet" href="{{ asset('assets/bs4/css/bootstrap.min.css') }}">
    @stack('styles')
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
                <div class="navbar-nav ml-auto">
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                          {{ Str::title(auth()->user()->name) }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                          <a class="dropdown-item" href="{{ route('transaction.index') }}">Transaksi</a>
                          <a class="dropdown-item" href="{{ route('cart.index') }}">Keranjang</a>
                        </div>
                      </li>
                    @else
                    <a class="nav-link text-white" href="{{ route('login') }}">Login</a> <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            </div>
        </div>
      </nav>

    <div style="min-height: 700px">
      @yield('content')
    </div>

    <div class="container-fluid bg-dark">
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <h5 class="text-white mt-3">Tentang Saya</h5>
              <p class="small text-white">
                Aplikasi Sembako Online merupakan APLIKASI KOMUNITAS PEDAGANG SEKITAR yang dibangun dengan misi untuk mendukung ‘gerakan’ pemberdayaan pelaku Usaha Kecil & Menengah (UKM), khususnya pedagang tradisional, sehingga mereka dapat beradaptasi & sekaligus mengambil manfaat terbaik dari perkembangan dunia digital saat ini
              </p>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <script src="{{ asset('assets/bs4/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/bs4/js/bootstrap.min.js') }}"></script>
    @stack('scripts')
</body>
</html>