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

    public function edit($id){
        $oneCategory = $this->categoryService->findById($id);
        return json_decode($oneCategory);
    }

    public function update($id, Request $request){
        $this->categoryService->update($id, $request);
        return redirect()->route('category')->with('success', 'Category updated successfully');
    }

    public function delete($id){
        $this->categoryService->delete($id);
        return redirect()->route('category')->with('success', 'Category delete successfully');
    }
}
