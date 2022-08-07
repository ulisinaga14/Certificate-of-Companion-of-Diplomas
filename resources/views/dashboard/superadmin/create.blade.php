@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Akun</h1>
    
</div>
<div class="col-lg-8">
<form method="post" action="/dashboard/superadmin">
    @csrf
<div class="row">
  <div class="col">
    <div class="row">
      <div class="col">
        <div class="form-group">
            <label class="form-label" for="name"> Name :</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}"/>
            @error('name')
            <div  class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
      </div>
      <div class="col">
        <div class="form-group">
            <label class="form-label" for="role">Role :</label>
            
            <select class="form-select" name="role">
              @foreach ($user as $usr)
              @endforeach
              <option value="" @if($usr->role == '') ? selected : null @endif >Pilih Role</option>
              <option value="admin" @if($usr->role == 'admin') ? selected : null @endif>admin</option>
              <option value="penerjemah" @if($usr->role == 'penerjemah') ? selected : null @endif>penerjemah</option>
              <option value="mahasiswa" @if($usr->role == 'mahasiswa') ? selected : null @endif>mahasiswa</option>
              
            </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
            <label class="form-label" for="email">Email Addres :</label>
            <input type="text" id="email" name="email"  class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}"/>
            @error('email')
            <div  class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
            <label class="form-label" for="password">Password:</label>
            <input type="text" id="password" name="password"  class="form-control @error('password') is-invalid @enderror" required value="{{ old('password') }}"/>
            @error('password')
            <div  class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
            <label class="form-label" for="password">Sandi:</label>
            <input type="text" id="sandi" name="sandi"  class="form-control @error('sandi') is-invalid @enderror" required value="{{ old('sandi') }}"/>
            @error('sandi')
            <div  class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col mb-3">
        
        <button type="submit" class="btn btn-primary"> <span data-feather = "save"></span>  Save</button>

      </div>
    </div>
  </div>
</div>
</form>
@endsection