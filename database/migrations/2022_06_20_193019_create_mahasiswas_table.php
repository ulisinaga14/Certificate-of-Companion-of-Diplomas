<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim')->unique();
            $table->foreignId('prodi_id'); //foreign key yang berasal dari tabel prodi
            $table->foreignId('user_id'); //foreign key yang berasal dari tabel user
            $table->foreignId('jurusan_id'); //foreign key yang berasal dari tabel jurusan
            $table->string('nama_mahasiswa');
            $table->string('ttl');
            $table->year('tahun_masuk');
            $table->year('tahun_lulus');
            $table->string('no_skpi')->nullable();
            $table->string('no_ijazah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
}
