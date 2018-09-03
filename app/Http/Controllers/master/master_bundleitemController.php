<?php

namespace App\Http\Controllers\master;
use App\Http\Controllers\Controller;
use Illuminate\Http\request;
use App\Barang;
use Yajra\Datatables\Datatables;
use DB;
use Response;
use Carbon\carbon;
use Auth;
class master_bundleitemController extends Controller
{
 	

 	public function bundleitem()
 	{
 		$item = DB::table('m_item')->get();

 		return view('master/bundle/bundle',compact('item'));
 	}
 	public function datatable_bundleitem()
 	{
 		$list = DB::table('m_item')
 				  ->where('i_jenis','BUNDLE')
 				  ->get();
        $data = collect($list);
        
        // return $data;

        return Datatables::of($data)
        	
                ->addColumn('aksi', function ($data) {
                          $a =  '<div class="btn-group">';

                            if(Auth::user()->akses('MASTER DATA BUNDLE ITEM','ubah')){
                             $b = '<button type="button" onclick="edit(\''.$data->i_id.'\')" class="btn btn-primary btn-lg" title="edit">'.'<label class="fa fa-pencil-alt"></label></button>';
                            }else{
                              $b = '';
                            }

                            // if(Auth::user()->akses('MASTER DATA BUNDLE ITEM','print')){
                            //  $c = 
                            //  '<button type="button" onclick="printing(\''.$data->i_id.'\')" class="btn btn-info btn-lg" title="print">'.'<label class="fa fa-print"></label></button>';
                            // }else{
                            //   $c = '';
                            // }

                            if(Auth::user()->akses('MASTER DATA BUNDLE ITEM','hapus')){
                             $d = 
                                 '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
                                 '<label class="fa fa-trash"></label></button>';
                            }else{
                              $d = '';
                            }

                            
                            $e = '</div>';

                        return $a . $b  . $d .$e ;
                })
                ->addColumn('none', function ($data) {
                    return '-';
                })
                ->addIndexColumn()
                  ->rawColumns(['aksi','confirmed'])
        		->make(true);
 	}
 	public function edit_bundle($id)
 	{		 

 		$data = DB::table("m_item")
              ->where('i_id',$id)
              ->first();

    $data_dt = DB::table('m_item_dt')
                  ->join('m_item','i_code','=','id_item')
                  ->where('id_id',$id)
                  ->get();

    $item = DB::table('m_item')->get();

 		return view('master/bundle/edit_bundle',compact('data','data_dt','item','id'));
 	}
 	public function cari_item(request $req)
 	{
 		$data = DB::table('m_item')
          ->join('d_unit','u_id','=','i_unit')
          ->leftjoin('m_currency','cu_code','=','i_currency_id')
 				  ->where('i_code',$req->kode)
 				  ->first();

 		return Response::json(['data'=>$data]);

 	}
 	public function simpan_bundleitem(request $req)
 	{
    	return DB::transaction(function() use ($req) {  
        $nama = Auth::user()->m_name;
        $m1 = DB::table('m_item')->where('i_jenis','BUNDLE')->max('i_id');
        $index = DB::table('m_item')->max('i_id')+1;
            
        // dd($req->all());                               

        if($index<=9)
        {
            $id_auto = 'BND/000'.$index;
        }
        else if($index<=99)
        {
            $id_auto = 'BND/00'.$index;
        }
        else if($index<=999)
        {
            $id_auto = 'BND/0'.$index;
        }
        else {
            $id_auto = 'BND/'.$index;
        }

        $save = DB::table('m_item')->insert([
                  'i_id'          =>  $index,
                  'i_code'        =>  $id_auto,
                  'i_name'        =>  $req->ib_name,
                  'i_unit'        =>  4,
                  'i_price'       =>  filter_Var($req->ib_price,FILTER_SANITIZE_NUMBER_INT),
                  'i_sell_price'  =>  filter_Var($req->sell_price,FILTER_SANITIZE_NUMBER_INT),
                  'i_lower_price' =>  filter_Var($req->lower_price,FILTER_SANITIZE_NUMBER_INT),
                  'i_active'      =>  'Y',
                  'i_jenis'       =>  'BUNDLE',
                  'i_type'        =>  0,
                  'i_minstock'    =>  0,
                  'i_image'       =>  0,
                  'i_weight'      =>  0,
                  'i_description' =>  $req->keterangan,
                  'i_insert_at'   =>  Carbon::now(),
                  'i_update_at'   =>  Carbon::now(),
                  'i_insert_by'   =>  $nama,
                  'i_update_by'   =>  $nama,
              ]);

        for ($i=0; $i < count($req->ib_kode_dt); $i++) { 
          $dt = DB::table('m_item_dt')->max('id_id')+1;

          $save = DB::table('m_item_dt')->insert([
                  'id_id'           =>  $index,
                  'id_detailid'     =>  $i+1,
                  'id_item'         =>  $req->ib_kode_dt[$i],
                  'id_unit'         =>  $req->ib_unit_dt[$i],
                  'id_qty'          =>  $req->ib_qty_dt[$i],
                  'id_price_unit'   =>  filter_Var($req->ib_price_dt[$i],FILTER_SANITIZE_NUMBER_INT),
                  'id_total_price'  =>  filter_Var($req->ib_total_price[$i],FILTER_SANITIZE_NUMBER_INT),
                  'id_insert_at'    =>  Carbon::now(),
                  'id_update_at'    =>  Carbon::now(),
                  'id_insert_by'    =>  $nama,
                  'id_update_by'    =>  $nama,
                ]);
        }
        // dd($save);
        return Response::json(['status'=>1]);
    	});
 	}
 	public function update_bundleitem(request $req)
 	{
 		return DB::transaction(function() use ($req) {  
    		// dd($req->all());

        $nama = Auth::user()->m_name;
        $save = DB::table('m_item')->where('i_id',$req->id)->update([
                  'i_name'        =>  $req->ib_name,
                  'i_unit'        =>  4,
                  'i_price'       =>  filter_Var($req->ib_price,FILTER_SANITIZE_NUMBER_INT),
                  'i_sell_price'  =>  filter_Var($req->sell_price,FILTER_SANITIZE_NUMBER_INT),
                  'i_lower_price' =>  filter_Var($req->lower_price,FILTER_SANITIZE_NUMBER_INT),
                  'i_active'      =>  'Y',
                  'i_jenis'       =>  'BUNDLE',
                  'i_type'        =>  0,
                  'i_minstock'    =>  0,
                  'i_image'       =>  0,
                  'i_weight'      =>  0,
                  'i_description' =>  $req->keterangan,
                  'i_update_at'   =>  Carbon::now(),
                  'i_update_by'   =>  $nama,
              ]);

        $dt = DB::table('m_item_dt')->where('id_id',$req->id)->delete();
        // dd($dt);
        for ($i=0; $i < count($req->ib_kode_dt); $i++) { 

          $save = DB::table('m_item_dt')->insert([
                  'id_id'           =>  $req->id,
                  'id_detailid'     =>  $i+1,
                  'id_item'         =>  $req->ib_kode_dt[$i],
                  'id_unit'         =>  $req->ib_unit_dt[$i],
                  'id_qty'          =>  $req->ib_qty_dt[$i],
                  'id_price_unit'   =>  filter_Var($req->ib_price_dt[$i],FILTER_SANITIZE_NUMBER_INT),
                  'id_total_price'  =>  filter_Var($req->ib_total_price[$i],FILTER_SANITIZE_NUMBER_INT),
                  'id_insert_at'    =>  Carbon::now(),
                  'id_update_at'    =>  Carbon::now(),
                  'id_insert_by'    =>  $nama,
                  'id_update_by'    =>  $nama,
                ]);
        }
        return Response::json(['status'=>1]);
    });
 	}
 	public function dataedit_bundleitem(request $req)
 	{
 		$data_head = DB::table('m_item')->where('m_id','=',$req->id)->get();
 		$data_seq = DB::table('m_item_dt')->where('id_id','=',$req->id)->get();
 		$item = DB::table('m_item')->select('i_code','i_name','i_price')->get();
 		return response()->json([$data_head,$data_seq]);
    	// return view('master/bundle/ajax_update',compact('item','data_head','data_seq'));
 	}
 	public function detail_bundleitem(request $req)
 	{
 		$data = DB::table('m_item_dt')->join('m_item','m_item.i_code','=','m_item_dt.ibd_barang')->where('i_id','=',$req->id)->get();
    	return response()->json($data);
 	}
 	public function hapus_bundleitem(request $req)
 	{	
 		// dd($req->all());
 		$data_head = DB::table('m_item')->where('i_code','=',$req->id)->delete();
    	return response()->json(['status'=>1]);
 	}
}
