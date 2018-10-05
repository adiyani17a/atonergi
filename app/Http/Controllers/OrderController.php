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

    public function datatable_so()
    {
        $data = DB::table('d_sales_order')
          ->join('d_quotation','so_ref','=','q_nota')
          ->where('q_status',1)
          ->orderBy('q_id','DESC')
          ->get();


        // return $data;
        $data = collect($data);
        // return $data;
        return Datatables::of($data)
                        ->addColumn('aksi', function ($data) {
                            return '<div class="btn-group">
                                        <a href="'.url('order/salesorder/s_order/detail_salesorder'). '/' . $data->so_id.'" class="btn btn-info btn-sm">Detail</a>
                                        <a onclick="printing(\''.$data->so_id.'\')" style="color:white" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                    </div>';
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
                            if ($data->so_status == 'Released') {
                                return  '<span class="badge badge-pill badge-primary">Released</span>';
                            }else{
                                return  '<span class="badge badge-pill badge-success">Printed</span>';
                            }

                        })
                        ->rawColumns(['aksi', 'detail','histori','total','status','dp','remain'])
                        ->addIndexColumn()
                        ->make(true);
    }
    // SALES ORDER
    public function s_order()
    {


    	return view('order/salesorder/s_order');
    }

    public function detail_salesorder($id)
    {
        if (Auth::user()->akses('SALES ORDER','print')) {
            $data = DB::table('d_sales_order')
                      ->join('d_quotation','so_ref','=','q_nota')
                      ->where('q_status',1)
                      ->where('so_id',$id)
                      ->orderBy('q_id','DESC')
                      ->first();

            $marketing = DB::table('d_marketing')
                        ->get();
            $market = '';
            for ($i=0; $i < count($marketing); $i++) {
                if ($marketing[$i]->mk_id == $data->q_marketing) {
                    $market = $marketing[$i]->mk_code. ' - ' .$marketing[$i]->mk_name;
                }
            }

            $item = DB::table('m_item')
                      ->get();

            $data_dt = DB::table('d_quotation_dt')
                       ->join('m_item','i_code','=','qd_item')
                       ->where('qd_id',$id)
                       ->get();

            return view('order/salesorder/detail_salesorder',compact('data_dt','data','market','id'));
        }
    }

    public function print_salesorder($id)
    {
        if (Auth::user()->akses('SALES ORDER','print')) {

            $head = DB::table('d_sales_order')
                          ->join('d_quotation','so_ref','=','q_nota')
                          ->join('m_customer','c_code','=','q_customer')
                          ->where('q_status',1)
                          ->where('so_id',$id)
                          ->orderBy('q_id','DESC')
                          ->first();

            $data = DB::table('d_quotation_dt')
                       ->join('m_item','i_code','=','qd_item')
                       ->where('qd_id',$head->q_id)
                       ->get();

            $update = DB::table('d_sales_order')
                          ->where('so_id',$id)
                          ->update([
                            'so_status' => 'Printed',
                          ]);

            $count = count($data);
            $tes = 15 - $count;
            $array = [];

            if ($tes > 0) {
              for ($i=0; $i < $tes; $i++) {
                array_push($array, 'a');
              }
            }
            return view('order/salesorder/print_salesorder',compact('array','data','head'));
        }
    }
    // ===================END SALES ORDER=========================
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
                  ->leftjoin('d_sales_order','so_ref','=','q_nota')
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
                            if ($data->so_status == 'Released') {
                                return  '<span class="badge badge-pill badge-primary">Released</span>';
                            }else{
                                return  '<span class="badge badge-pill badge-success">Printed</span>';
                            }
                        })
                        ->rawColumns(['aksi', 'detail','histori','total','status','dp','remain'])
                        ->addIndexColumn()
                        ->make(true);
    }
    public function pembayarandeposit()
    {

    	return view('order/pembayarandeposit/pembayarandeposit');
    }
    public function detail_pembayarandeposit($id)
    {

        $item = DB::table('m_item')
                      ->get();

        $data = DB::table('d_quotation')
                  ->leftjoin('d_sales_order','q_nota','=','so_ref')
                  ->where('q_id',$id)
                  ->first();

        $bulan = Carbon::parse($data->q_date)->format('m');
        $tahun = Carbon::parse($data->q_date)->format('Y');

        $cari_nota = DB::select("SELECT  substring(max(so_nota),4,3) as id from d_sales_order
                                        WHERE MONTH(so_date) = '$bulan'
                                        AND YEAR(so_date) = '$tahun'");
        $index = filter_var($cari_nota[0]->id,FILTER_SANITIZE_NUMBER_INT);

        $index = (integer)$cari_nota[0]->id + 1;
        $index = str_pad($index, 3, '0', STR_PAD_LEFT);


        $nota = 'SO-'. $index . '/' . $data->q_type . '/' . $data->q_type_product .'/'. $bulan . $tahun;
        $market = '';
        $marketing = DB::table('d_marketing')
                        ->get();

        for ($i=0; $i < count($marketing); $i++) {
            if ($marketing[$i]->mk_id == $data->q_marketing) {
                $market = $marketing[$i]->mk_code. ' - ' .$marketing[$i]->mk_name;
            }
        }

        $data_dt = DB::table('d_quotation_dt')
                       ->join('m_item','i_code','=','qd_item')
                       ->where('qd_id',$id)
                       ->get();

        return view('order/pembayarandeposit/detail_pembayarandeposit',compact('item','data','data_dt','id','nota','market','nama_item'));
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
            $nota = $req->so_nota;
            if ($cari == null) {
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
                            'so_status'     => 'Released',
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

            }else{
                $save = DB::table('d_sales_order')
                          ->where('so_nota',$req->so_nota)
                          ->update([
                            'so_nota'       => $nota,
                            'so_ref'        => $data->q_nota,
                            'so_note'       => $req->nota1,
                            'so_type'       => $req->payment_type,
                            'so_amount'     => filter_var($req->dp,FILTER_SANITIZE_NUMBER_INT)/100,
                            'so_remain'     => filter_var($req->remain,FILTER_SANITIZE_NUMBER_INT)/100,
                            'so_method'     => $req->pay_method,
                            'so_note2'      => $req->nota2,
                            'so_account'    => $req->akun,
                            'so_status'     => 'Released',
                            'so_date'       => carbon::parse($req->date)->format('Y-m-d'),
                            'so_update_at'  => carbon::now(),
                            'so_update_by'  => Auth::user()->m_name,
                          ]);

                $update = DB::table('d_quotation')
                            ->where('q_id',$req->id)
                            ->update([
                                'q_dp'     => filter_var($req->dp,FILTER_SANITIZE_NUMBER_INT)/100,
                                'q_remain' => filter_var($req->remain,FILTER_SANITIZE_NUMBER_INT)/100,
                            ]);
            }


            return response()->json(['status' => 1]);
        });
    }
    // =====================END PEMBAYARAN DEPOSIT=====================================================
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
