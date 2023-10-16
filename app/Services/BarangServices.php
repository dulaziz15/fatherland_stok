<?php

namespace App\Services;

use App\Contracts\Interfaces\BarangServicesInterface;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangServices implements BarangServicesInterface {
    public function __construct(private readonly Barang $barang)
    {
    }

    public function getBarang(){
        echo "kjhkhk";
    }
}
