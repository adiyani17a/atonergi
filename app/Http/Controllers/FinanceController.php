<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function reporting()
    {
    	return view('finance/reporting/reporting');
    }
    public function evaluating()
    {
    	return view('finance/evaluating/evaluating');
    }
    public function costmanajemen()
    {
    	return view('finance/costmanajemen/costmanajemen');
    }
    public function bookkeeping()
    {
    	return view('finance/bookkeeping/bookkeeping');
    }
}
