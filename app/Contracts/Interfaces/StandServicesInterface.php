<?php

namespace App\Contracts\Interfaces;

use Illuminate\Http\Request;

interface StandServicesInterface {
    public function store($stand);
    public function getById($id);
    public function update($id, $stand);
    public function delete($id);
}
