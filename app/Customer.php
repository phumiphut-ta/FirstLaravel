<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps =false;
    // protected $table = "";
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
