<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'fname', 'lname', 'email', 'phone1', 'phone2', 'fax', 'address',
    ];
    public function product(){
        return $this->hasMany('App\Product');
    }
}
