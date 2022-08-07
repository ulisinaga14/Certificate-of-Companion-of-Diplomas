@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    
    <div class="card  col-lg-5 mt-4">
        <div class="card-header ">
            <h3>View  #{{ $capaian->id_capaian }}</h3>
        </div>
        <div class="card-body">
            <ul>
                <li><p>id : {{ $capaian->id }}</p></li>
                <li><p>Id capaian : {{ $capaian->id_capaian }}</p></li>
                <li><p>Capaian Pembelajaran : {{ $capaian->ket_idn }}</p></li>
                <li><p>Learning Achievment: {{ $capaian->ket_idn }}</p></li>
            </ul>
        </div>
      </div>

      <a href="/dashboard/capaian" class="btn btn-primary mt-1">Kembali</a>
</div>
@endsection