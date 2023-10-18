<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stands', function (Blueprint $table) {
            $table->id();
            $table->string('pegawai')->nullable();
            $table->string('alamat')->nullable();
            $table->unsignedBigInteger('no_telp')->nullable();
            $table->unsignedBigInteger('id_user')->nullable()->index(); // relasi ke table user
            $table->foreign('id_user')->references('id')->on('users');
            $table->string('image')->nullable();
            $table->string('path_image')->nullable();
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
        Schema::dropIfExists('stands');
    }
};
