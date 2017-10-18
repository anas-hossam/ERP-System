<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Executer extends Model
{
    protected $fillable = [
        'fname', 'lname', 'email', 'phone1', 'phone2', 'address',
    ];
    public function service(){
        return $this->hasMany('App\Service');
    }
}
