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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_stand')->nullable()->index()->unsigned(); // relasi ke table stand
            $table->foreign('id_stand')->references('id')->on('stands')->onDelete('cascade');
            $table->unsignedBigInteger('id_barang')->nullable()->index()->unsigned(); // relasi ke table barang
            $table->foreign('id_barang')->references('id')->on('barangs')->onDelete('cascade');
            $table->string('action')->nullable(); // action in atau out barang
            $table->unsignedBigInteger('jumlah')->nullable(); // jumlah barang in atau out
            $table->string('note')->nullable(); // catatan ketika ada suatu action
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
        Schema::dropIfExists('histories');
    }
};
