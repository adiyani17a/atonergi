<?php

namespace App\Http\Controllers\MasterBarang;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Barang;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Http\UploadedFile;

class BarangController extends Controller
{
    public function barangproses(Request $request)
    {


    	$m1 = DB::table('m_item')->max('i_id');
    	
 		$index = $m1+=1;
                           

        if($index<=9)
        {
            $id_auto = 'BRG/000'.$index;
        }
        else if($index<=99)
        {
            $id_auto = 'BRG/00'.$index;
        }
        else if($index<=999)
        {
            $id_auto = 'BRG/0'.$index;
        }
        else if($index<=9999)
        {
            $id_auto = 'BRG/'.$index;
        }
        else {
            $id_auto = 'BRG/'.$index;
        }

        $barang= new Barang();

    	$file = $request->file('files');
        if ($file != null) {
          Barang::where('i_id',$index)->first();

          $file_name = 'GBR_BRG_'. $index . time() .'.' . $file->getClientOriginalExtension();

          if (!is_dir(base_path('assets/barang/thumbnail/'))) {
            mkdir(base_path('assets/barang/thumbnail/'), 0777, true);
          }

          if (!is_dir(base_path('assets/barang/original/'))) {
            mkdir(base_path('assets/barang/original/'), 0777, true);
          }
          

          $thumbnail_path = base_path('assets\barang\thumbnail\\');
          $original_path = base_path('assets\barang\original\\');
          // return $original_path;
          Image::make($file)
                  ->resize(261,null,function ($constraint) {
                    $constraint->aspectRatio();
                     })
                  ->save($original_path . $file_name)
                  ->resize(90, 90)
                  ->save($thumbnail_path . $file_name);

        $barang->i_image=$file_name;
        }

        $get_price = $request->get('price');

        $filter_number = str_replace(',','',$get_price);

        $barang->i_name=$request->get('item_name');
        $barang->i_type=$request->get('type_barang');
        $barang->i_unit=$request->get('unit');
        $barang->i_price=$filter_number;
        $barang->i_minstock=$request->get('min_stock');
        $barang->i_weight=$request->get('weight');
        $barang->i_description=$request->get('description');
        $barang->i_code=$id_auto;
        
        
    	
        $barang->i_id=$m1;
        $barang->save();
        
        return redirect('master/barang/barang')->with('success','Data has been  added');
    }
    public function baranghapus(Request $request)
    {
        $gambar = DB::Table('m_item')->select('i_image')->where('i_code','=',$request->id)->get();

        
            // dd(base_path('assets\barang\\'.$gambar[0]->i_image));
        if($gambar[0]->i_image != '')
        {
            if(file_exists(base_path('assets\barang\thumbnail\\'.$gambar[0]->i_image)))
            {
                $storage1 = unlink(base_path('assets\barang\thumbnail\\'.$gambar[0]->i_image));
            }
            if(file_exists(base_path('assets\barang\original\\'.$gambar[0]->i_image)))
            {
                $storage2 = unlink(base_path('assets\barang\original\\'.$gambar[0]->i_image));
            }

        }



        $barang = DB::Table('m_item')->where('i_code','=',$request->id)->delete();
        return response()->json(['data'=>1]);
        // return redirect('master/barang/barang')->with('success','Data has been  deleted');
    }

    public function datatable_barang()
   {
        
        $data= DB::table('m_item')->get();
        
        
        // return $data;
        $barang = collect($data);
        // return $barang;
        // return $barang->i_price;
        return Datatables::of($barang)
                        ->addColumn('aksi', function ($barang) {
                          return  '<div class="btn-group">'.
                                   '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="edit">'.
                                   '<label class="fa fa-pencil-alt"></label></button>'.
                                   '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
                                   '<label class="fa fa-trash"></label></button>'.
                                  '</div>';
                        })
						->addColumn('gambar', function ($barang) { 
							if($barang->i_image!=''){
								$url=asset("assets/barang/thumbnail/$barang->i_image"); 
								return '<img src="'.$url.'" border="0" width="60" class="img-rounded" align="center" />'; 
							}else{
								return '<i class="fa fa-minus-square"></i>';
							}

						})
						->addColumn('harga', function ($barang){
							return '<div class="float-left">'. 
							'Rp. '.
							'</div>'.
							'<div class="float-right">'. number_format($barang->i_price,0,"",".") .'</div>';
						})
                        ->addColumn('none', function ($barang) {
                          return '-';
                      	})

                      ->rawColumns(['aksi','gambar', 'harga'])
                        ->make(true);
    }
    public function barang_edit(Request $request)
    {
    	// dd($request->all());
    	$data = DB::table('m_item')->where('i_code','=',$request->id)->get();
    	return response()->json($data);
    }

    public function barang_update(Request $request)
    {
    	$gambar = DB::Table('m_item')->select('i_image')->where('i_id','=',$request->item_codex)->get();

    	// dd($request->file('files'));
        if($request->cbcheck=="centang")
        {
            if($gambar[0]->i_image!="")
            {
            	if(file_exists(base_path('assets\barang\thumbnail\\'.$gambar[0]->i_image)))
                {
                    $storage1 = unlink(base_path('assets\barang\thumbnail\\'.$gambar[0]->i_image));
                }
                if(file_exists(base_path('assets\barang\original\\'.$gambar[0]->i_image)))
                {
                    $storage2 = unlink(base_path('assets\barang\original\\'.$gambar[0]->i_image));
                }
            }

        	$barang = new Barang();

        	$file = $request->file('files');
            
            Barang::where('i_id',$request->item_codex)->first();

            $file_name = 'GBR_BRG_'. $request->item_codex . time() .'.' . $file->getClientOriginalExtension();

            if (!is_dir(base_path('assets/barang/thumbnail/'))) {
                mkdir(base_path('assets/barang/thumbnail/'), 0777, true);
            }

            if (!is_dir(base_path('assets/barang/original/'))) {
                mkdir(base_path('assets/barang/original/'), 0777, true);
            }


            $thumbnail_path = base_path('assets\barang\thumbnail\\');
            $original_path = base_path('assets\barang\original\\');
            // return $original_path;
            Image::make($file)
                  ->resize(261,null,function ($constraint) {
                    $constraint->aspectRatio();
                     })
                  ->save($original_path . $file_name)
                  ->resize(90, 90)
                  ->save($thumbnail_path . $file_name);

            $barang = $file_name;

             

        } else {
            $barang = $gambar[0]->i_image;
        }

        $get_price = $request->get('price');

        $filter_number = str_replace(',','',$get_price);

    	// dd($request->all());
    	$data = DB::table('m_item')
    			->where('i_id',$request->item_codex)
    			->update([
    			'i_name'=>$request->item_name,
		        'i_type'=>$request->type_barang,
		        'i_unit'=>$request->unit,
		        'i_price'=>$filter_number,
		        'i_minstock'=>$request->min_stock,
		        'i_weight'=>$request->weight,
		        'i_description'=>$request->description,
		        'i_image'=>$barang,
    			]);


    	return response()->json(['status'=>1]);
    	
    }
 }
