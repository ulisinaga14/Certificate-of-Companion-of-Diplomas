@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kategori Kegiatan</h1>
    
</div>
<div class="col-lg-8">

  <form method="post" action="/dashboard/kategori/{{ $kategori->kategori_idn}}">
    @csrf
    @method('put')
      <div class="mb-3">
        <label for="id_kategori" class="form-label">Id Kategori</label>
        <input type="text" class="form-control @error('id_kategori') is-invalid @enderror" id="id_kategori" name="id_kategori" required autofocus value="{{ old('id_kategori', $kategori->id_kategori) }}">
      
        @error('id_kategori')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror

      </div>
      <div class="mb-3">
        <label for="kategori_idn" class="form-label">Activity Name</label>
        <input type="text" class="form-control @error('kategori_idn') is-invalid @enderror" id="kategori_idn" name="kategori_idn" required autofocus value="{{ old('kategori_idn', $kategori->kategori_idn) }}">
        
        @error('kategori_idn')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror

      </div>
      <div class="mb-3">
        <label for="kategori_ing" class="form-label">Nama Kegiatan</label>
        <input type="text" class="form-control @error('kategori_ing') is-invalid @enderror" id="kategori_ing" name="kategori_ing" required autofocus value="{{ old('kategori_ing', $kategori->kategori_ing) }}">
        
        @error('kategori_ing')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror

      </div>
      <button type="submit" class="btn btn-primary">Edit Kategori</button>
</form>
    
</div>
@endsection