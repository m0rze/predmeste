<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dude extends Model
{
    use HasFactory;

    protected $table = "dudes";
    protected $guarded = [];
    public $timestamps = false;
}
