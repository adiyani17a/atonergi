<?php

namespace App\Http\Controllers\inventory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
class stock_opnameController extends Controller
{
 	
	 public function stockopname()
	 {
	 	$po = DB::table('d_purchaseorder')->where('po_status','=','F')->get();
    	return view('inventory/opname/opname');
	 }
	 public function datatable_stockgudang()
	 {
      $list = DB::select("SELECT * from i_stock_gudang left join m_item on m_item.i_code = i_stock_gudang.sg_iditem");
          // return $list;
      $data = collect($list);

      return Datatables::of($data)
        
              ->addColumn('detail', function ($data) {
                        return '<button data-toggle="modal" onclick="detail(this)"  class="btn btn-outline-primary btn-sm">Detail</button>';
              })
              ->rawColumns(['aksi','detail','confirmed','status'])
          ->make(true);
	 }
   public function create_stockopname(Request $request)
   {
   	   $kode = DB::table('i_stock_opname')->max('so_id');
   	   if ($kode == null) {
   	   	$kode = 1;
   	   }else{
   	   	$kode += 1;
   	   }
	   $index = str_pad($kode, 3, '0', STR_PAD_LEFT);
       $date = date('my');
   	   $nota = 'SOP-'.$index.'/'.$date;

	   $data = DB::table('i_stock_gudang')->leftjoin('m_item','m_item.i_code','=','i_stock_gudang.sg_iditem')->get();
   	   $item = DB::table('m_item')->get();
       return view('inventory/opname/create_opname',compact('item','data','nota'));
   }
   public function cari_stockopname(Request $request)
   {
   	  // dd($request->all());
	   	if ($request->id == 'all' ) {
	   	  	$data = DB::table('i_stock_gudang')->leftjoin('m_item','m_item.i_code','=','i_stock_gudang.sg_iditem')->get();
		}else{
	   	  	$data = DB::table('i_stock_gudang')->leftjoin('m_item','m_item.i_code','=','i_stock_gudang.sg_iditem')->where('sg_iditem','=',$request->id)->get();
		}
		// return $data;

		return view('inventory/opname/cari_stockopname',compact('data'));

   }
}
