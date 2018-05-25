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

class QuotationController extends Controller
{
 	public function q_quotation()
 	{

    $customer = DB::table('m_customer')
                  ->get();

    $marketing = DB::table('d_marketing')
                  ->get();

    $item = DB::table('m_item')
                  ->get();

    $now = carbon::now()->format('d-m-Y');



 		return view('quotation/q_quotation/q_quotation',compact('customer','marketing','now','item'));
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
                          return  '<div class="btn-group">'.
                                   '<button type="button" onclick="edit(this)" class="btn btn-primary btn-lg" title="edit">'.
                                   '<label class="fa fa-pencil-alt"></label></button>'.
                                   '<button type="button" onclick="printing(this)" class="btn btn-info btn-lg" title="print">'.
                                   '<label class="fa fa-print"></label></button>'.
                                   '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
                                   '<label class="fa fa-trash"></label></button>'.
                                  '</div>';
                        })
                        ->addColumn('none', function ($data) {
                            return '-';
                        })
                        ->addColumn('detail', function ($data) {
                            return '<button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#detail_item">Detail</button>';
                        })
                        ->addColumn('histori', function ($data) {
                            return '<button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#detail_status">Detail</button>';
                        })
                        ->addColumn('total', function ($data) {
                            return 'Rp. '. number_format($data->q_total, 2, ",", ".");
                        })
                        ->addColumn('status', function ($data) {
                            $data = DB::table('d_status')
                            		  ->where('s_id',$data->q_status)
                            		  ->first();

                           	return '<span class="badge badge-pill badge-'.$data->s_color.'">'.$data->s_name.'</span>';
                        })
                        ->rawColumns(['aksi', 'detail','histori','total','status'])
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
      $data = DB::table('m_item')
                ->where('i_code',$req->item)
                ->first();

      $item = DB::table('m_item')
                  ->get();

      return response()->json(['data'=>$data,'item'=>$item]);
              
  }

  public function edit_item(request $req)
  {
      $data = DB::table('m_item')
                ->where('i_code',$req->item)
                ->first();

      return response()->json(['data'=>$data]);
  }

  public function save_quote(request $req)
  {
    return DB::transaction(function() use ($req) {  
      dd($req->all());
    });
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
 	public function edit_quotation()
 	{
 		return view('quotation/q_quotation/edit_quotation');
 	}
 	public function print_quotation()
 	{
 		return view('quotation/q_quotation/print_quotation');
 	}
 		
}
