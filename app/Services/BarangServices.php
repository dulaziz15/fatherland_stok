<?php

namespace App\Services;

use App\Contracts\Interfaces\BarangServicesInterface;
use App\Models\Barang;

class BarangServices implements BarangServicesInterface {
    public function __construct(private readonly Barang $barang)
    {
    }

    public function getBarang(){
        $barang = Barang::with('category')->paginate(5);
        return $barang;
    }

    public function getAll(){
        $barang = Barang::with('category')->get();
        return $barang;
    }


    public function create($barang) {
        Barang::create([
            'id_category' => $barang->id_category,
            'name' => $barang->name,
            'jumlah' => $barang->jumlah,
            'image' => $barang->image,
            'path_image' => $barang->path_image
        ]);
    }
}
