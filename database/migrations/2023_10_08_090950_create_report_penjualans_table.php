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
        Schema::create('report_penjualans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_stand')->nullable()->index(); // relasi ke table stand
            $table->foreign('id_stand')->references('id')->on('stands'); // Corrected 'references' method
            $table->string('barang')->nullable(); // barang yang dijual
            $table->integer('jumlah')->nullable(); // jumlah barang yang habis terjual
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
        Schema::dropIfExists('report_penjualans');
    }
};
