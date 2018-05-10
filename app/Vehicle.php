<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
    	'registration_tag',
    	'color',
    	'mark',
    	'property_id',
    	'active',
        'motorcycle',
    ];

    public function property(){
    	return $this->belongsTo(Property::class);
    }
}
