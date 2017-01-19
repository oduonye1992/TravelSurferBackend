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
        'email',
        //'transport',
        'uuid'
    ];
    public function Hotel(){
        return $this->belongsTo('App\Hotel', 'hotel_id');
    }
    public function Airport(){
        return $this->belongsTo('App\Airport', 'airport_id');
    }
    public function Children(){
        return $this->hasMany('App\SearchOrderChildren', 'search_order_id');
    }
    public function RoomType(){
        return $this->belongsTo('App\HotelRoomType', 'room_type');
    }
    public function BoardingType(){
        return $this->belongsTo('App\BoardingType', 'boarding_type');
    }
    public function InternetPriceOrder(){
        return $this->hasMany('App\InternetPriceOrder', 'search_order_id');
    }
    public function SpecialPriceOrder(){
        return $this->hasMany('App\SpecialPriceOrder', 'search_order_id');
    }
}
