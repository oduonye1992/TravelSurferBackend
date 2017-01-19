<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = "airports";
    protected $fillable = [
        'name',
        'location',
        'country_id',
        'image'
    ];
    public function Country(){
        return $this->belongsTo('App\Country', 'country_id');
    }
}
