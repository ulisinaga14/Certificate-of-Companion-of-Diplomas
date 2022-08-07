@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Organisasi</h1>
  </div>

  @if(session()->has('success'))
  <div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
  </div>
  @endif

  <div class="table-responsive ">
    <a href="/dashboard/organisasi/create " class="btn btn-primary mb-3">Create New Organisasi</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
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

        @foreach ($organisasi as $org)
        <tr>
          <td>{{ $loop->iteration }}</td> {{-- untuk membuat angka terurut yang dimulai dari 1 --}}
          <td>{{ Auth::user()->name }}</td>
          <td>{{ $org->topik_idn }} <br><i>({{ $org->topik_ing }})</i> </td>
          <td>{{ $org->tempat }} <br><i>({{ $org->place }})</i> </td>
          <td>{{ $org->tgl_mulai }}</td>
          <td>{{ $org->tgl_selesai }}</td>
          <td>{{ $org->penyelenggara }} <br> {{ $org->institution }}</td>
          <td><img src=" {{ asset('storage/' . $org->image)}}"  class="img-preview img-fluid " width="80"></td> {{-- diambil dari relationship tabel --}}
          <td>
              <a href="/dashboard/organisasi/{{ $org->topik_idn }}"class="badge bg-info"><span data-feather="eye" ></span></a>
              
              <a href="/dashboard/organisasi/{{ $org->topik_idn }}/edit" class="badge bg-warning"><span data-feather="edit" ></span></a>
              
              <form action="/dashboard/organisasi/{{ $org->topik_idn }}" method="post" class="d-inline">
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