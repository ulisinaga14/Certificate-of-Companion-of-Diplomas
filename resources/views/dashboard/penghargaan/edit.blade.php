@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Penghargaan</h1>
    
</div>
<form method="post" action="/dashboard/penghargaan/{{ $penghargaan->topik_idn }} " enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="alert alert-primary">
        <strong>A. PENGHARGAAN & KEJUARAAN | <i>HONOR & AWARD</i></strong>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-sm-5">
                <label for="topik_idn" class="form-label">Judul Penghargaan & Kejuaraan :</label>
                <input type="text" class="form-control  @error('topik_idn') is-invalid @enderror" id="topik_idn" name="topik_idn" required autofocus value="{{ old('topik_idn', $penghargaan->topik_idn) }}">
              
                    @error('topik_idn')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                     @enderror

            </div>
            <div class="col-sm-5">
                <label for="topik_ing" class="form-label"><i>Title Honor & Award :</i></label>
                <input type="text" class="form-control  @error('topik_ing') is-invalid @enderror" id="topik_ing" name="topik_ing" required autofocus value="{{ old('topik_ing', $penghargaan->topik_ing) }}">
              
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
                    @foreach ($kategori as $k)
                    <option value="Penghargaan dan Pemenang Kejuaraan" @if($k->kategori_idn == 'Penghargaan dan Pemenang Kejuaraan') ? selected : null @endif disabled>{{ $k->kategori_idn  }}</option>
                   {{--  <option value="">-- Pilih Kategori --</option>
                    @if (old('kategori_id') == $k->kategori_idn)
                    @else 
                      <option value="{{ $k->id }} ">{{ $k->kategori_idn }}</option> 
                      @endif --}}
          
                    @endforeach
                </select>
            </div>
    </div>
        <div class="row">
        <div class="col-sm-2">
            <div class="form-group">
                <label>Tempat Kegiatan :</label>
                <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" required autofocus value="{{ old('tempat', $penghargaan->tempat) }}">

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
                <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" name="place" required autofocus value="{{ old('place', $penghargaan->place) }}">

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
                <input type="date" class="form-control @error('tgl_mulai') is-invalid @enderror" id="tgl_mulai" name="tgl_mulai" required autofocus value="{{ old('tgl_mulai', $penghargaan->tgl_mulai) }}">

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
                <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara" name="penyelenggara" required autofocus value="{{ old('penyelenggara', $penghargaan->penyelenggara) }}">

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
                <input type="text" class="form-control @error('institution') is-invalid @enderror" id="institution" name="institution" required autofocus value="{{ old('institution', $penghargaan->institution) }}">

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
                <input type="date" class="form-control @error('tgl_selesai') is-invalid @enderror" id="tgl_selesai" name="tgl_selesai" required autofocus value="{{ old('tgl_selesai', $penghargaan->tgl_selesai) }}">

                @error('tgl_selesai')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
                 @enderror
            </div>
        </div>

    </div>

    <div class="row">
                <div class="col-sm-4 mt-3">
                    <div class="form-group">
                        <label class="form-label" for="image">Sertifikat Penghargaan :</label>
                        <input type="hidden" name="oldImage" value="{{ $penghargaan->image }}">
                        @if ($penghargaan->image)
                        <img src="{{ asset('storage/' . $penghargaan->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                          <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                          <input type="file" id="image" name="image"  onchange="previewImage()" class="form-control @error('image') is-invalid @enderror " required />
                          @error('image')
                          <div  class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                  
                        </div>
                    </div>
    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
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