<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryServices;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryServices $categoryService,
    ) {}

    public function index(){
        return view('category.index');
    }

    public function create(Request $request) {
        $this->categoryService->create($request);
        return view('category.index');
    }
}
