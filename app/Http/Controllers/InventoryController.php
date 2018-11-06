<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function barangmasuk()
    {
    	return view('inventory/barangmasuk/barangmasuk');
    }
    public function process_po()
    {
        return view('inventory/barangmasuk/process_po');
    }
    public function barangkeluar()
    {
    	return view('inventory/barangkeluar/barangkeluar');
    }
    public function kartu_stok()
    {
        return view('inventory/barangkeluar/kartu_stok');
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
