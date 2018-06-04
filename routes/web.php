<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/', function () {
        return view('auth.login');
    })->name('index');

    Route::get('login', 'loginController@authenticate')->name('login');
    // Route::post('login', 'loginController@authenticate')->name('login');
});


Route::group(['middleware' => 'auth'], function () {


Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout',function(){
	Session::flush();
    Auth::logout();
    Session::forget('key');
    return Redirect('/');
});


// SETTING
    // jabatan
        Route::get('/setting/jabatan', 'SettingController@jabatan');
        Route::get('/setting/datatable_jabatan', 'SettingController@datatable_jabatan')->name('datatable_jabatan');
        Route::get('/setting/simpan_jabatan', 'SettingController@simpan_jabatan');
        Route::get('/setting/hapus_jabatan', 'SettingController@hapus_jabatan');
    // akun
        Route::get('/setting/akun', 'SettingController@akun');
        Route::get('/setting/datatable_akun', 'SettingController@datatable_akun')->name('datatable_akun');
        Route::post('/setting/simpan_akun', 'SettingController@simpan_akun');
        Route::get('/setting/hapus_akun', 'SettingController@hapus_akun');
        Route::get('/setting/edit_akun', 'SettingController@edit_akun');
        Route::get('storage/uploads/user/thumbnail')->name('thumbnail');
    //daftar_menu
        Route::get('/setting/daftar_menu', 'SettingController@daftar_menu');
        Route::get('/setting/datatable_daftar_menu', 'SettingController@datatable_daftar_menu')->name('datatable_daftar_menu');
        Route::get('/setting/simpan_daftar_menu', 'SettingController@simpan_daftar_menu');
        Route::get('/setting/hapus_daftar_menu', 'SettingController@hapus_daftar_menu');
    //hak akses
        Route::get('/setting/hak_akses', 'SettingController@hak_akses');
        Route::get('/setting/hak_akses/table_data', 'SettingController@table_data');
        Route::get('/setting/hak_akses/centang', 'SettingController@centang');

// Master
Route::get('/master/suplier/suplier', 'MasterController@suplier');
Route::get('/master/pegawai/pegawai', 'MasterController@pegawai');
Route::get('/master/akun/a_keuangan', 'MasterController@keuangan');
Route::get('/master/transaksi/t_keuangan', 'MasterController@t_keuangan');
Route::get('/master/barang/barang', 'MasterController@barang')->name('barang');
    // STATUS QO
    Route::get('/master/status/status', 'MasterController@status');
    Route::get('/master/status/datatable_status', 'MasterController@datatable_status')->name('datatable_status');
    Route::get('/master/status/edit_status', 'MasterController@edit_status');
    Route::get('/master/status/simpan_status', 'MasterController@simpan_status');
    Route::get('/master/status/hapus_status', 'MasterController@hapus_status');
    // 
Route::get('/master/type/type', 'MasterController@type');

// Quotation
Route::get('/quotation/q_quotation/q_quotation', 'QuotationController@q_quotation');
Route::get('/quotation/q_quotation/datatable', 'QuotationController@quote_datatable')->name('quote_datatable');

Route::get('/quotation/k_penawaran/k_penawaran', 'QuotationController@k_penawaran');
Route::get('/quotation/pdf_penawaran/pdf_penawaran', 'QuotationController@pdf_penawaran');
Route::get('/quotation/q_quotation/edit_quotation/{id}', 'QuotationController@edit_quotation');
Route::get('/quotation/q_quotation/print_quotation', 'QuotationController@print_quotation');
Route::get('/quotation/q_quotation/autocomplete', 'QuotationController@autocomplete');
Route::get('/quotation/q_quotation/customer', 'QuotationController@customer');
Route::get('/quotation/q_quotation/nota_quote', 'QuotationController@nota_quote');
Route::get('/quotation/q_quotation/append_item', 'QuotationController@append_item');
Route::get('/quotation/q_quotation/edit_item', 'QuotationController@edit_item');
Route::get('/quotation/q_quotation/save_quote', 'QuotationController@save_quote');
Route::get('/quotation/q_quotation/update_quote', 'QuotationController@update_quote');
Route::get('/quotation/q_quotation/hapus_quote', 'QuotationController@hapus_quote');
Route::get('/quotation/q_quotation/print_quote/{id}', 'QuotationController@print_quote');

