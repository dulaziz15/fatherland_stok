<?php

namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;

interface PenjualanServicesInterface {
    public function store(Request $request);
    public function getAll();
    public function delete($id);
    public function getById($id);
}
