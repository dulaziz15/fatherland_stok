<?php

namespace App\Http\Request;

class CategoryRequest
{
    public $category;

    public function __construct($category)
    {
        $this->category = $category;
    }
}