Route::get('/quotation/q_quotation/detail', 'QuotationController@detail');
Route::get('/quotation/q_quotation/histori', 'QuotationController@histori');
Route::get('/quotation/q_quotation/update_status', 'QuotationController@update_status');


// Purchase
Route::get('/purchase/belanjalangsung/belanjalangsung', 'PurchaseController@belanjalangsung');
Route::get('/purchase/hub_suplier/hub_suplier', 'PurchaseController@hub_suplier');

// Order
Route::get('/order/s_invoice/s_invoice', 'OrderController@s_invoice');

Route::get('/order/workorder/w_order', 'OrderController@w_order');
Route::get('/order/workorder/w_order/detail_workorder', 'OrderController@detail_workorder');
Route::get('/order/checklistform/checklistform', 'OrderController@checklist');
Route::get('/order/pelunasanorder/pelunasanorder', 'OrderController@pelunasanorder');
Route::get('/order/f_penjualan/f_penjualan', 'OrderController@f_penjualan');
Route::get('/order/cekbarang/cekbarang', 'OrderController@cekbarang');
    
    // PEMBAYARAN DEPOSIT
    Route::get('/order/pembayarandeposit/pembayarandeposit', 'OrderController@pembayarandeposit');
    Route::get('/order/pembayarandeposit/pembayarandeposit/detail_pembayarandeposit/{id}', 'OrderController@detail_pembayarandeposit');
    Route::get('/order/pembayarandeposit/pembayarandeposit/datatable_deposit', 'OrderController@datatable_deposit')->name('datatable_deposit');
    Route::get('/order/pembayarandeposit/save_deposit', 'OrderController@save_deposit');
    // END

    // SALES ORDER
    Route::get('/order/salesorder/s_order', 'OrderController@s_order');
    Route::get('/order/salesorder/datatable_so', 'OrderController@datatable_so')->name('datatable_so');
    Route::get('/order/salesorder/s_order/detail_salesorder/{id}', 'OrderController@detail_salesorder');
    Route::get('/order/salesorder/print_salesorder/{id}', 'OrderController@print_salesorder');
    // 
Route::get('/order/proforma/proforma', 'OrderController@proforma');
Route::get('/order/pelunasanorder/pelunasanorder/detail_pelunasanorder', 'OrderController@detail_pelunasanorder');
Route::get('/order/workorder/print_workorder', 'OrderController@print_workorder');
Route::get('/order/checklistform/print_checklistform', 'OrderController@print_checklistform');
Route::get('/order/s_invoice/print_salesinvoice', 'OrderController@print_salesinvoice');

// Pilih Project Manejmen Pompa | SHS
Route::get('/project/dokumentasi/dokumentasi', 'ProjectController@dokumentasi');
Route::get('/project/jadwalujicoba/jadwalujicoba', 'ProjectController@jadwalujicoba');
Route::get('/project/pemasangan/pemasangan', 'ProjectController@pemasangan');
Route::get('/project/pengadaanbarang/pengadaanbarang', 'ProjectController@pengadaanbarang');
Route::get('/project/pengepakanbarang/pengepakanbarang', 'ProjectController@pengepakanbarang');
Route::get('/project/pengirimanbarang/pengirimanbarang', 'ProjectController@pengirimanbarang');
Route::get('/project/salescommon/salescommon', 'ProjectController@salescommon');
Route::get('/project/technicianfee/technicianfee', 'ProjectController@technicianfee');
Route::get('/project/pengadaanbarang/prosespengadaanbarang', 'ProjectController@prosespengadaanbarang');
Route::get('/project/pengirimanbarang/prosespengirimanbarang', 'ProjectController@prosespengirimanbarang');

// Pompa
Route::get('/projectmp/pmp_dokumentasi/pmp_dokumentasi', 'PompaController@pmp_dokumentasi');
Route::get('/projectmp/pmp_jadwalujicoba/pmp_jadwalujicoba', 'PompaController@pmp_jadwalujicoba');
Route::get('/projectmp/pmp_pemasangan/pmp_pemasangan', 'PompaController@pmp_pemasangan');
Route::get('/projectmp/pmp_pengadaanbarang/pmp_pengadaanbarang', 'PompaController@pmp_pengadaanbarang');
Route::get('/projectmp/pmp_pengepakanbarang/pmp_pengepakanbarang', 'PompaController@pmp_pengepakanbarang');
Route::get('/projectmp/pmp_pengirimanbarang/pmp_pengirimanbarang', 'PompaController@pmp_pengirimanbarang');
Route::get('/projectmp/pmp_salescommon/pmp_salescommon', 'PompaController@pmp_salescommon');
Route::get('/projectmp/pmp_technicianfee/pmp_technicianfee', 'PompaController@pmp_technicianfee');

