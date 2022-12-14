<?php

namespace App\Http\Services;

class ValidateFields
{
    public function validatePHPJS($fields)
    {
        foreach ($fields as $oneField)
        {
            if(stripos("qqq".$oneField, "<?php") || stripos("qqq".$oneField, "<script"))
            {
                return false;
            }
        }
        return true;
    }
}
