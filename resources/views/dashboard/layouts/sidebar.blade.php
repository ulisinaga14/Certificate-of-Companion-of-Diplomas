<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <div class="d-flex  align-items rounded" style="height: 100px; ">
          <img src="/img/logo.png" class="rounded-circle" style="height: 100px;">
                  </div>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard')? 'active' : ''}}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('profil')? 'active' : ''}}" aria-current="page" href="/dashboard/profil">
            <span data-feather="settings" class="align-text-bottom"></span>
           Edit Profil
          </a>
        </li>

        @if (Auth::user()->role == 'mahasiswa')
             <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/mahasiswa*')? 'active' : ''}}" href="/dashboard/mahasiswa">
            {{-- while card (*) berfungsi untuk melihat apapun yang ada setelah tanda posts akan membuat halaman tersebut aktif --}}
            <span data-feather="users" class="align-text-bottom"></span>
            Mahasiswa
          </a>
        </li>
             <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/info*')? 'active' : ''}}" href="/dashboard/info">
            {{-- while card (*) berfungsi untuk melihat apapun yang ada setelah tanda posts akan membuat halaman tersebut aktif --}}
            <span data-feather="file-text" class="align-text-bottom"></span>
            Info Tambah
          </a>
        </li>
        @endif
       

     {{--  side bar Administrator hanya boleh diakses dan ditampilkan ketika usernya adalah Admin
      caranya dengan memanggil balde direktif yang namanya @can , @endcan
      baris administrator hanya boleh diakses oleh yg punya akses digerbang mana 
 --}}
 @if(Auth::user()->role == 'superadmin')
      <h6 class="sidebar-heaing d-flex justify-conten-between slign-items-center px-3 mt-4 mb-1 text-muted">
        <span>Superadmin</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/superadmin*')? 'active' : ''}}" href="/dashboard/superadmin">
            {{-- while card (*) berfungsi untuk melihat apapun yang ada setelah tanda posts akan membuat halaman tersebut aktif --}}
            <span data-feather="key" class="align-text-bottom"></span>
            Kelola Akun
          </a>
        </li>
      </ul>
      @endif
    @can('admin')
      <h6 class="sidebar-heaing d-flex justify-conten-between slign-items-center px-3 mt-4 mb-1 text-muted">
        <span>Admin</span>
      </h6>

      <ul class="nav flex-column">
       {{--  <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*')? 'active' : ''}}" href="/dashboard/categories">
            {{-- while card (*) berfungsi untuk melihat apapun yang ada setelah tanda categories akan membuat halaman tersebut aktif --}}
           {{--  <span data-feather="grid" class="align-text-bottom"></span>
            Post Categories
          </a>
        </li> --}} 
        
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/mahasiswa*')? 'active' : ''}}" href="/dashboard/mahasiswa">
            {{-- while card (*) berfungsi untuk melihat apapun yang ada setelah tanda posts akan membuat halaman tersebut aktif --}}
            <span data-feather="users" class="align-text-bottom"></span>
            Mahasiswa
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/jurusan*')? 'active' : ''}}" href="/dashboard/jurusan">
            {{-- while card (*) berfungsi untuk melihat apapun yang ada setelah tanda posts akan membuat halaman tersebut aktif --}}
            <span data-feather="book" class="align-text-bottom"></span>
            Jurusan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/prodi*')? 'active' : ''}}" href="/dashboard/prodi">
            {{-- while card (*) berfungsi untuk melihat apapun yang ada setelah tanda posts akan membuat halaman tersebut aktif --}}
            <span data-feather="book-open" class="align-text-bottom"></span>
            Program Studi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/kategori*')? 'active' : ''}}" href="/dashboard/kategori">
            {{-- while card (*) berfungsi untuk melihat apapun yang ada setelah tanda posts akan membuat halaman tersebut aktif --}}
            <span data-feather="file-text" class="align-text-bottom"></span>
            Kategori Kegiatan
          </a>
        </li>

       {{--  <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/capaian*')? 'active' : ''}}" href="/dashboard/capaian">
            {{-- while card (*) berfungsi untuk melihat apapun yang ada setelah tanda posts akan membuat halaman tersebut aktif --}}
           {{--  <span data-feather="file-text" class="align-text-bottom"></span>
            Capaian Pembelajaran
          </a>
        </li>  --}}

        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/info*')? 'active' : ''}}" href="/dashboard/info">
            {{-- while card (*) berfungsi untuk melihat apapun yang ada setelah tanda posts akan membuat halaman tersebut aktif --}}
            <span data-feather="award" class="align-text-bottom"></span>
            Info Tambahan
          </a>
        </li>
       
      </ul>
      @elsecan('penerjemah')

        <h6 class="sidebar-heaing d-flex justify-conten-between slign-items-center px-3 mt-4 mb-1 text-muted">
          <span>Penerjemah</span>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/penerjemah*')? 'active' : ''}}" href="/dashboard/penerjemah">
              {{-- while card (*) berfungsi untuk melihat apapun yang ada setelah tanda posts akan membuat halaman tersebut aktif --}}
              <span data-feather="file-text" class="align-text-bottom"></span>
              Kelola InfoTambahan
            </a>
          </li>
        </ul>
      @endcan
    </div>
  </nav>