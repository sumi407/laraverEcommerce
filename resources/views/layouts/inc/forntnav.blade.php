<nav class="navbar navbar-expand-lg navbar-warning bg-light">
  <div class="container">
    <a class="navbar-brand h1" href="{{ url('/') }}">Eshop</a>
    <form action="{{ url('searchproduct') }}" method="POST">
      @csrf
        <div class="input-group w-100 mt-2 mb-3">
          <input type="search" id="search-product" name="product_name" class="form-control" placeholder="search..." >
          <button type="submit" class="input-group-text" ><i class="fa fa-search"></i></button>
        </div>
    </form>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse  navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ '/' }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ 'category' }}">Category</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" href="{{ 'cart' }}">cart
              <span class="badge bg-success cart-count badge-pill">0</span>
          </a>
        </li>  
        <li class="nav-item">
          <a class="nav-link" href="{{ 'wishlist' }}">Wishlist
          <span class="badge bg-success wish-count badge-pill">0</span>
          </a>
        </li>  
        @guest
          @if (Route::has('login'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
          @endif

          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">My Profile</a></li>
                  <li><a class="dropdown-item" href="{{ url('my-orders') }}">My Orders</a></li>
                  <li><a class="dropdown-item"   href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}</a></li>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                  
              </ul>
              </li>
              <!--  -->
          
      @endguest
      </ul>
     
    </div>
  </div>
</nav>