@extends('dashboard.layouts.main')

@section('container')
<h1 class=" text-center mt-2">{{ $title }}</h1>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center  mb-3 border-bottom">
  {{-- <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div> --}}
  </div>

  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/dashboard/prodi">
        @if (request('prodi')) {{-- jika di dalam request ada kategory --}}
            <input type="hidden" name="prodi" value="{{ request('prodi') }}">  
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
          <button class="btn btn-dark" type="submit">Search</button>
        </div>
      </form>
    </div>
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
  <a href="/dashboard/prodi/create" class="btn btn-primary mb-3 float-right"><i class="fa fa-plus f-left"></i><span>Tambah</span></a>
          <h5 class="box-title">DATA PROGRAM STUDI</h5>
       
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
          <th scope="col">Kode</th>
          <th scope="col">Prodi <br></th>
          <th scope="col">Status Akreditasi</th>
          <th scope="col">Gelar</th>
          <th scope="col">Nama Jurusan</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($prodi as $prd)
            <tr class="text-center">
            <td>{{ $prd->id_prodi }}</td>
            <td>{{ $prd->nama_prodi_idn }}</td>
            <td>{{ $prd->status_akreditasi }}</td>
            <td>{{ $prd->gelar_idn }}</td>
            <td>{{ $prd->jurusan->nama_jurusan }}</td>
            <td>
               
                <a href="/dashboard/prodi/{{ $prd->nama_prodi_idn }}" class="badge bg-info"><span data-feather="eye"></span></a> <br>
                <a href="/dashboard/prodi/{{ $prd->nama_prodi_idn }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> <br>
                <form action="/dashboard/prodi/{{ $prd->nama_prodi_idn }}" method="post" class="d-inline">
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
{{ $prodi->links() }}
@endsection