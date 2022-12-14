<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\QueryBuilders\PagesQB;
use Illuminate\Http\Request;

class ApiPagesController extends Controller
{
    private PagesQB $pagesQB;

    public function __construct(
        PagesQB $pagesQB
    )
    {
        $this->pagesQB = $pagesQB;
    }

    public function uploadFile(Request $request)
    {
        $result = [
            "result" => 0,
            "filename" => "",
            "errors" => ""
        ];
        $type = $request->input("type");
        if(empty($type))
        {
            $result["errors"] = "Неизвестная ошибка";
            return json_encode($result);
        }
        $mimes = "";
        if($type === "doc")
        {
            $mimes = "pdf,doc,docx,xls,xlsx,txt";
        }
        elseif($type === "img")
        {
            $mimes = "png,jpg,jpeg";
        } else {
            $result["errors"] = "Неизвестный тип загрузки";
            return json_encode($result);
        }
        try {
            $this->validate($request, [
                'file' => ['required', 'mimes:'.$mimes, 'max:10000']
            ]);
        } catch (\Exception $e)
        {
            $result["errors"] = "Неверный размер или тип файла";
            return json_encode($result);
        }
        $file = $request->file("file");
        if(empty($file))
        {
            $result["errors"] = "Отсутствует файл";
            return json_encode($result);
        }
        $fileName = time()."_".$file->getClientOriginalName();
        if($file->storeAs($type, $fileName, "uploads"))
        {
            $result["result"] = 1;
            $result["filename"] = $fileName;
            return json_encode($result);
        }
        $result["errors"] = "Ошибка сохранения файла";
        return json_encode($result);
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

        if($this->pagesQB->deleteById($id))
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
