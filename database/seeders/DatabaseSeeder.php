<?php

namespace Database\Seeders;

use App\Models\Capaian;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Jurusan;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\Prodi;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::create([
        //   'name' => 'Dameuli',
        //    'email' => 'dameuli@gmail.com',
        //    'password' => bcrypt('1234')

        //]);

        User::create([
        'name' => 'admin',
        'email' => 'admin.polmed@gmail.com',
        'password' => bcrypt('admin'),
        'role' => 'admin',
        'is_admin' => '1',
        'sandi' => 'admin'
        ]); 

        User::create([
        'name' => 'Dame Uli Sinaga',
        'email' => 'ulisinaga14@gmail.com',
        'password' => bcrypt('12345'),
        'role' => 'mahasiswa'
        ]); 
        User::create([
        'name' => 'penerjemah',
        'email' => 'penerjemah@gmail.com',
        'password' => bcrypt('12345'),
        'role' => 'penerjemah',
        'sandi' => 12345
        ]); 
        User::create([
        'name' => 'superadmin',
        'email' => 'super@gmail.com',
        'password' => bcrypt('12345'),
        'role' => 'superadmin',
        'sandi' => 'superadmin'
        ]); 

        Kategori::create([
            'id_kategori' => '1',
            'kategori_idn' => 'Penghargaan dan Pemenang Kejuaraan',
            'kategori_ing' => 'Honor and Award'
        ]);
        Kategori::create([
            'id_kategori' => '2',
            'kategori_idn' => 'Pengalaman Organisasi',
            'kategori_ing' => 'Organization Experience'
        ]);
        Kategori::create([
            'id_kategori' => '3',
            'kategori_idn' => 'Bahasa Internasional',
            'kategori_ing' => 'International Language'
        ]);
        Kategori::create([
            'id_kategori' => '4',
            'kategori_idn' => 'Tempat Magang',
            'kategori_ing' => 'Internship'
        ]);
        Kategori::create([
            'id_kategori' => '5',
            'kategori_idn' => 'Pendidikan Karakter',
            'kategori_ing' => 'Soft Skill Training'
        ]);
        Kategori::create([
            'id_kategori' => '6',
            'kategori_idn' => 'Sertifikat Keterampilan/Keahlian',
            'kategori_ing' => 'Professional Certificate'
        ]);

        Jurusan::create([
            'id_jurusan' => '1',
            'nama_jurusan' => 'Teknik Komputer & Informatika'
        ]);
        Jurusan::create([
            'id_jurusan' => '2',
            'nama_jurusan' => 'Akuntansi'
        ]);
        Jurusan::create([
            'id_jurusan' => '3',
            'nama_jurusan' => 'Teknik Mesin'
        ]);
        Jurusan::create([
            'id_jurusan' => '4',
            'nama_jurusan' => 'Teknik Elektronika'
        ]);
        Jurusan::create([
            'id_jurusan' => '5',
            'nama_jurusan' => 'Teknik Sipil'
        ]);
        Jurusan::create([
            'id_jurusan' => '6',
            'nama_jurusan' => 'Administrasi Niaga'
        ]);

        Prodi::create([
            'id_prodi' => '1',
            'jurusan_id' => '1',
            'nama_prodi_idn' => 'Manajemen Informatika',
            'nama_prodi_ing' => 'Informatics Management',
            'status_akreditasi' => 'B',
            'no_akreditasi' => 'SK 399',
            'jenjang_kualifikasi' => 'Level 5',
            'pendidikan_lanjutan' => 'Diploma IV / S1',
            'program_pendidikan_tinggi' => 'Program Pendidikan Tinggi Vokasi',
            'jenis_jenjang_pendidikan' => 'Diploma III',
            'gelar_idn' => 'A.Md.Kom',
            'gelar_ing' => 'A.Md.Kom'
        ]);
        Prodi::create([
            'id_prodi' => '2',
            'jurusan_id' => '1',
            'nama_prodi_idn' => 'Teknik Komputer',
            'nama_prodi_ing' => 'Computer Engineering',
            'status_akreditasi' => 'B',
            'no_akreditasi' => 'SK 399',
            'jenjang_kualifikasi' => 'Level 5',
            'pendidikan_lanjutan' => 'Diploma IV / S1',
            'program_pendidikan_tinggi' => 'Program Pendidikan Tinggi Vokasi',
            'jenis_jenjang_pendidikan' => 'Diploma III',
            'gelar_idn' => 'A.Md.Kom',
            'gelar_ing' => 'A.Md.Kom'
        ]);
        Prodi::create([
            'id_prodi' => '3',
            'jurusan_id' => '2',
            'nama_prodi_idn' => 'Perbankan',
            'nama_prodi_ing' => 'Banking',
            'status_akreditasi' => 'B',
            'no_akreditasi' => 'SK 399',
            'jenjang_kualifikasi' => 'Level 5',
            'pendidikan_lanjutan' => 'Diploma IV / S1',
            'program_pendidikan_tinggi' => 'Program Pendidikan Tinggi Vokasi',
            'jenis_jenjang_pendidikan' => 'Diploma III',
            'gelar_idn' => 'A.Md.Bns.',
            'gelar_ing' => 'A.Md.Bns.'
        ]);
        Prodi::create([
            'id_prodi' => '4',
            'jurusan_id' => '2',
            'nama_prodi_idn' => 'Akuntansi',
            'nama_prodi_ing' => 'Accountancy',
            'status_akreditasi' => 'B',
            'no_akreditasi' => 'SK 399',
            'jenjang_kualifikasi' => 'Level 5',
            'pendidikan_lanjutan' => 'Diploma IV / S1',
            'program_pendidikan_tinggi' => 'Program Pendidikan Tinggi Vokasi',
            'jenis_jenjang_pendidikan' => 'Diploma III',
            'gelar_idn' => 'A.Md.Ak',
            'gelar_ing' => 'A.Md.Ak'
        ]);
        Prodi::create([
            'id_prodi' => '5',
            'jurusan_id' => '2',
            'nama_prodi_idn' => 'Perbankan Syariah',
            'nama_prodi_ing' => 'Syariah banking',
            'status_akreditasi' => 'B',
            'no_akreditasi' => 'SK 399',
            'jenjang_kualifikasi' => 'Level 5',
            'pendidikan_lanjutan' => 'Diploma IV / S1',
            'program_pendidikan_tinggi' => 'Program Pendidikan Tinggi Vokasi',
            'jenis_jenjang_pendidikan' => 'Diploma III',
            'gelar_idn' => 'A.Md.Bns',
            'gelar_ing' => 'A.Md.Bns'
        ]);
        Prodi::create([
            'id_prodi' => '6',
            'jurusan_id' => '2',
            'nama_prodi_idn' => 'Perbankan Syariah',
            'nama_prodi_ing' => 'Syariah banking',
            'status_akreditasi' => 'B',
            'no_akreditasi' => 'SK 399',
            'jenjang_kualifikasi' => 'Level 5',
            'pendidikan_lanjutan' => 'Diploma IV / S1',
            'program_pendidikan_tinggi' => 'Program Pendidikan Tinggi Vokasi',
            'jenis_jenjang_pendidikan' => 'Diploma III',
            'gelar_idn' => 'A.Md.Bns',
            'gelar_ing' => 'A.Md.Bns'
        ]);
        Prodi::create([
            'id_prodi' => '7',
            'jurusan_id' => '6',
            'nama_prodi_idn' => 'Administrasi Niaga',
            'nama_prodi_ing' => 'Commerce Administration',
            'status_akreditasi' => 'B',
            'no_akreditasi' => 'SK 399',
            'jenjang_kualifikasi' => 'Level 5',
            'pendidikan_lanjutan' => 'Diploma IV / S1',
            'program_pendidikan_tinggi' => 'Program Pendidikan Tinggi Vokasi',
            'jenis_jenjang_pendidikan' => 'Diploma III',
            'gelar_idn' => 'A.Md.A.B.',
            'gelar_ing' => 'A.Md.A.B.'
        ]);
        Prodi::create([
            'id_prodi' => '8',
            'jurusan_id' => '4',
            'nama_prodi_idn' => 'Teknik Elektro',
            'nama_prodi_ing' => 'Electrical Engineering',
            'status_akreditasi' => 'B',
            'no_akreditasi' => 'SK 399',
            'jenjang_kualifikasi' => 'Level 5',
            'pendidikan_lanjutan' => 'Diploma IV / S1',
            'program_pendidikan_tinggi' => 'Program Pendidikan Tinggi Vokasi',
            'jenis_jenjang_pendidikan' => 'Diploma III',
            'gelar_idn' => 'A.T',
            'gelar_ing' => 'A.T'
        ]);
        Prodi::create([
            'id_prodi' => '9',
            'jurusan_id' => '5',
            'nama_prodi_idn' => 'Teknik Sipil',
            'nama_prodi_ing' => 'Civil Engineering',
            'status_akreditasi' => 'B',
            'no_akreditasi' => 'SK 399',
            'jenjang_kualifikasi' => 'Level 5',
            'pendidikan_lanjutan' => 'Diploma IV / S1',
            'program_pendidikan_tinggi' => 'Program Pendidikan Tinggi Vokasi',
            'jenis_jenjang_pendidikan' => 'Diploma III',
            'gelar_idn' => 'A.T',
            'gelar_ing' => 'A.T'
        ]);
        
        Prodi::create([
            'id_prodi' => '10',
            'jurusan_id' => '3',
            'nama_prodi_idn' => 'Teknik Mesin',
            'nama_prodi_ing' => 'Mechanical Engineering',
            'status_akreditasi' => 'B',
            'no_akreditasi' => 'SK 399',
            'jenjang_kualifikasi' => 'Level 5',
            'pendidikan_lanjutan' => 'Diploma IV / S1',
            'program_pendidikan_tinggi' => 'Program Pendidikan Tinggi Vokasi',
            'jenis_jenjang_pendidikan' => 'Diploma III',
            'gelar_idn' => 'A.Md.T.',
            'gelar_ing' => 'A.Md.T'
        ]);
        Capaian::create([
            'prodi_id' => '1',
            'ket_idn' => 'Menginternalisasi nilai-nilai Pancasila dan Islam dalam kehidupan pribadi dan sosial.',
            'ket_ing' => 'Internalize the values ​​of Pancasila and Islam in personal and social life.'
        ]);
        Capaian::create([
            'prodi_id' => '1',
            'ket_idn' => 'Menunjukkan sikap professional dalam aktualisasi bidang informatika baik secara mandiri maupun kelompok yang dilandasi semangat kewirausahaan.',
            'ket_ing' => 'Demonstrate a professional attitude in the actualization of the field of informatics both independently and in groups based on an entrepreneurial spirit.'
        ]);
        
        Capaian::create([
            'prodi_id' => '1',
            'ket_idn' => 'Mampu mengaplikasikan ilmu pengetahuan dan teknologi dalam bidang informatika secara logis, kritis, sistematis, dan inovatif untuk peningkatan mutu kehidupan masyarakat dengan menerapkan nilai-nilai humaniora.',
            'ket_ing' => 'Able to apply science and technology in the field of informatics logically, critically,systematically, and innovatively to improve the quality of peoples lives by applying humanities values.'
        ]);
        Capaian::create([
            'prodi_id' => '1',
            'ket_idn' => ' Mampu melakukan evaluasi, dokumentasi, dan publikasi karya intelektual/hasil pemikiran dalam bidang informatika.',
            'ket_ing' => 'Able to evaluate, document, and publish intellectual works/thoughts in the field of informatics.'
        ]);
        Capaian::create([
            'prodi_id' => '1',
            'ket_idn' => 'Mampu melakukan analisis, perancangan, penerapan, pengujian dan pemeliharaan perangkat lunak yang berkualitas.',
            'ket_ing' => 'Able to perform analysis, design, implementation, testing and maintenance of quality software.'
        ]);
        Capaian::create([
            'prodi_id' => '1',
            'ket_idn' => 'Mampu melakukan perancangan, pengembangan dan visualisasi aplikasi game cerdas yang edukatif',
            'ket_ing' => 'Able to design, develop and visualize educational intelligent game applications.'
        ]);
        Capaian::create([
            'prodi_id' => '1',
            'ket_idn' => 'Mampu menerapkan dan mengoptimalisasi beragam metode akuisisi, analisis, serta pengolahan data untuk berbagai kebutuhan.',
            'ket_ing' => 'Able to apply and optimize various methods of data acquisition, analysis, and processing for various needs.'
        ]);
        Capaian::create([
            'prodi_id' => '1',
            'ket_idn' => 'Mampu merancang, mengimplementasikan, mengevaluasi, serta menginvestigasi sistem dan keamanan jaringan komputer menggunakan beragam metode yang relevan.',
            'ket_ing' => 'Able to design, implement, evaluate, and investigate computer network systems and security using various relevant methods.'
        ]);
        
    }
}
