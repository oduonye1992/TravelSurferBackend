<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SplashScreen extends Model
{
    protected $table = "splashscreen";
    protected $fillable = [
        'image',
        'title',
        'description'
    ];
}
