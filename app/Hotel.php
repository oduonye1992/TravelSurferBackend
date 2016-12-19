<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = "hotels";
    protected $fillable = [
        'name',
        'longitude',
        'latitude',
        'description',
        'country_id'
    ];
    public function Country(){
        return $this->belongsTo('App\Country', 'country_id');
    }
}
