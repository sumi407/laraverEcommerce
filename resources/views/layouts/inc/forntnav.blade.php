<nav class="navbar navbar-expand-lg navbar-warning bg-light">
  <div class="container">
    <a class="navbar-brand h1" href="{{ url('/') }}">Eshop</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse  navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
           
   @if (Route::has('login'))
        
      @auth
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ '/' }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ 'category' }}">Category</a>
      </li>
      @else
      <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link">Log in</a> </li>

          @if (Route::has('register'))
          <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link">Register</a> </li>
          @endif
      @endauth
          </li>
        @endif
      </ul>
     
    </div>
  </div>
</nav>