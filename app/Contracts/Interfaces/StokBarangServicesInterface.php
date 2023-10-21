<?php

namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;

interface StokBarangServicesInterface {
    public function create(Request $request);
    public function getStok();
    public function getById($id);
    public function update($id, Request $request);
    public function delete($id);
}
