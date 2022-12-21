<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\QueryBuilders\WidgetsQB;
use Illuminate\Http\Request;

class ApiWidgetsController extends Controller
{

    private WidgetsQB $widgetsQB;

    public function __construct(
        WidgetsQB $widgetsQB
    )
    {
        $this->widgetsQB = $widgetsQB;
    }

    public function delete($id, Request $request)
    {
        $result = [
            "result" => 0,
            "error" => ""
        ];
        if(empty($id))
        {
            $result["error"] = "baddata";
            echo json_encode($result);
            die();
        }

        if($this->widgetsQB->deleteById($id))
        {
            $result["result"] = 1;
            echo json_encode($result);
            die();
        }
        $result["error"] = "baddelete";
        echo json_encode($result);
        die();
    }
}
