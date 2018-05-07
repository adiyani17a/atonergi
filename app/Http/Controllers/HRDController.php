<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HRDController extends Controller
{
    public function kpi()
    {
    	return view('hrd/kpi/kpi');
    }
    public function payroll()
    {
    	return view('hrd/payroll/payroll');
    }
    public function kesejahteraan()
    {
    	return view('hrd/kesejahteraan/kesejahteraan');
    }
    public function rekruitment()
    {
    	return view('hrd/rekruitment/rekruitment');
    }
    public function freelance()
    {
    	return view('hrd/freelance/freelance');
    }
}
