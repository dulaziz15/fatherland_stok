<?php

namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;

interface StokBarangServicesInterface {
    public function create(Request $request);
    public function getStok();
}
