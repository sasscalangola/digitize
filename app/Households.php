<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Households extends Model
{
    //
    protected $table = 'household';

    public function user(){

        return $this->belongsTo('App\User');
    }
}
