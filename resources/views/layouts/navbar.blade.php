<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Joni Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> 
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">About</a>
          </li>
          @auth
            <li class="nav-item">
                <a class="nav-link " href="/homebarang">Barang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/categories">Categories</a>
            </li>

            @if (auth()->user()->role == "User")
            <div class="dropdown">
              <button type="button" class="btn btn-info" data-toggle="dropdown">
                  <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
              </button>
              <div class="dropdown-menu">
                  <div class="row total-header-section">
                      <div class="col-lg-6 col-sm-6 col-6">
                          <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                      </div>
                      @php $total = 0 @endphp
                      @foreach((array) session('cart') as $id => $details)
                          @php $total += $details['harga'] * $details['quantity'] @endphp
                      @endforeach
                      <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                          <p>Total: <span class="text-info">Rp. {{ number_format($total) }}</span></p>
                      </div>
                  </div>
                  @if(session('cart'))
                      @foreach(session('cart') as $id => $details)
                          <div class="row cart-detail">
                              <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                  <img src="{{ asset('storage/' . $details['gambar_barang']) }}" />
                              </div>
                              <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                  <p>{{ $details['nama_barang'] }}</p>
                                  <span class="price text-info"> Rp. {{ number_format($details['harga']) }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                              </div>
                          </div>
                      @endforeach
                  @endif
                  <div class="row">
                      <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                          <a href="/cart" class="btn btn-primary btn-block">View all</a>
                      </div>
                  </div>
              </div>
              @endif
          </div>
          @endauth
          
        </ul>

        <ul class="navbar-nav ms-auto">
          @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @if (auth()->user()->role == "Admin")
                    <li>
                      <a class="dropdown-item" href="/admin"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a>
                    </li>
                  @endif
                  @if (auth()->user()->role == "User")
                    <li>
                      <a class="dropdown-item" href="/profile"><i class="bi bi-layout-text-sidebar-reverse"></i> My Profile</a>
                    </li>
                  @endif
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</a></button>
                    </form>
                  </li>
                </ul>
              </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
              <li class="nav-item">
                <a href="/login" class="nav-link"><i class="bi bi-box-arrow-in-right"></i>Login</a>
              </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>