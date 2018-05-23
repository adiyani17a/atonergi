<?php

namespace App\Http\Controllers\MasterBarang;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Barang;
use DB;
use Yajra\Datatables\Datatables;

class BarangController extends Controller
{
    public function barangproses(Request $request)
    {


    	$m1 = DB::table('m_item')->max('i_id');
    	
 		$index = $m1+=1;
                           


        $id_auto = 'BRG/'.$index;

        $barang= new Barang();
    	if($request->hasfile('img')) 
		{ 
		  $file = $request->file('img');
		  $extension = $file->getClientOriginalExtension(); // getting image extension
		  $filename =$id_auto.'.'.$extension;
		  $file->move('assets/barang/', $filename);
		}else{
			$filename = '';
		}
        $barang->i_name=$request->get('item_name');
        $barang->i_type=$request->get('type_barang');
        $barang->i_unit=$request->get('unit');
        $barang->i_price=$request->get('price');
        $barang->i_minstock=$request->get('min_stock');
        $barang->i_weight=$request->get('weight');
        $barang->i_description=$request->get('description');
        $barang->i_code=$id_auto;
        if($filename==''){
        	$barang->i_image='';
        }else{
        $barang->i_image='assets/barang/'.$filename;
    	}
        $barang->i_id=$m1;
        $barang->save();
        
        return redirect('master/barang/barang')->with('success','Data has been  added');
    }
    public function baranghapus(Request $request)
    {
        $barang = DB::Table('m_item')->where('i_code','=',$request->id)->delete();
        return redirect('master/barang/barang')->with('success','Data has been  deleted');
    }
    public function datatable_barang()
   {
        
        $barang= DB::table('m_item')->get();
        
        
        // return $data;
        $barang = collect($barang);
        // return $barang;
        
        return Datatables::of($barang)
                        ->addColumn('aksi', function ($barang) {
                          return  '<div class="btn-group">'.
                                   '<button type="button" onclick="edit(this)" class="btn btn-info btn-lg" title="edit">'.
                                   '<label class="fa fa-pencil-alt"></label></button>'.
                                   '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-lg" title="hapus">'.
                                   '<label class="fa fa-trash"></label></button>'.
                                  '</div>';
                        })
                        ->addColumn('none', function ($barang) {
                          return '-';
                      	})
                        ->addColumn('gambar', function ($barang) { 
				        
				        return '<img src='asset("$barang->i_image")' border="0" width="40" class="img-rounded" align="center" />'; 
						})
                      ->rawColumns(['aksi', 'confirmed'])
                        ->make(true);
  