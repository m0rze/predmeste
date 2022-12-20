<?php

namespace App\Http\Services;

class BodyMacrosesService
{
    public function convertImages($content)
    {
        if(stripos("qqq".$content, "[IMAGE:"))
        {
            preg_match_all("/(\[IMAGE:.*])/iUs", $content, $matches);
            if(!empty($matches[1]) && count($matches[1]) > 0)
            {
                foreach ($matches[1] as $oneMacros)
                {
                    $oneMacros = trim($oneMacros);
                    $imagePath = str_ireplace(["[IMAGE:", "]"], "", $oneMacros);
                    $imagePath = asset("uploads/img")."/".$imagePath;
                    $tag = "\n<div class='image-item'><a href='".$imagePath."' target='_blank'><img class='page-image' src='".$imagePath."' /></a></div>\n";
                    $content = str_ireplace($oneMacros, $tag, $content);
                }
            }
        }
        return $content;
    }

    public function convertFiles($content)
    {
        if(stripos("qqq".$content, "[DOCFILE:"))
        {
            preg_match_all("/(\[DOCFILE:.*])/iUs", $content, $matches);
            if(!empty($matches[1]) && count($matches[1]) > 0)
            {
                foreach ($matches[1] as $oneMacros)
                {
                    $oneMacros = trim($oneMacros);
                    $docPath = str_ireplace(["[DOCFILE:", "]"], "", $oneMacros);
                    $docPath = explode(":", $docPath);
                    $fileName = $docPath[1];
                    $docPath = asset("uploads/doc")."/".$docPath[0];
                    $tag = "\n<a class='page-file' href='".$docPath."' target='_blank'>".$fileName."</a>\n";
                    $content = str_ireplace($oneMacros, $tag, $content);
                }
            }
        }
        return $content;
    }
}
