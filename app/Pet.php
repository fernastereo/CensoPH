<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'name',
    	'animal_id',
    	'what_type',
    	'breed',
    	'property_id',
        'active',
    ];

    public function property(){
    	return $this->belongsTo(Property::class);
    }

    public function animal(){
    	return $this->belongsTo(Animal::class);
    }
}
