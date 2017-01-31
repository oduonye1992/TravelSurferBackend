<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SearchOrderChildren extends Model
{
    protected $table = "search_order_children";
    protected $fillable = [
        'search_order_id',
        'age',
        'search_order_id'
    ];
    public function SearchOrder(){
        return $this->belongsTo('App\SearchOrder');
    }
}
