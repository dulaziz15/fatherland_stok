<?php

namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;

interface BarangServicesInterface {
    public function getBarang();
    public function create($barang);
    public function updateBarang($id, Request $request);
    public function getById($id);
    public function delete($id);
    public function update(Request $request, $id);
}
