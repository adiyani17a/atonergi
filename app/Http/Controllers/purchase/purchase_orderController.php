<?php

namespace App\Http\Controllers\purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use Yajra\Datatables\Datatables;
use DB;

class purchase_orderController extends Controller
{
	public function purchaseorder()
    {
    	$vendor = DB::table('m_vendor')->get();
        $item = DB::table('m_item')->get();
    	return view('purchase/purchaseorder/purchaseorder',compact('vendor','item'));
    }
   	public function cari_ro_requestorder(Request $request)
   	{
   		$data = DB::table('d_requestorder')->where('ro_status','!=','T')->where('ro_vendor','=',$request->cari_vendor)->get();	

   		return response()->json($data);
   	}
   	public function cari_po_requestorder(Request $request)
   	{
   		// dd($request->all());
   		$data_header = DB::table('d_requestorder')->where('ro_status','!=','T')->where('ro_code','=',$request->cari_ro)->get();	
   		$data_seq = DB::table('d_requestorder_dt')->where('rodt_status','=','T')->where('rodt_code','=',$request->cari_ro)->get();	
    	$vendor = DB::table('m_vendor')->get();
        $item = DB::table('m_item')->get();

   		return view('purchase/purchaseorder/edit_purchaseorder',compact('data_header','data_seq','vendor'));
   	}
    public function edit_purchaseorder()
    {
      return view('purchase/purchaseorder/edit_purchaseorder');
    }
}
