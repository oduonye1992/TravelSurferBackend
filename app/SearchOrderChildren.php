<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchOrderChildren extends Model
{
    protected $table = "search_orders";
    protected $fillable = [
        'search_order_id',
        'age',
        'search_order_id'
    ];
    public function SearchOrder(){
        return $this->belongsTo('App\SearchOrder');
    }
}
