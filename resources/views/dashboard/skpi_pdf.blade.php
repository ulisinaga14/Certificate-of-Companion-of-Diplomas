<!DOCTYPE html>
<html>
<head>
	<title>SKPI Mahasiswa</title>
  <style>
    .page { width: 100%; height: 100%; }

    footer {
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 1cm;

        /** Extra personal styles **/
        background-color: white;
        color: black;
        text-align: left;
        font-size: 10px;
    }
    .wrapper-page {
    page-break-after: always;
}

.wrapper-page:last-child {
    page-break-after: avoid;
}

</style>
</head>
<body>
  <header>

    <table width="100%">
      <tr>
        <td width="50" align="center"><img src="{{ url('/img/logo.png') }}" width="100"></td>
      </tr>
      <tr>
      
      <td align="center" class="mb-2"><h2>POLITEKNIK NEGERI MEDAN</h2>
        <h3 class="mb-2" >Surat Keterangan Pendamping Ijazah</h3>
        <h4 class="mb-2"><i>Diploma Supplement</i></h4>
        <h5 class="mb-4">Nomor : T/   /PL5/PK.05.05/2022</h5>
        <p class="mb-2">Surat Keterangan Pendamping Ijazah sebagai pelengkap Ijazah yang menerangkan</p>
        <p class="mb-2">capaian pembelajaran dan prestasi dari pemegang Ijazah selama masa studi</p>
      
      </td>
     
      </tr>
      </table>
  </header>

  <main>

    <div class="padding">
      <div class="row container d-flex content-center">
