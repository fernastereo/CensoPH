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
        'idnumber',
        'coefficient',
        'area',
	];
	
    public function tower(){
    	return $this->belongsto(Tower::class);
    }

    public function habitants(){
        return $this->hasMany(Habitant::class);
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }

    public function pets(){
        return $this->hasMany(Pet::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
