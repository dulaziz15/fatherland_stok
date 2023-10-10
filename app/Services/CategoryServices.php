<?php

namespace App\Services;

use App\Contracts\Interfaces\CategoryServiceInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryServices implements CategoryServiceInterface {

    public function __construct(private readonly Category $user)
    {
    }

   public function create(Request $request): void
   {
        $user = Category::create([
            'category' => $request->category,
        ]);
   }
}
