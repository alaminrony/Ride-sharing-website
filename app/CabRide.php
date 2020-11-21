<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class CabRide extends Model
{
    use SearchableTrait;
    
    protected $searchable = [
        'columns' => [
            'cab_rides.pickup_address'  => 10,
            'cab_rides.destination_address'   => 10,
        ]
    ];
    
    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }
    public function passenger()
    {
        return $this->belongsTo('App\Passenger');
    }
    public function ridestatus()
    {
        return $this->belongsTo('App\RideStatus');
    }
    public function cancelride()
    {
        return $this->hasMany('App\RideCancel');
    }
    
}
