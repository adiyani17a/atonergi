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
class currency_controller extends Controller
{
    public function index()
    {
    	$currency = DB::table('m_currency')
    				  ->select('cu_code')
    				  ->get();
    	return view('master.currency.currency',compact('currency'));
    }

    public function auto_complete(request $req)
    {
    	$data = DB::table('m_currency')
    				  ->where('cu_code',$req->id)
    				  ->first();
    	return Response::json(['data'=>$data]);
    }
}