// SHS
Route::get('/projectms/shs_dokumentasi/shs_dokumentasi', 'SHSController@shs_dokumentasi');
Route::get('/projectms/shs_jadwalujicoba/shs_jadwalujicoba', 'SHSController@shs_jadwalujicoba');
Route::get('/projectms/shs_pemasangan/shs_pemasangan', 'SHSController@shs_pemasangan');
Route::get('/projectms/shs_pengadaanbarang/shs_pengadaanbarang', 'SHSController@shs_pengadaanbarang');
Route::get('/projectms/shs_pengepakanbarang/shs_pengepakanbarang', 'SHSController@shs_pengepakanbarang');
Route::get('/projectms/shs_pengirimanbarang/shs_pengirimanbarang', 'SHSController@shs_pengirimanbarang');
Route::get('/projectms/shs_salescommon/shs_salescommon', 'SHSController@shs_salescommon');
Route::get('/projectms/shs_technicianfee/shs_technicianfee', 'SHSController@shs_technicianfee');
Route::get('/projectms/shs_pengadaanbarang/shs_prosespengadaanbarang', 'SHSController@shs_prosespengadaanbarang');
Route::get('/projectms/shs_pengirimanbarang/shs_prosespengirimanbarang', 'SHSController@shs_prosespengirimanbarang');

// Manajemen Aset
Route::get('/manajemenaset/history/history', 'AsetController@history');
Route::get('/manajemenaset/penyusutan/penyusutan', 'AsetController@penyusutan');
Route::get('/manajemenaset/irventarisasi/irventarisasi', 'AsetController@irventarisasi');

// FInance
Route::get('/finance/reporting/reporting', 'FinanceController@reporting');
Route::get('/finance/evaluating/evaluating', 'FinanceController@evaluating');
Route::get('/finance/bookkeeping/bookkeeping', 'FinanceController@bookkeeping');
Route::get('/finance/costmanajemen/costmanajemen', 'FinanceController@costmanajemen');

// HRD
Route::get('/hrd/rekruitment/rekruitment', 'HRDController@rekruitment');
Route::get('/hrd/payroll/payroll', 'HRDController@payroll');
Route::get('/hrd/freelance/freelance', 'HRDController@freelance');
Route::get('/hrd/kesejahteraan/kesejahteraan', 'HRDController@kesejahteraan');
Route::get('/hrd/kpi/kpi', 'HRDController@kpi');

// ASS
Route::get('aftersales/tandaterima/tandaterima', 'ASSController@tandaterima');
Route::get('aftersales/repairreport/repairreport', 'ASSController@repairreport');
Route::get('aftersales/repairorder/repairorder', 'ASSController@repairorder');
Route::get('aftersales/rencanatindakan/rencanatindakan', 'ASSController@rencanatindakan');
Route::get('aftersales/kebutuhanbiaya/kebutuhanbiaya', 'ASSController@kebutuhanbiaya');

// Inventory
Route::get('inventory/barangkeluar/barangkeluar', 'InventoryController@barangkeluar');
Route::get('inventory/barcode/barcode', 'InventoryController@barcode');
Route::get('inventory/maintenance/maintenance', 'InventoryController@maintenance');
Route::get('inventory/suratpinjambarang/suratpinjambarang', 'InventoryController@suratpinjambarang');


            //---------------------- MASTER ------------Own: Deny------------\\            
//master vendor 
Route::get('/master/vendor/vendor', 'master\master_vendorController@vendor');
Route::get('/master/simpanvendor/simpan_vendor', 'master\master_vendorController@simpan_vendor');
Route::get('/master/hapusvendor/hapus_vendor', 'master\master_vendorController@hapus_vendor');
Route::get('/master/updatevendor/update_vendor', 'master\master_vendorController@update_vendor');
Route::get('/master/dataeditvendor/dataedit_vendor', 'master\master_vendorController@dataedit_vendor');
Route::get('/master/datatalble_vendor/datatalble_vendor', 'master\master_vendorController@datatalble_vendor')->name('datatalble_vendor');
Route::get('/master/vendor/edit_vendor', 'MasterController@edit_vendor');

