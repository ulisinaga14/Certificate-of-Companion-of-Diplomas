<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_prodi')->unique();
            $table->foreignId('jurusan_id'); //foreign key yang berasal dari tabel jurusan
            $table->string('nama_prodi_idn');
            $table->string('nama_prodi_ing');
            $table->string('status_akreditasi');
            $table->string('no_akreditasi');
            $table->string('jenjang_kualifikasi');
            $table->string('pendidikan_lanjutan');
            $table->string('program_pendidikan_tinggi');
            $table->string('jenis_jenjang_pendidikan');
            $table->string('gelar_idn');
            $table->string('gelar_ing');
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
        Schema::dropIfExists('prodis');
    }
}
