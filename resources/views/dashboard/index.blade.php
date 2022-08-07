@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
  </div>
  @if (session()->has('success'))
  <div class="alert alert-success" role="alert" aria-label="close">
    {{ session('success') }}
  </div>
  @endif
  @if (Auth::user()->role == 'admin')
      
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container ">
      <div class="row">
          <div class="col-md-4 col-xl-3">
              <div class="card bg-c-blue order-card">
                  <div class="card-block">
                      <h6 class="m-b-20">Mahasiswa Yang Mendaftar</h6>
                      <h5 class="text-right"><i class="fa fa-users f-left"></i><span>
                        {{ $total_mhs->count() }} Mahasiswa
                      </span></h5>
                  </div>
              </div>
          </div>
          
          <div class="col-md-4 col-xl-3">
              <div class="card bg-c-green order-card">
                  <div class="card-block">
                      <h6 class="m-b-20">Informasi Tambahan Yang Diterima</h6>
                      <h5 class="text-right"><i class="fa fa-rocket f-left"></i><span>{{ $terima }} Data</span></h5>
                  </div>
              </div>
          </div>
          
          <div class="col-md-4 col-xl-3">
              <div class="card bg-c-yellow order-card">
                  <div class="card-block">
                      <h6 class="m-b-20">Informasi Tambahan Yang Belum Diverifikasi</h6>
                      <h5 class="text-right"><i class="fa fa-hourglass-start f-left"></i><span>{{ $menunggu }} Data</span></h5>
                  </div>
              </div>
          </div>
          
          <div class="col-md-4 col-xl-3">
              <div class="card bg-c-pink order-card">
                  <div class="card-block">
                      <h6 class="m-b-20">Informasi Tambahan yang Ditolak</h6>
                      <h5 class="text-right"><i class="fa fa-times f-left"></i><span>{{ $tolak }} Data</span></h5>
                  </div>
              </div>
          </div>
    </div>
  </div>
  <div>
    <div class="padding">
      <div class="row container d-flex content-center">
<div class="col">
<div class="box">
            <h5 class="box-title">A. DATA INFORMASI TAMBAHAN</h5>
            
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
             <th scope="col">#</th>
             <th scope="col">Nama</th>
             <th scope="col">Kategori</th>
             <th scope="col">Topik <br><i>Topic</i></th>
             <th scope="col">Created At</i></th>
             <th scope="col">Detail</th>
             <th scope="col">Sertifikat </th>
             <th scope="col">Verifikasi </th>
           </tr>
         </thead>
         <tbody>
   
           @foreach ($info as $i)
           <tr>
             <td>{{ $loop->iteration }}</td> {{-- untuk membuat angka terurut yang dimulai dari 1 --}}
             <td>{{ $i->user->name }}</td> 
             <td>{{ $i->kategori->kategori_idn }}</td> 
             <td>{{ $i->topik_idn }} <br><i>({{ $i->topik_ing }})</i> </td>
             <td>{{ $i->created_at }} </td>
             <td>
               <a href="/dashboard/info/{{ $i->topik_idn }}" class="text-decoration-none"> Lihat Detail</a>
             </td>
              <td>
               @if($i->image)
               <img src=" {{asset('sertifikat/')}}/{{$i->image}}"  class="img-preview img-fluid " width="80">
               @else
               <p>Tidak Ada!</p>
               @endif
           </td> {{-- diambil dari relationship tabel --}}
           
             <td class="text-center">
                   <div class="row">
                     <div class="col">
                       @if ($i->status == '1')
                           <span class="badge badge-success">Diterima<span
                                   class="ms-1 fa fa-check"></span>
                           @elseif($i->status == '2')
                               <span class="badge badge-danger">Ditolak<span
                                       class="ms-1 fa fa-times"></span>
                               @elseif($i->status == '0')
                                   <span class="badge badge-info">Menunggu<span
                                           class="ms-1 fa fa-clock-o"></span>
                       @endif
                   </div>
                       <div class="col">
                           <div class="dropdown text-sans-serif"><button
                                   class="btn btn-primary tp-btn-light sharp" type="button"
                                   id="order-dropdown-7" data-bs-toggle="dropdown"
                                   data-boundary="viewport" aria-haspopup="true"
                                   aria-expanded="false"><span><svg
                                           xmlns="http://www.w3.org/2000/svg"
                                           xmlns:xlink="http://www.w3.org/1999/xlink"
                                           width="18px" height="18px" viewbox="0 0 24 24"
                                           version="1.1">
                                           <g stroke="none" stroke-width="1" fill="none"
                                               fill-rule="evenodd">
                                               <rect x="0" y="0" width="24" height="24"></rect>
                                               <circle fill="#000000" cx="5" cy="12" r="2">
                                               </circle>
                                               <circle fill="#000000" cx="12" cy="12" r="2">
                                               </circle>
                                               <circle fill="#000000" cx="19" cy="12" r="2">
                                               </circle>
                                           </g>
                                       </svg></span></button>
                               <div class="dropdown-menu dropdown-menu-end border py-0"
                                   aria-labelledby="order-dropdown-7">
                                   <div class="py-2"><a class="dropdown-item"
                                           href="/terima/{{ $i->id }}">Diterima</a><a
                                           class="dropdown-item"
                                           href="/tolak/{{ $i->id }}">Ditolak</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </td>
           </tr>
           @endforeach
           
          </tbody>
        </table>
        </div>
      </div>
    </div>
