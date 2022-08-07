@extends('dashboard.layouts.main')

@section('container')
@if (session()->has('success'))
	<div class="alert alert-success" role="alert">
	  {{ session('success') }}
	</div>
@endif
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<div class="container mt-3">
		<h3>My Profil</h3>
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
					@if (Auth::user()->image)
					<img src=" {{asset('profil/')}}/{{Auth::user()->image}}"   class="img-preview img-fluid rounded-circle" style="height: 140px;">
                    @else
					<div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; ">
						<img src="/img/logo.png" class="rounded-circle" style="height: 140px;">
                    </div>
					@endif
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{ Auth::user()->name }}</h4>
                    <p class="mb-0">{{ Auth::user()->email }}</p>
                    <div class="mt-2">
                
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <span class="badge badge-secondary">{{ Auth::user()->role }}</span>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><a href="" class="active nav-link">Edit Profil</a></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">

					<form method="post" action="/dashboard/profil/{{ auth()->user()->name }}" enctype="multipart/form-data">
						@csrf
						@method('put')
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
								<label class="form-label" for="name"> Name :</label>
								<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required value="{{ old('name', auth()->user()->name) }}"/>
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
								<input type="role" id="role" name="role"   class="form-control @error('role,') is-invalid @enderror" required value="{{ old('role',auth()->user()->role) }}"/>
								@error('role')
								<div  class="invalid-feedback">
								  {{ $message }}
								</div>
								@enderror
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
								<label class="form-label" for="email">Email Addres :</label>
								<input type="text" id="email" name="email"  class="form-control @error('email') is-invalid @enderror" required value="{{ old('email',auth()->user()->email) }}"/>
								@error('email')
								<div  class="invalid-feedback">
								  {{ $message }}
								</div>
								@enderror
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-group">
								<label class="form-label" for="image">Profil Image :</label>
								<input type="hidden" name="oldImage" value="{{ Auth()->user()->image }}">
								@if (Auth::user()->image)
								<img src=" {{asset('profil/')}}/{{Auth::user()->image}}" class="img-preview img-fluid mb-2 col-sm-4 d-block">
								@else
									<img class="img-preview img-fluid mb-3 col-sm-5">
								@endif
									<input type="file" id="image" name="image"  onchange="previewImage()" class="form-control @error('image') is-invalid @enderror "  />
									@error('image')
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
				  <form>
                    
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

	  
      <div class="col-12 col-md-3 mb-3">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="/dashboard/password">
					@csrf 

					@foreach ($errors->all() as $error)
					<p class="text-danger">{{ $error }}</p>
				 @endforeach 
				 
		<div class="row">
			  <div class="mb-2"><b> <span data-feather="key" class="align-text-bottom"></span> Change Password</b></div>
			  <div class="row">
				<div class="col">
				  <div class="form-group">
					<label>Current Password</label>
					<input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col">
				  <div class="form-group">
					<label>New Password</label>
					<input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="col">
				  <div class="form-group">
					<label>Confirm <span class="d-none d-xl-inline">Password</span></label>
					<input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
				</div>
				<div class="row">
							<div>
							
								<button type="submit" class="btn btn-primary"> <span data-feather = "save"></span>  Save</button>
   
							</div>
				</div>

			  </div>
			</div>
		  </div>
      </div>
    </div>
</form>
  </div>
</div>
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