//master marketing
Route::get('/quotation/marketing/marketing', 'master\master_marketingController@marketing');
Route::get('/quotation/simpanmarketing/simpan_marketing', 'master\master_marketingController@simpan_marketing');
Route::get('/quotation/simpanmarketing/kode_marketing', 'master\master_marketingController@kode_marketing')->name('kode_marketing');
Route::get('/quotation/hapusmarketing/hapus_marketing', 'master\master_marketingController@hapus_marketing');
Route::get('/quotation/updatemarketing/update_marketing', 'master\master_marketingController@update_marketing');
Route::get('/quotation/dataeditmarketing/dataedit_marketing', 'master\master_marketingController@dataedit_marketing');
Route::get('/quotation/datatalble_marketing/datatalble_marketing', 'master\master_marketingController@datatalble_marketing')->name('datatalble_marketing');

//master customer
Route::get('/master/customer/cust', 'MasterController@customer');
Route::get('/master/simpancustomer/simpan_customer', 'master\master_customerController@simpan_customer');
Route::get('/master/hapuscustomer/hapus_customer', 'master\master_customerController@hapus_customer');
Route::get('/master/updatecustomer/update_customer', 'master\master_customerController@update_customer');
Route::get('/master/dataeditcustomer/dataedit_customer', 'master\master_customerController@dataedit_customer');
Route::get('/master/datatalble_customer/datatalble_customer', 'master\master_customerController@datatalble_customer')->name('datatalble_customer');

//master Npenawaran
Route::get('/quotation/n_penawaran/n_penawaran', 'master\master_NpenawaranController@n_penawaran');
Route::get('/quotation/hapusNpenawaran/hapus_Npenawaran', 'master\master_NpenawaranController@hapus_Npenawaran');
Route::get('/quotation/updateNpenawaran/update_Npenawaran', 'master\master_NpenawaranController@update_Npenawaran');
Route::get('/quotation/n_penawaran/simpan_n_penawaran', 'master\master_NpenawaranController@simpan_Npenawaran');
Route::get('/quotation/dataeditNpenawaran/dataedit_Npenawaran', 'master\master_NpenawaranController@dataedit_Npenawaran');
Route::get('/quotation/datatable_Npenawaran/datatable_Npenawaran', 'master\master_NpenawaranController@datatable_Npenawaran')->name('datatable_Npenawaran');

//master pegawai 
Route::get('/master/pegawai/pegawai', 'master\master_pegawaiController@pegawai');
Route::get('/master/pegawai/kode_pegawai', 'master\master_pegawaiController@kode_pegawai')->name('kode_pegawai');
Route::get('/master/simpanpegawai/simpan_pegawai', 'master\master_pegawaiController@simpan_pegawai');
Route::get('/master/hapuspegawai/hapus_pegawai', 'master\master_pegawaiController@hapus_pegawai');
Route::get('/master/updatepegawai/update_pegawai', 'master\master_pegawaiController@update_pegawai');
Route::get('/master/dataeditpegawai/dataedit_pegawai', 'master\master_pegawaiController@dataedit_pegawai');
Route::get('/master/datatalble_pegawai/datatalble_pegawai', 'master\master_pegawaiController@datatalble_pegawai')->name('datatable_pegawai');

//master Bundle Item/barang
Route::get('/master/bundle/bundle', 'master\master_bundleitemController@bundleitem')->name('bundleitem');
Route::get('/master/hapusbundleitem/hapus_bundleitem', 'master\master_bundleitemController@hapus_bundleitem')->name('hapus_bundleitem');
Route::get('/master/detailbundleitem/detail_bundleitem', 'master\master_bundleitemController@detail_bundleitem')->name('detail_bundleitem');
Route::get('/master/updatebundleitem/update_bundleitem', 'master\master_bundleitemController@update_bundleitem')->name('update_bundleitem');
Route::get('/master/bundleitem/simpan_bundleitem', 'master\master_bundleitemController@simpan_bundleitem');
// Route::get('/master/dataeditbundleitem/dataedit_bundleitem', 'master\master_bundleitemController@dataedit_bundleitem')->name('dataedit_bundleitem');
Route::get('/master/datatable_bundleitem/datatable_bundleitem', 'master\master_bundleitemController@datatable_bundleitem')->name('datatable_bundleitem');
Route::get('/master/bundle/edit_bundle/{id}', 'master\master_bundleitemController@edit_bundle')->name('edit_bundle');

