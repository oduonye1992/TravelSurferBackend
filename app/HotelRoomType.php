<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRoomType extends Model
{
    protected $table = "hotels_room_type";
    protected $fillable = [
        'name',
        'hotel_id'
    ];
    public function Hotel(){
        return $this->belongsTo('App\Hotel', 'hotel_id');
    }
}
