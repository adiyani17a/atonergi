<?php

namespace App\Http\Controllers\MasterType;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\TypeItem;
use DB;
use Yajra\Datatables\Datatables;

class TypeController extends Controller
{
    public function typeproses(Request $request)
    {

    	$m1 = DB::table('m_item_type')->max('it_id');
    	
 		$index = $m1+=1;

        $get_code = $request->get('t_code');

        $filter_code = str_replace(' ','',$get_code);
        
        $data = DB::table('m_item_type')
    			->insert([
    			'it_name'=>$request->get('t_name'),
		        'it_code'=>$filter_code,
		        'it_id'=>$m1,
    			]);

        return redirect('master/type/type')->with('success','Data has been  added');
    }
    public function type_edit(Request $request)
    {
    	dd($request->all());
    	$data = DB::table('m_item_type')->where('it_id','=',$request->id)->get();
    	return response()->json($data);
    }
    public function datatable_type
    {
    	$type= DB::table('m_item_type')->get();
        
        
        // return $data;
        $type = collect($type);
        // return $type;
        // return $type->i_price;
        return Datatables::of($type)
                        ->addColumn('aksi', function ($type) {
                          return  '<div class="btn-group">'.
                                   '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="edit">'.
                                   '<label class="fa fa-pencil-alt"></label></button>'.
                                   '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
                                   '<label class="fa fa-trash"></label></button>'.
                                  '</div>';
                        })
						->addColumn('gambar', function ($type) { 
							if($type->i_image!=''){
								$url=asset("assets/type/thumbnail/$type->i_image"); 
								return '<img src="'.$url.'" border="0" width="60" class="img-rounded" align="center" />'; 
							}else{
								return '<i class="fa fa-minus-square"></i>';
							}

						})
						->addColumn('harga', function ($type){
							return '<div class="float-left">'. 
							'Rp. '.
							'</div>'.
							'<div class="float-right">'. number_format($type->i_price,0,"",".") .'</div>';
						})
                        ->addColumn('none', function ($type) {
                          return '-';
                      	})

                      ->rawColumns(['aksi','gambar', 'harga'])
                        ->make(true);
    }
}
