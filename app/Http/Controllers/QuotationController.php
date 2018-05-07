<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuotationController extends Controller
{
 	public function q_quotation()
 	{
 		return view('quotation/q_quotation/q_quotation');
 	}
 	public function k_penawaran()
 	{
 		return view('quotation/k_penawaran/k_penawaran');
 	}
 	public function n_penawaran()
 	{
 		return view('quotation/n_penawaran/n_penawaran');
 	}
 	public function pdf_penawaran()
 	{
 		return view('quotation/pdf_penawaran/pdf_penawaran');
 	}
 	public function marketing()
 	{
 		return view('quotation/marketing/marketing');
 	}
 	public function edit_quotation()
 	{
 		return view('quotation/q_quotation/edit_quotation');
 	}
 	public function print_quotation()
 	{
 		return view('quotation/q_quotation/print_quotation');
 	}
 		
}
