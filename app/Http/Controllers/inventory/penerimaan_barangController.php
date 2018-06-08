<?php

namespace App\Http\Controllers\inventory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use Yajra\Datatables\Datatables;
use DB;
class penerimaan_barangController extends Controller
{
 	
	 public function penerimaan_barang()
	 {
	 	$po = DB::table('d_purchaseorder')->where('po_status','=','F')->get();
	 	return view('inventory/penerimaan_barang/penerimaan_barang',compact("po"));
	 }
	 public function datatable_penerimaan_barang()
	 {
      $list = DB::select("SELECT * from d_penerimaan_barang left join m_vendor on m_vendor.s_kode = d_penerimaan_barang.pb_vendor");
          // return $list;
      $data = collect($list);

      for ($i=0; $i <count($data) ; $i++) { 
      	$check_data_seq = DB::table('d_penerimaan_barang_dt')->where('pbdt_code','=',$data[$i]->pb_code)->get();
      }
      
      // return $check_data_seq;
      // return $data;

      return Datatables::of($data)
        
              ->addColumn('aksi', function ($data) {
                        return  '<div class="btn-group">'.
                                 '<button type="button" onclick="edit(this)" class="btn btn-info btn-sm" title="edit">'.
                                 '<label class="fa fa-arrow-alt-circle-right"></label></button>'.
                                '</div>';
              })
              ->addColumn('detail', function ($data) {
                            
                  return '<button data-toggle="modal" onclick="detail(this)"  class="btn btn-outline-primary btn-sm">Detail</button>';
              })
              ->addColumn('status', function ($data) {
                            
                  return '<span class="badge badge-warning badge-pill">In Process</span>';
              })
              ->rawColumns(['aksi','detail','confirmed','status'])
          ->make(true);
	 }
	 public function create_penerimaan_barang(Request $request)
	 {
	 	dd($request->all());
	 }
	 public function cari_penerimaan_barang(Request $request)
	 {
	 	// dd($request->all());	

	 	$header_cari = DB::table('d_purchaseorder')->leftjoin('m_vendor','d_purchaseorder.po_vendor','=','m_vendor.s_kode')->where('po_code','=',$request->this_val)->where('po_status','=','F')->first();
	 	json_encode($header_cari);
	 	$seq_cari = DB::table('d_purchaseorder_dt')->leftjoin('m_item','m_item.i_code','=','d_purchaseorder_dt.podt_item')->where('podt_code','=',$request->this_val)->where('podt_status','=','F')->get();
	 	
	 	return view('inventory/penerimaan_barang/create_penerimaan_barang',compact("header_cari",'seq_cari'));
	 }
	 public function save_penerimaan_barang(Request $request)
	 {
	 	// dd($request->all());	
       return DB::transaction(function() use ($request) {
       $tanggal = date("Y-m-d h:i:s");

       $kode = DB::table('d_penerimaan_barang')->max('pb_id');
            if ($kode == null) {
                $kode = 1;
            }else{
                $kode += 1;
            }
	   $index = str_pad($kode, 3, '0', STR_PAD_LEFT);
	   $date = date('my');
	   $nota = 'PB-'.$index.'/'.''.'/'.$date;


	   // header
	   $data_header = DB::table('d_penerimaan_barang')->insert([
	   			'pb_id'=>$kode,
	   			'pb_code'=>$nota,
	   			'pb_vendor'=>$request->pb_vendor,
	   			'pb_delivery_order'=>$request->pb_delivery_order,
	   			'pb_ref'=>$request->pb_ref,
	   			'pb_date'=>date('Y-m-d',strtotime($request->pb_date)),
	   			'pb_insert'=>$tanggal,
		 		'pb_insert_by'=>'',
	 	]);
	    $kode_seq = 0;

	    $header_po = DB::table('d_purchaseorder')
	    		->where('po_code','=',$request->pb_ref)
	    		->update(['po_status'=>'T']);


	    // sequence
	 	for ($i=0; $i <count($request->po_item) ; $i++) { 
	    	$kode_seq += 1;
		 	$arr1[$i] =	$request->qty_remain[$i];
		 	$arr2[$i] = $request->qty_received[$i];

	    	$subtracted = array_map(function ($x, $y) { return $x-$y;} , $arr1, $arr2);
			$result = array_combine(array_keys($arr1), $subtracted);

		 	$data_seq = DB::table('d_penerimaan_barang_dt')->insert([
		 		'pbdt_id'=>$kode_seq,
		 		'pbdt_code'=>$nota,
		 		'pbdt_item'=>$request->po_item[$i],
		 		'pbdt_qty_sent'=>$request->qty_approved[$i],
		 		'pbdt_qty_received'=>$request->qty_received[$i],
		 		'pbdt_qty_remains'=>$result[$i],
		 		'pbdt_insert'=>$tanggal,
		 		'pbdt_insert_by'=>'',
		 	]);

		 	$seq_po = DB::table('d_purchaseorder_dt')
	    		->where('podt_code','=',$request->pb_ref)
	    		->update(['podt_status'=>'T']);
	 	}

	 	//----PENERIMAAN BARANG ---//

	 	//-----------STOCK---------//
	   	$kode_id = 0;
	 	for ($i=0; $i <count($request->po_item) ; $i++) { 
	   	$kode_id += 1;
	 	$check_stock_gudang = DB::table('i_stock_gudang')
	 						 ->where('sg_iditem','=',$request->po_item[$i])
	 						 ->first();

	 	$cari = DB::table('i_stock_gudang')
    						 ->where('sg_iditem','=',$request->po_item[$i])
    						 ->first();
    	

        $kode_stockm_seq = DB::table('i_stock_mutasi')->where('sm_id','=',isset($cari->sg_id))->max('sm_iddetail')+1;	

	 	$kode_stock_g = DB::table('i_stock_gudang')->max('sg_id');
            if ($kode_stock_g == null) {
                $kode_stock_g = 1;
            }else{
                $kode_stock_g += 1;
            }
            
		 	$arr_stockm1[$i] =	$request->qty_remain[$i];
		 	$arr_stockm2[$i] = $request->qty_received[$i];

	    	$subtracted = array_map(function ($x, $y) { return $x-$y; } , $arr_stockm1, $arr_stockm2);
			$result_stockm = array_combine(array_keys($arr_stockm1), $subtracted);

		 	$check_gudang = DB::table('i_stock_gudang')
	    						->where('sg_iditem','=',$request->po_item[$i])
	    						->first();

	   		if ($check_gudang == null) {
	   			$data_stock_mutasi = DB::table('i_stock_mutasi')
						 		->insert([
						 		'sm_id'=>$kode_id,
						 		'sm_iddetail'=>$kode_stockm_seq,
						 		'sm_item'=>$request->po_item[$i],
						 		'sm_hpp'=>$request->po_harga[$i],
						 		'sm_qty'=>$request->qty_received[$i],
						 		'sm_use'=>0,
					   			'sm_deliveryorder'=>$request->pb_delivery_order,
						 		'sm_sisa'=>$request->qty_received[$i],
						 		'sm_description'=>'PENERIMAAN BARANG',
						 		'sm_mutcat'=>1,
						 		'sm_ref'=>$nota,
						 		'sm_insert'=>$tanggal,
						 	]);
	   		}else{
	   			$data_stock_mutasi = DB::table('i_stock_mutasi')
						 		->insert([
						 		'sm_id'=>isset($check_gudang->sg_id),
						 		'sm_iddetail'=>$kode_stockm_seq,
						 		'sm_item'=>$request->po_item[$i],
						 		'sm_hpp'=>$request->po_harga[$i],
						 		'sm_qty'=>$request->qty_received[$i],
						 		'sm_use'=>0,
					   			'sm_deliveryorder'=>$request->pb_delivery_order,
						 		'sm_sisa'=>$request->qty_received[$i],
						 		'sm_description'=>'PENERIMAAN BARANG',
						 		'sm_mutcat'=>1,
						 		'sm_ref'=>$nota,
						 		'sm_insert'=>$tanggal,
						 	]);
	   		}

			

		 	
	 	
	 		if (isset($check_stock_gudang->sg_iditem) != null) {
	 			$data_stock_gudang = DB::table('i_stock_gudang')
 									->where('sg_iditem','=',$check_stock_gudang->sg_iditem)
 									->update([
 										'sg_qty'=>$check_stock_gudang->sg_qty+$request->qty_received[$i],
 										'sg_harga'=>$request->po_harga[$i],
 									]);
	 		}else{
 				$data_stock_gudang = DB::table('i_stock_gudang')
 									->insert([
 										'sg_qty'=>$request->qty_received[$i],
 										'sg_harga'=>$request->po_harga[$i],
 										'sg_iditem'=>$request->po_item[$i],
 										'sg_id'=>$kode_stock_g,
 									]);
	 		}
	 	}

	 	return response()->json(['status'=>1]);
	 });
	 }





