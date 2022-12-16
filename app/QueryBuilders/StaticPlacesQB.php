<?php

namespace App\QueryBuilders;

use App\Models\StaticPlace;

class StaticPlacesQB
{
    public function getPlaces()
    {
        return StaticPlace::select("id", "title")->get();
    }
}
