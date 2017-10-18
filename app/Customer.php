<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'fname', 'lname', 'email', 'status', 'phone1', 'phone2', 'address', 'username', 'password',
    ];
    public function bill(){
        return $this->hasMany('App\Bill');
    }
    public function offer(){
        return $this->hasMany('App\Offer');
    }
    public function service(){
        return $this->hasMany('App\Service');
    }
}
