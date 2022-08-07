<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#DDA0DD;">
  <div class="container">
    <a class="navbar-brand" href="/">SKPI Mahasiswa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('Home') ? 'active' : '' }}"  href="/">Home</a>
        </li>
      </ul>
    </div> 
    <ul class="navbar-nav ms-auto">

      {{-- directive blade auth digunakan utk mengecek seorang user sudah login/belom. Kalau sudah login , maka nav-link 
      login tidak akan muncul, tetapi menjadi welcome back->nama user yg login. --}}
    @auth 
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Welcome back, {{ auth()->user()->name }}
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Logout</button>
          </form>
      </ul>
    </li>
      @else
            <li class="nav-item">
              <a href="/login" class="nav-link {{ Request::is('Login') ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
             </li>
      </ul>
      @endauth 
       
  </div>
</nav>