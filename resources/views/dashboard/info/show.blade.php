@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    
    <div class="card  col-lg-5 mt-4">
        <div class="card-header ">
            <h3>Detail Data {{ $info->kategori->kategori_idn }}</h3>
        </div>
        <div class="card-body">
            <ul>
                <li><p>Nama Mahasiswa : {{ $info->user->name }}</p></li>
                <li><p>Kategori : {{ $info->kategori->kategori_idn }}</p></li>
                <li><p>Tempat Kegiatan  : {{ $info->tempat }}</p></li>
                <li><p> Place of Activity: {{ $info->tempat }}</p></li>
                <li><p>Judul/Topik Kegiatan : {{ $info->topik_idn }}</p></li>
                <li><p>Title/Topic of Activity : <b>{{ $info->topik_ing }}</b></p></li>
                <li><p>Tanggal Mulai : {{ $info->tgl_mulai }}</p></li>
                <li><p>Tanggal Selesai : {{ $info->tgl_selesai }}</p></li>
                <li><p>Penyelenggara : {{ $info->penyelenggara }}</p></li>
                <li><p>Institution : {{ $info->penyelenggara }}</p></li>
                <li><p>Sertifikat : </p>
                  @if($info->image)
                  <img src="{{asset('sertifikat/')}}/{{$info->image}}"  class="img-preview img-fluid " width="80">
                  @else
                  <p>Tidak Ada!</p>
                  @endif
                  
                </li>
                <li><p>Status :</p>
                  <div class="row">
                    <div class="col">
                      @if ($info->status == '1')
                          <span class="badge badge-success">Diterima<span
                                  class="ms-1 fa fa-check"></span>
                          @elseif($info->status == '2')
                              <span class="badge badge-danger">Ditolak<span
                                      class="ms-1 fa fa-times"></span>
                              @elseif($info->status == '0')
                                  <span class="badge badge-info">Menunggu<span
                                          class="ms-1 fa fa-clock-o"></span>
                      @endif
                </li>
                <li>Capaian : {{ $info->ket_idn }}</li>
                <li>Achievment : <b>{{ $info->ket_ing }}</b> </li>
            </ul>
        </div>
      </div>

      <a href="/dashboard" class="btn btn-success ">
        <span data-feather = "corner-down-left"></span>  
          Kembali
        </a>
</div>
@endsection