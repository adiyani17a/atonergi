<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function s_invoice()
    {
    	return view('order/s_invoice/s_invoice');
    }
    public function s_order()
    {
    	return view('order/salesorder/s_order');
    }
    public function w_order()
    {
    	return view('order/workorder/w_order');
    }
    public function checklist()
    {
    	return view('order/checklistform/checklistform');
    }
    public function cekbarang()
    {
    	return view('order/cekbarang/cekbarang');
    }
    public function f_penjualan()
    {
    	return view('order/f_penjualan/f_penjualan');
    }
    public function proforma()
    {
    	return view('order/proforma/proforma');
    }
    public function pembayarandeposit()
    {
    	return view('order/pembayarandeposit/pembayarandeposit');
    }
    public function detail_pembayarandeposit()
    {
        return view('order/pembayarandeposit/detail_pembayarandeposit');
    }
    public function detail_salesorder()
    {
        return view('order/salesorder/detail_salesorder');
    }
    public function pelunasanorder()
    {
    	return view('order/pelunasanorder/pelunasanorder');
    }
    public function detail_workorder()
    {
        return view('order/workorder/detail_workorder');
    }
    public function detail_pelunasanorder()
    {
        return view('order/pelunasanorder/detail_pelunasanorder');
    }
    public function print_salesorder()
    {
        return view('order/salesorder/print_salesorder');
    }
    public function print_workorder()
    {
        return view('order/workorder/print_workorder');
    }
    public function print_checklistform()
    {
        return view('order/checklistform/print_checklistform');
    }
    public function print_salesinvoice()
    {
        return view('order/s_invoice/print_salesinvoice');
    }
}
