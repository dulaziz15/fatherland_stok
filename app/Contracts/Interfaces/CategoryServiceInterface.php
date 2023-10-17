<?php

namespace App\Contracts\Interfaces;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryServiceInterface {
    public function create(Request $category);
    public function findPaginate();
    public function findAll();
    public function findById($id);
    public function update($id, Request $request);
    public function delete($id);
}
