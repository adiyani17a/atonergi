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
    	
 		$index = $m1+1;
                           
                            $id_auto = 'BRG/'.$index;

        $barang= new Barang();
    	if($request->hasfile('img')) 
		{ 
		  $file = $request->file('img');
		  $extension = $file->getClientOriginalExtension(); // getting image extension
		  $filename =time().'.'.$extension;
		  $file->move('assets/barang/', $filename);
		}
        $barang->i_name=$request->get('item_name');
        $barang->i_type=$request->get('type_barang');
        $barang->i_unit=$request->get('unit');
        $barang->i_price=$request->get('price');
        $barang->i_minstock=$request->get('min_stock');
        $barang->i_weight=$request->get('weight');
        $barang->i_description=$request->get('description');
        $barang->i_code=$id_auto;
        $barang->i_image='assets/barang/'.$filename;
        $barang->i_id=$m1;
        $barang->save();
        
        return redirect('barang')->with('success','Data has been  added');
    }
    public function baranghapus($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('barang')->with('success','Data has been  deleted');
    }
}
