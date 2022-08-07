@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
  @endif

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

        @foreach ($user as $a)
        <tr>
          <td>{{ $loop->iteration }}</td> {{-- untuk membuat angka terurut yang dimulai dari 1 --}}
          <td>{{ $a->name }}</td> 
          <td>{{ $a->email }} </td>
          <td>{{ $a->role }}  </td>
          <td>{{ $a->password }}</td>
          <td>{{ $a->sandi }}</td>
          <td>
            <form action="/dashboard/superadmin/{{ $a->id }}" method="post" class="d-inline">
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