// ------------------------------ view edit bundle ari -------------------------------------------//
//------------------------------------------------------------------------------------------------//

// Edit Purchase Order
// Route::get('purchase/purchaseorder/edit_purchaseorder', 'PurchaseController@edit_purchaseorder');

// Edit Request Order
// Route::get('purchase/rencanapembelian/edit_rencanapembelian', 'PurchaseController@edit_rencanapembelian');
// Route::get('purchase/rencanapembelian/edit_rencanapembelian', 'PurchaseController@edit_rencanapembelian');

// Master Barang
Route::post('/master/barang/barangproses', 'MasterBarang\BarangController@barangproses');
Route::get('/master/barang/datatablebarang', 'MasterBarang\BarangController@datatable_barang')->name('datatable_barang');
Route::get('/master/barang/barang_edit', 'MasterBarang\BarangController@barang_edit');
Route::get('/master/barang/baranghapus', 'MasterBarang\BarangController@baranghapus');
Route::get('assets/barang/thumbnail')->name('barang_thumbnail');
Route::post('/master/barang/barang_update', 'MasterBarang\BarangController@barang_update');


        /* ,,,;''  :: ;,      ,,,;;;;;'''         ,;' ;;
          '''::    ::  '        '; ': ;'        ,::' ;;,,,,,,,,
         ,,,,;;,,,,;;,,,,   ,;'''''''''''';'  ;;':: ;;'  :: ,;'
             ::    ::        ,;';; ';, ';,,      ::   ,, :: .
             ::,;  :: ,;     ;' ';;;;;;' ';      ::   :: :: ':.
          .,;::'    :;;'         ,;,,,,,         ::  ;'  ::  ';
          '  ::   ,;;:. .       ''';,;'          ::      ::
            ';;  '   ``;'       .;;' ';;.        ;;     ';;*/

//--------------PURCHASE -----------deny------------\\

//request order
Route::get('/purchase/rencanapembelian/rencanapembelian', 'purchase\request_orderController@rencanapembelian');
Route::get('/purchase/rencanapembelian/kode_rencanapembelian', 'purchase\request_orderController@kode_rencanapembelian')->name('kode_rencanapembelian');
Route::get('/purchase/rencanapembelian/detail_rencanapembelian', 'purchase\request_orderController@detail_rencanapembelian')->name('detail_rencanapembelian');
Route::get('/purchase/rencanapembelian/hapus_rencanapembelian', 'purchase\request_orderController@hapus_rencanapembelian')->name('hapus_rencanapembelian');
Route::get('/purchase/rencanapembelian/detail_rencanapembelian', 'purchase\request_orderController@detail_rencanapembelian')->name('detail_rencanapembelian');
Route::get('/purchase/rencanapembelian/update_rencanapembelian', 'purchase\request_orderController@update_rencanapembelian')->name('update_rencanapembelian');
Route::get('/purchase/rencanapembelian/approve_rencanapembelian', 'purchase\request_orderController@approve_rencanapembelian')->name('approve_rencanapembelian');
Route::get('/purchase/rencanapembelian/simpan_rencanapembelian', 'purchase\request_orderController@simpan_rencanapembelian')->name('simpan_rencanapembelian');
Route::get('/purchase/rencanapembelian/dataedit_rencanapembelian', 'purchase\request_orderController@dataedit_rencanapembelian')->name('dataedit_rencanapembelian');
Route::get('/purchase/rencanapembelian/datatable_rencanapembelian', 'purchase\request_orderController@datatable_rencanapembelian')->name('datatable_rencanapembelian');
Route::get('/purchase/rencanapembelian/datatable_historypembelian', 'purchase\request_orderController@datatable_historypembelian')->name('datatable_historypembelian');

