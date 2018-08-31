<?php

namespace App\Http\Controllers\purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use Yajra\Datatables\Datatables;
use DB;

class belanjalangsungController extends Controller
{
   public function belanjalangsung()
    {   
        
        return view('purchase/belanjalangsung/belanjalangsung');
    }
    public function tambah_belanjalangsung(Request $request)
    {
        $vendor = DB::table('m_vendor')->get();

        $kode = DB::table('d_belanja_langsung')->max('dbl_id');
            if ($kode == null) {
                $kode = 1;
            }else{
                $kode += 1;
            }
        $index = str_pad($kode, 3, '0', STR_PAD_LEFT);
        $date = date('my');
        $nota = 'BL-'.$index.'/'.$request->cari_vendor.'/'.$date;

        $item = DB::table('m_item')->leftjoin('i_stock_gudang','i_stock_gudang.sg_iditem','=','m_item.i_Code')->get();

        return view('purchase/belanjalangsung/tambah',compact('vendor','nota','item'));
    }
    

    public function hub_suplier(Request $request)
    {
       
    }
}
