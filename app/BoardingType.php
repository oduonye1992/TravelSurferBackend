<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardingType extends Model
{
    protected $table = "boarding_types";
    protected $fillable = ['name'];
}
