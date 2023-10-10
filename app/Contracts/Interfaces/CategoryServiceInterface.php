<?php

namespace App\Contracts\Interfaces;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryServiceInterface {
    public function create(Request $category): void;
}