//Purchase Order 
Route::get('/purchase/purchaseorder/purchaseorder', 'purchase\purchase_orderController@purchaseorder')->name('purchaseorder');
Route::get('/purchase/purchaseorder/cari_ro_purchaseorder', 'purchase\purchase_orderController@cari_ro_purchaseorder')->name('cari_ro_purchaseorder');
Route::get('/purchase/purchaseorder/cari_po_purchaseorder', 'purchase\purchase_orderController@cari_po_purchaseorder')->name('cari_po_purchaseorder');
Route::get('/purchase/purchaseorder/create_purchaseorder', 'purchase\purchase_orderController@create_purchaseorder')->name('create_purchaseorder');
Route::get('/purchase/purchaseorder/datatable_purchaseorder', 'purchase\purchase_orderController@datatable_purchaseorder')->name('datatable_purchaseorder');
Route::get('/purchase/purchaseorder/save_purchaseorder', 'purchase\purchase_orderController@save_purchaseorder')->name('save_purchaseorder');
Route::get('/purchase/purchaseorder/hapus_purchaseorder', 'purchase\purchase_orderController@hapus_purchaseorder')->name('hapus_purchaseorder');
Route::get('/purchase/purchaseorder/detail_purchaseorder', 'purchase\purchase_orderController@detail_purchaseorder')->name('detail_purchaseorder');
Route::get('/purchase/purchaseorder/print_purchaseorder', 'purchase\purchase_orderController@print_purchaseorder')->name('print_purchaseorder');
Route::get('/purchase/purchaseorder/edit_purchaseorder', 'purchase\purchase_orderController@edit_purchaseorder')->name('edit_purchaseorder');

 //-----------------END OF PURCHASE------------------\\

                            
//--------INVENTORY-DENY-------\\

//penerimaan barang
Route::get('inventory/penerimaan_barang/penerimaan_barang', 'inventory\penerimaan_barangController@penerimaan_barang')->name('penerimaan_barang');
Route::get('inventory/penerimaan_barang/datatable_penerimaan_barang', 'inventory\penerimaan_barangController@datatable_penerimaan_barang')->name('datatable_penerimaan_barang');
Route::get('inventory/penerimaan_barang/create_penerimaan_barang', 'inventory\penerimaan_barangController@create_penerimaan_barang')->name('create_penerimaan_barang');
Route::get('inventory/penerimaan_barang/cari_penerimaan_barang', 'inventory\penerimaan_barangController@cari_penerimaan_barang')->name('cari_penerimaan_barang');
Route::get('inventory/penerimaan_barang/save_penerimaan_barang', 'inventory\penerimaan_barangController@save_penerimaan_barang')->name('save_penerimaan_barang');
Route::get('inventory/penerimaan_barang/edit_penerimaan_barang', 'inventory\penerimaan_barangController@edit_penerimaan_barang')->name('edit_penerimaan_barang');
Route::get('inventory/penerimaan_barang/update_penerimaan_barang', 'inventory\penerimaan_barangController@update_penerimaan_barang')->name('update_penerimaan_barang');
Route::get('inventory/penerimaan_barang/hapus_penerimaan_barang', 'inventory\penerimaan_barangController@hapus_penerimaan_barang')->name('hapus_penerimaan_barang');

//Stock Gudang
Route::get('inventory/stockgudang/stockgudang', 'inventory\stock_gudangController@stockgudang')->name('stockgudang');
Route::get('inventory/stockgudang/datatable_stockgudang', 'inventory\stock_gudangController@datatable_stockgudang')->name('datatable_stockgudang');
Route::get('inventory/stockgudang/detail_stockgudang', 'inventory\stock_gudangController@detail_stockgudang')->name('detail_stockgudang');

//Stock Opname
Route::get('inventory/opname/opname', 'inventory\stock_opnameController@stockopname')->name('stockopname');
Route::get('inventory/create_opname/create_opname', 'inventory\stock_opnameController@create_stockopname')->name('create_stockopname');
Route::get('inventory/create_opname/cari_stockopname', 'inventory\stock_opnameController@cari_stockopname')->name('cari_stockopname');




//END OF INVENTORY


// Master Type Barang
Route::get('/master/type/typeproses', 'MasterType\TypeController@typeproses');
Route::get('/master/type/type_edit', 'MasterType\TypeController@type_edit');
Route::get('/master/type/type_hapus', 'MasterType\TypeController@type_hapus');
Route::get('/master/type/type_update', 'MasterType\TypeController@type_update');
Route::get('/master/type/datatable_type', 'MasterType\TypeController@datatable_type')->name('datatable_type');


}); // End Route Groub middleware auth

