<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Passenger extends Authenticatable {

    // authenticate: start
    use Notifiable;
    use SearchableTrait;
    
    protected $searchable = [
        'columns' => [
            'passengers.full_name'  => 10,
            'passengers.phone'   => 10,
            'passengers.email'   => 10,
            'passengers.country'    => 10,
            'passengers.city'    => 10,
        ]
    ];

    protected $guard = 'passenger';
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    // authenticate: end


    public function cabride() {
        return $this->hasMany('App\CabRide');
    }

    public function cancelride() {
        return $this->hasMany('App\RideCancel');
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

}
