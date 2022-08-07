<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->boolean('status');
            $table->foreignId('kategori_id'); //foreign key yang berasal dari tabel kategori
            $table->foreignId('user_id'); //foreign key yang berasal dari tabel user
            $table->string('tempat');
            $table->string('place');
            $table->string('topik_idn');
            $table->string('topik_ing');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('penyelenggara');
            $table->string('institution');
            $table->string('image')->nullable(); 
            $table->text('ket_idn');
            $table->text('ket_ing');
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
        Schema::dropIfExists('infos');
    }
}