<header class="navbar navbar-dark sticky-top  flex-md-nowrap p-0 shadow" style="background-color:#DDA0DD;">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">SKPI Mahasiswa</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 {{--  <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
   --}}<div class="navbar-nav">
    <div class="nav-item text-nowrap">

      <form action="/logout" method="post">
        @csrf
      <button type="submit" class="nav-link link-dark px-3  border-0" style="background-color:#DDA0DD;">Logout <span data-feather="log-out"></span>
           </button>
      </form>

    </div>
  </div>
</header>