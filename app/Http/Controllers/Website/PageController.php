<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($categorySlug, $pageSlug)
    {

    }

    public function showStatic($slug)
    {
        dd($slug);
    }
}
