@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Info Tambahan</h1>
  </div>

  @if (session()->has('success'))
  <div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <div class="padding">
    <div class="row container d-flex content-center">
<div class="col">
<div class="box">
  <a href="/dashboard/info/create" class="btn btn-primary mb-3 float-right"><i class="fa fa-plus f-left"></i><span>Tambah</span></a>
          <h5 class="box-title">DATA INFO TAMBAHAN</h5>
       
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
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
          <td>{{ $i->user->name }}</td> 
          <td>{{ $i->kategori->kategori_idn }}</td> 
          <td>{{ $i->topik_idn }} <br><i>({{ $i->topik_ing }})</i> </td>
          <td>{{ $i->tempat }} <br><i>({{ $i->place }})</i> </td>
          <td>{{ $i->tgl_mulai }}</td>
          <td>{{ $i->tgl_selesai }}</td>
          <td>{{ $i->penyelenggara }} <br> {{ $i->institution }}</td>
          <td><img src="{{asset('sertifikat/')}}/{{$i->image}}"  class="img-preview img-fluid " width="80"></td> {{-- diambil dari relationship tabel --}}
          <td>
              @if ($i->status == '1')
                  <span class="badge badge-success">Diterima<span
                          class="ms-1 fa fa-check"></span> 
                  @elseif($i->status == '2')
                  <span class="badge badge-danger">Ditolak</span>
                    <p>Data Tidak Lengkap</p>
                           
                      @elseif($i->status == '0')
                          <span class="badge badge-info">Menunggu<span
                                  class="ms-1 fa fa-ban"></span>
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

    <h6>B. Capaian Pembelajaran Mahasiswa</h6>
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
          <td>{{ $i->ket_ing }}</td> 
        </tr>
        @endforeach
      </tbody>
    </table>
    </div>
  
@endsection