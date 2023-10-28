<?php

namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;

interface LogActivityServicesInterface {
    public function create(Request $request);
    public function getAll();
}
