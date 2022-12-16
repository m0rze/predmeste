<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPlace extends Model
{
    use HasFactory;

    protected $table = "static_places";
    protected $guarded = [];
    public $timestamps = false;
}
