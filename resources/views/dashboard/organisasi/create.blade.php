@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Info Tambahan</h1>
    
</div>
<form method="post" action="/dashboard/organisasi" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="alert alert-primary">
                <strong>B. PENGALAMAN ORGANISASI | <i>ORGANIZATION EXPERIENCE</i></strong>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-sm-5">
                        <label for="topik_idn" class="form-label">Pengalaman Organisasi :</label>
                        <input type="text" class="form-control  @error('topik_idn') is-invalid @enderror" id="topik_idn" name="topik_idn" required autofocus value="{{ old('topik_idn') }}">
                      
                            @error('topik_idn')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                             @enderror
    
                    </div>
                    <div class="col-sm-5">
                        <label for="topik_ing" class="form-label"><i>Organization Experience:</i></label>
                        <input type="text" class="form-control  @error('topik_ing') is-invalid @enderror" id="topik_ing" name="topik_ing" required autofocus value="{{ old('topik_ing') }}">
                      
                            @error('topik_ing')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                             @enderror
    
                    </div>
                </div>

                    <div class="col-sm-4">
                        <label>Kategori:</label>
                        <select name="kategori_id" class="form-control">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($kategori as $k)
                            @if (old('kategori_id') == $k->kategori_idn)
                              <option value="{{ $k->id }} selected">{{ $k->kategori_idn }}</option> 
                            @else 
                              <option value="{{ $k->id }} ">{{ $k->kategori_idn }}</option> 
                              @endif
                  
                            @endforeach
                        </select>
                    </div>
            </div>
                <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Tempat Kegiatan :</label>
                        <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" required autofocus value="{{ old('tempat') }}">
      
                        @error('tempat')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label><i>Place :</i></label>
                        <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" name="place" required autofocus value="{{ old('place') }}">
      
                        @error('place')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Tanggal Mulai :</label>
                        <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror" id="tgl_mulai" name="tgl_mulai" required autofocus value="{{ old('tgl_mulai') }}">
      
                        @error('tgl_mulai')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Penyelenggara:</label>
                        <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara" name="penyelenggara" required autofocus value="{{ old('penyelenggara') }}">
      
                        @error('penyelenggara')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label><i>Institution :</i></label>
                        <input type="text" class="form-control @error('institution') is-invalid @enderror" id="institution" name="institution" required autofocus value="{{ old('institution') }}">
      
                        @error('institution')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Tanggal Selesai :</label>
                        <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror" id="tgl_selesai" name="tgl_selesai" required autofocus value="{{ old('tgl_selesai') }}">
      
                        @error('tgl_selesai')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                         @enderror
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-4">
                    <div class="form-group">
                        <label class="form-label" for="image">Sertifikat :</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input type="file" id="image" name="image"  onchange="previewImage()" class="form-control @error('image') is-invalid @enderror "/>
                       <small><i>Upload Sertifikat Organisasi</i></small>
                        @error('image')
                        <div  class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>    
            <br>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
@endsection
<script>
    function previewImage() {
       //ambil inputan gambar kita
       const image = document.querySelector('#image');
       //ambil tag image yg kosong sebelumnya
       const imgPreview = document.querySelector('.img-preview');
  
       //tampilka preview image berbentuk blok, karna sebelumnya masih berbentuk in line
       imgPreview.style.display = 'block';
       const oFReader = new FileReader();
       oFReader.readAsDataURL(image.files[0]);
  
       //load gambar yang diupload
       oFReader.onload = function(oFREvent){
         imgPreview.src = oFREvent.target.result;
       }
     }
     
   </script>