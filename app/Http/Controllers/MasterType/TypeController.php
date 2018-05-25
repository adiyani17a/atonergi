<?php

namespace App\Http\Controllers\MasterType;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\TypeItem;
use DB;

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
    	// dd($request->all());
    	$data = DB::table('m_item_type')->where('it_id','=',$request->id)->get();
    	return response()->json($data);
    }
}
