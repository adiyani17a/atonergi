<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Auth;
use DB;
use carbon\carbon;
use Session;
use App\mMember;
use Illuminate\Support\Facades\Crypt;
use Response;
use PDF;    

class OrderController extends Controller
{
    public function s_invoice()
    {
    	return view('order/s_invoice/s_invoice');
    }
    public function s_order()
    {
    	return view('order/salesorder/s_order');
    }
    public function w_order()
    {
    	return view('order/workorder/w_order');
    }
    public function checklist()
    {
    	return view('order/checklistform/checklistform');
    }
    public function cekbarang()
    {
    	return view('order/cekbarang/cekbarang');
    }
    public function f_penjualan()
    {
    	return view('order/f_penjualan/f_penjualan');
    }
    public function proforma()
    {
    	return view('order/proforma/proforma');
    }
    // pembayaran deposit
    public function datatable_deposit()
    {
        $data = DB::table('d_quotation')
                  ->where('q_status',1)
                  ->orderBy('q_id','DESC')
                  ->get();
        
        
        // return $data;
        $data = collect($data);
        // return $data;
        return Datatables::of($data)
                        ->addColumn('aksi', function ($data) {
                            return '<a href="'.url('/order/pembayarandeposit/pembayarandeposit/detail_pembayarandeposit').'/'.$data->q_id.'" class="btn btn-outline-info btn-sm">Process</a>';                               
                        })
                        ->addColumn('none', function ($data) {
                            return '-';
                        })
                        ->addColumn('detail', function ($data) {
                            return '<button class="btn btn-outline-primary btn-sm" onclick="detail(this)" data-toggle="modal" data-target="#detail_item">Detail</button>';
                        })
                        ->addColumn('histori', function ($data) {
                            return '<button onclick="histori(this)" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#detail_status">Detail</button>';
                        })
                        ->addColumn('total', function ($data) {
                            return 'Rp. '. number_format($data->q_total, 2, ",", ".");
                        })
                        ->addColumn('dp', function ($data) {
                            return 'Rp. '. number_format($data->q_dp, 2, ",", ".");
                        })
                        ->addColumn('remain', function ($data) {
                            return 'Rp. '. number_format($data->q_remain, 2, ",", ".");
                        })
                        ->addColumn('status', function ($data) {
                            $s = DB::table('d_status')
                                      ->where('s_id',$data->q_status)
                                      ->first();

                            return  '<span class="badge badge-pill badge-'.$s->s_color.'">'.$s->s_name.'</span>'.
                                    '<input type="hidden" class="q_id" value="'.$data->q_id.'">';
                        })
                        ->rawColumns(['aksi', 'detail','histori','total','status','dp','remain'])
                        ->addIndexColumn()
                        ->make(true);
    }
    public function pembayarandeposit()
    {

    	return view('order/pembayarandeposit/pembayarandeposit');
    }
    // end
    public function detail_pembayarandeposit($id)
    {   
        $customer = DB::table('m_customer')
                  ->get();

        $marketing = DB::table('d_marketing')
                      ->get();

        $item = DB::table('m_item')
                      ->get();

        $data = DB::table('d_quotation')
                  ->where('q_id',$id)
                  ->first();

        $data_dt = DB::table('d_quotation_dt')
                  ->where('qd_id',$id)
                  ->get();

        $now = carbon::now()->format('d-m-Y');



        return view('order/pembayarandeposit/detail_pembayarandeposit',compact('customer','marketing','now','item','data','data_dt','id'));
    }
    public function detail_salesorder()
    {
        return view('order/salesorder/detail_salesorder');
    }
    public function pelunasanorder()
    {
    	return view('order/pelunasanorder/pelunasanorder');
    }
    public function detail_workorder()
    {
        return view('order/workorder/detail_workorder');
    }
    public function detail_pelunasanorder()
    {
        return view('order/pelunasanorder/detail_pelunasanorder');
    }
    public function print_salesorder()
    {
        return view('order/salesorder/print_salesorder');
    }
    public function print_workorder()
    {
        return view('order/workorder/print_workorder');
    }
    public function print_checklistform()
    {
        return view('order/checklistform/print_checklistform');
    }
    public function print_salesinvoice()
    {
        return view('order/s_invoice/print_salesinvoice');
    }
}
