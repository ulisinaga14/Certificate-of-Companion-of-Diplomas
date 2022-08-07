@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Capaian Pembelajaran</h1>
    
</div>
<div class="col-lg-8">

  <form method="post" action="/dashboard/capaian">
    @csrf
 

      <div class="mb-3">
        <label for="prodi_id" class="form-label">Prodi</label>
        <select class="form-select" name="prodi_id">

          @foreach ($prodi as $prd)
          @if (old('prodi_id') == $prd->nama_prodi_idn)
            <option value="{{ $prd->id }} selected">{{ $prd->nama_prodi_idn }}</option> 
          @else 
            <option value="{{ $prd->id }} ">{{ $prd->nama_prodi_idn }}</option> 
            @endif

          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="ket_idn" class="form-label">Capaian Pembelajaran</label>
        <textarea type="text" class="form-control @error('ket_idn') is-invalid @enderror" name="ket_idn" autofocus >{{ old('ket_idn') }}
        </textarea>
        @error('ket_idn')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror
      </div>

      <div class="mb-3">
        <label for="ket_ing" class="form-label">Achievment Learning</label>
        <textarea type="text" class="form-control @error('ket_ing') is-invalid @enderror" name="ket_ing" autofocus>{{ old('ket_ing') }} 
        </textarea>
        @error('ket_ing')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
       @enderror
      </div>

      <button type="submit" class="btn btn-primary">Create Capaian</button>
</form>
    
</div>
@endsection