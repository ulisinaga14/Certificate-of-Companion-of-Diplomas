@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    
    <div class="card  col-lg-5 mt-4">
        <div class="card-header ">
            <h3>{{ $title }}</h3>
        </div>
        <div class="card-body">
            <ul>
                
                <li><p>Hai</p></li>
            </ul>
        </div>
      </div>

      <a href="/dashboard/info" class="btn btn-primary mt-1">Kembali</a>
</div>
@endsection