@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Pendidikan Karakter</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <div class="table-responsive ">
    <a href="/dashboard/karakter/create " class="btn btn-primary mb-3">Create New Karakter</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Topik <br><i>Topic</i></th>
          <th scope="col">Tempat <br><i>Place</i></th>
          <th scope="col">Tanggal Mulai</th>
          <th scope="col">Tanggal Selesai</th>
          <th scope="col">Penyelenggara <br><i>Institution</i></th>
          <th scope="col">Sertifikat </th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($karakter as $kar)
        <tr>
          <td>{{ $loop->iteration }}</td> {{-- untuk membuat angka terurut yang dimulai dari 1 --}}
          <td>{{ Auth::user()->name }}</td> 
          <td>{{ $kar->topik_idn }} <br><i>({{ $kar->topik_ing }})</i> </td>
          <td>{{ $kar->tempat }} <br><i>({{ $kar->place }})</i> </td>
          <td>{{ $kar->tgl_mulai }}</td>
          <td>{{ $kar->tgl_selesai }}</td>
          <td>{{ $kar->penyelenggara }} <br> {{ $kar->institution }}</td>
          <td><img src=" {{ asset('storage/' . $kar->image)}}"  class="img-preview img-fluid " width="80"></td> {{-- diambil dari relationship tabel --}}
          <td>
              <a href="/dashboard/karakter/{{ $kar->topik_idn }}"class="badge bg-info"><span data-feather="eye" ></span></a>
              
              <a href="/dashboard/karakter/{{ $kar->topik_idn }}/edit" class="badge bg-warning"><span data-feather="edit" ></span></a>
              
              <form action="/dashboard/karakter/{{ $kar->topik_idn }}" method="post" class="d-inline">
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

@endsection