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
        $category = $this->categoryService->findPaginate();
        return view('category.index', compact('category'));
    }

    public function create(Request $request) {
        $this->categoryService->create($request);
        return redirect()->route('category')->with('success', 'Category created successfully');
    }
}
