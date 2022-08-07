@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Info Tambahan</h1>
    
</div>
<form method="post" action="/dashboard/info/{{ $info->topik_idn }} " enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="alert alert-primary">
        <strong>Form Data Kegiatan</i></strong>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-sm-4">
                <label for="kategori_id" class="form-label">Jenis Kegiatan</label>
        <select class="form-select" name="kategori_id">
         
          @foreach ($kategori as $k)
          
          {{-- ==== mengecek tipe data nya juga --}}
          @if(old('kategori_id', $info->kategori_id)==$k->id)
          <option value="{{ $k->id }}" selected>{{ $k->kategori_idn }}</option>
          @else 
          <option value="{{ $k->id }}" >{{ $k->kategori_idn }}</option>
         @endif
  
          @endforeach
                </select>
            </div>
    </div>
    <div class="row">
            <div class="col-sm-5">
                <label for="topik_idn" class="form-label">Judul/Kegiatan:</label>
                <input type="text" class="form-control  @error('topik_idn') is-invalid @enderror" id="topik_idn" name="topik_idn" required autofocus value="{{ old('topik_idn', $info->topik_idn) }}">
              
                    @error('topik_idn')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                     @enderror

            </div>
            <div class="col-sm-5">
                <label for="topik_ing" class="form-label"><b>*<i>Title/Activity :</i></b></label>
                <input type="text" class="form-control  @error('topik_ing') is-invalid @enderror" id="topik_ing" name="topik_ing" required autofocus value="{{ old('topik_ing', $info->topik_ing) }}">
                <small><b>Diisi oleh penerjemah</b></small>
                    @error('topik_ing')
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
                <label>Tempat Kegiatan :</label>
                <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" required autofocus value="{{ old('tempat', $info->tempat) }}">

                @error('tempat')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                 @enderror
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label><b>*<i>Place :</i></b></label>
                <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" name="place" required autofocus value="{{ old('place', $info->place) }}">
                <small><b>Diisi oleh penerjemah</b></small>
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
                <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror" id="tgl_mulai" name="tgl_mulai" required autofocus value="{{ old('tgl_mulai', $info->tgl_mulai) }}">

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
                <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara" name="penyelenggara" required autofocus value="{{ old('penyelenggara', $info->penyelenggara) }}">

                @error('penyelenggara')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                 @enderror
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label><b>*<i>Institution :</i></b> </label>
                <input type="text" class="form-control @error('institution') is-invalid @enderror" id="institution" name="institution" required autofocus value="{{ old('institution', $info->institution) }}">
                <small><b>Diisi oleh penerjemah</b></small>
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
                <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror" id="tgl_selesai" name="tgl_selesai" required autofocus value="{{ old('tgl_selesai', $info->tgl_selesai) }}">

                @error('tgl_selesai')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                 @enderror
            </div>
        </div>

    </div>

    <div class="row">
                <div class="col-sm-4 mt-1">
                    <div class="form-group">
                        <label class="form-label" for="image">Sertifikat Kegiatan :</label>
                        <input type="hidden" name="oldImage" value="{{ $info->image }}">
                        @if ($info->image)
                        <img src="{{ asset('storage/' . $info->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                          <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                          <input type="file" id="image" name="image"  onchange="previewImage()" class="form-control @error('image') is-invalid @enderror "/>
                          @error('image')
                          <div  class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                  
                        </div>
                    </div>
    </div>
        <button type="submit" class="btn btn-primary"> <span data-feather = "save"></span>  Save</button>
   
              </div>
  </form>
      
  </div>
  
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