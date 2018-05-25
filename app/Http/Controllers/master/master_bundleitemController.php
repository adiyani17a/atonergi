<?php

namespace App\Http\Controllers\master;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use Yajra\Datatables\Datatables;
use DB;
class master_bundleitemController extends Controller
{
 	
 	public function bundleitem()
 	{
 		$item = DB::table('m_item')->select('i_code','i_name','i_price')->get();
 		return view('master/bundle/bundle',compact('item'));
 	}
 	public function datatable_bundleitem()
 	{
 		$list = DB::select("SELECT * from m_item_bundling");
        // return $list;
        $data = collect($list);
        
        // return $data;

        return Datatables::of($data)
        	
                ->addColumn('aksi', function ($data) {
                          return  '<div class="btn-group">'.
                                   '<button type="button" onclick="edit(this)" class="btn btn-info btn-sm" title="edit">'.
                                   '<label class="fa fa-pencil-alt"></label></button>'.
                                   '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-sm" title="hapus">'.
                                   '<label class="fa fa-trash"></label></button>'.
                                   '<button type="button" onclick="detail(this)" class="btn btn-primary btn-xs" title="Detail">'.
                                   '<label class="fas fa-arrow-alt-circle-right"></label></button>'.
                                  '</div>';
                })
                ->addColumn('none', function ($data) {
                    return '-';
                })
                ->rawColumns(['aksi','confirmed'])
        		->make(true);
 	}
 	public function simpan_bundleitem(Request $request)
 	{
 		// dd($request->all());	
 		$kode = DB::table('m_item_bundling')->max('ib_detailid');

	    $tanggal = date("Y-m-d h:i:s");

 			if ($kode == null) {
    	 		$kode = 1;
	    	}else{
	    	 	$kode += 1;
	    	}
	    	$price_header = str_replace('.','',$request->ib_price);
	    	$header = DB::table('m_item_bundling')
					->insert([
						'ib_item'	 => $request->ib_name,
						'ib_detailid' => $kode,
						'ib_price' =>$price_header,
						'ib_insert' =>$tanggal,
			]);
			$kode_seq = 0;
			for ($i=0; $i < count($request->ib_kode_dt); $i++) { 
	    		$price_seq[$i] = str_replace('.','',$request->ib_price_dt[$i]);
	    		$qty_seq[$i] = str_replace('.','',$request->ib_qty_dt[$i]);
				
		    	$kode_seq = $kode_seq + 1;

				$sequence[$i] = DB::table('m_item_bundling_dt')
					->insert([
						'ibd_id'	 => $kode,
						'ibd_detailid' => $kode_seq,
						'ibd_barang' => $request->ib_kode_dt[$i],
						'ibd_qty' => $qty_seq[$i],
						'ibd_unit' => $request->ib_unit_dt[$i],
						'ibd_price' =>$price_seq[$i],
						'ibd_insert' =>$tanggal,
				]);
			}

 		return response()->json(['status'=>1]);
 	}
 	public function update_bundleitem(Request $request)
 	{
 		// dd($request->all());
 		$kode = DB::table('m_item_bundling')->max('np_id');
	    $tanggal = date("Y-m-d h:i:s");

 		
 			if ($kode == null) {
    	 		$kode = 1;
	    	}else{
	    	 	$kode += 1;
	    	}
			$index = str_pad($kode, 5, '0', STR_PAD_LEFT);
		    $nota = 'NPN/'.$index;
	    	$price = str_replace('.','',$request->d_price);
	    	$low_price = str_replace('.','',$request->d_lowerprice);

			$data = DB::table('m_item_bundling')
					->where('np_kode',$request->kode_old)
					->update([
						'np_kodeitem' =>$request->d_itemname,
						'np_marketing' =>$request->d_marketing,
						'np_price' =>$price,
						'np_lowerlimit' =>$low_price,
						'np_update' =>$tanggal,
					]);
 		
 		return response()->json($data);
 	}
 	public function dataedit_bundleitem(Request $request)
 	{
 		$data_head = DB::table('m_item_bundling')->where('ib_detailid','=',$request->id)->get();
 		$data_seq = DB::table('m_item_bundling_dt')->where('ibd_id','=',$request->id)->get();
 		$item = DB::table('m_item')->select('i_code','i_name','i_price')->get();
    	return view('master/bundle/ajax_update',compact('item','data_head','data_seq'));
 	}
 	public function detail_bundleitem(Request $request)
 	{
 		$data = DB::table('m_item_bundling_dt')->join('m_item','m_item.i_code','=','m_item_bundling_dt.ibd_barang')->where('ibd_id','=',$request->id)->get();
    	return response()->json($data);
 	}
 	public function hapus_bundleitem(Request $request)
 	{	
 		// dd($request->all());
 		$data = DB::table('m_item_bundling')->where('ib_detailid','=',$request->id)->delete();
 		$data = DB::table('m_item_bundling_dt')->join('m_item','m_item.i_code','=','m_item_bundling_dt.ibd_barang')->where('ibd_id','=',$request->id)->delete();
    	return response()->json(['status'=>1]);
 	}
}
