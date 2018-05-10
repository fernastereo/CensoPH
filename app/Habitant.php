<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habitant extends Model
{
	protected $fillable = [
		'property_id',
		'name',
		'email',
		'brithdate',
		'occupation',
		'cellphone_number',
		'relationship_id',
		'idnumber',
		'active',
	];

    public function property(){
    	return $this->belongsTo(Property::class);
    }

    public function relationship(){
    	return $this->belongsTo(Relationship::class);
    }
}
