@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Prodi</h1>
    
</div>
<div class="col-lg-8">

  <form method="post" action="/dashboard/prodi">
    @csrf
    <div class="alert alert-primary lg-6"> 
      <strong>Data Program Studi</i></strong>
  </div>

  <div class="row">
    <div class="row ">
        <div class="col-sm-2  mb-2">
        <label for="id_prodi" class="form-label">Id Prodi</label>
        <input type="text" class="form-control @error('id_prodi') is-invalid @enderror" id="id_prodi" name="id_prodi" required autofocus value="{{ old('id_prodi') }}">
      
        @error('id_prodi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror
      </div>

      <div class="col-sm-4  mb-2">
      <label for="nama_prodi_idn" class="form-label">Nama Program Studi</label>
      <input type="text" class="form-control  @error('nama_prodi_idn') is-invalid @enderror" id="nama_prodi_idn" name="nama_prodi_idn" required autofocus value="{{ old('nama_prodi_idn') }}">
    
      @error('nama_prodi_idn')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
     @enderror

    </div>
    <div class="col-sm-4   mb-2">
      <label for="nama_prodi_ing" class="form-label">Name of Study Program</label>
      <input type="text" class="form-control @error('nama_prodi_ing') is-invalid @enderror" id="nama_prodi_ing" name="nama_prodi_ing" required autofocus value="{{ old('nama_prodi_ing') }}">
    
      @error('nama_prodi_ing')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
     @enderror

    </div>
    </div>
    <div class="row ">
      <div class="col-sm-5 mb-2">
        <label for="jurusan_id" class="form-label">Jurusan</label>
        <select class="form-select" name="jurusan_id">

          @foreach ($jurusan as $jur)
          @if (old('jurusan_id') == $jur->nama_jurusan)
            <option value="{{ $jur->id }} selected">{{ $jur->nama_jurusan }}</option> 
          @else 
            <option value="{{ $jur->id }} ">{{ $jur->nama_jurusan }}</option> 
            @endif

          @endforeach
           </select>
        </div>
        <div class="col-sm-3  mb-2">
          <label for="no_akreditasi" class="form-label">Nomor Akreditasi</label>
          <input type="text" class="form-control @error('no_akreditasi') is-invalid @enderror" id="no_akreditasi" name="no_akreditasi" required autofocus value="{{ old('no_akreditasi') }}">
       
          @error('no_akreditasi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
         @enderror
       
        </div>
        <div class="col-sm-3  mb-2" >
        <label for="status_akreditasi" class="form-label">Status Akreditasi</label>
        <input type="text" class="form-control @error('status_akreditasi') is-invalid @enderror" id="status_akreditasi" name="status_akreditasi" required autofocus value="{{ old('status_akreditasi') }}">
      
        @error('status_akreditasi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror

      </div>
    </div>

    <div class="row  ">
      <div class="col-sm-5 mb-2">
        <label for="program_pendidikan_tinggi" class="form-label">Program Pendidikan Tinggi</label>
        <input type="text" class="form-control @error('program_pendidikan_tinggi') is-invalid @enderror" id="program_pendidikan_tinggi" name="program_pendidikan_tinggi" required autofocus value="{{ old('program_pendidikan_tinggi') }}">
      
        @error('program_pendidikan_tinggi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror
      
      </div>
      <div class="col-sm-3">
        <label for="jenjang_kualifikasi" class="form-label">Jenjang Kualifikasi</label>
        <input type="text" class="form-control @error('jenjang_kualifikasi') is-invalid @enderror" id="jenjang_kualifikasi" name="jenjang_kualifikasi" required autofocus value="{{ old('jenjang_kualifikasi') }}">
      
        @error('jenjang_kualifikasi')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror
      
      </div>
      <div class="col-sm-3">
        <label for="pendidikan_lanjutan" class="form-label">Pendidikan Lanjutan</label>
        <input type="text" class="form-control @error('pendidikan_lanjutan') is-invalid @enderror" id="pendidikan_lanjutan" name="pendidikan_lanjutan" required autofocus value="{{ old('pendidikan_lanjutan') }}">
      
        @error('pendidikan_lanjutan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror
      
      </div>
    </div>

    <div class="row">
      <div class="col-sm-4">
        <label for="jenis_jenjang_pendidikan" class="form-label">Jenis Jenjang Pendidikan </label>
        <input type="text" class="form-control @error('jenis_jenjang_pendidikan') is-invalid @enderror" id="jenis_jenjang_pendidikan" name="jenis_jenjang_pendidikan" required autofocus value="{{ old('jenis_jenjang_pendidikan') }}">
      
        @error('jenis_jenjang_pendidikan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror
      
      </div>
      <div class="col-sm-2">
        <label for="gelar_idn" class="form-label">Gelar</label>
        <input type="text" class="form-control @error('gelar_idn') is-invalid @enderror" id="gelar_idn" name="gelar_idn" required autofocus value="{{ old('gelar_idn') }}">
     
        @error('gelar_idn')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror

      </div>
      <div class="col-sm-2 mb-3">
        <label for="gelar_ing" class="form-label">Title</label>
        <input type="text" class="form-control @error('gelar_ing') is-invalid @enderror" id="gelar_ing" name="gelar_ing" required autofocus value="{{ old('gelar_ing') }}">
      
        @error('gelar_ing')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror
      
      </div>
    </div>
  </div>
      <button type="submit" class="btn btn-primary">Create Prodi</button>
</form>
    
</div>

      @endsection