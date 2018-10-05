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
        $data = DB::table('d_belanja_langsung')
                ->join('m_vendor', 's_kode', '=', 'dbl_vendor')
                ->select('dbl_id', 'dbl_code', 's_company', 's_name', 'dbl_total_net')
                ->get();

        return view('purchase/belanjalangsung/belanjalangsung', compact('data'));
    }
    public function tambah_belanjalangsung(Request $request)
    {
        $vendor = DB::table('m_vendor')->get();

        $item = DB::table('m_item')->leftjoin('i_stock_gudang','i_stock_gudang.sg_iditem','=','m_item.i_Code')->get();

        return view('purchase/belanjalangsung/tambah',compact('vendor','item'));
    }

    public function edit(Request $request)
    {
        $id = $request->id;

        $vendor = DB::table('m_vendor')->get();

        $item = DB::table('m_item')->leftjoin('i_stock_gudang','i_stock_gudang.sg_iditem','=','m_item.i_Code')->get();

        $dbl = DB::table('d_belanja_langsung')
                ->join('m_vendor', 's_kode', '=', 'dbl_vendor')
                ->where('dbl_id', $request->id)
                ->get();

        $dbldt = DB::table('d_belanja_langsung_dt')
                  ->where('dbldt_ref', $dbl[0]->dbl_code)
                  ->join('m_item', 'i_code', '=', 'dbldt_item')
                  ->join('d_unit', 'u_id', '=', 'i_unit')
                  ->get();

        return view('purchase/belanjalangsung/edit',compact('dbldt','dbl','vendor','item','id'));

    }


    public function hub_suplier(Request $request)
    {

    }

    public function simpan(Request $request){
      // DB::beginTransaction();
      // try {
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

        $request->po_subtotal = str_replace(',','',$request->po_subtotal);
        $request->dbldt_tax = str_replace(',','',$request->dbldt_tax);
        $request->total_net = str_replace(',','',$request->total_net);

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
            'dbl_total' => (double)$request->po_subtotal,
            'dbl_tax' => (double)$request->dbldt_tax,
            'dbl_total_net' => (double)$request->total_net
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
                  'dbldt_qty' => (double)$request->qty[$i],
                  'dbldt_unit_price' => (double)$request->price[$i],
                  'dbldt_line_total' => (double)$request->total[$i],
                  'dbldt_created_at' => Carbon::now('Asia/Jakarta'),
                ]);
            } else {
              if ($request->tax[$i] != 'undefined') {
                DB::table('d_belanja_langsung_dt')
                  ->insert([
                    'dbldt_id' => $iddt + 1,
                    'dbldt_ref' => $nota,
                    'dbldt_item' => $request->kode[$i],
                    'dbldt_qty' => (double)$request->qty[$i],
                    'dbldt_unit_price' => (double)$request->price[$i],
                    'dbldt_line_total' => (double)$request->total[$i],
                    'dbldt_ppn' => (double)$request->tax[$i],
                    'dbldt_created_at' => Carbon::now('Asia/Jakarta'),
                  ]);
              } else {
                DB::table('d_belanja_langsung_dt')
                  ->insert([
                    'dbldt_id' => $iddt + 1,
                    'dbldt_ref' => $nota,
                    'dbldt_item' => $request->kode[$i],
                    'dbldt_qty' => $request->qty[$i],
                    'dbldt_unit_price' => (double)$request->price[$i],
                    'dbldt_line_total' => (double)$request->total[$i],
                    'dbldt_created_at' => Carbon::now('Asia/Jakarta'),
                  ]);
              }
            }
          }

      //   DB::commit();
      //   return response()->json([
      //     'status' => 'berhasil'
      //   ]);
      // } catch (\Exception $e) {
      //   DB::rollback();
      //   return response()->json([
      //     'status' => 'gagal'
      //   ]);
      // }
    }

    public function hapus(Request $request){
      DB::beginTransaction();
      try {

        $data = DB::table('d_belanja_langsung')
                  ->where('dbl_id', $request->id)
                  ->get();

        DB::table('d_belanja_langsung')
          ->where('dbl_id', $request->id)
          ->delete();

        DB::table('d_belanja_langsung_dt')
          ->where('dbldt_ref', $data[0]->dbl_code)
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

    public function detail(Request $request){
      $data = DB::table('d_belanja_langsung')
              ->join('d_belanja_langsung_dt', 'dbldt_ref', '=', 'dbl_code')
              ->join('m_item', 'i_code', '=', 'dbldt_item')
              ->join('d_unit', 'u_id', '=', 'i_unit')
              ->where('dbl_id', $request->id)
              ->get();

      return response()->json($data);
    }

    public function update(Request $request){
      DB::beginTransaction();
      try {

        $data = DB::table('d_belanja_langsung')
                  ->where('dbl_id', $request->id)
                  ->get();

        DB::table('d_belanja_langsung')
          ->where('dbl_id', $request->id)
          ->delete();

        DB::table('d_belanja_langsung_dt')
          ->where('dbldt_ref', $data[0]->dbl_code)
          ->delete();

        $id = $request->id;

        if ($id < 0) {
          $id = 0;
        }

        $nota = $data[0]->dbl_code;

        $request->po_subtotal = str_replace('.','',$request->po_subtotal);
        $request->dbldt_tax = str_replace('.','',$request->dbldt_tax);
        $request->total_net = str_replace('.','',$request->total_net);

        DB::table('d_belanja_langsung')
          ->insert([
            'dbl_id' => $id,
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
                  'dbldt_unit_price' => $request->price[$i],
                  'dbldt_line_total' => $request->total[$i],
                  'dbldt_created_at' => Carbon::now('Asia/Jakarta'),
                ]);
            } else {
              if ($request->tax[$i] != 'undefined') {
                DB::table('d_belanja_langsung_dt')
                  ->insert([
                    'dbldt_id' => $iddt + 1,
                    'dbldt_ref' => $nota,
                    'dbldt_item' => $request->kode[$i],
                    'dbldt_qty' => $request->qty[$i],
                    'dbldt_unit_price' => $request->price[$i],
                    'dbldt_line_total' => $request->total[$i],
                    'dbldt_ppn' => $request->tax[$i],
                    'dbldt_created_at' => Carbon::now('Asia/Jakarta'),
                  ]);
              } else {
                DB::table('d_belanja_langsung_dt')
                  ->insert([
                    'dbldt_id' => $iddt + 1,
                    'dbldt_ref' => $nota,
                    'dbldt_item' => $request->kode[$i],
                    'dbldt_qty' => $request->qty[$i],
                    'dbldt_unit_price' => $request->price[$i],
                    'dbldt_line_total' => $request->total[$i],
                    'dbldt_created_at' => Carbon::now('Asia/Jakarta'),
                  ]);
              }
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
