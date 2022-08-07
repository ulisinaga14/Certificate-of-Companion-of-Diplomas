@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Data Mahasiswa</h1>
    
</div>
        <form method="post" action="/dashboard/mahasiswa">
            @csrf
            <div class="alert alert-primary lg-6"> 
                <strong>Data Diri Mahasiswa</i></strong>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-sm-3">
                      <label for="nama_mahasiswa" class="form-label">Nama</label>
                      <input type="text" class="form-control @error('nama_mahasiswa') is-invalid @enderror" id="nama" name="nama_mahasiswa" required autofocus value="{{  auth()->user()->name }}" disabled>
                    
                      @error('nama_mahasiswa')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                     @enderror
                    </div>
                    <div class="col-sm-3">
                      <label for="ttl" class="form-label">Tempat & Tanggal Lahir</label>
                      <input type="text" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl" required autofocus value="{{ old('ttl') }}">
                    
                      @error('ttl')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                     @enderror
                    </div>
                </div>

                    <div class="col-sm-3">
                      <label for="prodi" class="form-label">Prodi</label>
                      <select class="form-select" name="prodi_id">
                        @foreach ($prodi as $prd)
                        @if (old('prodi_id', $prd->prodi_id) == $prd->nama_prodi_idn)
                          <option value="{{ $prd->id }} selected">{{ $prd->nama_prodi_idn }}</option> 
                        @else 
                          <option value="{{ $prd->id }} ">{{ $prd->nama_prodi_idn }}</option> 
                          @endif
              
                        @endforeach
                      </select>
                    </div>

                  <div class="col-sm-2">
                       <div class="form-group">
                          <label for="nim" class="form-label">NIM</label>
                              <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" required autofocus value="{{ old('nim') }}">                                    
                                 @error('nim')
                                  <div class="invalid-feedback">
                                  {{ $message }}
                                  </div>
                                  @enderror
                          </div>
                      </div>

            </div>
            <div class="row">
              <div class="col-sm-3">
                <label for="jurusan_id" class="form-label">Jurusan</label>
                <select class="form-select" name="jurusan_id">
                  @foreach ($jurusan as $jur)
                  @if (old('jurusan_id', $jur->id_jurusan) == $jur->nama_jurusan)
                    <option value="{{ $jur->id }} selected">{{ $jur->nama_jurusan }}</option> 
                  @else 
                    <option value="{{ $jur->id }} ">{{ $jur->nama_jurusan }}</option> 
                    @endif
        
                  @endforeach
                </select>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="no_ijazah" class="form-label"><b>*No Ijazah</b> </label>
                  <input type="text" class="form-control @error('no_ijazah') is-invalid @enderror" id="no_ijazah" name="no_ijazah"  autofocus value="{{ old('no_ijazah') }}">
                <small><i>Kolom ini diisi oleh admin prodi</i></small>
                  @error('no_ijazah')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                 @enderror
                </div>
            </div>
            </div>
                <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                      <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                      <input type="text" class="form-control @error('tahun_masuk') is-invalid @enderror" id="tahun_masuk" name="tahun_masuk" required autofocus value="{{ old('tahun_masuk') }}">
                    
                      @error('tahun_masuk')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                     @enderror
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="form-group">
                      <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                      <input type="text" class="form-control @error('tahun_lulus') is-invalid @enderror" id="tahun_lulus" name="tahun_lulus" required autofocus value="{{ old('tahun_lulus') }}">
                      @error('tahun_lulus')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                     @enderror
                    </div>
                  </div>

                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="no_skpi" class="form-label"> <b>*No Skpi</b> </label>
                      <input type="text" class="form-control @error('no_skpi') is-invalid @enderror" id="no_skpi" name="no_skpi"  autofocus value="{{ old('no_skpi') }}">
                      <small><i>Kolom ini diisi oleh admin prodi</i></small>
                      @error('no_skpi')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                     @enderror
                    </div>
                </div>
                </div>
                <a href="/dashboard" class="btn btn-success mt-1">
                  <span data-feather = "corner-down-left"></span>  
                    Kembali
                  </a>
                  <button type="submit" class="btn btn-primary"> <span data-feather = "save"></span>  Save</button>
              </div>
</form>
    
</div>

@endsection