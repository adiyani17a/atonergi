<?php

namespace App\Http\Controllers\master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class currency_controller extends Controller
{
    public function index()
    {
    	return view('master.currency.currency');
    }
}
