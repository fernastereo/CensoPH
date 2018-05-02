<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public function habitants(){
    	return $this->hasMany(Habitant::class);
    }
}
