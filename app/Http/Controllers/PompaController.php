<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PompaController extends Controller
{
    public function pmp_dokumentasi()
    {
    	return view('projectmp/pmp_dokumentasi/pmp_dokumentasi');
    }
    public function pmp_jadwalujicoba()
    {
    	return view('projectmp/pmp_jadwalujicoba/pmp_jadwalujicoba');
    }
    public function pmp_pemasangan()
    {
    	return view('projectmp/pmp_pemasangan/pmp_pemasangan');
    }
    public function pmp_pengadaanbarang()
    {
    	return view('projectmp/pmp_pengadaanbarang/pmp_pengadaanbarang');
    }
    public function pmp_pengepakanbarang()
    {
    	return view('projectmp/pmp_pengepakanbarang/pmp_pengepakanbarang');
    }
    public function pmp_pengirimanbarang()
    {
    	return view('projectmp/pmp_pengirimanbarang/pmp_pengirimanbarang');
    }
    public function pmp_salescommon()
    {
    	return view('projectmp/pmp_salescommon/pmp_salescommon');
    }
    public function pmp_technicianfee()
    {
    	return view('projectmp/pmp_technicianfee/pmp_technicianfee');
    }
}