</div>
</div>

<br>
        <div class="padding">
          <div class="row container d-flex content-center">
  <div class="col">
  <div class="box">
   
                <h5 class="box-title">B. CAPAIAN PEMBELAJARAN MAHASISWA</h5>
             
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Capaian</th>
        <th scope="col">Achievment</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($info as $i)
      <tr>
        <td>{{ $loop->iteration }}</td> {{-- untuk membuat angka terurut yang dimulai dari 1 --}}
        <td>{{ $i->user->name }}</td> 
        <td>{{ $i->ket_idn }}</td> 
        <td><b><i>{{ $i->ket_ing }}</i> </b> </td> 
        <td>
          <a href="/dashboard/info/{{ $i->topik_idn }}/edit" class="badge bg-warning"><span data-feather="edit" ></span></a>
              
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>
</div>
</div>
</div>
    <div class="padding">
        <div class="row container d-flex content-center">
<div class="col">
<div class="box">
              <h5 class="box-title">II. INFORMASI TENTANG IDENTITAS PENYELENGGARA PROGRAM</h5>
           
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                  <td>2.1</td>
                  <td>Surat Keterangan Pendirian
                    <br> <i><small> Certificate of Establishment </small></i>
                  </td>
                  <td>Surat Keputusan Menteri Pendidikan dan Kebudayaan RI No.084/O/1997 Tentang Pendirian Politeknik Negeri Medan </td>
                  </tr>
                  <tr>
                    <td>2.2</td>
                  <td>Nama Perguruan Tinggi
                    <br> <i><small>Name of Higher Education Institution</small></i>
                  </td>
                  <td>Politeknik Negeri Medan</td>
                  </tr>
                  
                  <tr>
                    <td>2.3</td>
                  <td>Nama Program Studi
                    <br> <i> <small>Study Program</small></i>
                  </td>
                  <td>Diploma III <i>(Nama Prodi)</i>
                    <br><i><small>Diploma III <i>(Prodi Name)</i></small></i>
                  </td>
                  </tr>
                  
                  <tr>
                    <td>2.4</td>
                     <td>Jenis Pendidikan
                      <br> <i> <small>Type of Education</small></i>
                     </td>
                     <td>Vokasi/Politeknik
                      <br> <i><small> Vocational/Polytechnic</small></i>
                     </td>
                  </tr>
                  <tr>
                    <td>2.5</td>
                     <td>Jenjang Pendidikan
                      <br> <i> <small>Level of Education</small></i>
                     </td>
                     <td>Diploma III
                      <br> <i><small> Diploma III</small></i>
                     </td>
                  </tr>
                  <tr>
                    <td>2.6</td>
                     <td>Jenjang Kualifikasi sesuai KKNI
                      <br> <i> <small>Qualification Level in Compliance to National Qualification Framework</small></i>
                     </td>
                     <td>Level 5
                      <br> <i><small> Level 5</small></i>
                     </td>
                  </tr>
                  <tr>
                    <td>2.7</td>
                     <td>Persyaratan Penerimaan
                      <br> <i> <small>Admission Requirements</small></i>
                     </td>
                     <td>Lulus SLTA dan Lulus Seleksi Mahasiswa Baru
                      <br> <i><small>High School Pass Certificate and Pass The New Student Selection</small></i>
                     </td>
                  </tr>
                  <tr>
                    <td>2.8</td>
                     <td>Bahasa Pengantar Kuliah
                      <br> <i> <small>Medium of Instruction</small></i>
                     </td>
                     <td>Bahasa Indonesia
                      <br> <i><small>Bahasa Indonesia</small></i>
                     </td>
                  </tr>
                  <tr>
                    <td>2.9</td>
                     <td>Sistem Penilaian
                      <br> <i> <small>Assesment System</small></i>
                     </td>
                     <td>A=4, B=3, C=2, D=1, E=0 </td>
                  </tr>
                  <tr>
                    <td>2.10</td>
                     <td>Lama Study Reguler
                      <br> <i> <small>Duration of Study</small></i>
                     </td>
                     <td>3 Tahun <br> <i><small>3 Years</small></i> </td>
                  </tr>
                  <tr>
                    <td>2.11</td>
                     <td>Jenis dan Jenjang Pendidikan Lanjutan
                      <br> <i> <small>Type and Level of Further Study</small></i>
                     </td>
                     <td>Diploma 4 / Sarjana <br> <i><small>Diploma 4 / Undergraduate</small></i> </td>
                  </tr>
                  
              </tbody>
            </table>
            </div>
          </div>
        </div>
    </div>
 </div>

