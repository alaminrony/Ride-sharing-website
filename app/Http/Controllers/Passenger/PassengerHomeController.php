<?php

namespace App\Http\Controllers\Passenger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PassengerHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:passenger');
    }
    public function index()
    {
        return view('passenger.index');
    }
}
