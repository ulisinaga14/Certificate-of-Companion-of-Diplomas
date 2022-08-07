@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Jurusan</h1>
    
</div>
<div class="col-lg-8">

  <form method="post" action="/dashboard/jurusan">
    @csrf
    <div class="row">
      <div class="col-sm-3 mb-3">
        <label for="id_jurusan" class="form-label">Id Jurusan</label>
        <input type="text" class="form-control @error('id_jurusan') is-invalid @enderror" id="id_jurusan" name="id_jurusan" required autofocus value="{{ old('id_jurusan') }}">
      
        @error('id_jurusan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror

      </div>
    </div>
      <div class="row">
        <div class="mb-3 col-sm-5">
        <label for="nama_jurusan" class="form-label">Nama Jurusan</label>
        <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan" name="nama_jurusan" required autofocus value="{{ old('nama_jurusan') }}">
        
        @error('nama_jurusan')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror

      </div>
    </div>
      <button type="submit" class="btn btn-primary">Create Jurusan</button>
</form>
    
</div>
@endsection