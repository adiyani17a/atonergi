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
    public function pdf_jadwal()
    {
        return view('project/jadwalujicoba/pdf_jadwal');
    }
    public function pemasangan()
    {
      $data = DB::table('d_work_order')
              ->leftjoin('d_quotation', 'q_nota', '=', 'wo_ref')
              ->leftjoin('m_customer', 'c_code', '=', 'q_customer')
              ->leftjoin('d_install', 'i_io', '=', 'wo_nota')
              ->where('wo_active', 'Y')
              ->get();

      $countd = DB::table('d_work_order')
                ->where('wo_status_install', 'D')
                ->where('wo_active', 'Y')
                ->count();

      $countp = DB::table('d_work_order')
                ->where('wo_status_install', 'P')
                ->where('wo_active', 'Y')
                ->count();

      $countpd = DB::table('d_work_order')
                ->where('wo_status_install', 'PD')
                ->where('wo_active', 'Y')
                ->count();

    	return view('project/pemasangan/pemasangan', compact('data','countd','countp','countpd'));
    }
    public function prosespemasangan($id){
      $data = DB::table('d_work_order')
          ->leftjoin('d_quotation', 'q_nota', '=', 'wo_ref')
          ->leftjoin('m_customer', 'c_code', '=', 'q_customer')
          ->where('wo_id', $id)
          ->get();

      $barang = DB::table('d_quotation_dt')
                ->join('m_item', 'i_code', '=', 'qd_item')
                ->join('d_unit', 'u_id', '=', 'i_unit')
                ->where('qd_id', $data[0]->q_id)
                ->get();

      for ($i=0; $i < count($barang); $i++) {
        if ($barang[$i]->qd_description == null) {
          $barang[$i]->qd_description = ' ';
        }
      }

    	return view('project/pemasangan/prosespemasangan', compact('data', 'barang'));
    }
    public function simpanpemasangan(Request $request){
      DB::beginTransaction();
      try {

        $id = DB::table('d_install')
              ->max('i_id');

              if ($id < 0) {
                $id = 0;
              }

              $kode = "";

        $querykode = DB::select(DB::raw("SELECT MAX(MID(i_io,4,3)) as counter FROM d_install"));

        if (count($querykode) > 0) {
            foreach($querykode as $k)
              {
                $tmp = ((int)$k->counter)+1;
                $kode = sprintf("%02s", $tmp);
              }
        } else {
          $kode = "001";
        }


        $finalkode = 'IO-' . $kode . '/' . date('m') . date('Y');

        DB::table('d_install')
          ->insert([
            'i_id' => $id + 1,
            'i_wo' => $request->d_wo,
            'i_io' => $finalkode,
            'i_status' => 'PD',
            'i_instalation_date' => Carbon::parse($request->i_instalation_date)->format('Y-m-d'),
            'i_location' => $request->i_location,
            'i_installer' => $request->i_installer,
            'i_active' => 'Y',
            'i_insert' => Carbon::now('Asia/Jakarta')
          ]);

          DB::table('d_work_order')
            ->where('wo_nota', $request->d_wo)
            ->update([
              'wo_status_install' => 'PD',
              'wo_active' => 'Y'
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
    public function editpemasangan(Request $request){
      $wo = DB::table('d_work_order')
              ->select('wo_nota')
              ->Where('wo_id', $request->id)
              ->get();

      $data = DB::table('d_install')
                ->select('i_wo')
                ->where('i_wo', $wo[0]->wo_nota)
                ->get();

      return response()->json($data);
    }
    public function ubahpemasangan(Request $request){
      $id = $request->id;

      $data = DB::table('d_work_order')
          ->leftjoin('d_quotation', 'q_nota', '=', 'wo_ref')
          ->leftjoin('m_customer', 'c_code', '=', 'q_customer')
          ->where('wo_id', $id)
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

      $install = DB::table('d_install')
                  ->where('i_wo', $data[0]->wo_nota)
                  ->where('i_active', 'Y')
                  ->get();

      return view('project.pemasangan.editprosespemasangan', compact('data','barang','install'));
    }
    public function perbaruipemasangan(Request $request){
      DB::beginTransaction();
      try {

        DB::table('d_install')
          ->where('i_io', $request->i_io)
          ->where('i_active', 'Y')
          ->update([
            'i_instalation_date' => Carbon::parse($request->i_instalation_date)->format('Y-m-d'),
            'i_location' => $request->i_location,
            'i_installer' => $request->i_installer
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
    public function settingpemasangan(Request $request){
      DB::beginTransaction();
      try {
        $validation = Validator::make($request->all(), [
                 'i_wo' => 'required',
                 'i_report_date' => 'required',
                 'i_notes' => 'required',
             ]);

       if ($validation->fails()) {
           return response()->json([
             'status' => 'kesalahan'
           ]);
        } else {
          DB::table('d_install')
            ->where('i_wo', $request->i_wo)
            ->where('i_active', 'Y')
            ->update([
              'i_report_date' => Carbon::parse($request->d_delivery_date)->format('Y-m-d'),
              'i_notes' => $request->i_notes,
              'i_status' => 'D',
              'i_update' => Carbon::now('Asia/Jakarta')
            ]);

          DB::table('d_work_order')
            ->where('wo_nota', $request->i_wo)
            ->update([
              'wo_status_install' => 'D'
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
    public function hapuspemasangan(Request $request){
      DB::beginTransaction();
      try {

        $wo = DB::table('d_work_order')
          ->where('wo_id', $request->id)
          ->get();

        DB::table('d_work_order')
          ->where('wo_id', $request->id)
          ->update([
            'wo_active' => 'N'
          ]);

        $check = DB::table('d_install')
                  ->where('i_wo', $wo[0]->wo_nota)
                  ->count();

        if ($check != 0) {
          DB::table('d_install')
              ->where('i_wo', $wo[0]->wo_nota)
              ->update([
                'i_active' => 'N',
                'i_update' => Carbon::now('Asia/Jakarta')
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
              ->leftjoin('d_delivery', 'd_so', '=', 'so_nota')
              ->where('so_active', 'Y')
              ->get();

      $countd = DB::table('d_sales_order')
                ->where('so_status_delivery', 'D')
                ->where('so_active', 'Y')
                ->count();

      $countp = DB::table('d_sales_order')
                ->where('so_status_delivery', 'P')
                ->where('so_active', 'Y')
                ->count();

      $countpd = DB::table('d_sales_order')
                ->where('so_status_delivery', 'PD')
                ->where('so_active', 'Y')
                ->count();

    	return view('project/pengirimanbarang/pengirimanbarang', compact('data','countd','countp','countpd'));
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
          $barang[$i]->qd_description = ' ';
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
            'd_shipping_charges' => $d_shipping_charges,
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
    public function ubah(Request $request){
      $id = $request->id;

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

      $delivery = DB::table('d_delivery')
                  ->where('d_so', $data[0]->so_nota)
                  ->where('d_active', 'Y')
                  ->get();

      return view('project.pengirimanbarang.editprosespengiriman', compact('data','barang','delivery'));
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
            ->where('d_active', 'Y')
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
    public function perbarui(Request $request){
      DB::beginTransaction();
      try {
        $request->d_shipping_charges = str_replace('Rp. ','',$request->d_shipping_charges);
        $request->d_shipping_charges = str_replace('.','',$request->d_shipping_charges);

        DB::table('d_delivery')
          ->where('d_do', $request->nota)
          ->where('d_active', 'Y')
          ->update([
            'd_delivery_date' => Carbon::parse($request->d_delivery_date)->format('Y-m-d'),
            'd_weight' => $request->d_weight,
            'd_shipping_charges' => $request->d_shipping_charges
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
    public function salescommon()
    {
    	return view('project/salescommon/salescommon');
    }
    public function technicianfee()
    {
    	return view('project/technicianfee/technicianfee');
    }
}
