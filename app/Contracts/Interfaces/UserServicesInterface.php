<?php

namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;

interface UserServicesInterface {
    public function store(Request $request);
    public function getAll();
    public function getById($id);
    public function update($id, $user);
    public function delete($id);
}
