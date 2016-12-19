<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchOrder extends Model
{
    protected $table = "search_orders";
    protected $fillable = [
        'hotel_id',
        'airport_id',
        'start_date',
        'end_date',
        'room_type',
        'boarding',
        'boarding_type',
        'adults',
        'children',
        'email'
    ];
    public function Hotel(){
        return $this->belongsTo('App\Hotel', 'hotel_id');
    }
    public function Airport(){
        return $this->belongsTo('App\Airport', 'airport_id');
    }
    public function RoomType(){
        return $this->belongsTo('App\RoomType', 'room_type');
    }
}
