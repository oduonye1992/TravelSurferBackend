<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelImages extends Model
{
    protected $table = "hotels_images";
    protected $fillable = [
        'image',
        'hotel_id'
    ];
    public function Hotel(){
        return $this->belongsTo('App\Hotel', 'hotel_id');
    }
}
