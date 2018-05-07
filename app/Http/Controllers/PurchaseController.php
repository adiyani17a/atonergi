<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function purchaseorder()
    {
    	return view('purchase/purchaseorder/purchaseorder');
    }
    public function print_purchaseorder()
    {
        return view('purchase/purchaseorder/print_purchaseorder');
    }
    public function belanjalangsung()
    {
    	return view('purchase/belanjalangsung/belanjalangsung');
    }
    public function rencanapembelian()
    {
    	return view('purchase/rencanapembelian/rencanapembelian');
    }
    public function hub_suplier()
    {
    	return view('purchase/hub_suplier/hub_suplier');
    }
}
