<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\QueryBuilders\CategoriesQB;
use App\QueryBuilders\PagesQB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{

    private CategoriesQB $categoriesQB;
    private PagesQB $pagesQB;

    public function __construct(
        CategoriesQB $categoriesQB,
        PagesQB $pagesQB
    )
    {
        $this->categoriesQB = $categoriesQB;
        $this->pagesQB = $pagesQB;
    }

    public function show($slug)
    {
        $category = $this->categoriesQB->getCatBySlug($slug);
        if(empty($category->title))
        {
            return Redirect::route("index");
        }
        $pages = $this->pagesQB->getPagesFromCat($category->id);

        return view("website.pages.category", [
            "category" => $category,
            "pages" => $pages
        ]);
    }
}