@elseif(Auth::user()->role == 'mahasiswa')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">
        <div class="row">
            
          <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Jumlah Kegiatan yang Diikuti</h6>
                    <h5 class="text-right"><i class="fa fa-users f-left"></i><span>
                       {{ $daftar->count() }} Data</span></h5>
                </div>
            </div>
        </div>

            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Informasi Tambahan yang yang Diterima</h6>
                        <h5 class="text-right"><i class="fa fa-rocket f-left"></i><span>
                           {{ $terima->count() }} Data</span></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Informasi Tambahan yang belum Diverifikasi</h6>
                        <h5 class="text-right"><i class="fa fa-refresh f-left"></i><span>
                           {{ $menunggu->count() }} Data</span></h5>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-xl-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Informasi Tambahan yang Ditolak</h6>
                        <h5 class="text-right"><i class="fa fa-credit-card f-left"></i><span>{{ $tolak }} Data</span></h5>
                    </div>
                </div>
            </div>
      </div>
    </div>

      
    <div class="padding">
      <div class="row container d-flex content-center">
  <div class="col">
  <div class="box">
    <a href="/dashboard/mahasiswa/create" class="btn btn-success mb-3 float-right"><i class="fa fa-plus f-left"></i><span>Tambah</span></a>
            <h5 class="box-title">A. DATA DIRI MAHASISWA</h5>
         
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
              <th scope="col">#</th>
              <th scope="col">NIM</th>
              <th scope="col">Nama Mahasiswa</th>
              <th scope="col">Tahun Lulus</th>
              <th scope="col">Detail Mahasiswa</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($mahasiswa as $mhs)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama_mahasiswa }}</td>
                <td>{{ $mhs->tahun_lulus }}</td>
                <td> 
                  <a href="/dashboard/mahasiswa/{{ $mhs->nama_mahasiswa }}" class="text-decoration-none"><span data-feather="eye" ></span> Lihat Detail</a>
               </td>
                <td>
                    <a href="/dashboard/mahasiswa/{{ $mhs->nama_mahasiswa }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                    <form action="/dashboard/mahasiswa/{{ $mhs->nama_mahasiswa }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')"><span data-feather="x-circle"></span></button>
                    </form>
                </td>
                </tr>
            @endforeach
          </tbody>
        </table>
        </div>
      </div>
    </div>
    </div>
    </div>
<br>
     
  <div class="padding">
    <div class="row container d-flex content-center">
<div class="col">
<div class="box">
  <a href="/dashboard/cetak_pdf" class="btn btn-primary float-right mb-2" target="_blank"><i class="fa fa-cloud-download"><span> CETAK PDF</span> </i> </a>
  <a href="/dashboard/info/create" class="btn btn-success mb-3 float-right"><i class="fa fa-plus f-left"></i><span>Tambah</span></a>
  
  <!-- /.box-header -->
  <div class="box-body">
          <h5 class="box-title">B. DATA INFORMASI TAMBAHAN</h5>
          <br> <b><i>Cetak SKPI Jika Status Data Sudah Diverifikasi (Diterima/Ditolak) & Data Capaian Pembelajaran Telah Diisi </i></b>
               
          <table class="table table-bordered">
            <tbody>
              <tr>
              <th scope="col">#</th>
              <th scope="col">Kategori</th>
              <th scope="col">Topik <br><i>Topic</i></th>
              <th scope="col">Tempat <br><i>Place</i></th>
              <th scope="col">Tanggal Mulai</th>
              <th scope="col">Tanggal Selesai</th>
              <th scope="col">Penyelenggara <br><i>Institution</i></th>
              <th scope="col">Sertifikat </th>
              <th scope="col">Status </th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
    
            @foreach ($info as $i)
            <tr>
              <td>{{ $loop->iteration }}</td> {{-- untuk membuat angka terurut yang dimulai dari 1 --}}
              <td>{{ $i->kategori->kategori_idn }}</td> 
              <td>{{ $i->topik_idn }} </td>
              <td>{{ $i->tempat }}</i> </td>
              <td>{{ $i->tgl_mulai }}</td>
              <td>{{ $i->tgl_selesai }}</td>
              <td>{{ $i->penyelenggara }}</td>
              <td>
                @if($i->image)
                <img src=" {{asset('sertifikat/')}}/{{$i->image}}"  class="img-preview img-fluid " width="80">
                @else
                <p>Tidak Ada!</p>
                @endif
            </td>
              <td>
                  @if ($i->status == '1')
                      <span class="badge badge-success">Diterima<span
                              class="ms-1 fa fa-check"></span> 
                      @elseif($i->status == '2')
                      <span class="badge badge-danger">Ditolak</span>
                        <p>Data Tidak Valid</p>
                        @elseif($i->status == '0')
                        <span class="badge badge-info">Menunggu</span>
                             @endif
              </td>
              <td>
                  <a href="/dashboard/info/{{ $i->topik_idn }}"class="badge bg-info"><span data-feather="eye" ></span></a>
                  
                  <a href="/dashboard/info/{{ $i->topik_idn }}/edit" class="badge bg-warning"><span data-feather="edit" ></span></a>
                  
                  <form action="/dashboard/info/{{ $i->topik_idn }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                    <span data-feather="x-circle" ></span>
                  </button>
                  </form>
                   </td> 
            </tr>
            @endforeach
            
          </tbody>
        </table>
        </div>
      </div>
    </div>
<br>
<h5 class="box-title">C. CAPAIAN PEMBELAJARAN MAHASISWA</h5>
<div class="box-body">
  <table class="table table-bordered">
    <tbody>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Capaian</th>
        <th scope="col">Achievment</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($info as $i)
      <tr>
        <td>{{ $loop->iteration }}</td> {{-- untuk membuat angka terurut yang dimulai dari 1 --}}
        <td>{{ $i->ket_idn }}</td> 
        <td><i>{{ $i->ket_ing }}</i> </td> 
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  <br>


            <h5 class="box-title">II. INFORMASI TENTANG IDENTITAS PENYELENGGARA PROGRAM</h5>
            <div class="box-body">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                <td>2.1</td>
                <td>Surat Keterangan Pendirian
                  <br> <i><small> Certificate of Establishment </small></i>
                </td>
                <td>Surat Keputusan Menteri Pendidikan dan Kebudayaan RI No.084/O/1997 Tentang Pendirian Politeknik Negeri Medan </td>
                </tr>
                <tr>
                  <td>2.2</td>
                <td>Nama Perguruan Tinggi
                  <br> <i><small>Name of Higher Education Institution</small></i>
                </td>
                <td>Politeknik Negeri Medan</td>
                </tr>
                
                <tr>
                  <td>2.3</td>
                <td>Nama Program Studi
                  <br> <i> <small>Study Program</small></i>
                </td>
                @foreach ($mahasiswa as $m)
                   <td>Diploma III {{ $m->prodi->nama_prodi_idn }}
                   <br><i><small>Diploma III {{ $m->prodi->nama_prodi_ing }}</small></i></td>
                @endforeach
                
                </tr>
                
                <tr>
                  <td>2.4</td>
                   <td>Jenis Pendidikan
                    <br> <i> <small>Type of Education</small></i>
                   </td>
                   <td>Vokasi/Politeknik
                    <br> <i><small> Vocational/Polytechnic</small></i>
                   </td>
                </tr>
                <tr>
                  <td>2.5</td>
                   <td>Jenjang Pendidikan
                    <br> <i> <small>Level of Education</small></i>
                   </td>
                   <td>Diploma III
                    <br> <i><small> Diploma III</small></i>
                   </td>
                </tr>
                <tr>
                  <td>2.6</td>
                   <td>Jenjang Kualifikasi sesuai KKNI
                    <br> <i> <small>Qualification Level in Compliance to National Qualification Framework</small></i>
                   </td>
                   <td>Level 5
                    <br> <i><small> Level 5</small></i>
                   </td>
                </tr>
                <tr>
                  <td>2.7</td>
                   <td>Persyaratan Penerimaan
                    <br> <i> <small>Admission Requirements</small></i>
                   </td>
                   <td>Lulus SLTA dan Lulus Seleksi Mahasiswa Baru
                    <br> <i><small>High School Pass Certificate and Pass The New Student Selection</small></i>
                   </td>
                </tr>
                <tr>
                  <td>2.8</td>
                   <td>Bahasa Pengantar Kuliah
                    <br> <i> <small>Medium of Instruction</small></i>
                   </td>
                   <td>Bahasa Indonesia
                    <br> <i><small>Bahasa Indonesia</small></i>
                   </td>
                </tr>
                <tr>
                  <td>2.9</td>
                   <td>Sistem Penilaian
                    <br> <i> <small>Assesment System</small></i>
                   </td>
                   <td>A=4, B=3, C=2, D=1, E=0 </td>
                </tr>
                <tr>
                  <td>2.10</td>
                   <td>Lama Study Reguler
                    <br> <i> <small>Duration of Study</small></i>
                   </td>
                   <td>3 Tahun <br> <i><small>3 Years</small></i> </td>
                </tr>
                <tr>
                  <td>2.11</td>
                   <td>Jenis dan Jenjang Pendidikan Lanjutan
                    <br> <i> <small>Type and Level of Further Study</small></i>
                   </td>
                   <td>Diploma 4 / Sarjana <br> <i><small>Diploma 4 / Undergraduate</small></i> </td>
                </tr>
                
            </tbody>
  </table>
  </div>

@elseif(Auth::user()->role == 'superadmin')
<div class="padding">
  <div class="row container d-flex content-center">
<div class="col">
<div class="box">
<a href="/dashboard/superadmin/create" class="btn btn-primary mb-3 float-right"><i class="fa fa-plus f-left"></i><span>Tambah</span></a>
        <h5 class="box-title">DATA AKUN</h5>
     
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Password</th>
        <th scope="col">Sandi</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>

      @foreach ($akun as $a)
      <tr>
        <td>{{ $loop->iteration }}</td> {{-- untuk membuat angka terurut yang dimulai dari 1 --}}
        <td>{{ $a->name }}</td> 
        <td>{{ $a->email }} </td>
        <td>{{ $a->role }}  </td>
        <td>{{ $a->password }}</td>
        <td>{{ $a->sandi }}</td>
        <td>
          <form action="/dashboard/akun/{{ $a->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')"><span data-feather="x-circle"></span></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>
</div>
</div>
</div>
    @endif
@endsection