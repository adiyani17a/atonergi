<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function dokumentasi()
    {
    	return view('project/dokumentasi/dokumentasi');
    }
    public function jadwalujicoba()
    {
    	return view('project/jadwalujicoba/jadwalujicoba');
    }
    public function tambah_jadwalujicoba()
    {
        return view('project/jadwalujicoba/tambah_jadwal');
    }
    public function pemasangan()
    {
    	return view('project/pemasangan/pemasangan');
    }
    public function pengadaanbarang()
    {
    	return view('project/pengadaanbarang/pengadaanbarang');
    }
    public function prosespengadaanbarang()
    {
    	return view('project/pengadaanbarang/prosespengadaanbarang');
    }
    public function pengepakanbarang()
    {
    	return view('project/pengepakanbarang/pengepakanbarang');
    }
    public function pengirimanbarang()
    {
    	return view('project/pengirimanbarang/pengirimanbarang');
    }
    public function prosespengirimanbarang()
    {
    	return view('project/pengirimanbarang/prosespengirimanbarang');
    }
    public function salescommon()
    {
    	return view('project/salescommon/salescommon');
    }
    public function technicianfee()
    {
    	return view('project/technicianfee/technicianfee');
    }
}
