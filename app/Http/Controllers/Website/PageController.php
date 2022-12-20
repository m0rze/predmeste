<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Services\BodyMacrosesService;
use App\QueryBuilders\PagesQB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{

    private PagesQB $pagesQB;
    private BodyMacrosesService $bodyMacrosesService;

    public function __construct(
        PagesQB $pagesQB,
        BodyMacrosesService $bodyMacrosesService
    )
    {
        $this->pagesQB = $pagesQB;
        $this->bodyMacrosesService = $bodyMacrosesService;
    }

    public function showStatic($slug)
    {
        return $this->show($slug);
    }


    public function showWidgets()
    {
        return view("website.pages.widgets");
    }

    public function showCategorized($catSlug, $slug)
    {
        return $this->show($slug);
    }

    private function show($slug)
    {
        $page = $this->pagesQB->getPageBySlug($slug);
        if($page === false)
        {
            return Redirect::route("index");
        }
        $page->body = $this->bodyMacrosesService->convertImages($page->body);
//        dd($page->body);
        $page->body = $this->bodyMacrosesService->convertFiles($page->body);
        return view("website.pages.page", [
            "page" => $page
        ]);
    }
}
