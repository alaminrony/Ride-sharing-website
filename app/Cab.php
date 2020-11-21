<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Cab extends Model
{
    use SearchableTrait;
    
    protected $searchable = [
        'columns' => [
            'cabs.model_number'  => 10,
            'cabs.number_plate'  => 10,
        ]
    ];
    
    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }
    public function cabtype()
    {
        return $this->belongsTo('App\CabType');
    }
}
