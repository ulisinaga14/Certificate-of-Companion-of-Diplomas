@extends('dashboard.layouts.main')

@section('container')
<h1 class=" text-center mt-2">Data Mahasiswa</h1>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  mb-3 border-bottom">
  {{-- <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div> --}}
  </div>

  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/dashboard/mahasiswa">
        @if (request('mahasiswa')) {{-- jika di dalam request ada kategory --}}
            <input type="hidden" name="mahasiswa" value="{{ request('mahasiswa') }}">  
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
          <button class="btn btn-dark" type="submit">Search</button>
        </div>
      </form>
    </div>
  </div>
  @if (session()->has('success'))
  <div class="alert alert-success" role="alert" aria-label="close">
    {{ session('success') }}
  </div>
  @endif
  
  <div class="padding">
    <div class="row container d-flex content-center">
<div class="col">
<div class="box">
  <a href="/dashboard/mahasiswa/create" class="btn btn-primary mb-3 float-right"><i class="fa fa-plus f-left"></i><span>Tambah</span></a>
          <h5 class="box-title">DATA MAHASISWA</h5>
       
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
          <th scope="col">Action</th>
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
              <a href="/dashboard/mahasiswa/{{ $mhs->nama_mahasiswa }}"  class="text-decoration-none">Lihat Detail</a>
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

@endsection