<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DriverHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:driver');
    }
    public function index()
    {
        return view('driver.index');
    }
}
