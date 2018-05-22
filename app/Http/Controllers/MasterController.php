<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

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
        $barang=Barang::all();
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
    public function datatable_barang()
   {
        
        $barang= new Barang();
        
        
        // return $data;
        $barang = collect($barang);
        // return $barang;
        return datatables::of($barang)
                        ->addColumn('aksi', function ($barang) {
                          return  '<div class="btn-group">'.
                                   '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="edit">'.
                                   '<label class="fa fa-pencil-alt"></label></button>'.
                                   '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
                                   '<label class="fa fa-trash"></label></button>'.
                                  '</div>';
                        })
                        
                        ->make(true);
   }
       
}
