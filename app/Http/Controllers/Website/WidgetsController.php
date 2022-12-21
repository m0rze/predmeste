<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\QueryBuilders\WidgetsQB;
use Illuminate\Http\Request;

class WidgetsController extends Controller
{

    private WidgetsQB $widgetsQB;

    public function __construct(
        WidgetsQB $widgetsQB
    )
    {
        $this->widgetsQB = $widgetsQB;
    }

    public function show()
    {
        return view("website.pages.widgets", [
            "widgets" => $this->widgetsQB->getAllWidgets()
        ]);
    }
}
