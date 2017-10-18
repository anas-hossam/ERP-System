<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'catId', 'supId', 'name', 'category', 'desc', 'img', 'unit', 'cost_price', 'buy_price',
    ];
    public function supplier(){
        return $this->belongsTo('App\Supplier');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
