<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
    	'pet_type_id',
    	'what_type',
    	'breed',
    	'property_id',
    ];

    public function property(){
    	return $this->belongsTo(Property::class);
    }

    public function pettype(){
    	return $this->belongsto(PetType::class);
    }
}
