@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Profil Image</h1>
    
</div>
        <form method="post" action="/dashboard/profil/{{ auth()->user()->name }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
              <div class="row">
                <div class="col-sm-4 mb-2">
                  <label class="form-label" for="image">Profil Image :</label>
                  <input type="hidden" name="oldImage" value="{{ Auth()->user()->image }}">
                  @if (Auth::user()->image)
                  <img src="{{ asset('storage/' . Auth::user()->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
                
                  <div class="col-sm-3 mb-2">
                      <label class="form-label" for="name"> Name :</label>
                      <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name', auth()->user()->name) }}"/>
                      @error('name')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
            </div>
            <div class="row">
                    <div class="col-sm-3 mb-2">
                        <label class="form-label" for="email">Email Addres :</label>
                        <input type="text" id="email" name="email"  class="form-control @error('email') is-invalid @enderror" required value="{{ old('email',auth()->user()->email) }}"/>
                        @error('email')
                        <div  class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>

                    <div class="col-sm-3 mb-2">
                      <label class="form-label" for="role">Role :</label>
                      <input type="role" id="role" name="role"   class="form-control @error('role,') is-invalid @enderror" required value="{{ old('email',auth()->user()->role) }}"/>
                      @error('role')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
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