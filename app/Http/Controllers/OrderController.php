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
    public function detail_s_invoice()
    {
      return view('order/s_invoice/detail_s_invoice');
    }
    public function print_salesinvoice(){
      return view('order.s_invoice.print_salesinvoice');
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
                            $temp = 0;
                            $total = DB::table('d_quotation_dt')
                                       ->where('qd_id',$data->q_id)
                                       ->get();

                            foreach ($total as $key => $value) {
                              $temp += $value->qd_total;
                            }
                            return 'Rp. '. number_format($temp, 2, ",", ".");
                        })
                        ->addColumn('status', function ($data) {
                            if ($data->so_status == 'Released') {
                                return  '<span class="badge badge-pill badge-primary">Released</span>';
                            }else{
                                return  '<span class="badge badge-pill badge-success">Printed</span>';
                            }

                        })
                        ->addColumn('customer', function ($data) {
                            $cus = DB::table('m_customer')
                                     ->get();
                            foreach ($cus as $key => $value) {
                              if ($value->c_code == $data->q_customer) {
                                return $value->c_name;
                              }
                            }
                        })
                        ->rawColumns(['aksi', 'detail','histori','total','status','dp','remain','total','customer'])
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
                       ->join('d_unit','i_unit','=','u_id')
                       ->where('qd_id',$head->q_id)
                       ->where('i_jenis','!=','JASA')
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
     public function datatable_wo()
    {
        $data = DB::table('d_work_order')
          ->join('d_quotation','wo_ref','=','q_nota')
          ->where('q_status',1)
          ->orderBy('q_id','DESC')
          ->get();


        // return $data;
        $data = collect($data);
        // return $data;
        return Datatables::of($data)
                        ->addColumn('aksi', function ($data) {
                            return '<div class="btn-group">
                                        <a href="'.url('order/workorder/s_order/detail_workorder'). '/' . $data->wo_id.'" class="btn btn-info btn-sm">Detail</a>
                                        <a onclick="printing(\''.$data->wo_id.'\')" style="color:white" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
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
                            $temp = 0;
                            $total = DB::table('d_quotation_dt')
                                       ->where('qd_id',$data->q_id)
                                       ->get();

                            foreach ($total as $key => $value) {
                              $temp += $value->qd_total;
                            }
                            return 'Rp. '. number_format($temp, 2, ",", ".");
                        })
                        ->addColumn('customer', function ($data) {
                            $cus = DB::table('m_customer')
                                     ->get();
                            foreach ($cus as $key => $value) {
                              if ($value->c_code == $data->q_customer) {
                                return $value->c_name;
                              }
                            }
                        })
                        ->addColumn('status', function ($data) {
                            if ($data->wo_status == 'Released') {
                                return  '<span class="badge badge-pill badge-primary">Released</span>';
                            }else{
                                return  '<span class="badge badge-pill badge-success">Printed</span>';
                            }

                        })
                        ->rawColumns(['aksi', 'detail','histori','total','status','dp','remain','customer'])
                        ->addIndexColumn()
                        ->make(true);
    }
    // work ORDER
    public function w_order()
    {


      return view('order/workorder/w_order');
    }

    public function detail_workorder($id)
    {
        if (Auth::user()->akses('work ORDER','print')) {
            $data = DB::table('d_work_order')
                      ->join('d_quotation','wo_ref','=','q_nota')
                      ->where('q_status',1)
                      ->where('wo_id',$id)
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

            return view('order/workorder/detail_workorder',compact('data_dt','data','market','id'));
        }
    }

    public function print_workorder(request $req)
    {
        if (Auth::user()->akses('work ORDER','print')) {

            $head = DB::table('d_work_order')
                          ->join('d_quotation','wo_ref','=','q_nota')
                          ->join('m_customer','c_code','=','q_customer')
                          ->where('q_status',1)
                          ->where('wo_id',$req->id)
                          ->orderBy('q_id','DESC')
                          ->first();

            $data = DB::table('d_quotation_dt')
                       ->join('m_item','i_code','=','qd_item')
                       ->join('d_unit','i_unit','=','u_id')
                       ->where('qd_id',$head->q_id)
                       ->where('i_jenis','JASA')
                       ->get();

            $update = DB::table('d_work_order')
                          ->where('wo_id',$req->id)
                          ->update([
                            'wo_status' => 'Printed',
                          ]);

            $count = count($data);
            $tes = 15 - $count;
            $array = [];

            if ($tes > 0) {
              for ($i=0; $i < $tes; $i++) {
                array_push($array, 'a');
              }
            }
            return view('order/workorder/print_workorder',compact('array','data','head'));
        }
    }
    public function checklist()
    {
    	return view('order/checklistform/checklistform');
    }
    public function cekbarang()
    {
      $data = DB::table('i_stock_gudang')
                ->leftjoin('m_item', 'i_code', '=', 'sg_iditem')
                ->select('sg_iditem', 'i_name', 'sg_qty', DB::raw('sg_qty as sum'), DB::raw('sg_qty as deficieny'))
                ->get();

      for ($i=0; $i < count($data); $i++) {
          $data[$i]->sum = DB::table('d_quotation_dt')
                              ->where('qd_item', $data[$i]->sg_iditem)
                              ->sum('qd_qty');
      }

      for ($i=0; $i < count($data); $i++) {
          $data[$i]->deficieny = (int)$data[$i]->sum - (int)$data[$i]->sg_qty;
      }

    	return view('order/cekbarang/cekbarang', compact('data'));
    }
    public function detailbarang($id){
      $id = decrypt($id);

      $data = DB::table('d_quotation_dt')
                  ->join('m_item', 'i_code', '=', 'qd_item')                  
                  ->where('qd_item', $id)
                  ->get();

      return view('order.cekbarang.detailbarang', compact('data'));
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
                  ->join('m_customer', 'c_code', '=', 'q_customer')
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
                        ->addColumn('status_so', function ($data) {
                            $so = DB::table('d_quotation')
                                      ->leftjoin('d_sales_order','q_nota','=','so_ref')
                                      ->where('q_id',$data->q_id)
                                      ->first();

                            if ($so->so_status != null) {
                                if ($so->so_status != 'Released') {
                                    return  '<span class="badge badge-pill badge-success">Printed</span>';
                                }else{
                                    return  '<span class="badge badge-pill badge-primary">Released</span>';
                                }
                            }else{
                                return  '<span class="badge badge-pill badge-danger">Non SO</span>';
                            }

                        })->addColumn('status_wo', function ($data) {
                            $wo = DB::table('d_quotation')
                                      ->leftjoin('d_work_order','q_nota','=','wo_ref')
                                      ->where('q_id',$data->q_id)
                                      ->first();
                            if ($wo->wo_status != null) {
                                if ($wo->wo_status != 'Released') {
                                    return  '<span class="badge badge-pill badge-success">Printed</span>';
                                }else{
                                    return  '<span class="badge badge-pill badge-primary">Released</span>';
                                }
                            }else{
                                return  '<span class="badge badge-pill badge-danger">Non WO</span>';
                            }

                        })
                        ->rawColumns(['aksi', 'detail','histori','total','status_so','dp','remain','status_wo'])
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
                  ->where('q_id',$id)
                  ->first();


        $so = DB::table('d_quotation')
                  ->leftjoin('d_sales_order','q_nota','=','so_ref')
                  ->where('q_id',$id)
                  ->first();
        $so_dt = DB::table("d_quotation_dt")
                   ->join('m_item','qd_item','=','i_code')
                   ->where('qd_id',$id)
                   ->where('i_jenis','!=','JASA')
                   ->first();

        $wo = DB::table('d_quotation')
                  ->leftjoin('d_work_order','q_nota','=','wo_ref')
                  ->where('q_id',$id)
                  ->first();

        $wo_dt = DB::table("d_quotation_dt")
                   ->join('m_item','qd_item','=','i_code')
                   ->where('qd_id',$id)
                   ->where('i_jenis','JASA')
                   ->first();

        $bulan = Carbon::now()->format('m');
        $tahun = Carbon::now()->format('Y');
        // NOTA SO
        $cari_nota = DB::select("SELECT  substring(max(so_nota),4,3) as id from d_sales_order
                                        WHERE MONTH(so_date) = '$bulan'
                                        AND YEAR(so_date) = '$tahun'");
        $index = filter_var($cari_nota[0]->id,FILTER_SANITIZE_NUMBER_INT);

        $index = (integer)$cari_nota[0]->id + 1;
        $index = str_pad($index, 3, '0', STR_PAD_LEFT);

        $nota_so = '';
        if ($so_dt != null) {
            $nota_so = 'SO-'. $index . '/' . $data->q_type . '/' . $data->q_type_product .'/'. $bulan . $tahun;
        }
        // NOTA WO
        $cari_nota = DB::select("SELECT  substring(max(wo_nota),4,3) as id from d_work_order
                                        WHERE MONTH(wo_date) = '$bulan'
                                        AND YEAR(wo_date) = '$tahun'");
        $index = filter_var($cari_nota[0]->id,FILTER_SANITIZE_NUMBER_INT);

        $index = (integer)$cari_nota[0]->id + 1;
        $index = str_pad($index, 3, '0', STR_PAD_LEFT);

        $nota_wo = '';
        if ($wo_dt != null) {
            $nota_wo = 'WO-'. $index . '/' . $data->q_type . '/' . $data->q_type_product .'/'. $bulan . $tahun;
        }
        // END
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

        return view('order/pembayarandeposit/detail_pembayarandeposit',compact('item','data','data_dt','id','nota_so','market','nama_item','nota_wo','so','wo'));
    }

    public function save_deposit(request $req)
    {
        return DB::transaction(function() use ($req) {

            $data = DB::table('d_quotation')
                      ->where('q_id',$req->id)
                      ->first();
            // SALES ORDER
            $cari = DB::table('d_sales_order')
                      ->where('so_nota',$req->so_nota)
                      ->first();
            $nota = $req->so_nota;
            if ($nota != '') {
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

                }
            }

            // WORK ORDER
            $cari = DB::table('d_work_order')
                      ->where('wo_nota',$req->so_nota)
                      ->first();
            $nota = $req->wo_nota;

            if ($nota != '') {
                if ($cari == null) {
                    $id = DB::table('d_work_order')
                        ->max('wo_id')+1;

                    $save = DB::table('d_work_order')
                              ->insert([
                                'wo_id'         => $id,
                                'wo_nota'       => $nota,
                                'wo_ref'        => $data->q_nota,
                                'wo_note'       => $req->nota1,
                                'wo_type'       => $req->payment_type,
                                'wo_amount'     => filter_var($req->dp,FILTER_SANITIZE_NUMBER_INT)/100,
                                'wo_remain'     => filter_var($req->remain,FILTER_SANITIZE_NUMBER_INT)/100,
                                'wo_method'     => $req->pay_method,
                                'wo_note2'      => $req->nota2,
                                'wo_account'    => $req->akun,
                                'wo_status'     => 'Released',
                                'wo_date'       => carbon::parse($req->date)->format('Y-m-d'),
                                'wo_update_at'  => carbon::now(),
                                'wo_update_by'  => Auth::user()->m_name,
                                'wo_create_by'  => Auth::user()->m_name,
                              ]);
                }else{
                    $save = DB::table('d_work_order')
                              ->where('wo_nota',$req->wo_nota)
                              ->update([
                                'wo_nota'       => $nota,
                                'wo_ref'        => $data->q_nota,
                                'wo_note'       => $req->nota1,
                                'wo_type'       => $req->payment_type,
                                'wo_amount'     => filter_var($req->dp,FILTER_SANITIZE_NUMBER_INT)/100,
                                'wo_remain'     => filter_var($req->remain,FILTER_SANITIZE_NUMBER_INT)/100,
                                'wo_method'     => $req->pay_method,
                                'wo_note2'      => $req->nota2,
                                'wo_account'    => $req->akun,
                                'wo_status'     => 'Released',
                                'wo_date'       => carbon::parse($req->date)->format('Y-m-d'),
                                'wo_update_at'  => carbon::now(),
                                'wo_update_by'  => Auth::user()->m_name,
                              ]);
                }
            }



            $update = DB::table('d_quotation')
                        ->where('q_id',$req->id)
                        ->update([
                            'q_dp'     => filter_var($req->dp,FILTER_SANITIZE_NUMBER_INT)/100,
                            'q_remain' => filter_var($req->remain,FILTER_SANITIZE_NUMBER_INT)/100,
                        ]);


            return response()->json(['status' => 1]);
        });
    }
    // =====================END PEMBAYARAN DEPOSIT=====================================================
    // =====================PAYMENT ORDER=====================================================
    public function payment_order()
    {
    	return view('order.payment_order.payment_order');
    }

    public function datatable_payment_order()
    {

        $so = DB::table('d_sales_order')
                ->select('so_ref as nota')
                ->where('so_status','Printed')
                ->get()->toArray();

        $wo = DB::table('d_work_order')
                ->select('wo_ref as nota')
                ->where('wo_status','Printed')
                ->get()->toArray();

        $temp = array_merge($so,$wo);
        $merge = [];

        for ($i=0; $i < count($temp); $i++) {
          $merge[$i] = $temp[$i]->nota;
        }
        $merge = array_unique($merge);
        $merge = array_values($merge);
        $data = DB::table('d_quotation')
                  ->join('m_customer', 'c_code', '=', 'q_customer')
                  ->where('q_status',1)
                  ->whereIn('q_nota',$merge)
                  ->orderBy('q_id','DESC')
                  ->get();

        $temp = $data;



        // return $data;
        $data = collect($data);
        // return $data;
        return Datatables::of($data)
                        ->addColumn('aksi', function ($data) {
                          if ($data->q_remain != 0) {
                            return '<a href="'.url('/order/payment_order/detail_payment_order').'/'.$data->q_id.'" class="btn btn-outline-info btn-sm">Process</a>';
                          }else{
                            return  '<span class="badge badge-pill badge-success">Paid Off</span>';
                          }
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
                            if ($data->q_remain == 0) {
                                return  '<span class="badge badge-pill badge-success">Paid Off</span>';
                            }else{
                                return  '<span class="badge badge-pill badge-warning">Not Yet</span>';
                            }

                        })
                        ->rawColumns(['aksi', 'detail','histori','total','status','dp','remain'])
                        ->addIndexColumn()
                        ->make(true);
    }

    public function detail_payment_order($id)
    {
        $item = DB::table('m_item')
                      ->get();

        $data = DB::table('d_quotation')
                  ->where('q_id',$id)
                  ->first();


        $so = DB::table('d_quotation')
                  ->leftjoin('d_sales_order','q_nota','=','so_ref')
                  ->where('q_id',$id)
                  ->first();
        $so_dt = DB::table("d_quotation_dt")
                   ->join('m_item','qd_item','=','i_code')
                   ->where('qd_id',$id)
                   ->where('i_jenis','!=','JASA')
                   ->first();

        $wo = DB::table('d_quotation')
                  ->leftjoin('d_work_order','q_nota','=','wo_ref')
                  ->where('q_id',$id)
                  ->first();

        $wo_dt = DB::table("d_quotation_dt")
                   ->join('m_item','qd_item','=','i_code')
                   ->where('qd_id',$id)
                   ->where('i_jenis','JASA')
                   ->first();

        $bulan = Carbon::parse($data->q_date)->format('m');
        $tahun = Carbon::parse($data->q_date)->format('Y');
        // NOTA PO
        $cari_nota = DB::select("SELECT  substring(max(po_nota),4,3) as id from d_payment_order
                                        WHERE MONTH(po_date) = '$bulan'
                                        AND YEAR(po_date) = '$tahun'");
        $index = filter_var($cari_nota[0]->id,FILTER_SANITIZE_NUMBER_INT);

        $index = (integer)$cari_nota[0]->id + 1;
        $index = str_pad($index, 3, '0', STR_PAD_LEFT);

        $nota_po = 'PO-'. $index . '/' . $data->q_type . '/' . $data->q_type_product .'/'. $bulan . $tahun;

        // END
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
        $validation = [];
        if ($so_dt != null or $wo_dt != null) {
          array_push($validation, 1);
        }
        if (in_array(1, $validation)) {
          if ($so->so_status == 'Printed' or $wo->wo_status == 'Printed') {
            return view('order/payment_order/detail_payment_order',compact('item','data','data_dt','id','nota_po','market','nama_item','so','wo'));
          }else{
            return redirect()->back();
          }
        }
    }

    public function save_payment_order(request $req)
    {
        return DB::transaction(function() use ($req) {
          // dd($req->all());
          $id = DB::table('d_payment_order')
              ->max('po_id')+1;

          $data = DB::table('d_quotation')
                    ->where('q_id',$req->id)
                    ->first();

          $save = DB::table('d_payment_order')
                    ->insert([
                      'po_id'         => $id,
                      'po_nota'       => $req->po_nota,
                      'po_ref'        => $data->q_nota,
                      'po_note'       => $req->nota1,
                      'po_type'       => $req->payment_type,
                      'po_total'      => filter_var($req->amount,FILTER_SANITIZE_NUMBER_INT),
                      'po_method'     => $req->pay_method,
                      'po_note2'      => $req->nota2,
                      'po_account'    => $req->akun,
                      'po_status'     => 'Released',
                      'po_date'       => carbon::parse($req->dates)->format('Y-m-d'),
                      'po_updated_at' => carbon::now(),
                      'po_created_at' => carbon::now(),
                      'po_updated_by' => Auth::user()->m_name,
                      'po_created_by' => Auth::user()->m_name,
                    ]);



          $hasil  = $data->q_remain - filter_var($req->amount,FILTER_SANITIZE_NUMBER_INT);

          $update = DB::table('d_quotation')
                      ->where('q_id',$req->id)
                      ->update([
                          'q_remain' => $hasil
                      ]);


          return response()->json(['status' => 1]);
        });
    }

    public function proforma_invoice()
    {
      return view('order.proforma_invoice.proforma_invoice');
    }

    public function datatable_proforma_invoice()
    {
      $data = DB::table('d_payment_order')
                  ->leftjoin('d_quotation', 'po_ref', '=', 'q_nota')
                  ->leftjoin('m_customer', 'c_code', '=', 'q_customer')
                  ->orderBy('po_id','DESC')
                  ->get();


      // return $data;
      $data = collect($data);
      // return $data;
      return Datatables::of($data)
                      ->addColumn('aksi', function ($data) {
                          $a =  '<div class="btn-group">';

                          if(Auth::user()->akses('PROFORMA INVOICE','ubah')){
                            $b = '<button type="button" onclick="edit(\''.$data->po_id.'\')" class="btn btn-primary btn-lg" title="edit">'.'<label class="fa fa-pencil-alt"></label></button>';
                          }else{
                            $b = '';
                          }

                          if (Auth::user()->akses('PROFORMA INVOICE','print')) {
                            $c = '<button type="button" onclick="printing(\''.$data->po_id.'\')" class="btn btn-warning btn-lg" title="edit">'.'<label class="fa fa-print"></label></button>';
                          }

                          if(Auth::user()->akses('PROFORMA INVOICE','hapus')){
                            $d = '<button type="button" onclick="hapus(\''.$data->po_id.'\')" class="btn btn-danger btn-lg" title="hapus">'.'<label class="fa fa-trash"></label></button>'.'</div>';
                          }else{
                            $d = '</div>';
                          }

                          return $a . $b .  $c . $d;
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
                      ->addColumn('status', function ($data) {

                          if ($data->po_status != 'Released') {
                              return  '<span class="badge badge-pill badge-success">Printed</span>';
                          }else{
                              return  '<span class="badge badge-pill badge-primary">Released</span>';
                          }
                      })
                      ->rawColumns(['aksi', 'detail','histori','total','status_so','dp','remain','status'])
                      ->addIndexColumn()
                      ->make(true);
    }

    public function detail_proforma_invoice($id)
    {

      $item = DB::table('m_item')
                ->get();

      $data = DB::table('d_quotation')
                ->join('d_payment_order','po_ref','=','q_nota')
                ->where('po_id',$id)
                ->first();

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
                     ->where('qd_id',$data->q_id)
                     ->get();

      if (Auth::user()->akses('PROFORMA INVOICE','ubah')) {
        return view('order/proforma_invoice/detail_proforma_invoice',compact('item','data','data_dt','id','market','nama_item'));
      }else{
        return redirect()->back();
      }
    }

    public function save_proforma_invoice(request $req)
    {
        return DB::transaction(function() use ($req) {

          // PENGEMBALIAN NILAI QUOTATION

          $data = DB::table('d_payment_order')
                    ->join('d_quotation','q_nota','=','po_ref')
                    ->where('po_id',$req->id)
                    ->first();
          $hasil = $data->q_remain + $data->po_total;

          $update = DB::table('d_quotation')
                      ->where('q_id',$data->q_id)
                      ->update([
                          'q_remain' => $hasil
                      ]);
          // UPDATE PAYMENT ORDER

          $save = DB::table('d_payment_order')
                    ->where('po_id',$req->id)
                    ->update([
                      'po_note'       => $req->nota1,
                      'po_type'       => $req->payment_type,
                      'po_total'      => filter_var($req->amount,FILTER_SANITIZE_NUMBER_INT),
                      'po_method'     => $req->pay_method,
                      'po_note2'      => $req->nota2,
                      'po_account'    => $req->akun,
                      'po_status'     => 'Released',
                      'po_date'       => carbon::parse($req->dates)->format('Y-m-d'),
                      'po_updated_at' => carbon::now(),
                      'po_created_at' => carbon::now(),
                      'po_updated_by' => Auth::user()->m_name,
                      'po_created_by' => Auth::user()->m_name,
                    ]);

          $fix  = $hasil - filter_var($req->amount,FILTER_SANITIZE_NUMBER_INT);

          $update = DB::table('d_quotation')
                      ->where('q_id',$data->q_id)
                      ->update([
                          'q_remain' => $fix
                      ]);
        return response()->json(['status' => 1]);
        });
    }

    public function hapus_proforma_invoice(request $req)
    {
        return DB::transaction(function() use ($req) {
          $data = DB::table('d_payment_order')
                    ->join('d_quotation','q_nota','=','po_ref')
                    ->where('po_id',$req->id)
                    ->first();
          $hasil = $data->q_remain + $data->po_total;

          $update = DB::table('d_quotation')
                      ->where('q_id',$data->q_id)
                      ->update([
                          'q_remain' => $hasil
                      ]);

          $hapus = DB::table('d_payment_order')
                    ->where('po_id',$req->id)
                    ->delete();
          return response()->json(['status' => 1]);
        });
    }
}
