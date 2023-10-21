<?php

namespace App\Contracts\Interfaces;

interface BarangServicesInterface {
    public function getBarang();
    public function create($barang);
}
