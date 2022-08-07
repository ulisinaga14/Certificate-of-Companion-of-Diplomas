@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Capaian</h1>
    
</div>
<div class="col-lg-8">
@csrf
  <form method="post" action="/dashboard/capaian/{{ $capaian->id }}">
    @csrf
    @method('put')
    <div class="row">


      <div class="mb-3 col-lg-4">
        <label for="user_id" class="form-label">Nama</label>
        <select class="form-select" name="user_id">

          @foreach ($mahasiswa as $mhs)
          @if (old('user_id') == $mhs->nama_mahasiswa)
            <option value="{{ $mhs->id }} selected">{{ $mhs->nama_mahasiswa }}</option> 
          @else 
            <option value="{{ $mhs->id }} ">{{ $mhs->nama_mahasiswa }}</option> 
            @endif

          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="ket_idn" class="form-label">Capaian Pembelajaran</label>
        <textarea type="text" class="form-control @error('ket_idn') is-invalid @enderror" name="ket_idn" autofocus >{{ old('ket_idn', $capaian->ket_idn) }}
        </textarea>
        @error('ket_idn')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror
      </div>

      <div class="mb-3">
        <label for="ket_ing" class="form-label">Achievment Learning</label>
        <textarea type="text" class="form-control @error('ket_ing') is-invalid @enderror" name="ket_ing" autofocus>{{ old('ket_ing', $capaian->ket_ing) }} 
        </textarea>
        @error('ket_ing')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Edit Capaian</button>
</form>
    
</div>
{{-- Fitur memetikan file upload trix --}}
<script>
    document.addEvenListener('trix-file-accept', function(e){
        e.preventDevault();
    })
</script>
      @endsection