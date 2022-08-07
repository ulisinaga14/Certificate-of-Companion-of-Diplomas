<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prodi_id'); //foreign key yang berasal dari tabel prodi
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
        Schema::dropIfExists('capaians');
    }
}
