<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    public $timestamps = false;

    public function threads() {
    	return $this->hasMany('App\Thread');
    }
}
