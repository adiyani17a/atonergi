<?php

namespace App\Http\Controllers\purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Barang;
use Yajra\Datatables\Datatables;
use DB;

class request_orderController extends Controller
{
   public function rencanapembelian()
    {   
        $vendor = DB::table('m_vendor')->get();
        $item = DB::table('m_item')->get();
        return view('purchase/rencanapembelian/rencanapembelian',compact('vendor','item'));
    }
    public function datatable_rencanapembelian(Request $request)
    {
        $list = DB::select("SELECT * from d_requestorder");
        
        $data = collect($list);
        
        // return $data;

        return Datatables::of($data)
            
                ->addColumn('aksi', function ($data) {
                          return  '<div class="btn-group">'.
                                   '<button type="button" onclick="edit(this)" class="btn btn-info btn-sm" title="edit">'.
                                   '<label class="fa fa-pencil-alt"></label></button>'.
                                   '<button type="button" onclick="hapus(this)" class="btn btn-danger btn-sm" title="hapus">'.
                                   '<label class="fa fa-trash"></label></button>'.
                                  '</div>';
                })
                ->addColumn('none', function ($data) {
                    return '-';
                })
                ->addColumn('approved', function ($data) {
                    return '-';
                })
                ->addColumn('detail', function ($data) {
                    return '<div class="btn-group">'.
                                   '<button type="button" onclick="detail(this)" style="padding-top: 12px;" class="btn btn-info btn-sm" title="detail">'.
                                   '<label class="fas fa-arrow-alt-circle-right"></label> Detail</button>'.
                                  '</div>';
                })
                ->rawColumns(['aksi','approved','detail','confirmed'])
                ->make(true);
    }
    public function kode_rencanapembelian(Request $request)
    {
        $kode = DB::table('d_requestorder')->max('ro_id');
            if ($kode == null) {
                $kode = 1;
            }else{
                $kode += 1;
            }
        $index = str_pad($kode, 3, '0', STR_PAD_LEFT);
        $date = date('my');
        return $nota = 'PO-'.$index.'/'.$request->vendor.'/'.$date;
        return response()->json($kode);
    }

    public function detail_rencanapembelian(Request $request)
    {
        $data = DB::table('d_requestorder_dt')->select('rodt_code','rodt_barang','rodt_price','rodt_qty','i_name')->leftjoin('m_item','m_item.i_code','=','d_requestorder_dt.rodt_barang')->where('rodt_code','=',$request->id)->get();
        return response()->json($data);
    }
    public function simpan_rencanapembelian(Request $request)
    {
            // dd($request->all()); 
            $kode = DB::table('d_requestorder')->max('ro_id');
                if ($kode == null) {
                    $kode = 1;
                }else{
                    $kode += 1;
                }
            $ro_price_header = str_replace('.','',$request->ro_total_header);
            $ro_qty_header = str_replace('.','',$request->ro_qty_header);
            $tanggal = date("Y-m-d h:i:s");

            $header = DB::table('d_requestorder')
                    ->insert([
                        'ro_id'    => $kode,
                        'ro_code' => $request->ro_code_header,
                        'ro_vendor' =>$request->ro_vendor_header,
                        'ro_price' =>$ro_price_header,
                        'ro_qty' =>$ro_qty_header,
                        'ro_insert' =>$tanggal,
            ]);

            $kode_seq = 0;
            for ($i=0; $i < count($request->ro_item_seq); $i++) { 
                $price_seq[$i] = str_replace('.','',$request->ro_price_seq[$i]);
                $qty_seq[$i] = str_replace('.','',$request->ro_qty_seq[$i]);
                
                $kode_seq = $kode_seq + 1;

                $sequence[$i] = DB::table('d_requestorder_dt')
                    ->insert([
                        'rodt_id'     => $kode_seq,
                        'rodt_code' => $request->ro_code_header,
                        'rodt_status' => 'F',
                        'rodt_barang' => $request->ro_item_seq[$i],
                        'rodt_qty' => $qty_seq[$i],
                        'rodt_price' =>$price_seq[$i],
                        'rodt_insert' =>$tanggal,
                ]);
            }

        return response()->json(['status'=>1]);
    }

       
}