<div class="col">
<div class="box">
            <h5 class="box-title mb-0">I. INFORMASI TENTANG IDENTIFIKASI DIRI PEMEGANG SKPI
              <br> <small><i>Personal Information of The Diploma Supplement Holder</i></small>
            </h5>
         
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table" border="colapse" >
              <tbody>
                <tr>
              </tr>
            </thead>
            <tbody>

              <tbody>
            @foreach ($mahasiswa as $mhs)
            <tr>
              <td>1.1  </td>
              <td>Nama :
                <br> <i><small> Name </small></i>
              </td>
              <td>{{ $mhs->nama_mahasiswa }}</td>
              </tr>

              <tr>
              <td>1.2 </td>
              <td>Tempat dan Tanggal Lahir :
                <br> <i><small> Place and Date of Birth </small></i>
              </td>
              <td>{{ $mhs->ttl }}</td>
              </tr>

              <tr>
              <td>1.3 </td>
              <td>Nomor Induk Mahasiswa :
                <br> <i><small> Student Identification Number </small></i>
              </td>
              <td>{{ $mhs->nim }}</td>
              </tr>

              <tr>
              <td>1.4 </td>
              <td>Tahun Masuk :
                <br> <i><small> Admission Year </small></i>
              </td>
              <td>{{ $mhs->tahun_masuk }}</td>
              </tr>

              <tr>
              <td>1.5 </td>
              <td>Tahun Lulus :
                <br> <i><small> Graduation Year </small></i>
              </td>
              <td>{{ $mhs->tahun_lulus }}</td>
              </tr>

              <tr>
              <td>1.6 </td>
              <td>Gelar :
                <br> <i><small> Title </small></i>
              </td>
              <td>{{ $mhs->prodi->gelar_idn }}</td>
              </tr>
                
            @endforeach
          </tbody>
        </table>
             
        </div>
      </div>
    </div>
    </div>
    </div>
      </div>
      
      <div class="padding">
        <div class="row container d-flex content-center">
  <div class="col">
  <div class="box">
    
    <h5 class="box-title mb-0">II. INFORMASI TENTANG IDENTITAS PENYELENGGARA PROGRAM
      <br><small><i>Identity of The Higher Education Institution</i></small>
    </h5>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table" border="colapse">
                <tbody>
                  <tr>
                  <td>2.1</td>
                  <td>Surat Keterangan Pendirian
                    <br> <i><small> Certificate of Establishment </small></i>
                  </td>
                  <td>Surat Keputusan Menteri Pendidikan dan Kebudayaan RI No.084/O/1997 Tentang Pendirian Politeknik Negeri Medan </td>
                  </tr>
                  <tr>
                    <td>2.2</td>
                  <td>Nama Perguruan Tinggi
                    <br> <i><small>Name of Higher Education Institution</small></i>
                  </td>
                  <td>Politeknik Negeri Medan</td>
                  </tr>
                  
                  <tr>
                    <td>2.3</td>
                  <td>Nama Program Studi
                    <br> <i> <small>Study Program</small></i>
                  </td>
                  <td>Diploma III <i>(Nama Prodi)</i>
                    <br><i><small>Diploma III <i>(Prodi Name)</i></small></i>
                  </td>
                  </tr>
                  
                  <tr>
                    <td>2.4</td>
                     <td>Jenis Pendidikan
                      <br> <i> <small>Type of Education</small></i>
                     </td>
                     <td>Vokasi/Politeknik
                      <br> <i><small> Vocational/Polytechnic</small></i>
                     </td>
                  </tr>
                  <tr>
                    <td>2.5</td>
                     <td>Jenjang Pendidikan
                      <br> <i> <small>Level of Education</small></i>
                     </td>
                     <td>Diploma III
                      <br> <i><small> Diploma III</small></i>
                     </td>
                  </tr>
                  <tr>
                    <td>2.6</td>
                     <td>Jenjang Kualifikasi sesuai KKNI
                      <br> <i> <small>Qualification Level in Compliance to National Qualification Framework</small></i>
                     </td>
                     <td>Level 5
                      <br> <i><small> Level 5</small></i>
                     </td>
                  </tr>
                  <tr>
                    <td>2.7</td>
                     <td>Persyaratan Penerimaan
                      <br> <i> <small>Admission Requirements</small></i>
                     </td>
                     <td>Lulus SLTA dan Lulus Seleksi Mahasiswa Baru
                      <br> <i><small>High School Pass Certificate and Pass The New Student Selection</small></i>
                     </td>
                  </tr>
                  <tr>
                    <td>2.8</td>
                     <td>Bahasa Pengantar Kuliah
                      <br> <i> <small>Medium of Instruction</small></i>
                     </td>
                     <td>Bahasa Indonesia
                      <br> <i><small>Bahasa Indonesia</small></i>
                     </td>
                  </tr>
                  <tr>
                    <td>2.9</td>
                     <td>Sistem Penilaian
                      <br> <i> <small>Assesment System</small></i>
                     </td>
                     <td>A=4, B=3, C=2, D=1, E=0 </td>
                  </tr>
                  <tr>
                    <td>2.10</td>
                     <td>Lama Study Reguler
                      <br> <i> <small>Duration of Study</small></i>
                     </td>
                     <td>3 Tahun <br> <i><small>3 Years</small></i> </td>
                  </tr>
                  <tr>
                    <td>2.11</td>
                     <td>Jenis dan Jenjang Pendidikan Lanjutan
                      <br> <i> <small>Type and Level of Further Study</small></i>
                     </td>
                     <td>Diploma 4 / Sarjana <br> <i><small>Diploma 4 / Undergraduate</small></i> </td>
                  </tr>
                  
              </tbody>
            </table>
                 
            </div>
          </div>
        </div>
    </div>
  </div>
  <br>
      <div class="padding">
        <div class="row container d-flex content-center">
  <div class="col">
  <div class="box">
    
    <h5 class="box-title mb-0">III. INFORMASI TENTANG KUALIFIKASI DAN HASIL YANG DICAPAI
      <br><small><i>Information of Qualification and Learning Outcome</i></small>
      <br> <br>
      A. Capaian Pembelajaran <br> <small><i>Learning Outcome</i></small>
    </h5>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table" border="colapse">
                <tbody>
                  @foreach ($info as $i)
                  <tr>
                    <td>3A.{{ $loop->iteration }}</td>
                     <td>{{ $i->ket_idn }}</td>
                     <td><i>{{ $i->ket_ing }}</i></td>
                  </tr>
                    @endforeach
                  
              </tbody>
            </table>
                 
            </div>
          </div>
        </div>
    </div>
  </div>
  <br>
      <div class="padding">
        <div class="row container d-flex content-center">
  <div class="col">
  <div class="box">
    <h5 class="box-title mb-0">
      B. Informasi Tamabahan <br> <small><i>Additional Information</i></small>
    </h5>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table" border="colapse">
                <tbody>
                  @foreach ($info as $i)
                  <tr>
                    <td>3B.{{ $loop->iteration }}</td>
                     <td>{{ $i->kategori->kategori_idn }}
                      <br> <i> <small>{{ $i->kategori->kategori_ing }}</small></i>
                     </td>
                     <td>{{ $i->topik_idn }}<br> <i><small>{{ $i->topik_ing }}</small></i> </td>
                  </tr>
                    @endforeach
              </tbody>
            </table>
                 
            </div>
          </div>
        </div>
    </div>
  </div>
  <div>
    <br>
    <div style="width:300px;float:right">
      Medan, 
      <br/>Direktur Politeknik Negeri Medan
      <br> <br> <br> <br>
      <p>M. Syahruddin, S.T., M.T.<br/>NIP. 196209031989031004</p>
    </div>
    <div style="clear:both"></div>
  </div>

 
</main>

<footer>
  <hr>
  Surat Keterangan Pendamping Ijazah - POLMED {{ date('Y') }}
</div>
</footer>
</body>


</html>