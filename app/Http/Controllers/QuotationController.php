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
class QuotationController extends Controller
{
 	public function q_quotation()
 	{


    $kota_0 = DB::table('provinces')->get()->toArray();
    $kota_1 = DB::table('regencies')->get()->toArray();

    $kota = array_merge($kota_0,$kota_1);

    $customer = DB::table('m_customer')
                  ->get();

    $currency = DB::table('m_currency')
                  ->get();

    $marketing = DB::table('d_marketing')
                  ->get();

    $item = DB::table('m_item')
                  ->get();

    $type_product = DB::table('m_item_type')
                  ->get();

    $now = carbon::now()->format('d-m-Y');

    $status = DB::table('d_status')
                ->get();


 		return view('quotation/q_quotation/q_quotation',compact('customer','marketing','now','item','status','type_product','kota','currency'));
 	}

 	public function quote_datatable()
 	{
 		$data = DB::table('d_quotation')
                  ->orderBy('q_id','DESC')
                  ->get();
        
        
        // return $data;
        $data = collect($data);
        // return $data;
        return Datatables::of($data)
                        ->addColumn('aksi', function ($data) {
                           $a =  '<div class="btn-group">';

                            if(Auth::user()->akses('QUOTATION','ubah')){
                             $b = '<button type="button" onclick="edit(\''.$data->q_id.'\')" class="btn btn-primary btn-lg" title="edit">'.'<label class="fa fa-pencil-alt"></label></button>';
                            }else{
                              $b = '';
                            }

                            if(Auth::user()->akses('QUOTATION','print')){
                             $c = 
                             '<button type="button" onclick="printing(\''.$data->q_id.'\')" class="btn btn-info btn-lg" title="Print Detail">'.'<label class="fa fa-print"></label></button>'.
                             '<button type="button" onclick="printing_global(\''.$data->q_id.'\')" class="btn btn-success btn-lg" title="Print Global">'.'<label class="fa fa-print"></label></button>';
                            }else{
                              $c = '';
                            }

                            if(Auth::user()->akses('QUOTATION','hapus')){
                             $d = 
                                 '<button type="button" onclick="hapus(\''.$data->q_nota.'\')" class="btn btn-danger btn-lg" title="hapus">'.
                                 '<label class="fa fa-trash"></label></button>';
                            }else{
                              $d = '';
                            }

                            if(Auth::user()->akses('QUOTATION','tambah')){
                             $e = 
                                 '<button type="button" onclick="status(\''.$data->q_id.'\')" class="btn btn-warning btn-lg" title="update status">'.
                                 '<label class="fa fa-cog"></label></button>'. '</div>';
                                 
                            }else{
                              $e = '</div>';
                            }

                        return $a . $b .$c . $d .$e ;
                            

                                   
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
                        ->addColumn('status', function ($data) {
                            $s = DB::table('d_status')
                            		  ->where('s_id',$data->q_status)
                            		  ->first();

                           	return  '<span class="badge badge-pill badge-'.$s->s_color.'">'.$s->s_name.'</span>'.
                                    '<input type="hidden" class="q_id" value="'.$data->q_id.'">';
                        })
                        ->addColumn('customer', function ($data) {
                            $cus = DB::table('m_customer')
                                  ->where('c_code',$data->q_customer)
                                  ->first();

                            return  $cus->c_name;
                        })
                        ->rawColumns(['aksi', 'detail','histori','total','status','customer'])
                        ->addIndexColumn()
                        ->make(true);
 	}

  public function autocomplete(request $request)
  {
      $results = array();
      $queries = DB::table('m_item')
                    ->where('i_code', 'like', '%'.strtoupper($request->term).'%')
                    ->orWhere('i_name', 'like', '%'.strtoupper($request->term).'%')
                    ->take(10)->get();

      if ($queries == null){
          $results[] = [ 'id' => null, 'label' => 'Tidak ditemukan data terkait'];
      } else {

          foreach ($queries as $query)
          {
              $results[] = [ 'id' => $query->i_code,
                      'label' => $query->i_code . ' - ' . $query->i_name,
                      'validator'=>$query->i_code,
                    ];
          }
      }

      return Response::json($results);
  }

  public function customer(request $req)
  {
      $data = DB::table('m_customer')
                ->where('c_code',$req->customer)
                ->first();
      return response()->json(['data' => $data]);
  }

  public function nota_quote(request $req)
  {
    // dd($req->all());
      
      if ($req->type_q != '0' and $req->type_p != '0' and $req->date != '1') {

        $bulan = Carbon::parse($req->date)->format('m');
        $tahun = Carbon::parse($req->date)->format('Y');

        $cari_nota = DB::select("SELECT  substring(max(q_nota),4,3) as id from d_quotation
                                        WHERE q_type = '$req->type_q'
                                        AND q_type_product = '$req->type_p'
                                        AND MONTH(q_date) = '$bulan'
                                        AND YEAR(q_date) = '$tahun'");
        $index = filter_var($cari_nota[0]->id,FILTER_SANITIZE_NUMBER_INT);

        $index = (integer)$cari_nota[0]->id + 1;
        $index = str_pad($index, 3, '0', STR_PAD_LEFT);

        $nota = 'QO-'. $index . '/' . $req->type_q . '/' . $req->type_p .'/'. $bulan . $tahun;

        return response()->json(['nota'=>$nota]);
      }
        
  }

  public function append_item(request $req)
  { 


      $item = DB::table('m_item')
                ->get();

      $currency = DB::table('m_currency')
                  ->get();

      $data = DB::table('m_item')
                ->join('d_unit','u_id','=','i_unit')
                ->where('i_code',$req->item)
                ->first();

      for ($i=0; $i < count($currency); $i++) { 
        if ($data->i_currency_id == $currency[$i]->cu_code) {
          $data->i_sell_price = $data->i_sell_price * $currency[$i]->cu_value;
          $data->i_lower_price = $data->i_lower_price * $currency[$i]->cu_value;
        }
      }
      return response()->json(['data'=>$data,'item'=>$item]);
              
  }

  public function edit_item(request $req)
  {

      $data = DB::table('m_item')
                ->join('d_unit','u_id','=','i_unit')
                ->where('i_code',$req->item)
                ->first();

      $currency = DB::table('m_currency')
                  ->get();

      for ($i=0; $i < count($currency); $i++) { 
        if ($data->i_currency_id == $currency[$i]->cu_code) {
          $data->i_sell_price = $data->i_sell_price * $currency[$i]->cu_value;
          $data->i_lower_price = $data->i_lower_price * $currency[$i]->cu_value;
        }
      }

      return response()->json(['data'=>$data]);
  }

  public function save_quote(request $req)
  {
    return DB::transaction(function() use ($req) {  
      // dd($req->all());

      $id = DB::table('d_quotation')
              ->max('q_id')+1;

      $cari_quote = DB::table('d_quotation')
                      ->where('q_nota',$req->quote)
                      ->first();

      if ($cari_quote != null) {

        $bulan = Carbon::parse($req->date)->format('m');
        $tahun = Carbon::parse($req->date)->format('Y');

        $cari_nota = DB::select("SELECT  substring(max(q_nota),4,3) as id from d_quotation
                                        WHERE q_type = '$req->type_qo'
                                        AND q_type_product = '$req->type_p'
                                        AND MONTH(q_date) = '$bulan'
                                        AND YEAR(q_date) = '$tahun'");
        $index = filter_var($cari_nota[0]->id,FILTER_SANITIZE_NUMBER_INT);

        $index = (integer)$cari_nota[0]->id + 1;
        $index = str_pad($index, 3, '0', STR_PAD_LEFT);


        $quote = 'QO-'. $index . '/' . $req->type_qo . '/' . $req->type_p .'/'. $bulan . $tahun;
      }else{
        $quote = $req->quote;
      }

      $save = DB::table('d_quotation')
                ->insert([
                  'q_id'              => $id,
                  'q_nota'            => $quote,
                  'q_subtotal'        => filter_var($req->subtotal,FILTER_SANITIZE_NUMBER_INT),
                  'q_tax'             => filter_var($req->tax,FILTER_SANITIZE_NUMBER_INT),
                  'q_total'           => filter_var($req->total,FILTER_SANITIZE_NUMBER_INT),
                  'q_remain'          => filter_var($req->total,FILTER_SANITIZE_NUMBER_INT),
                  'q_customer'        => $req->customer,
                  'q_address'         => $req->address,
                  'q_type'            => $req->type_qo,
                  'q_type_product'    => $req->type_p,
                  'q_shipping_method' => $req->ship_method,
                  'q_date'            => carbon::parse($req->date)->format('Y-m-d'),
                  'q_term'            => $req->ship_term,
                  'q_delivery'        => carbon::parse($req->delivery)->format('Y-m-d'),
                  'q_ship_to'         => $req->ship_to,
                  'q_marketing'       => $req->marketing,
                  'q_status'          => 2,
                  'q_created_at'      => carbon::now(),
                  'q_update_by'       => Auth::user()->m_name,
                ]);

      $h_id = DB::table('d_quotation_history')
              ->where('qh_id',$id)
              ->max('qh_id')+1;

      $status = DB::table('d_quotation_history')
                ->insert([
                  'qh_id'              => $id,
                  'qh_dt'              => $h_id,
                  'qh_status'          => 2,
                ]);

      for ($i=0; $i < count($req->item_name); $i++) { 


        $save = DB::table('d_quotation_dt')
                ->insert([
                  'qd_id'          => $id,
                  'qd_dt'          => $i+1,
                  'qd_item'        => $req->item_name[$i],
                  'qd_qty'         => $req->jumlah[$i],
                  'qd_description' => $req->description[$i],
                  'qd_price'       => filter_var($req->unit_price[$i],FILTER_SANITIZE_NUMBER_INT),
                  'qd_total'       => filter_var($req->line_total[$i],FILTER_SANITIZE_NUMBER_INT),
                  'qd_update_by'   => Auth::user()->m_name,
             
                ]);
      }


      return response()->json(['status' => 1,'id'=>$id]);

    });
  }

  public function hapus_quote(request $req)
  {
      // dd($req->all());
      $delete = DB::table('d_quotation')  
                  ->where('q_nota',$req->nota)
                  ->delete();
      return response()->json(['status' => 1]);
  }

  public function print_quote($id)
  {
    if (Auth::user()->akses('QUOTATION','print')) {
      $head = DB::table('d_quotation')
               ->join('m_customer','c_code','=','q_customer')
               ->where('q_id',$id)
               ->first();
               
      $data = DB::table('d_quotation_dt')
              ->join('m_item','i_code','=','qd_item')
              ->where('i_jenis','!=','JASA')
              ->where('qd_id',$id)
              ->get();

      $jasa = DB::table('d_quotation_dt')
              ->join('m_item','i_code','=','qd_item')
              ->where('i_jenis','=','JASA')
              ->where('qd_id',$id)
              ->get();

      $item = DB::table('m_item')
                ->join('d_unit','u_id','=','i_unit')
                ->get();

      for ($i=0; $i < count($data); $i++) { 
        for ($a=0; $a < count($item); $a++) { 
          if ($item[$a]->i_code == $data[$i]->qd_item) {
            $data[$i]->u_unit = $item[$a]->u_unit;
          }
        }
      }

      for ($i=0; $i < count($jasa); $i++) { 
        for ($a=0; $a < count($item); $a++) { 
          if ($item[$a]->i_code == $jasa[$i]->qd_item) {
            $jasa[$i]->u_unit = $item[$a]->u_unit;
          }
        }
      }

      $count = count($data)+count($jasa);
      $tes = 15 - $count;
      $array = [];

      if ($tes > 0) {
        for ($i=0; $i < $tes; $i++) { 
          array_push($array, 'a');
        }
      }
      
     
     // $pdf = PDF::loadView('quotation/q_quotation/print_quotation', $data);
     // return $pdf->stream("test.pdf");
      $print = 'global';
      return view('quotation/q_quotation/print_quotation',compact('head','data','array','print','jasa'));
    }else{
      return redirect()->back();
    }
  }

  public function print_quote_detail($id)
  {
    if (Auth::user()->akses('QUOTATION','print')) {
      $head = DB::table('d_quotation')
               ->join('m_customer','c_code','=','q_customer')
               ->where('q_id',$id)
               ->first();
               
      $data = DB::table('d_quotation_dt')
              ->join('m_item','i_code','=','qd_item')
              ->where('i_jenis','!=','JASA')
              ->where('qd_id',$id)
              ->get();

      $jasa = DB::table('d_quotation_dt')
              ->join('m_item','i_code','=','qd_item')
              ->where('i_jenis','=','JASA')
              ->where('qd_id',$id)
              ->get();

      $item = DB::table('m_item')
                ->join('d_unit','u_id','=','i_unit')
                ->get();

      for ($i=0; $i < count($data); $i++) { 
        for ($a=0; $a < count($item); $a++) { 
          if ($item[$a]->i_code == $data[$i]->qd_item) {
            $data[$i]->u_unit = $item[$a]->u_unit;
          }
        }
      }

      for ($i=0; $i < count($jasa); $i++) { 
        for ($a=0; $a < count($item); $a++) { 
          if ($item[$a]->i_code == $jasa[$i]->qd_item) {
            $jasa[$i]->u_unit = $item[$a]->u_unit;
          }
        }
      }

      $count = count($data)+count($jasa);
      $tes = 15 - $count;
      $array = [];

      if ($tes > 0) {
        for ($i=0; $i < $tes; $i++) { 
          array_push($array, 'a');
        }
      }
      
      // return $item;
     
     // $pdf = PDF::loadView('quotation/q_quotation/print_quotation', $data);
     // return $pdf->stream("test.pdf");
      $print = 'detail';
      return view('quotation/q_quotation/print_quotation',compact('head','data','array','print','jasa'));
    }else{
      return redirect()->back();
    }
  }

  public function edit_quotation($id)
  {
    if (Auth::user()->akses('QUOTATION','ubah')) {

      $customer = DB::table('m_customer')
                    ->get();

      $marketing = DB::table('d_marketing')
                    ->get();
      
      $data = DB::table('d_quotation')
                ->where('q_id',$id)
                ->first();

      $data_dt = DB::table('d_quotation_dt')
                ->join('m_item','i_code','=','qd_item')
                ->where('qd_id',$id)
                ->get();

      $item = DB::table('m_item')
                ->join('d_unit','u_id','=','i_unit')
                ->get();

      $type_product = DB::table('m_item_type')
                  ->get();
      for ($i=0; $i < count($data_dt); $i++) { 
        for ($a=0; $a < count($item); $a++) { 
          if ($item[$a]->i_code == $data_dt[$i]->qd_item) {
            $data_dt[$i]->u_unit = $item[$a]->u_unit;
          }
        }
      }
      $now = carbon::now()->format('d-m-Y');
      return view('quotation/q_quotation/edit_quotation',compact('customer','marketing','now','item','data','data_dt','id','type_product'));
    }else{
      return redirect()->back();
    }
  }

  public function update_quote(request $req)
  {
    return DB::transaction(function() use ($req) {  
      // dd($req->all());

      $save = DB::table('d_quotation')
                ->where('q_id',$req->id)
                ->update([
                  'q_id'              => $req->id,
                  'q_nota'            => $req->quote,
                  'q_subtotal'        => filter_var($req->subtotal,FILTER_SANITIZE_NUMBER_INT),
                  'q_tax'             => filter_var($req->tax,FILTER_SANITIZE_NUMBER_INT),
                  'q_total'           => filter_var($req->total,FILTER_SANITIZE_NUMBER_INT),
                  'q_customer'        => $req->customer,
                  'q_address'         => $req->address,
                  'q_type'            => $req->type_qo,
                  'q_type_product'    => $req->type_p,
                  'q_shipping_method' => $req->ship_method,
                  'q_date'            => carbon::parse($req->date)->format('Y-m-d'),
                  'q_term'            => $req->ship_term,
                  'q_delivery'        => carbon::parse($req->delivery)->format('Y-m-d'),
                  'q_ship_to'         => $req->ship_to,
                  'q_marketing'       => $req->marketing,
                  'q_status'          => 2,
                  'q_update_by'       => Auth::user()->m_name,
                ]);

      $delete = DB::table('d_quotation_dt')
                  ->where('qd_id',$req->id)
                  ->delete();

      for ($i=0; $i < count($req->item_name); $i++) { 

        $save = DB::table('d_quotation_dt')
                ->insert([
                  'qd_id'          => $req->id,
                  'qd_dt'          => $i+1,
                  'qd_item'        => $req->item_name[$i],
                  'qd_qty'         => $req->jumlah[$i],
                  'qd_description' => $req->description[$i],
                  'qd_price'       => filter_var($req->unit_price[$i],FILTER_SANITIZE_NUMBER_INT),
                  'qd_total'       => filter_var($req->line_total[$i],FILTER_SANITIZE_NUMBER_INT),
                  'qd_update_by'   => Auth::user()->m_name,
             
                ]);
      }


      return response()->json(['status' => 1]);
    });
  }

  public function detail(request $req)
  {
    $data_dt = DB::table('d_quotation_dt')
               ->join('m_item','i_code','=','qd_item')
              ->where('qd_id',$req->id)
              ->get();

    return view('quotation/q_quotation/detail_table',compact('data_dt'));
  }

  public function histori(request $req)
  {
    $data_dt = DB::table('d_quotation_history')
               ->join('d_status','s_id','=','qh_status')
              ->where('qh_id',$req->id)
              ->get();
    return view('quotation/q_quotation/histori_status',compact('data_dt'));
  }

  public function update_status(request $req)
  {
    return DB::transaction(function() use ($req) {  
      $cari = DB::table('d_quotation_history')
                ->where('qh_id',$req->q_id_status)
                ->where('qh_status',$req->status)
                ->first();

      if ($cari == null) {
        $dt = DB::table('d_quotation_history')
                ->where('qh_id',$req->q_id_status)
                ->max('qh_dt')+1;

        $save = DB::table('d_quotation_history')
                ->insert([
                  'qh_id'     => $req->q_id_status,
                  'qh_dt'     => $dt,
                  'qh_status' => $req->status,
                ]);
      }

      $cari_status = DB::table('d_quotation')
                ->where('q_id',$req->q_id_status)
                ->where('q_status',1)
                ->first();
      if ($cari_status == null) {
        $cari_status = DB::table('d_quotation')
                        ->where('q_id',$req->q_id_status)
                        ->update([
                          'q_status' => $req->status,
                        ]);
        return response()->json(['status' => 1]);
      }else{
        return response()->json(['status' => 2]);
      }

    });
  }

  public function cari_penawaran(request $req)
  {
    $kode = DB::table('d_marketing')
              ->where('mk_id',$req->market)
              ->first();

    $item = DB::table('d_npenawaran')
              ->leftjoin('m_item','i_code','=','np_kodeitem')
              ->leftjoin('m_item','i_code','=','np_kodeitem')
              ->where('np_marketing',$kode->mk_code)
              ->get();

    return view('quotation/q_quotation/item',compact('item'));
  }
 	public function k_penawaran()
 	{
 		return view('quotation/k_penawaran/k_penawaran');
 	}
 	public function n_penawaran()
 	{
 		return view('quotation/n_penawaran/n_penawaran');
 	}
 	public function pdf_penawaran()
 	{
 		return view('quotation/pdf_penawaran/pdf_penawaran');
 	}
 	public function marketing()
 	{
 		return view('quotation/marketing/marketing');
 	}

 	public function print_quotation()
 	{
 		return view('quotation/q_quotation/print_quotation');
 	}
 		
}
