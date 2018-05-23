<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use Yajra\Datatables\Datatables;
use DB;

class MasterController extends Controller
{
    public function suplier()
    {
    	return view('master/suplier/suplier');
    }
    public function customer()
    {
    	return view('master/customer/cust');
    }
    public function pegawai()
    {
    	return view('master/pegawai/pegawai');
    }
    public function keuangan()
    {
        return view('master/akun/keuangan');
    }
    public function t_keuangan()
    {
        return view('master/transaksi/keuangan');
    }
    public function barang()
    {
        $barang=DB::table('m_item')->get() ;
        
    	return view('master/barang/barang', compact('barang'));

    }
    public function vendor()
    {
        return view('master/vendor/vendor');
    }
    public function bundle()
    {
        return view('master/bundle/bundle');
    }
    public function status()
    {
        return view('master/status/status');
    }
       
}
