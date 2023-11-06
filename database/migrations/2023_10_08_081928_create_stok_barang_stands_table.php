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
        Schema::create('stok_barang_stand', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_stand')->nullable()->index()->unsigned(); // relasi ke table stand
            $table->foreign('id_stand')->references('id')->on('stand')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_barang')->nullable()->index()->unsigned(); // relasi ke table barang
            $table->foreign('id_barang')->references('id')->on('barang')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah')->nullable();
            $table->enum('sisa', ['banyak', 'setengah', 'seperempat', 'sedikit', 'habis'])->default('banyak')->nullable();
            $table->string('note')->nullable();
            $table->softDeletes();
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
