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
           <th scope="col">Category</th>
           <th scope="col">Title </th>
           <th scope="col">Detail</th>
           <th scope="col">Aksi </th>
         </tr>
       </thead>
       <tbody>
  
         @foreach ($info as $i)
         <tr>
           <td>{{ $loop->iteration }}</td> {{-- untuk membuat angka terurut yang dimulai dari 1 --}}
           <td>{{ $i->user->name }}</td> 
           <td><b> {{ $i->kategori->kategori_ing }}</b></td> 
           <td><b><i>{{ $i->topik_ing }} </i> </b> </td>
           <td>
            <a href="/dashboard/info/{{ $i->topik_idn }}" class="text-decoration-none"> Lihat Detail</a>
          </td>
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

  <h5 class="box-title">B. CAPAIAN PEMBELAJARAN MAHASISWA</h5>
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
        <td><b><i>{{ $i->ket_ing }}</i> </b> </td> 
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  @endsection