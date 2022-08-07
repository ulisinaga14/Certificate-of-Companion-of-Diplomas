@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    
    <div class="card  col-lg-5 mt-4">
        <div class="card-header ">
            <h3>Detail Data {{ $mahasiswa->nama_mahasiswa }}</h3>
        </div>
        <div class="card-body">
            <ul>
                <li><p>id : {{ $mahasiswa->id }}</p></li>
                <li><p>NIM : {{ $mahasiswa->nim }}</p></li>
                <li><p>Prodi  : {{ $mahasiswa->prodi->nama_prodi_idn }}</p></li>
                <li><p>Nama Mahasiswa : {{ $mahasiswa->nama_mahasiswa }}</p></li>
                <li><p>Tempat & Tanggal Lahir : {{ $mahasiswa->ttl }}</p></li>
                <li><p>Tahun Masuk : {{ $mahasiswa->tahun_masuk }}</p></li>
                <li><p>Tahun Lulus : {{ $mahasiswa->tahun_lulus }}</p></li>
                <li><p>No Ijazah : {{ $mahasiswa->no_ijazah }}</p></li>
                <li><p>No SKPI : {{ $mahasiswa->no_skpi }}</p></li>
            </ul>
        </div>
      </div>

      <a href="/dashboard" class="btn btn-success ">
        <span data-feather = "corner-down-left"></span>  
          Kembali
        </a>
</div>
@endsection