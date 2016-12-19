<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialPriceOrder extends Model
{
    protected $table = "special_price_order";
    protected $fillable = [
        'search_order_id',
        'price',
        'flight_included',
        'baggage',
        'travel_start_date',
        'travel_end_date',
        'boarding_type',
        'room_type',
        'booking_url'
    ];
    public function RoomType(){
        return $this->belongsTo('App\RoomType', 'room_type');
    }
    public function BoardingType(){
        return $this->belongsTo('App\BoardingType', 'boarding_type');
    }
    public function SearchOrder(){
        return $this->belongsTo('App\SearchOrder', 'search_order_id');
    }
}