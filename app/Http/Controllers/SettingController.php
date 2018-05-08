<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Auth;
use DB;
use carbon\carbon;
use Session;

class SettingController extends Controller
{
   // JABATAN
   public function jabatan()
   {
   	return view('setting.jabatan.jabatan');
   }

   public function datatable_jabatan()
   {
      $data = DB::table('d_jabatan')
                  ->orderBy('j_id','ASC')
                  ->get();
        
        
        // return $data;
        $data = collect($data);
        // return $data;
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
   public function simpan_jabatan(request $req)
   {
      // dd($req->all());
      return DB::transaction(function() use ($req) {  
         if ($req->id == null) {
            $valid = DB::table('d_jabatan')
                       ->where('j_nama',$req->nama)
                       ->first();
            if ($valid == null) {
               $id = DB::table('d_jabatan')
                    ->max('j_id');
               if ($id != null) {
                  $id+=1;
               }else{
                  $id = 1;
               }
               $simpan = DB::table('d_jabatan')
                           ->insert([
                                    'j_id'=>$id,
                                    'j_nama'=>strtoupper($req->nama),
                                    'j_keterangan'=>strtoupper($req->keterangan),
                                    ]);

               return response()->json(['status' => 1]);
            }else{
               return response()->json(['status' => 0]);
            }
            
         }else{
            $update = DB::table('d_jabatan')
                        ->where('j_id',$req->id)
                        ->update(['j_nama'=>$req->nama,
                                 'j_keterangan'=>$req->keterangan,
                                 ]);
            return response()->json(['status' => 2]);
         }
      });
   }

   public function hapus_jabatan(request $req)
   {
      $hapus = DB::table('d_jabatan')
                 ->where('j_id',$req->id)
                 ->first();
      if ($hapus->j_nama == 'SUPERUSER') {
         return response()->json(['status' => 2]);
      }else{
         $hapus = DB::table('d_jabatan')
                 ->where('j_id',$req->id)
                 ->delete();
         return response()->json(['status' => 1]);
      }

      
   }

   // END
   // AKUN
   public function akun()
   {
      
      return view('setting.akun.akun');
   }

   public function datatable_akun()
   {
      $data = DB::table('d_mem')
                  ->orderBy('m_id','ASC')
                  ->get();
        
        
        // return $data;
        $data = collect($data);
        // return $data;
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
   public function simpan_akun(request $req)
   {
      // dd($req->all());
      return DB::transaction(function() use ($req) {  
         if ($req->id == null) {
            $valid = DB::table('d_mem')
                       ->where('j_nama',$req->nama)
                       ->first();
            if ($valid == null) {
               $id = DB::table('d_mem')
                    ->max('j_id');
               if ($id != null) {
                  $id+=1;
               }else{
                  $id = 1;
               }
               $simpan = DB::table('d_mem')
                           ->insert([
                                    'j_id'=>$id,
                                    'j_nama'=>strtoupper($req->nama),
                                    'j_keterangan'=>strtoupper($req->keterangan),
                                    ]);

               return response()->json(['status' => 1]);
            }else{
               return response()->json(['status' => 0]);
            }
            
         }else{
            $update = DB::table('d_mem')
                        ->where('j_id',$req->id)
                        ->update(['j_nama'=>$req->nama,
                                 'j_keterangan'=>$req->keterangan,
                                 ]);
            return response()->json(['status' => 2]);
         }
      });
   }

   public function hapus_akun(request $req)
   {
      $hapus = DB::table('d_jabatan')
                 ->where('j_id',$req->id)
                 ->first();
      if ($hapus->j_nama == 'SUPERUSER') {
         return response()->json(['status' => 2]);
      }else{
         $hapus = DB::table('d_jabatan')
                 ->where('j_id',$req->id)
                 ->delete();
         return response()->json(['status' => 1]);
      }

      
   }
   // END
   public function daftar_menu()
   {
      return view('setting.daftar_menu.daftar_menu');
   }

   public function hak_akses()
   {
      return view('setting.hak_akses.hak_akses');
   }
}
