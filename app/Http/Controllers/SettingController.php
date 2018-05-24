<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Auth;
use DB;
use carbon\carbon;
use Session;
use App\mMember;
use Illuminate\Support\Facades\Crypt;
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

              $daftar_menu = DB::table('d_daftar_menu')
                             ->orderBy('dm_id','ASC')
                             ->get();

              for ($i=0; $i < count($daftar_menu); $i++) { 
                
                $hak_akses = DB::table('d_hak_akses')
                               ->insert([
                                  'ha_id'   => $daftar_menu[$i]->dm_id,
                                  'ha_dt'   => $i+1,
                                  'ha_level'=> strtoupper($req->nama),
                                  'ha_menu' => $daftar_menu[$i]->dm_nama,
                                  'aktif'   => 1,
                                  'tambah'  => 1,
                                  'ubah'    => 1,
                                  'hapus'   => 1,
                                  'print'   => 1,
                               ]);
              }

               return response()->json(['status' => 1]);


            }else{
               return response()->json(['status' => 0]);
            }


            
         }else{
            $update = DB::table('d_jabatan')
                        ->where('j_id',$req->id)
                        ->update(['j_nama'=>strtoupper($req->nama),
                                 'j_keterangan'=>strtoupper($req->keterangan),
                                 ]);

            $daftar_menu = DB::table('d_daftar_menu')
                             ->orderBy('dm_id','ASC')
                             ->get();

            for ($i=0; $i < count($daftar_menu); $i++) { 

              $hak_akses1 = DB::table('d_hak_akses')
                             ->where('ha_id',$daftar_menu[$i]->dm_id)
                             ->where('ha_level',strtoupper($req->nama))
                             ->first();

              if ($hak_akses1 == null) {
                $aktif = 0;
                $tambah = 0;
                $ubah = 0;
                $hapus = 0;
                $print = 0;
              }else{
                $aktif  = $hak_akses1->aktif;
                $tambah = $hak_akses1->tambah;
                $ubah   = $hak_akses1->ubah;
                $hapus  = $hak_akses1->hapus;
                $print  = $hak_akses1->print;
              }
              // dd($hak_akses1);
              $hak_akses = DB::table('d_hak_akses')
                             ->where('ha_id',$daftar_menu[$i]->dm_id)
                             ->where('ha_level',strtoupper($req->nama))
                             ->update([
                                'ha_id'   => $daftar_menu[$i]->dm_id,
                                'ha_dt'   => $i+1,
                                'ha_level'=> strtoupper($req->nama),
                                'ha_menu' => $daftar_menu[$i]->dm_nama,
                                'aktif'   => $aktif,
                                'tambah'  => $tambah,
                                'ubah'    => $ubah,
                                'hapus'   => $hapus,
                                'print'   => $print,
                             ]);
            }

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
      $level = DB::table('d_jabatan')
                 ->get();
      
      return view('setting.akun.akun',compact('level'));
   }

   public function datatable_akun()
   {
      $data = DB::table('d_mem')
                  ->orderBy('m_id','ASC')
                  ->get();
        
        
        $data = collect($data);
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
                        ->addColumn('image', function ($data) {
                            $thumb = route('thumbnail').'/'.$data->m_image;
                            return '<img style="width:50px;height:50px;" class="img-fluid img-thumbnail" src="'.$thumb.'">';
                        })
                        ->rawColumns(['aksi', 'image'])
                        ->make(true);
   }
   public function simpan_akun(request $req)
   {
      // return $user;
      return DB::transaction(function() use ($req) {  
        // dd($req->all());
        if ($req->id == null) {
            $valid = DB::table('d_mem')
                       ->where('m_username',$req->username)
                       ->first();

            if ($valid == null) {

               $id = DB::table('d_mem')
                    ->max('m_id');
               if ($id != null) {
                  $id+=1;
               }else{
                  $id = 1;
               }

              $level = DB::table('d_jabatan')
                         ->where('j_id',$req->level)
                         ->first();

              $password = sha1(md5('passwordAllah').$req->password);

              $simpan = DB::table('d_mem')
                           ->insert([
                                    'm_id'      => $id,
                                    'm_username'=> $req->username,
                                    'm_password'=> $password,
                                    'm_name'    => $req->nama,
                                    'm_jabatan' => $level->j_nama,
                                    ]);

               $status = 1;
            }else{
               $status = 0;
            }
            
        }else{
            $id = $req->id;
            $password = sha1(md5('passwordAllah').$req->password);

            $level = DB::table('d_jabatan')
                         ->where('j_id',$req->level)
                         ->first();
                         
            $simpan = DB::table('d_mem')
                           ->where('m_id',$id)
                           ->update([
                                    'm_username'=> $req->username,
                                    'm_password'=> $password,
                                    'm_name'    => $req->nama,
                                    'm_jabatan' => $level->j_nama,
                                    ]);
            $status = 2;
        }

        $file = $req->file('files');
        if ($file != null) {
          mMember::where('m_id',$id)->first();

          $file_name = 'user_'. $id .'_' . '.' . $file->getClientOriginalExtension();

          if (!is_dir(storage_path('uploads/user/thumbnail/'))) {
            mkdir(storage_path('uploads/user/thumbnail/'), 0777, true);
          }

          if (!is_dir(storage_path('uploads/user/original/'))) {
            mkdir(storage_path('uploads/user/original/'), 0777, true);
          }
          

          $thumbnail_path = storage_path('uploads/user/thumbnail/');
          $original_path = storage_path('uploads/user/original/');
          // return $original_path;
          Image::make($file)
                  ->resize(261,null,function ($constraint) {
                    $constraint->aspectRatio();
                     })
                  ->save($original_path . $file_name)
                  ->resize(90, 90)
                  ->save($thumbnail_path . $file_name);

          $user = mMember::where('m_id',$id)->update(['m_image' => $file_name]);
        }
        

        return response()->json(['status' => $status]);

      });
   }

   public function hapus_akun(request $req)
   {
      $hapus = DB::table('d_mem')
                 ->where('m_id',$req->id)
                 ->first();
      if ($hapus->m_jabatan == 'SUPERUSER') {
         return response()->json(['status' => 2]);
      }else{
         $hapus = DB::table('d_mem')
                 ->where('m_id',$req->id)
                 ->delete();
         return response()->json(['status' => 1]);
      }

      
   }
   public function edit_akun(request $req)
   {
      $data = mMember::where('m_id',$req->id)
                    ->first();
      $jabatan = DB::table('d_jabatan')
                   ->get();
      for ($i=0; $i < count($jabatan); $i++) { 
        if ($jabatan[$i]->j_nama == $data->m_jabatan) {
          $data->kode_jabatan = $jabatan[$i]->j_id;
        }
      }
      return response()->json(['data' => $data]);

   }
   // END
   // DAFTAR MENU
   public function daftar_menu()
   {
      $grup_menu = DB::table('d_grup_menu')
                     ->get();
      return view('setting.daftar_menu.daftar_menu',compact('grup_menu'));
   }

   public function datatable_daftar_menu()
   {
      $data = DB::table('d_daftar_menu')
                  ->join('d_grup_menu','gm_id','=','dm_group')
                  ->orderBy('dm_id','ASC')
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

   public function simpan_daftar_menu(request $req)
   {
      return DB::transaction(function() use ($req) {  
         if ($req->id == null) {
            $valid = DB::table('d_daftar_menu')
                       ->where('dm_nama',$req->nama)
                       ->where('dm_group',$req->grup_menu)
                       ->first();
            if ($valid == null) {
               $id = DB::table('d_daftar_menu')
                    ->max('dm_id');
               if ($id != null) {
                  $id+=1;
               }else{
                  $id = 1;
               }
               $simpan = DB::table('d_daftar_menu')
                           ->insert([
                                    'dm_id'=>$id,
                                    'dm_nama'=>strtoupper($req->nama),
                                    'dm_group'=>strtoupper($req->grup_menu),
                                    ]);

              $hak_akses = DB::table('d_hak_akses')
                             ->select('ha_level')
                             ->groupBy('ha_level')
                             ->get();

              for ($i=0; $i < count($hak_akses); $i++) { 
                $simpan = DB::table('d_hak_akses')
                            ->insert([
                              'ha_id'=>$id,
                              'ha_dt'=>$id,
                              'ha_level'=>$hak_akses[$i]->ha_level,
                              'ha_menu'=>strtoupper($req->nama),
                            ]);
              }

              return response()->json(['status' => 1]);
            }else{
               return response()->json(['status' => 0]);
            }
            
         }else{


            $cari = DB::table('d_daftar_menu')
                        ->where('dm_id',$req->id)
                        ->first();


            $update = DB::table('d_hak_akses')
                          ->where('ha_menu',$cari->dm_nama)
                          ->update([
                            'ha_menu'=>strtoupper($req->nama),
                          ]);



            $update = DB::table('d_daftar_menu')
                        ->where('dm_id',$req->id)
                        ->update(['dm_nama'=>$req->nama,
                                 'dm_group'=>$req->grup_menu,
                                 ]);

            
            

            return response()->json(['status' => 2]);
        }
      });
   }
   public function hapus_daftar_menu(request $req)
   {
      
      $cari = DB::table('d_daftar_menu')
                        ->where('dm_id',$req->id)
                        ->first();

      $hapus_menu = DB::table('d_hak_akses')
                            ->where('ha_menu',$cari->dm_nama)
                            ->delete();

      $hapus = DB::table('d_daftar_menu')
               ->where('dm_id',$req->id)
               ->delete();

      return response()->json(['status' => 1]);
   }
   // END
   public function hak_akses()
   {  

      $hak_akses = DB::table('d_hak_akses')
                ->select('ha_level')
                ->groupBy('ha_level')
                ->get();

      $daftar = DB::table('d_daftar_menu')
                ->get();

      $grup_menu = DB::table('d_grup_menu')
                ->get();

      for ($i=0; $i < count($grup_menu); $i++) { 
         for ($a=0; $a < count($daftar); $a++) { 
            if ($grup_menu[$i]->gm_id == $daftar[$a]->dm_group) {
              $data[$i][$a] = $daftar[$a]->dm_nama;
            }
         }
        $data[$i] = array_values($data[$i]);
      }

      return view('setting.hak_akses.hak_akses',compact('data','grup_menu','hak_akses'));
   }

   public function table_data(request $req)
   {
      $hak_akses = DB::table('d_hak_akses')
                     ->where('ha_level',$req->level)
                     ->get();

      $daftar = DB::table('d_daftar_menu')
                ->get();

      $grup_menu = DB::table('d_grup_menu')
                ->get();

      for ($i=0; $i < count($grup_menu); $i++) { 
         for ($a=0; $a < count($daftar); $a++) { 
            if ($grup_menu[$i]->gm_id == $daftar[$a]->dm_group) {
              $data[$i][$a] = $daftar[$a]->dm_nama;
            }
         }
        $data[$i] = array_values($data[$i]);
      }
      return view('setting.hak_akses.table_data',compact('data','grup_menu','hak_akses'));
   }
}