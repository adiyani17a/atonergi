<?php

namespace App\Http\Controllers\master;
use App\Http\Controllers\Controller;
use Illuminate\Http\request;
use App\Barang;
use Yajra\Datatables\Datatables;
use DB;
use Response;
class master_bundleitemController extends Controller
{
 	

 	public function bundleitem()
 	{
 		$item = DB::table('m_item')->select('i_code','i_name','i_price')->get();

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

                            if(Auth::user()->akses('MASTER DATA BUNDLE ITEM','print')){
                             $c = 
                             '<button type="button" onclick="printing(\''.$data->i_id.'\')" class="btn btn-info btn-lg" title="print">'.'<label class="fa fa-print"></label></button>';
                            }else{
                              $c = '';
                            }

                            if(Auth::user()->akses('MASTER DATA BUNDLE ITEM','hapus')){
                             $d = 
                                 '<button type="button" onclick="hapus(\''.$data->i_id.'\')" class="btn btn-danger btn-lg" title="hapus">'.
                                 '<label class="fa fa-trash"></label></button>';
                            }else{
                              $d = '';
                            }

                            
                            $e = '</div>';

                        return $a . $b .$c . $d .$e ;
                })
                ->addColumn('none', function ($data) {
                    return '-';
                })
                ->rawColumns(['aksi','confirmed'])
        		->make(true);
 	}
 	public function edit_bundle($id)
 	{		

 		$header = DB::table('i_item')->where('ib_detailid','=',$id)->first();
 		/*return*/ $sequence = DB::table('i_item_dt')->select('i_code','i_name','ibd_qty','ibd_unit','ibd_price','ibd_detailid')->where('ibd_id','=',$id)->join('m_item','m_item.i_code','=','i_item_dt.ibd_barang')->get();

 		$item = DB::table('m_item')->select('i_code','i_name','i_price')->get();
 		return view('master/bundle/edit_bundle',compact('item','header','sequence'));
 	}
 	public function cari_item(request $req)
 	{
 		$data = DB::table('m_item')
          ->join('d_unit','u_id','=','i_unit')
 				  ->where('i_code',$req->kode)
 				  ->first();
 		return Response::json(['data'=>$data]);

 	}
 	public function simpan_bundleitem(request $req)
 	{
    	return DB::transaction(function() use ($req) {  
      dd($req->all());  

        $m1 = DB::table('m_item')->max('i_id');
          
        $index = $m1+=1;
                               

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
                  'i_name'        =>  $request->ib_name,
                  'i_unit'        =>  4,
                  'i_price'       =>  filter_Var($request->ib_price,FILTER_SANITIZE_NUMBER_INT),
                  'i_sell_price'  =>  filter_Var($request->sell_price,FILTER_SANITIZE_NUMBER_INT),
                  'i_lower_price' =>  filter_Var($request->lower_price,FILTER_SANITIZE_NUMBER_INT),
                  'i_active'      =>  'Y',
                  'i_jenis'       =>  'BUNDLE',
                  'i_type'        =>  0,
                  'i_minstock'    =>  0,
                  'i_image'       =>  0,
                  'i_weight'      =>  0,
                  'i_description' =>  $request->keterangan,
                  'i_insert_at'   =>  Carbon::now(),
                  'i_update_at'   =>  Carbon::now(),
                  'i_insert_by'   =>  $nama,
                  'i_update_by'   =>  $nama,
              ]);
    	});
 	}
 	public function update_bundleitem(request $req)
 	{
 		// dd($req->all());
 		return DB::transaction(function() use ($req) {  
    		
    	});
 	}
 	public function dataedit_bundleitem(request $req)
 	{
 		$data_head = DB::table('i_item')->where('ib_detailid','=',$req->id)->get();
 		$data_seq = DB::table('i_item_dt')->where('ibd_id','=',$req->id)->get();
 		$item = DB::table('m_item')->select('i_code','i_name','i_price')->get();
 		return response()->json([$data_head,$data_seq]);
    	// return view('master/bundle/ajax_update',compact('item','data_head','data_seq'));
 	}
 	public function detail_bundleitem(request $req)
 	{
 		$data = DB::table('i_item_dt')->join('m_item','m_item.i_code','=','i_item_dt.ibd_barang')->where('ibd_id','=',$req->id)->get();
    	return response()->json($data);
 	}
 	public function hapus_bundleitem(request $req)
 	{	
 		// dd($req->all());
 		$data_head = DB::table('i_item')->where('ib_detailid','=',$req->id)->delete();
    	return response()->json(['status'=>1]);
 	}
}
