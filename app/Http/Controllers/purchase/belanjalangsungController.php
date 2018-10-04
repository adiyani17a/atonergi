<?php

namespace App\Http\Controllers\purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\Carbon;

class belanjalangsungController extends Controller
{
   public function belanjalangsung()
    {
        return view('purchase/belanjalangsung/belanjalangsung');
    }
    public function tambah_belanjalangsung(Request $request)
    {
        $vendor = DB::table('m_vendor')->get();

        $item = DB::table('m_item')->leftjoin('i_stock_gudang','i_stock_gudang.sg_iditem','=','m_item.i_Code')->get();

        return view('purchase/belanjalangsung/tambah',compact('vendor','item'));
    }


    public function hub_suplier(Request $request)
    {

    }

    public function simpan(Request $request){
      DB::beginTransaction();
      try {
        $id = DB::table('d_belanja_langsung')
              ->max('dbl_id');

        if ($id < 0) {
          $id = 0;
        }

        $kode = DB::table('d_belanja_langsung')->max('dbl_id');
            if ($kode == null) {
                $kode = 1;
            }else{
                $kode += 1;
            }
        $index = str_pad($kode, 3, '0', STR_PAD_LEFT);
        $date = date('my');
        $nota = 'BL-'.$index.'/'.$request->dbl_vendor.'/'.$date;

        $request->po_subtotal = str_replace('.','',$request->po_subtotal);
        $request->dbldt_tax = str_replace('.','',$request->dbldt_tax);
        $request->total_net = str_replace('.','',$request->total_net);

        DB::table('d_belanja_langsung')
          ->insert([
            'dbl_id' => $id + 1,
            'dbl_code' => $nota,
            'dbl_vendor' => $request->dbl_vendor,
            'dbl_date' => Carbon::parse($request->dbl_date)->format('Y-m-d'),
            'dbl_ship_to' => $request->dbl_ship_to,
            'dbl_ship_method' => $request->dbl_shippinethod,
            'dbl_ship_term' => $request->dbl_shipp_term,
            'dbl_delivery_date' => Carbon::parse($request->dbl_shipp_date)->format('Y-m-d'),
            'dbl_created_at' => Carbon::now('Asia/Jakarta'),
            'dbl_total' => $request->po_subtotal,
            'dbl_tax' => $request->dbldt_tax,
            'dbl_total_net' => $request->total_net
          ]);

          for ($i=0; $i < count($request->kode); $i++) {
            $iddt = DB::table('d_belanja_langsung_dt')
                    ->max('dbldt_id');

            if ($iddt < 0) {
              $iddt = 0;
            }
            if ($request->tax[0] == null) {
              DB::table('d_belanja_langsung_dt')
                ->insert([
                  'dbldt_id' => $iddt + 1,
                  'dbldt_ref' => $nota,
                  'dbldt_item' => $request->kode[$i],
                  'dbldt_qty' => $request->qty[$i],
                  'dbldt_line_total' => $request->total[$i],
                  'dbldt_created_at' => Carbon::now('Asia/Jakarta'),
                ]);
            } else {
              DB::table('d_belanja_langsung_dt')
                ->insert([
                  'dbldt_id' => $iddt + 1,
                  'dbldt_ref' => $nota,
                  'dbldt_item' => $request->kode[$i],
                  'dbldt_qty' => $request->qty[$i],
                  'dbldt_line_total' => $request->total[$i],
                  'dbldt_ppn' => $request->tax[$i],
                  'dbldt_created_at' => Carbon::now('Asia/Jakarta'),
                ]);
            }
          }

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
