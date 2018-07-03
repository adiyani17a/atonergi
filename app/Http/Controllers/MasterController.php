<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\TypeItem;
use Yajra\Datatables\Datatables;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Auth;
use DB;
use carbon\carbon;
use Session;
use App\mMember;
use Illuminate\Support\Facades\Crypt;
class MasterController extends Controller
{
    public function suplier()
    {
    	return view('master/suplier/suplier');
    }
    public function customer()
    {
    	return view('master/customer/cust');
    }
    public function pegawai()
    {
    	return view('master/pegawai/pegawai');
    }
    public function keuangan()
    {
        return view('master/akun/keuangan');
    }
    public function t_keuangan()
    {
        return view('master/transaksi/keuangan');
    }
    public function barang()
    {
        $type_barang = TypeItem::all();

        $unit        = DB::table('d_unit')
                         ->get();


    	return view('master/barang/barang', compact('type_barang','unit'));
    }
    public function vendor()
    {
        return view('master/vendor/vendor');
    }
    public function bundle()
    {
        return view('master/bundle/bundle');
    }

    // STATUS
    public function datatable_status(request $req)
    {
        $data = DB::table('d_status')
                  ->orderBy('s_id','DESC')
                  ->get();
        
        
        // return $data;
        $data = collect($data);
        // return $data;
        return Datatables::of($data)
                ->addColumn('aksi', function ($data) {
                    $a =  '<div class="btn-group">';

                    if(Auth::user()->akses('MASTER DATA STATUS','ubah')){
                     $b = '<button type="button" onclick="edit(\''.$data->s_id.'\')" class="btn btn-primary btn-lg" title="edit">'.'<label class="fa fa-pencil-alt"></label></button>';
                    }else{
                      $b = '';
                    }

                    if(Auth::user()->akses('MASTER DATA STATUS','hapus')){
                     $d = 
                         '<button type="button" onclick="hapus(\''.$data->s_id.'\')" class="btn btn-danger btn-lg" title="hapus">'.
                         '<label class="fa fa-trash"></label></button>'.
                         '</div>';
                    }else{
                      $d = '</div>';
                    }

                    return $a . $b . $d;
                    
                })
                ->addColumn('none', function ($data) {
                    return '-';
                })
                ->addColumn('status', function ($data) {

                    return  '<span class="badge badge-pill badge-'.$data->s_color.'">'.$data->s_name.'</span>'.
                            '<input type="hidden" class="s_id" value="'.$data->s_id.'">';
                })
                ->rawColumns(['aksi', 'detail','histori','total','status'])
                ->addIndexColumn()
                ->make(true);
    }

    public function status()
    {
        
        return view('master/status/status');
    }

    public function edit_status(request $req)
    {
        $data = DB::table('d_status')
                  ->where('s_id',$req->id)
                  ->first();

        return response()->json(['data'=>$data]);
    }

    public function simpan_status(request $req)
    {
        $id = DB::table('d_status')->max('s_id')+1;

        $cari = DB::table('d_status')
                  ->where('s_name',strtoupper($req->name))
                  ->where('s_color',$req->status)
                  ->first();

        if ($cari != null) {
            return response()->json(['status'=>2]);
        }

        if ($req->id != '') {
            if($req->id != 1){
                $save = DB::table('d_status')
                      ->where('s_id',$req->id)
                      ->update([
                        's_name' => strtoupper($req->name),
                        's_color'=> $req->status,
                      ]);
                return response()->json(['status'=>3]);
            }else{
                return response()->json(['status'=>3]);
            }
        }else{
            $save = DB::table('d_status')
                      ->insert([
                        's_id'   => $id,
                        's_name' => strtoupper($req->name),
                        's_color'=> $req->status,
                      ]);
            return response()->json(['status'=>1]);
        }
        
    }

    public function hapus_status(request $req)
    {
        $delete = DB::table('d_status')
                    ->where('s_id',$req->id)
                    ->delete();
        return response()->json(['status'=>1]);

    }
    public function type()
    {
        return view('master/type/type');
    }
    public function edit_rencanapembelian()
    {
        return view('master/rencanapembelian/edit_rencanapembelian');
    }
    public function edit_purchaseorder()
    {
        return view('master/rencanapembelian/edit_purchaseorder');
    }
       
}
