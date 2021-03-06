<?php

namespace App;

use App\Notifications\RequestNewUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'property_id', 'token', 'idnumber', 'notification_address', 'cellphone_number', 'birthdate', 'occupation', 'profile_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verified(){
        return $this->token === null;
    }

    public function sendVerificationEmail(){
        $this->notify(new RequestNewUser($this));
    }

    public function property(){
        return $this->hasOne(Property::class);
    }
}
