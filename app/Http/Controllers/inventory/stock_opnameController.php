<?php

namespace App\Http\Controllers\inventory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Carbon\carbon;
class stock_opnameController extends Controller
{
 	
	 public function stockopname()
	 {
	 	$po = DB::table('d_purchaseorder')->where('po_status','=','F')->get();
    	return view('inventory/opname/opname');
	 }
	 public function datatable_stockgudang()
	 {
      $list = DB::select("SELECT * from i_stock_gudang left join m_item on m_item.i_code = i_stock_gudang.sg_iditem");
          // return $list;
      $data = collect($list);

      return Datatables::of($data)
        
              ->addColumn('detail', function ($data) {
                        return '<button data-toggle="modal" onclick="detail(this)"  class="btn btn-outline-primary btn-sm">Detail</button>';
              })
              ->rawColumns(['aksi','detail','confirmed','status'])
          ->make(true);
	 }
   public function create_stockopname(Request $request)
   {
   	   $kode = DB::table('i_stock_opname')->max('so_id');
   	   if ($kode == null) {
   	   	$kode = 1;
   	   }else{
   	   	$kode += 1;
   	   }
	   $index = str_pad($kode, 3, '0', STR_PAD_LEFT);
       $date = date('my');
   	   $nota = 'SOP-'.$index.'/'.$date;

	   $data = DB::table('i_stock_gudang')->leftjoin('m_item','m_item.i_code','=','i_stock_gudang.sg_iditem')->get();
   	   $item = DB::table('m_item')->get();
       return view('inventory/opname/create_opname',compact('item','data','nota'));
   }
   public function cari_stockopname(Request $request)
   {
   	  // dd($request->all());
	   	if ($request->id == 'all' ) {
	   	  	$data = DB::table('i_stock_gudang')->leftjoin('m_item','m_item.i_code','=','i_stock_gudang.sg_iditem')->get();
		}else{
	   	  	$data = DB::table('i_stock_gudang')->leftjoin('m_item','m_item.i_code','=','i_stock_gudang.sg_iditem')->where('sg_iditem','=',$request->id)->get();
		}
		// return $data;

		return view('inventory/opname/cari_stockopname',compact('data'));

   }
   public function save_stockopname(Request $request)
   {
   	// dd($request->all());

   return DB::transaction(function() use ($request) {
    for ($i=0; $i < count($request->so_item); $i++) { 
		$cari = DB::table('i_stock_mutasi')
			   ->where('sm_item',$request->so_item[$i])
			   ->orderBy('sm_insert','ASC')
			   ->get();

		if ($request->so_system[$i] < $request->so_real[$i]) {

			for ($a=0; $a < count($cari); $a++) { 
				if ($a == 0) {
					$temp  = $cari[$a]->sm_insert;
				}

				if ($a != 0) {
					if ($cari[$a]->sm_insert > $temp) {
						$temp = $cari[$a]->sm_insert;
					}
				}
			}

			$kode_sequence = DB::table('i_stock_mutasi')
								->where('sm_insert',$temp)
					   			->where('sm_item',$request->so_item[$i])
								->max('sm_iddetail')+1;

			$hpp =	DB::table('i_stock_mutasi')
					   ->where('sm_insert',$temp)
					   ->where('sm_item',$request->so_item[$i])
					   ->first(); 


			$insert = DB::table('i_stock_mutasi')
	    						->insert([
	    							'sm_id'=>$hpp->sm_id,
							 		'sm_iddetail'=>$kode_sequence,
							 		'sm_item'=>$request->so_item[$i],
							 		'sm_hpp'=>$hpp->sm_hpp,
							 		'sm_qty'=>$request->so_status_total[$i],
							 		'sm_use'=>0,
						   			'sm_deliveryorder'=>'',
							 		'sm_sisa'=>$request->so_status_total[$i],
							 		'sm_description'=>'STOCK OPNAME '.$request->so_status_item[$i],
							 		'sm_mutcat'=>3,
							 		'sm_ref'=>$request->so_code,
							 		'sm_insert'=>carbon::now(),
	    						]);

	    	$check_gudang[$i] = DB::table('i_stock_gudang')
	    						->where('sg_iditem','=',$request->so_item[$i])
	    						->get();		

	    	$update_gudang = DB::table('i_stock_gudang')
	    						->where('sg_iditem','=',$request->so_item[$i])
	    						->update([
	    							'sg_qty'=>$check_gudang[$i][0]->sg_qty+$request->so_status_total[$i],
	    						]);

		}else if($request->so_system[$i] > $request->so_real[$i]){

			$balance = $request->so_status_total[$i];
			for ($b=0; $b < count($cari); $b++) { 

				$sisa_kurang = $cari[$b]->sm_sisa - $balance;
				$kurang = $balance - $cari[$b]->sm_sisa;

				if($kurang < 0){
					$kurang = 0;
				}

				$sm_use_new = $balance - $kurang;

				if ($sisa_kurang < 0) {
					$sisa_kurang = 0;
				}

				$update = DB::table('i_stock_mutasi')
						  ->where('sm_id',$cari[$b]->sm_id)
						  ->where('sm_iddetail','=',$cari[$b]->sm_iddetail)
						  ->update([
						  	'sm_sisa' => $sisa_kurang,
						  ]);
				$use = DB::table('i_stock_mutasi')
						  ->where('sm_id',$cari[$b]->sm_id)
						  ->where('sm_iddetail','=',$cari[$b]->sm_iddetail)
						  ->first();

				$use1 = $use->sm_qty - $use->sm_sisa;

				$update = DB::table('i_stock_mutasi')
						  ->where('sm_id',$cari[$b]->sm_id)
						  ->where('sm_iddetail','=',$cari[$b]->sm_iddetail)
						  ->orderBy('sm_insert','ASC')
						  ->update([
						  	'sm_use' => $use1,
						  ]);

				$upd = DB::table('i_stock_mutasi')
						  ->where('sm_id',$cari[$b]->sm_id)
						  ->where('sm_iddetail','=',$cari[$b]->sm_iddetail)
						  ->first();

				if ($balance > 0) {
					$kode_sequence = DB::table('i_stock_mutasi')->where('sm_id','=',$cari[$b]->sm_id)->max('sm_iddetail')+1;

					$insert = DB::table('i_stock_mutasi')
	    						->insert([
	    							'sm_id'=>$upd->sm_id,
							 		'sm_iddetail'=>$kode_sequence,
							 		'sm_item'=>$request->so_item[$i],
							 		'sm_hpp'=>$upd->sm_hpp,
							 		'sm_qty'=>$sm_use_new,
							 		'sm_use'=>$sm_use_new,
						   			'sm_deliveryorder'=>'',
							 		'sm_sisa'=>0,
							 		'sm_description'=>'STOCK OPNAME '.$request->so_status_item[$i],
							 		'sm_mutcat'=>3,
							 		'sm_ref'=>$request->so_code,
							 		'sm_insert'=>carbon::now(),
	    						]);
	    			$stock = DB::table('i_stock_gudang')
	    					   ->where('sg_id',$upd->sm_id)
	    					   ->first();

	    			$update = DB::table('i_stock_gudang')
	    					   ->where('sg_id',$upd->sm_id)
	    						->update([
	    							'sg_qty'=>$stock->sg_qty - $sm_use_new,
	    						]);
				}

				$balance = $kurang;

			}
		}
	}


	$cari = DB::table('i_stock_mutasi')
				   ->where('sm_item',$request->so_item[0])
				   ->get();

	// dd($cari);



    //  $tanggal = date("Y-m-d h:i:s");

   	//  $kode_header = DB::table('i_stock_opname')->max('so_id');
   	//    if ($kode_header == null) {
   	//    	$kode_header = 1;
   	//    }else{
   	//    	$kode_header += 1;
   	//    }

   	// $header_opname = DB::table('i_stock_opname')
   	// 						->insert([
   	// 							'so_id'=>$kode_header,
   	// 							'so_code'=>$request->so_code,
   	// 							'so_bulan'=>date('Y-m-d',strtotime($request->so_date)),
   	// 							'so_create_at'=>$tanggal,
   	// 						]);
 
    //SEQUENCE
	

   // 	$kode_detail = 0;
  	for ($i=0; $i <count($request->so_item) ; $i++) { 
  	//    $kode_sequence = DB::table('i_stock_opname_dt')->max('sodt_id');
	  //  	   if ($kode_sequence == null) {
	  //  	   	$kode_sequence = 1;
	  //  	   }else{
	  //  	   	$kode_sequence += 1;
	  //  	   }	
   // 		$kode_detail += 1;

   // 		if ($request->so_status_item[$i] != 'SAMA') {
   // 			$sequence_opname = DB::table('i_stock_opname_dt')
	  //   						->insert([
	  //   							'sodt_id'=>$kode_sequence,
	  //   							'sodt_code'=>$request->so_code,
	  //   							'sodt_item'=>$request->so_item[$i],
	  //   							'sodt_system'=>$request->so_system[$i],
	  //   							'sodt_real'=>$request->so_real[$i],
	  //   							'sodt_status_item'=>$request->so_status_item[$i],
	  //   							'sodt_status_total'=>$request->so_status_total[$i],
	  //   							'sodt_description'=>$request->so_description[$i],
	  //   							'sodt_create_at'=>$tanggal,
	  //   						]);
   // 		}else{

   // 		}
	    

	    // $check_gudang[$i] = DB::table('i_stock_gudang')
	    // 						->where('sg_iditem','=',$request->so_item[$i])
	    // 						->get();

	    // if ($request->so_status_item[$i] == 'KURANG') {
			
			// $arr_checkm1[$i] =	$request->qty_remain[$i];
		 // 	$arr_checkm2[$i] = $request->qty_received[$i];
	  //   	$subtracted_check = array_map(function ($x, $y) { return $x-$y;} , $arr_checkm1, $arr_checkm2);
			// $result_check = array_combine(array_keys($arr_checkm1), $subtracted_check);
			// // return $result_check;
			// //end
			// $arr_checkm11[$i] = $check_hpp_kurang[$i][0]->sm_qty;
		 // 	$arr_checkm22[$i] = $request->qty_received[$i];

	  //   	$subtracted_mm = array_map(function ($xx, $yy) { return $xx+$yy;} , $arr_checkm11, $arr_checkm22);
			// $result_checkmm = array_combine(array_keys($arr_checkm11), $subtracted_mm);


			// //update mutasi dimana stock real kurang dari stock sistem
	    	



	    	
	    	// $update_gudang = DB::table('i_stock_gudang')
	    	// 					->where('sg_iditem','=',$request->so_item[$i])
	    	// 					->update([
	    	// 						'sg_qty'=>$check_gudang[$i][0]->sg_qty-$request->so_status_total[$i],
	    	// 					]);
	    // }
	    // else if ($request->so_status_item[$i] == 'LEBIH') {
	    // 	$update_gudang = DB::table('i_stock_gudang')
	    // 						->where('sg_iditem','=',$request->so_item[$i])
	    // 						->update([
	    // 							'sg_qty'=>$check_gudang[$i][0]->sg_qty+$request->so_status_total[$i],
	    // 						]);
	    // }
	    // else if ($request->so_status_item[$i] == 'SAMA') {
	    // 	$update_gudang = DB::table('i_stock_gudang')
	    // 						->where('sg_iditem','=',$request->so_item[$i])
	    // 						->update([
	    // 							'sg_qty'=>$check_gudang[$i][0]->sg_qty,
	    // 						]);
	    // }
	    

	    // $insert_mutasi = DB::table('i_stock_mutasi')
	    // 						->insert([
	    // 							'sm_id'=>$check_gudang[$i][0]->sg_id,
					// 		 		'sm_iddetail'=>$kode_detail,
					// 		 		'sm_item'=>$request->so_item[$i],
					// 		 		'sm_hpp'=>,
					// 		 		'sm_qty'=>$request->so_status_total[$i],
					// 		 		'sm_use'=>0,
					// 	   			'sm_deliveryorder'=>'',
					// 		 		'sm_sisa'=>$request->so_status_total[$i],
					// 		 		'sm_description'=>'STOCK OPNAME '.$request->so_status_item[$i],
					// 		 		'sm_mutcat'=>3,
					// 		 		'sm_ref'=>$request->so_code,
					// 		 		'sm_insert'=>$tanggal,
	    // 						]);

  	}
  	// $check_gudang[$i]->sg_qty-$request->so_status_total[$i]
  	// return $request->so_status_total;
  	// return $request->so_item;
  	// return $check_hpp_kurang;
  	return response()->json(['status'=>1]);
   });
   }


   

}
