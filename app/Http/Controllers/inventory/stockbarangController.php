<?php

namespace App\Http\Controllers\Inventory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use Yajra\Datatables\Datatables;
use DB;
use Validator;
use Carbon\Carbon;
class stockbarangController extends Controller
{
  public function index()
 {
  $po = DB::table('d_purchaseorder')->where('po_status','=','F')->get();
  $item = DB::table('m_item')
          ->join('d_unit', 'u_id', '=', 'i_unit')
          ->where('i_active', 'Y')
          ->get();

  return view('inventory/stockbarang/stockbarang',compact("po", 'item'));
 }
 public function datatable_stockbarang()
 {
     $list = DB::select("SELECT * from i_stock_gudang left join m_item on m_item.i_code = i_stock_gudang.sg_iditem");
         // return $list;
     $data = collect($list);

     // for ($i=0; $i <count($data) ; $i++) {
     // 	$check_data_seq = DB::table('d_penerimaan_barang_dt')->where('pbdt_code','=',$data[$i]->pb_code)->get();
     // }

     // return $check_data_seq;
     // return $data;

     return Datatables::of($data)

             ->addColumn('detail', function ($data) {
                       return '<button data-toggle="modal" onclick="detail(this)" title="Detail" class="btn btn-outline-primary icon-btn btn-rounded btn-sm"><i class="fa fa-folder"></i></button>                               
                               <button onclick="hapus('.$data->sg_id.')" title="Hapus" class="btn btn-outline-danger btn-rounded icon-btn btn-sm"><i class="fa fa-trash"></i></button>';
             })
             ->rawColumns(['aksi','detail','confirmed','status'])
         ->make(true);
 }

 public function autoitem(Request $request){
   $data = DB::table('m_item')
    ->join('d_unit', 'u_id', '=', 'i_unit')
    ->select('u_unit', 'i_price', 'i_currency_id')
    ->where("i_code", $request->item)
    ->get();

    return response()->json($data);
 }

 public function simpan(Request $request){
   DB::beginTransaction();
   try {

     $validation = Validator::make($request->all(), [
              'item' => 'required',
              'qty' => 'required',
              'unit' => 'required',
              'price' => 'required',
          ]);

    if ($validation->fails()) {
        return response()->json([
          'status' => 'kesalahan'
        ]);
    } else {
      $id = DB::table('i_stock_gudang')
            ->max('sg_id');

        DB::table('i_stock_gudang')
          ->insert([
            'sg_id' => $id + 1,
            'sg_iditem' => $request->item,
            'sg_qty' => $request->qty,
            'sg_harga' => $request->price,
            'sg_insert' => Carbon::now('Asia/Jakarta')
          ]);

        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
    }
   } catch (\Exception $e) {
     DB::rollback();
     return response()->json([
       'status' => 'gagal'
     ]);
   }
 }

 public function hapus(Request $request){
   DB::beginTransaction();
   try {

     DB::table('i_stock_gudang')
        ->where('sg_id', $request->id)
        ->delete();

     DB::commit();
     return response()->json([
       'status' => 'berhasil'
     ]);
   } catch (\Exception $e) {
     DB::rollback();
     return response()->json([
       'status' => 'gagal'
     ]);
   }

 }
}
