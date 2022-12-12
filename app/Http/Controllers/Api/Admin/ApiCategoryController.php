<?php

namespace App\Http\Controllers\Api\Admin;

use App\QueryBuilders\CategoriesQB;
use Illuminate\Http\Request;

class ApiCategoryController
{

    private CategoriesQB $categoriesQB;

    public function __construct(
        CategoriesQB $categoriesQB
    )
    {
        $this->categoriesQB = $categoriesQB;
    }

    public function addNew(Request $request)
    {
        $result = [
            "result" => 0,
            "error" => ""
        ];
        $data = $request->input("data");
        $data = json_decode($data);
        $title = $data->title;
        if(empty($title))
        {
            $result["error"] = "baddata";
            echo json_encode($result);
            die();
        }
        if(!empty($data->cat_id)){

        }
        if(!empty($this->categoriesQB->getCategoryByTitle($title)))
        {
            $result["error"] = "catexists";
            echo json_encode($result);
            die();
        }
        $insert = $this->categoriesQB->addCategory($title);
        if(!empty($insert->id))
        {
            $result["result"] = 1;
            echo json_encode($result);
            die();
        }
        $result["error"] = "badinsert";
        echo json_encode($result);
        die();
    }

}
