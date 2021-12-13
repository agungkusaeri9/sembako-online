<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sembako Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ auth()->user()->avatar() }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('admin.profile') }}" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <a href="{{ route('admin.products.index') }}" class="nav-link">
              <i class="nav-icon far fa-folder"></i>
              <p>
                Produk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.banks.index') }}" class="nav-link">
              <i class="nav-icon far fa-folder"></i>
              <p>
                Bank
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.couriers.index') }}" class="nav-link">
              <i class="nav-icon far fa-folder"></i>
              <p>
                Kurir
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.transactions.index') }}" class="nav-link">
              <i class="nav-icon far fa-folder"></i>
              <p>
                Transaksi Masuk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.sliders.index') }}" class="nav-link">
              <i class="nav-icon far fa-folder"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <div class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
            document.getElementById('formLogout').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
            <form action="{{ route('logout') }}" method="post" id="formLogout">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>