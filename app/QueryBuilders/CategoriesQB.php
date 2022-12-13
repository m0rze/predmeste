<?php

namespace App\QueryBuilders;

use App\Models\Category;

class CategoriesQB
{

    public function getCategoriesForNewPage()
    {
        return Category::select("id", "title")->get();
    }

    public function getCategoriesForTable()
    {
        return Category::withCount("pages")
            ->orderBy("created_at", "DESC")
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


    public function updateTitleById($id, $title)
    {
        $cat = Category::find($id);
        if(empty($cat))
        {
            return false;
        }
        $cat->title = $title;
        $cat->save();
        return true;
    }

    public function deleteCategoryById($id)
    {
        $cat = Category::find($id);
        if(empty($cat))
        {
            return false;
        }
        $cat->delete();
        return true;
    }

}
