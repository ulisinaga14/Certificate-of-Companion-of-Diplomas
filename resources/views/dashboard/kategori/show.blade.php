@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    
    <div class="card  col-lg-5 mt-4">
        <div class="card-header ">
            <h3>View  #{{ $kategori->kategori_idn }}</h3>
        </div>
        <div class="card-body">
            <ul>
                <li><p>id : {{ $kategori->id }}</p></li>
                <li><p>Id kategori : {{ $kategori->id_kategori }}</p></li>
                <li><p>Nama Kategori : {{ $kategori->kategori_idn }}</p></li>
                <li><p>Category Name : {{ $kategori->kategori_ing }}</p></li>
            </ul>
        </div>
      </div>

      <a href="/dashboard/kategori" class="btn btn-primary mt-1">Kembali</a>
</div>
@endsection