<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SHSController extends Controller
{
    public function shs_dokumentasi()
    {
    	return view('projectms/shs_dokumentasi/shs_dokumentasi');
    }
    public function shs_jadwalujicoba()
    {
    	return view('projectms/shs_jadwalujicoba/shs_jadwalujicoba');
    }
    public function shs_pemasangan()
    {
    	return view('projectms/shs_pemasangan/shs_pemasangan');
    }
    public function shs_pengadaanbarang()
    {
    	return view('projectms/shs_pengadaanbarang/shs_pengadaanbarang');
    }
    public function shs_pengepakanbarang()
    {
    	return view('projectms/shs_pengepakanbarang/shs_pengepakanbarang');
    }
    public function shs_pengirimanbarang()
    {
    	return view('projectms/shs_pengirimanbarang/shs_pengirimanbarang');
    }
    public function shs_salescommon()
    {
    	return view('projectms/shs_salescommon/shs_salescommon');
    }
    public function shs_technicianfee()
    {
    	return view('projectms/shs_technicianfee/shs_technicianfee');
    }
    public function shs_prosespengadaanbarang()
    {
        return view('projectms/shs_pengadaanbarang/shs_prosespengadaanbarang');
    }
    public function shs_prosespengirimanbarang()
    {
        return view('projectms/shs_pengirimanbarang/shs_prosespengirimanbarang');
    }
}
