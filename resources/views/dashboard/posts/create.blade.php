@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
  </div>

  <div class="col-lg-8">
    <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data"> {{-- mengarah ke function store di controller --}}
      {{-- ectype mengelola inputan dalam bentuk teks, dan file diambil dalam bentuk request --}}
      @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
    
      @error('title')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror

    </div>

    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}" > {{-- disabled readonly --}}
    
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
 
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-select" name="category_id">
       
        @foreach ($categories as $category)
        
        {{-- ==== mengecek tipe data nya juga --}}
        @if(old('category_id')==$category->id)
        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
        @else 
        <option value="{{ $category->id }}" >{{ $category->name }}</option>
       @endif

        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">Post Image</label>
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control @error('image') is-invalid @enderror" type="file"
       id="image" name="image" onchange="previewImage()"> 
       {{-- previewImage berfungsi menampilkan gambar yang ingin di upload --}}
    
      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror

   {{--    pada image, tidak diberikan old ketika ingin create/update data,
      karena hal trsebut berkaitan dengan keamanan data  --}}
    </div>


    <div class="mb-3">
      <label for="body" class="form-label">Body</label>
      @error('body')
      <p class="text-danger">
        {{ $message }}
      </p>
      @enderror
      <input id="body" type="hidden" name="body" value="{{ old('body') }}">
      <trix-editor input="body"></trix-editor>
    </div>

    <button type="submit" class="btn btn-primary">Create Post</button>
  </form>
  </div>
  
  {{-- MEMBUAT SLUG OTOMATIS DARI TITLE YG DIKETIIKAN, MENGGUNAKAN FETCH JAVASCRIPT --}}
  <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    /* 'change' digunakan setelah mengetikkan judul nya , maka berubah title nya menjadi slug */
    title.addEventListener('change', function(){
      /* fetch memiliki parameter url nya, ingin fetch data dari mana */
      fetch('/dashboard/posts/checkSlug?title=' +title.value) /* jika ada request ke dashboard/posts, maka ambil isinya */
      .then(response => response.json() ) /* response nya jalankan dengan method jason */
      .then(data => slug.value = data.slug)/* dikembalikan dalam bentuk data, yang menggantikan slug value kita (isi inputan dari slugnya)
      diambil dari data yang nama propertinya adalah slug, yang dikirimkan adalah objek, pasangan antara key dan value */

      /* apa yang kita isikan di dalam title, akan masuk ke method createSlug, dan diolah pada method createSlug jg,
      dan dikemabalikan datanya sebagai slug 
      inputnya title, outputnya adalah slug*/
    });

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    }) 

    //masukkan ke dalam function image
     
  </script>
   
@endsection 