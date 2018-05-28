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

        $item = DB::table('m_item')
                      ->get();

        $data = DB::table('d_quotation')
                  ->where('q_id',$id)
                  ->first();

        $data_dt = DB::table('d_quotation_dt')
                  ->where('qd_id',$id)
                  ->orderBy('qd_dt','ASC')
                  ->get();


        $bulan = Carbon::parse($data->q_date)->format('m');
        $tahun = Carbon::parse($data->q_date)->format('Y');

        $cari_nota = DB::select("SELECT  substring(max(so_nota),4,3) as id from d_sales_order
                                        WHERE MONTH(so_date) = '$bulan'
                                        AND YEAR(so_date) = '$tahun'");
        $index = filter_var($cari_nota[0]->id,FILTER_SANITIZE_NUMBER_INT);

        $index = (integer)$cari_nota[0]->id + 1;
        $index = str_pad($index, 3, '0', STR_PAD_LEFT);


        $nota = 'SO-'. $index . '/' . $data->q_type . '/' . $data->q_type_product .'/'. $bulan . $tahun;

        $marketing = DB::table('d_marketing')
                        ->get();

        for ($i=0; $i < count($marketing); $i++) { 
            if ($marketing[$i]->mk_id == $data->q_marketing) {
                $market = $marketing[$i]->mk_name;
            }
        }
      
        for ($i=0; $i < count($data_dt); $i++) { 
            for ($a=0; $a < count($item); $a++) { 
                if ($data_dt[$i]->qd_item == $item[$a]->i_code) {
                    $detail[$i]['nama_item'] = $item[$a]->i_name;
                    $detail[$i]['qty']       = $data_dt[$i]->qd_qty;
                    $detail[$i]['unit']      = $item[$a]->i_unit;
                    $detail[$i]['desc']      = $data_dt[$i]->qd_description;
                    $detail[$i]['price']     = $data_dt[$i]->qd_price;
                    $detail[$i]['total']     = $data_dt[$i]->qd_total;
                }
            }
        }

        return view('order/pembayarandeposit/detail_pembayarandeposit',compact('item','data','detail','id','nota','market','nama_item'));
    }

    public function save_deposit(request $req)
    {
        return DB::transaction(function() use ($req) {  

            $data = DB::table('d_quotation')
                      ->where('q_id',$req->id)
                      ->first();

            $cari = DB::table('d_sales_order')
                      ->where('so_nota',$req->so_nota)
                      ->first();

            $cari1 = DB::table('d_sales_order')
                      ->where('so_ref',$data->q_nota)
                      ->first();

            if ($cari != null) {

                if ($cari1 == null) {
                    $bulan = Carbon::parse($data->q_date)->format('m');
                    $tahun = Carbon::parse($data->q_date)->format('Y');

                    $cari_nota = DB::select("SELECT  substring(max(so_nota),4,3) as id from d_sales_order
                                                    WHERE MONTH(so_date) = '$bulan'
                                                    AND YEAR(so_date) = '$tahun'");
                    $index = filter_var($cari_nota[0]->id,FILTER_SANITIZE_NUMBER_INT);

                    $index = (integer)$cari_nota[0]->id + 1;
                    $index = str_pad($index, 3, '0', STR_PAD_LEFT);


                    $nota = 'SO-'. $index . '/' . $data->q_type . '/' . $data->q_type_product .'/'. $bulan . $tahun;
                }else{

                    return response()->json(['status' => 2]);
                }
                
            }else{

                if ($cari1 == null){
                    $nota = $req->so_nota;
                }else{
                    return response()->json(['status' => 2]);
                }
            }

            $id = DB::table('d_sales_order')
                    ->max('so_id')+1;

            $save = DB::table('d_sales_order')
                      ->insert([
                        'so_id'         => $id,
                        'so_nota'       => $nota,
                        'so_ref'        => $data->q_nota,
                        'so_note'       => $req->nota1,
                        'so_type'       => $req->payment_type,
                        'so_amount'     => filter_var($req->dp,FILTER_SANITIZE_NUMBER_INT)/100,
                        'so_remain'     => filter_var($req->remain,FILTER_SANITIZE_NUMBER_INT)/100,
                        'so_method'     => $req->pay_method,
                        'so_note2'      => $req->nota2,
                        'so_account'    => $req->akun,
                        'so_date'       => carbon::parse($req->date)->format('Y-m-d'),
                        'so_update_at'  => carbon::now(),
                        'so_update_by'  => Auth::user()->m_name,
                        'so_create_by'  => Auth::user()->m_name,
                      ]);

            $update = DB::table('d_quotation')  
                        ->where('q_id',$req->id)
                        ->update([
                            'q_dp'     => filter_var($req->dp,FILTER_SANITIZE_NUMBER_INT)/100,
                            'q_remain' => filter_var($req->remain,FILTER_SANITIZE_NUMBER_INT)/100,
                        ]);

            return response()->json(['status' => 1]);
        });
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
