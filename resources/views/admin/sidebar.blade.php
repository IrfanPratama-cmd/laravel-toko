<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/adminlte/index3.html" class="brand-link">
      <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Joni Store</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          

          @if (auth()->user()->role == "Admin")
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a>
          </li>

            <li class="nav-item">
              <a href="/kategori" class="nav-link">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  Kategori
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/barang" class="nav-link">
                <i class="nav-icon fab fa-buffer"></i>
                <p>
                  Daftar Barang
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/daftar-pesanan" class="nav-link">
                <i class="nav-icon fas fa-shopping-bag"></i>
                <p>
                  Daftar Pesanan
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/user" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Daftar User
                </p>
              </a>
            </li>
          @endif

          @if (auth()->user()->role == "User")
            <li class="nav-item">
              <a href="/profile" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Profile
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="/barangku" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Barangku
                </p>
              </a>
            </li>
          @endif

          <li class="nav-item">
            <form action="/logout" method="post" class="nav-link">
              @csrf
              <button><span data-feather="nav-icon fas fa-tachometer-alt"></span> Logout</button>
             {{-- <a href="/logout"><i class="nav-icon fas fa-copy"></i>Logout</a> --}}
          </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
