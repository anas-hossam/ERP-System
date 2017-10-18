<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'customer_id', 'desc', 'status', 'unit', 'quantity', 'unit_price', 'tot_price',
    ];
    public function customer(){
        return $this->belongsTo('App\Customer');
    }
}
