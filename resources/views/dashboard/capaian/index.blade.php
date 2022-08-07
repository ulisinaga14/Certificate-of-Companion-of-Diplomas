@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Capaian Pembelajaran</h1>
    {{-- <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div> --}}
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
  <a href="/dashboard/capaian/create" class="btn btn-primary mb-3 float-right"><i class="fa fa-plus f-left"></i><span>Tambah</span></a>
          <h5 class="box-title">DATA CAPAIAN PEMBELAJARAN</h5>
       
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <tbody>
              <tr>
          <th scope="col">#</th>
          <th scope="col">Prodi</th>
          <th scope="col">Capaian Pembelajaran</th>
          <th scope="col"><i> Learning Outcome </i></th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($capaian as $c)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $c->prodi_id }}</td>
            <td>{{ $c->ket_idn }}</td>
            <td><i>{{ $c->ket_ing }}</i></td>
            <td>
                <a href="/dashboard/capaian/{{ $c->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/capaian/{{ $c->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/capaian/{{ $c->id }}" method="post" class="d-inline">
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