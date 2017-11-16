<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public $timestamps = false;

    public function budget() {
    	return $this->belongsTo('App\Budget', 'budget_range', 'id');
    }
}
