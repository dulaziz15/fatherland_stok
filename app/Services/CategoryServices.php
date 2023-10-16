<?php

namespace App\Services;

use App\Contracts\Interfaces\CategoryServiceInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryServices implements CategoryServiceInterface {

    public function __construct(private readonly Category $user)
    {
    }

   public function create(Request $request)
   {
        $user = Category::create([
            'category' => $request->category,
        ]);
   }

   public function findPaginate()
   {
        $category = Category::paginate(2);
        return $category;
   }

   public function findAll()
   {
        $category = Category::all();
        return $category;
   }

   public function findById($id) {
        $category = Category::where('id', $id)->first();
        return $category;
   }

   public function update($id, Request $request) {
    $category = Category::find($id);
    if (!$category) {
        return response()->json(['message' => 'Category not found'], 404);
    }
    $category->category = $request->input('category');
    $category->save();
    }

    public function delete($id) {
        $category = Category::find($id);
        $category->delete();
    }
}
