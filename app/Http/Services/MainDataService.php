<?php

namespace App\Http\Services;

use App\QueryBuilders\CategoriesQB;
use App\QueryBuilders\PagesQB;

class MainDataService
{
    public $categories = [];
    public $staticPages = [];

    public function __construct(
        CategoriesQB $categoriesQB,
        PagesQB $pagesQB
    )
    {
        $this->categories = $categoriesQB->getCategories();
        $this->staticPages = $pagesQB->getStaticPages();
    }
}

