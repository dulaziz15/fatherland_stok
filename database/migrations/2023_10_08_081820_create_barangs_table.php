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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_category')->nullable()->index()->unsigned(); // relasi ke table category dengan one to
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade'); // foreign key
            $table->string('name')->nullable();
            $table->integer('jumlah');
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
        Schema::dropIfExists('barangs');
    }
};
