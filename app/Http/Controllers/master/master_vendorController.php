<?php

namespace App\Http\Controllers\master;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use Yajra\Datatables\Datatables;
use DB;

class master_vendorController extends Controller
{
   
    public function vendor()
    {   
        // $password = bcrypt('admin');
        // return $password;

        $kota_0 = DB::table('provinces')->get()->toArray();
        $kota_1 = DB::table('regencies')->get()->toArray();

        $kota = array_merge($kota_0,$kota_1);
        return view('master/vendor/vendor',compact('kota'));

    }
    public function datatalble_vendor(Request $request)
    {
    	$list = DB::select("SELECT * from m_vendor");
        // return $data;
        $data = collect($list);
        return Datatables::of($data)
        		->addColumn('aksi', function ($data) {
                          return  '<div class="btn-group">'.
                                   '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="edit">'.
                                   '<label class="fa fa-pencil-alt"></label></button>'.
                                   '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
                                   '<label class="fa fa-trash"></label></button>'.
                                  '</div>';
                })
                ->addColumn('none', function ($data) {
                    return '-';
                })
                ->rawColumns(['aksi', 'confirmed'])
        		->make(true);
    }

    public function simpan_vendor(Request $request)
    {
    	// dd($request->all());
    	$kode = DB::table('m_vendor')->max('s_id');
    
    		if ($kode == null) {
    	 		$kode = 1;
	    	}else{
	    	 	$kode += 1;
	    	}
	    $index = str_pad($kode, 5, '0', STR_PAD_LEFT);
	    $nota = 'VDR/'.$index;
	    $tanggal = date("Y-m-d h:i:s");
	    $date = date_create($request->v_tgl);
		$date = date_format($date,"Y-m-d");

     	$data = DB::table('m_vendor')
    			->insert([
    			's_id'=> $kode,
    			's_kode'=>$nota,
    			's_company'=>$request->v_company,
    			's_name'=>$request->v_name,
    			's_address'=>$request->v_alamat,
    			's_email'=>$request->v_email,
                's_phone'=>$request->v_tlp,
    			's_phone_1'=>$request->v_tlp1,
    			// 's_fax'=>$request->v_tgl,
    			's_termin'=>$request->v_credit,
    			's_limit'=>$request->v_plafon,
    			's_npwp'=>$request->v_npwp,
    			's_accountnumber'=>$request->v_noakun,
    			's_bankname'=>$request->v_namabank,
    			's_information'=>$request->v_informasi,
    			's_insert'=>$tanggal,
    			's_date'=>$date,
    			's_type'=>$request->v_tipe,
    			's_hometown'=>$request->v_hometown,
    			]);

    	return response()->json(['status'=>1]);
    }
    public function dataedit_vendor(Request $request)
    {
    	// dd($request->all());
    	$data = DB::table('m_vendor')->where('s_kode','=',$request->id)->get();
    	return response()->json($data);
    }
    public function update_vendor(Request $request)
    {
    	// dd($request->all());
    	$tanggal = date("Y-m-d h:i:s");
	    $date = date_create($request->v_tgl);
		$date = date_format($date,"Y-m-d");
    	// dd($request->all());
    	$data = DB::table('m_vendor')
    			->where('s_kode',$request->v_kode_old)
    			->update([
    			's_company'=>$request->v_company,
    			's_name'=>$request->v_name,
    			's_address'=>$request->v_alamat,
    			's_email'=>$request->v_email,
    			's_phone'=>$request->v_tlp,
                's_phone_1'=>$request->v_tlp1,
    			// 's_fax'=>$request->v_tgl,
    			's_termin'=>$request->v_credit,
    			's_limit'=>$request->v_plafon,
    			's_npwp'=>$request->v_npwp,
    			's_accountnumber'=>$request->v_noakun,
    			's_bankname'=>$request->v_namabank,
    			's_information'=>$request->v_informasi,
    			's_update'=>$tanggal,
    			's_date'=>$date,
    			's_type'=>$request->v_tipe,
    			's_hometown'=>$request->v_hometown,
    			]);

    	return response()->json(['status'=>1]);
    	
    }
    public function hapus_vendor(Request $request)
    {
    	// dd($request->all());
    	$data = DB::table('m_vendor')->where('s_kode','=',$request->id)->delete();
    	return response()->json($data);
    }

       
}
