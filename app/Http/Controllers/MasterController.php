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

        $currency    = DB::table('m_currency')
                         ->where('cu_value','!=',null)
                         ->get();

    	return view('master/barang/barang', compact('type_barang','unit','currency'));
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
    public function ttd()
    {
        return view('master.ttd.ttd');
    }      
    public function bank()
    {
        return view('master.bank.bank');
    }
    public function datatable_bank(request $req)
    {
        $data = DB::table('m_bank')
                  ->orderBy('id','DESC')
                  ->get();
        
        
        // return $data;
        $data = collect($data);
        // return $data;
        return Datatables::of($data)
                ->addColumn('aksi', function ($data) {
                    $a =  '<div class="btn-group">';

                    if(Auth::user()->akses('MASTER DATA BANK','ubah')){
                     $b = '<button type="button" onclick="edit(\''.$data->id.'\')" class="btn btn-primary btn-lg" title="edit">'.'<label class="fa fa-pencil-alt"></label></button>';
                    }else{
                      $b = '';
                    }

                    if(Auth::user()->akses('MASTER DATA BANK','hapus')){
                     $d = 
                         '<button type="button" onclick="hapus(\''.$data->id.'\')" class="btn btn-danger btn-lg" title="hapus">'.
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
                
                ->rawColumns(['aksi', 'none'])
                ->addIndexColumn()
                ->make(true);
    }
public function edit_bank(request $req)
    {
        $data = DB::table('m_bank')
                  ->where('id',$req->id)
                  ->first();

        return response()->json(['bank'=>$data]);
    }

    public function simpan_bank(request $req)
    {
        $id = DB::table('m_bank')->max('id')+1;

        $cari = DB::table('m_bank')
                  ->where('name',strtoupper($req->name))
                  ->first();

        if ($cari != null) {
            return response()->json(['bank'=>2]);
        }

        if ($req->id != '') {
            if($req->id != 1){
                $save = DB::table('m_bank')
                      ->where('id',$req->id)
                      ->update([
                        'name' => strtoupper($req->name)
                      ]);
                return response()->json(['bank'=>3]);
            }else{
                return response()->json(['bank'=>3]);
            }
        }else{
            $save = DB::table('m_bank')
                      ->insert([
                        'id'   => $id,
                        'name' => strtoupper($req->name)
                      ]);
            return response()->json(['bank'=>1]);
        }
        
    }

    public function hapus_bank(request $req)
    {
        $delete = DB::table('m_bank')
                    ->where('id',$req->id)
                    ->delete();
        return response()->json(['bank'=>1]);

    }
        public function jasa()
        {
            return view('master.jasa.jasa');
        }
        public function datatable_jasa(request $req)
        {
            $data = DB::table('m_item')
                        ->where('i_jenis', 'JASA')
                        ->orderBy('i_id','DESC')
                        ->get();
            
            
            // return $data;
            $data = collect($data);
            // return $data;
            return Datatables::of($data)
                    ->addColumn('aksi', function ($data) {
                        $a =  '<div class="btn-group">';

                        if(Auth::user()->akses('MASTER DATA JASA','ubah')){
                         $b = '<button type="button" onclick="edit(\''.$data->i_id.'\')" class="btn btn-primary btn-lg" title="edit">'.'<label class="fa fa-pencil-alt"></label></button>';
                        }else{
                          $b = '';
                        }

                        if(Auth::user()->akses('MASTER DATA JASA','hapus')){
                         $d = 
                             '<button type="button" onclick="hapus(\''.$data->i_id.'\')" class="btn btn-danger btn-lg" title="hapus">'.
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
                    
                    ->rawColumns(['aksi', 'none'])
                    ->addIndexColumn()
                    ->make(true);
        }
        public function edit_jasa(request $req)
        {
            $data = DB::table('m_item')
                      ->where('i_id',$req->i_id)
                      ->first();

            return response()->json(['jasa'=>$data]);
        }

        public function simpan_jasa(request $req)
        {
            $i_id = DB::table('m_item')->max('i_id')+1;

            $cari = DB::table('m_item')
                      ->where('i_name',strtoupper($req->i_name))
                      ->first();

            if ($cari != null) {
                return response()->json(['jasa'=>2]);
            }

            if ($req->i_id != '') {
                if($req->i_id != 1){
                    $save = DB::table('m_item')
                          ->where('i_id',$req->i_id)
                          ->update([
                            'i_name' => strtoupper($req->i_name),
                            'i_price' => $req->i_price,
                            'i_description' => $req->i_description
                          ]);
                    return response()->json(['jasa'=>3]);
                }else{
                    return response()->json(['jasa'=>3]);
                }
            }else{
                $save = DB::table('m_item')
                          ->insert([
                            'i_id'   => $i_id,
                            'i_name' => strtoupper($req->i_name),
                            'i_price' => $req->i_price,
                            'i_description' => $req->i_description,
                            'i_jenis' => 'JASA'
                          ]);
                return response()->json(['jasa'=>1]);
            }
            
        }

        public function hapus_jasa(request $req)
        {
            $delete = DB::table('m_item')
                        ->where('i_id',$req->i_id)
                        ->delete();
            return response()->json(['jasa'=>1]);

        }

}
