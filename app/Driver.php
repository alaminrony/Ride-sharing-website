<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Nicolaslopezj\Searchable\SearchableTrait;

// class Driver extends Model
class Driver extends Authenticatable {

    // authenticate: start
    use Notifiable;
    use SearchableTrait;
    
    protected $searchable = [
        'columns' => [
            'drivers.full_name'  => 10,
            'drivers.email'   => 10,
            'drivers.phone'   => 10,
            'drivers.country'    => 10,
            'drivers.city'    => 10,
            'drivers.driving_licence_no' => 10,
        ]
    ];

    protected $guard = 'driver';
    protected $fillable = [
        'd_first_name', 'd_last_name', 'd_email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    // authenticate: end

    public function cab() {
        return $this->hasMany('App\Cab');
    }

    public function cabride() {
        return $this->hasMany('App\CabRide');
    }

    public function cancelride() {
        return $this->hasMany('App\RideCancel');
    }

    public function driverbill() {
        return $this->hasMany('App\DriverBill');
    }

    public function driverType() {
        return $this->belongsTo('App\DriverType');
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

}
