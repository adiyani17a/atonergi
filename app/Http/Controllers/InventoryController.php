<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function barangmasuk()
    {
    	return view('inventory/barangmasuk/barangmasuk');
    }
    public function barangkeluar()
    {
    	return view('inventory/barangkeluar/barangkeluar');
    }
    public function barcode()
    {
    	return view('inventory/barcode/barcode');
    }
    public function maintenance()
    {
    	return view('inventory/maintenance/maintenance');
    }
    public function opname()
    {
    	return view('inventory/opname/opname');
    }
    public function suratpinjambarang()
    {
    	return view('inventory/suratpinjambarang/suratpinjambarang');
    }
}
