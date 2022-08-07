<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMagangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magangs', function (Blueprint $table) {
            $table->id();
            $table->boolean('status');
            $table->foreignId('kategori_id'); //foreign key yang berasal dari tabel kategori
            $table->foreignId('user_id'); //foreign key yang berasal dari tabel user
            $table->string('tempat');
            $table->string('place');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('penyelenggara');
            $table->string('institution');
            $table->string('image');
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
        Schema::dropIfExists('magangs');
    }
}
