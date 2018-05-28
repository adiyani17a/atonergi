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
   	public function cari_requestorder(Request $request)
   	{
   		dd($request->all());	
   	}
    public function edit_purchaseorder()
    {
      return view('purchase/purchaseorder/edit_purchaseorder');
    }
}
