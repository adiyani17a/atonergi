<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelectController extends Controller
{
    public function pilih_dokumentasi()
    {
    	return view('project/pilih_dokumentasi/pilih_dokumentasi');
    }
    public function pilih_jadwalujicoba()
    {
    	return view('project/pilih_jadwalujicoba/pilih_jadwalujicoba');
    }
    public function pilih_pemasangan()
    {
    	return view('project/pilih_pemasangan/pilih_pemasangan');
    }
    public function pilih_pengadaanbarang()
    {
    	return view('project/pilih_pengadaanbarang/pilih_pengadaanbarang');
    }
    public function pilih_pengepakanbarang()
    {
    	return view('project/pilih_pengepakanbarang/pilih_pengepakanbarang');
    }
    public function pilih_pengirimanbarang()
    {
    	return view('project/pilih_pengirimanbarang/pilih_pengirimanbarang');
    }
    public function pilih_salescommon()
    {
    	return view('project/pilih_salescommon/pilih_salescommon');
    }
    public function pilih_technicianfee()
    {
    	return view('project/pilih_technicianfee/pilih_technicianfee');
    }
}
