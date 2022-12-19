<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\QueryBuilders\PagesQB;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    private PagesQB $pagesQB;

    public function __construct(
        PagesQB $pagesQB
    )
    {
        $this->pagesQB = $pagesQB;
    }

    public function index()
    {
        $featurePages = $this->pagesQB->getFeaturedPagesForTable();
        return view("website.pages.index", [
            "featurePages" => $featurePages
        ]);
    }
}
