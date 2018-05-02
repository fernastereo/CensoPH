<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
	protected $fillable = [
		'name',
        'tower_id',
        'phone_number',
        'live_householder',
        'rent_agency',
        'move_date',
        'id_number',
        'coefficient',
        'area',
	];
	
    public function tower(){
    	return $this->belongsto(Tower::class);
    }
}