	 ///BATAS INPUT




	 public function update_penerimaan_barang(Request $request)
	 {

	 return DB::transaction(function() use ($request) {
	   // dd($request->all());
	   $tanggal = date("Y-m-d h:i:s");

	   //header
	   $data_header = DB::table('d_penerimaan_barang')
	   			->where('pb_code','=',$request->pb_delivery_order)
	   			->update([
		   			'pb_delivery_order'=>$request->pb_delivery_order,
		   			'pb_date'=>date('Y-m-d',strtotime($request->pb_Date)),
		   			'pb_update'=>$tanggal,
			 		'pb_update_by'=>'',
	 	]);


	    // sequence

	 	for ($i=0; $i <count($request->po_item) ; $i++) { 
		 	
	 		$check_data_seq[$i] = DB::table('d_penerimaan_barang_dt')
									->where('pbdt_code','=',$request->nota)
			   						->where('pbdt_id','=',$request->po_id[$i])
			   						->get();

		   	$arr_checkm1[$i] =	$request->qty_remain[$i];
		 	$arr_checkm2[$i] = $request->qty_received[$i];
	    	$subtracted_check = array_map(function ($x, $y) { return $x-$y;} , $arr_checkm1, $arr_checkm2);
			$result_check = array_combine(array_keys($arr_checkm1), $subtracted_check);
			// return $result_check;
			//end
			$arr_checkm11[$i] = $check_data_seq[$i][0]->pbdt_qty_received;
		 	$arr_checkm22[$i] = $request->qty_received[$i];

	    	$subtracted_mm = array_map(function ($xx, $yy) { return $xx+$yy;} , $arr_checkm11, $arr_checkm22);
			$result_checkmm = array_combine(array_keys($arr_checkm11), $subtracted_mm);
			// return $result_checkmm;

 			$data  = DB::table('d_penerimaan_barang_dt')
								->where('pbdt_code','=',$request->nota)
	   							->where('pbdt_id','=',$request->po_id[$i])
								->update([
									'pbdt_qty_remains'=>$result_check[$i],
									'pbdt_qty_received'=>$result_checkmm[$i],
								]);

	 	}

	 	// return [$check_data_seq,$request->qty_remain,$request->qty_received,$result_check,$result_checkmm];
	 	//----PENERIMAAN BARANG ---//

	 	//-----------STOCK---------//

	 	for ($i=0; $i <count($request->po_item) ; $i++) { 

	 		//id gudang
	 		$kode_stock_g = DB::table('i_stock_gudang')->max('sg_id');
            if ($kode_stock_g == null) {
                $kode_stock_g = 1;
            }else{
                $kode_stock_g += 1;
            }

            $arr_stockm1[$i] =	$request->qty_remain[$i];
		 	$arr_stockm2[$i] = $request->qty_received[$i];

	    	$subtracted = array_map(function ($x, $y) { return $x-$y;} , $arr_stockm1, $arr_stockm2);
			$result_stockm = array_combine(array_keys($arr_stockm1), $subtracted);


            $check_stock_gudang = DB::table('i_stock_gudang')
	 						 ->where('sg_iditem','=',$request->po_item[$i])
	 						 ->first();
	 	
	 		if (isset($check_stock_gudang->sg_iditem) != null) {
 			$data_stock_gudang = DB::table('i_stock_gudang')
								->where('sg_iditem','=',$check_stock_gudang->sg_iditem)
								->update([
									'sg_qty'=>$check_stock_gudang->sg_qty+$request->qty_received[$i],
									'sg_harga'=>$request->po_harga[$i],
								]);
	 		}else{
			$data_stock_gudang = DB::table('i_stock_gudang')
								->insert([
									'sg_qty'=>$request->qty_received[$i],
									'sg_harga'=>$request->po_harga[$i],
									'sg_iditem'=>$request->po_item[$i],
									'sg_id'=>$kode_stock_g,
								]);
	 		}

            $cari = DB::table('i_stock_gudang')
	    						->where('sg_iditem','=',$request->po_item[$i])
	    						->first();

        	$kode_stockm_seq = DB::table('i_stock_mutasi')->where('sm_id','=',$cari->sg_id)->max('sm_iddetail')+1;		        

	    	$check_gudang = DB::table('i_stock_gudang')
	    						->where('sg_iditem','=',$request->po_item[$i])
	    						->first();

		 	

		 	$data_stock_mutasi = DB::table('i_stock_mutasi')
							 		->insert([
							 		'sm_id'=>$check_gudang->sg_id,

							 		'sm_iddetail'=>$kode_stockm_seq,
							 		
							 		'sm_item'=>$request->po_item[$i],
							 		'sm_hpp'=>$request->po_harga[$i],
							 		'sm_qty'=>$request->qty_received[$i],
							 		'sm_use'=>0,
							 		'sm_sisa'=>$request->qty_received[$i],
							 		'sm_description'=>'PENERIMAAN BARANG',
							 		'sm_ref'=>$request->nota,
							 		'sm_deliveryorder'=>$request->pb_delivery_order,
							 		'sm_mutcat'=>1,
							 		'sm_insert'=>$tanggal,
							 		'sm_update'=>$tanggal,
							 	]);

		 	

	 	}
	 	// return $cari;
	 	// return $kode_stockm_seq;

	 	return response()->json(['status'=>1]);
	 });
	 }
	 public function edit_penerimaan_barang(Request $request)
	 {
	 	$header_penerimaan = DB::table('d_penerimaan_barang')->leftjoin('m_vendor','d_penerimaan_barang.pb_vendor','=','m_vendor.s_kode')->where('pb_code','=',$request->id)->first();
	 	json_encode($header_penerimaan);
	 	$id = $request->id;
	 	$seq_penerimaan = DB::table('d_penerimaan_barang_dt')->leftjoin('m_item','m_item.i_code','=','d_penerimaan_barang_dt.pbdt_item')->where('pbdt_qty_remains','!=','0')->where('pbdt_code','=',$request->id)->get();

	 	return view('inventory/penerimaan_barang/edit_penerimaan_barang',compact("header_penerimaan",'seq_penerimaan','id'));
	 }
	 public function hapus_penerimaan_barang(Request $request)
	 {
	 	dd($request->all());
	 	$header_penerimaan = DB::table('d_penerimaan_barang')->where('pb_code','=',$request->id)->delete();
	 	$seq_penerimaan = DB::table('d_penerimaan_barang_dt')->where('pbdt_code','=',$request->id)->delete();
	 }
}
