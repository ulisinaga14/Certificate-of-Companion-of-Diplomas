@extends('layouts.main')

@section('container')

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-1">Register</p>

                <form class="mx-1 mx-md-4" action="/register" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="name"> Name :</label>
                      <input type="text" id="name" name="name" placeholder="Masukkan Nama Lengkap.." class="form-control @error('name') is-invalid @enderror" required value="{{ old('name') }}"/>
                      @error('name')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="email">Email Addres :</label>
                      <input type="text" id="email" name="email"  placeholder="Masukkan Email.." class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}"/>
                      @error('email')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-2">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="password">Password :</label>
                      <input type="password" id="password" name="password"  placeholder="Masukkan Password.." class="form-control @error('password') is-invalid @enderror" required />
                      @error('password')
                      <div  class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div>
                 
                  <div class="form-check d-flex justify-content-center mb-2">
                    
                    <label class="form-check-label" for="form2Example3">
                      Already Register? <a href="/login">Login</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-3 mb-3 mb-lg-3">
                    <button type="submit" class="btn btn-lg btn-block btn-primary">Register</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
