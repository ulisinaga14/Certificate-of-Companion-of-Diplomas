<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //untuk membuat skema / struktur tabel
    //migrate yang akan mengeksekusi perintah create table
    //dijalankan melalui perintah php artisan migrate pada terminal
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role'); 
            $table->boolean('status')->nullable(); 
            $table->string('image')->nullable(); 
            $table->string('sandi')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    //untuk menghilangkan skema yang telah dibuat
    //php artisan migrate: yang akan menjalankan function down sebelumnya
    {
        Schema::dropIfExists('users');
    }

    //perintah yang menjalankan fungtion up dan down sekaligus adalah php artisan migrate:fresh
}
