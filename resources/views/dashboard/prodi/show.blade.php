@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    
    <div class="card  col-lg-5 mt-4">
        <div class="card-header ">
            <h3>Detail Program Studi{{ $prodi->nama_prodi_idn }}</h3>
        </div>
        <div class="card-body">
            <ul>
                <li><p>id : {{ $prodi->id }}</p></li>
                <li><p>Id Prodi : {{ $prodi->id_prodi }}</p></li>
                <li><p>Id Jurusan : {{ $prodi->jurusan_id }}</p></li>
                <li><p>Nama Prodi_idn: {{ $prodi->nama_prodi_idn }}</p></li>
                <li><p>Nama Prodi_ing : {{ $prodi->nama_prodi_ing }}</p></li>
                <li><p>Status Akreditasi : {{ $prodi->status_akreditasi }}</p></li>
                <li><p>No Akreditasi : {{ $prodi->no_akreditasi }}</p></li>
                <li><p>Jenjang Kualifikasi : {{ $prodi->jenjang_kualifikasi }}</p></li>
                <li><p>Pendidikan Lanjutan : {{ $prodi->pendidikan_lanjutan }}</p></li>
                <li><p>Program Pendidikan Tinggi : {{ $prodi->program_pendidikan_tinggi }}</p></li>
                <li><p>Jenis Jenjang Pendidikan : {{ $prodi->jenis_jenjang_pendidikan }}</p></li>
                <li><p>Gelar_idn : {{ $prodi->gelar_idn }}</p></li>
                <li><p>Gelar_ing : {{ $prodi->gelar_ing }}</p></li>
            </ul>
        </div>
      </div>

      <a href="/dashboard/prodi" class="btn btn-primary mt-1">Kembali</a>
</div>
@endsection