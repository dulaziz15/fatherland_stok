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
        Schema::create('stok_barang_stands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_stand')->nullable()->index(); // relasi ke table stand
            $table->foreign('id_stand')->references('id')->on('stands');
            $table->unsignedBigInteger('id_barang')->nullable()->index(); // relasi ke table barang
            $table->foreign('id_barang')->references('id')->on('barangs');
            $table->unsignedBigInteger('jumlah')->nullable(); // jumlah barang pada masing-masing stand
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
        Schema::dropIfExists('stok_barang_stands');
    }
};
