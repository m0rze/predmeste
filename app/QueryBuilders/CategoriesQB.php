<?php

namespace App\QueryBuilders;

use App\Models\Category;

class CategoriesQB
{

    public function getCategoriesForTable()
    {
        return Category::withCount("pages")
            ->paginate(20);
    }

    public function addCategory($title)
    {
        return Category::create([
            "title" => $title
        ]);
    }

    public function getCategoryByTitle($title)
    {
        return Category::where("title", "=", $title)->get()->first();
    }



}
