<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SplashScreen extends Model
{
    protected $table = "splashscreen";
    protected $fillable = [
        'img',
        'title',
        'description',
        'backgroundColor',
        'fontColor',
        'level'
    ];
}
