<?php

namespace App\Http\Controllers\inventory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use Yajra\Datatables\Datatables;
use DB;
class penerimaan_barangController extends Controller
{
 	
	 public function penerimaan_barang()
	 {
	 	$po = DB::table('d_purchaseorder')->where('po_status','=','F')->get();
	 	return view('inventory/penerimaan_barang/penerimaan_barang',compact("po"));
	 }
	 public function create_penerimaan_barang(Request $request)
	 {
	 	dd($request->all());
	 }
	 public function cari_penerimaan_barang(Request $request)
	 {
	 	// dd($request->all());	
	 	$header_cari = DB::table('d_purchaseorder')->where('po_status','=','F')->get();
	 	$seq_cari = DB::table('d_purchaseorder_dt')->where('podt_status','=','F')->get();
	 	
	 	return view('inventory/penerimaan_barang/create_penerimaan_barang',compact("header_cari",'seq_cari'));

	 }
}
