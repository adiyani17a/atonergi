<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Carbon\Carbon;
use Validator;

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
      $data = DB::table('d_sales_order')
              ->leftjoin('d_quotation', 'q_nota', '=', 'so_ref')
              ->leftjoin('m_customer', 'c_code', '=', 'q_customer')
              ->where('so_active', 'Y')
              ->get();

    	return view('project/pengirimanbarang/pengirimanbarang', compact('data'));
    }
    public function prosespengirimanbarang($id)
    {
      $data = DB::table('d_sales_order')
          ->leftjoin('d_quotation', 'q_nota', '=', 'so_ref')
          ->leftjoin('m_customer', 'c_code', '=', 'q_customer')
          ->where('so_id', $id)
          ->get();

      $barang = DB::table('d_quotation_dt')
                ->join('m_item', 'i_code', '=', 'qd_item')
                ->join('d_unit', 'u_id', '=', 'i_unit')
                ->where('qd_id', $data[0]->q_id)
                ->get();

      for ($i=0; $i < count($barang); $i++) {
        if ($barang[$i]->qd_description == null) {
          $barang[$i]->qd_description = '';
        }
      }

    	return view('project/pengirimanbarang/prosespengirimanbarang', compact('data', 'barang'));
    }
    public function edit(Request $request){
      $so = DB::table('d_sales_order')
              ->select('so_nota')
              ->Where('so_id', $request->id)
              ->get();

      $data = DB::table('d_delivery')
                ->select('d_so', 'd_delivery_date')
                ->where('d_so', $so[0]->so_nota)
                ->get();

      $data[0]->d_delivery_date = Carbon::parse($data[0]->d_delivery_date)->format('d-m-Y');

      return response()->json($data);
    }
    public function proses(Request $request){
      DB::beginTransaction();
      try {

        $id = DB::table('d_delivery')
              ->max('d_id');

              if ($id < 0) {
                $id = 0;
              }

              $kode = "";

        $querykode = DB::select(DB::raw("SELECT MAX(MID(d_do,4,3)) as counter FROM d_delivery"));

        if (count($querykode) > 0) {
            foreach($querykode as $k)
              {
                $tmp = ((int)$k->counter)+1;
                $kode = sprintf("%02s", $tmp);
              }
        } else {
          $kode = "001";
        }


        $finalkode = 'DO-' . $kode . '/' . date('m') . date('Y');

        $d_shipping_charges = str_replace('Rp. ', '', $request->d_shipping_charges);
        $d_shipping_charges = str_replace('.', '', $d_shipping_charges);

        DB::table('d_delivery')
          ->insert([
            'd_id' => $id + 1,
            'd_so' => $request->d_so,
            'd_do' => $finalkode,
            'd_status' => 'PD',
            'd_delivery_date' => Carbon::parse($request->d_delivery_date)->format('Y-m-d'),
            'd_weight' => $request->d_weight,
            'd_shipping charges' => $d_shipping_charges,
            'd_active' => 'Y',
            'd_insert' => Carbon::now('Asia/Jakarta')
          ]);

          DB::table('d_sales_order')
            ->where('so_nota', $request->d_so)
            ->update([
              'so_status_delivery' => 'PD',
              'so_active' => 'Y'
            ]);

        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
      } catch (Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'gagal'
        ]);
      }

    }
    public function setting(Request $request){
      DB::beginTransaction();
      try {
        $validation = Validator::make($request->all(), [
                 'd_delivery_date' => 'required',
                 'd_so' => 'required',
                 'd_receiver' => 'required',
                 'd_receive_date' => 'required',
             ]);

       if ($validation->fails()) {
           return response()->json([
             'status' => 'kesalahan'
           ]);
        } else {
          DB::table('d_delivery')
            ->where('d_so', $request->d_so)
            ->update([
              'd_delivery_date' => Carbon::parse($request->d_delivery_date)->format('Y-m-d'),
              'd_receive_date' => Carbon::parse($request->d_receive_date)->format('Y-m-d'),
              'd_receiver' => $request->d_receiver,
              'd_status' => 'D',
              'd_update' => Carbon::now('Asia/Jakarta')
            ]);

          DB::table('d_sales_order')
            ->where('so_nota', $request->d_so)
            ->update([
              'so_status_delivery' => 'D'
            ]);
        }
        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
      } catch (Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'gagal'
        ]);
      }

    }
    public function hapus(Request $request){
    DB::beginTransaction();
    try {

      $so = DB::table('d_sales_order')
        ->where('so_id', $request->id)
        ->get();

      DB::table('d_sales_order')
        ->where('so_id', $request->id)
        ->update([
          'so_active' => 'N'
        ]);

      $check = DB::table('d_delivery')
                ->where('d_so', $so[0]->so_nota)
                ->count();

      if ($check != 0) {
        DB::table('d_delivery')
            ->where('d_so', $so[0]->so_nota)
            ->update([
              'd_active' => 'N',
              'd_update' => Carbon::now('Asia/Jakarta')
            ]);
      }

      DB::commit();
      return response()->json([
        'status' => 'berhasil'
      ]);
    } catch (Exception $e) {
      DB::rollback();
      return response()->json([
        'status' => 'gagal'
      ]);
    }

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
