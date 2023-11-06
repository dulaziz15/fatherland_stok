<?php

namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;

interface LogActivityServicesInterface {
    public function create($action, Request $request, $id_barang);
    public function getAll();
}
