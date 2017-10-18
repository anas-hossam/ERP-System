<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'executer_id', 'name', 'type', 'price',
    ];
    public function executer(){
        return $this->belongsTo('App\Executer');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    
}
