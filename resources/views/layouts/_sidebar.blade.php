<!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{url('/home')}}">
          <img src="{{asset('assets/atonergi.png')}}" alt="logo" style="margin-left: auto;">
          <!-- <h1 style="margin:auto; ">Kinaya</h1> -->
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{url('/home')}}">
          <img src="{{asset('assets/atonergi-mini.png')}}" alt="logo"/>
          <!-- <h1 style="margin:auto; ">A</h1> -->
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field ml-4 d-none d-md-block">
          <form class="d-flex align-items-stretch h-100" action="#">
            <div class="input-group">
              <input id="filterInput" type="text" class="form-control bg-transparent border-0" onchange="myFunction()" onfocus="myFunction()" onkeyup="myFunction()" placeholder="Search Menu">
              <div class="input-group-btn">
                <button id="btn-reset" type="button" class="btn bg-transparent px-0 d-none" onclick="btnReset()" style="cursor: pointer;"><i class="fa fa-times"></i></button>
                <!-- <button type="button" class="btn bg-transparent dropdown-toggle px-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="mdi mdi-earth"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="#">Today</a>
                  <a class="dropdown-item" href="#">This week</a>
                  <a class="dropdown-item" href="#">This month</a>
                  <div role="separator" class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Month and older</a>
                </div> -->
              </div>
              <div class="input-group-addon bg-transparent border-0 search-button">
                <button type="button" class="btn btn-sm bg-transparent px-0">
                  <i class="mdi mdi-magnify"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
         <!--  <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-email-outline"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <h6 class="p-3 mb-0">Messages</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{asset('assets/images/faces/face4.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                  <p class="text-gray mb-0">
                    1 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{asset('assets/images/faces/face2.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                  <p class="text-gray mb-0">
                    15 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="{{asset('assets/images/faces/face3.jpg')}}" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                  <p class="text-gray mb-0">
                    18 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">4 new messages</h6>
            </div>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell-outline"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <h6 class="p-3 mb-0">Notifications</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-calendar"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                  <p class="text-gray ellipsis mb-0">
                    Just a reminder that you have an event today
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-settings"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                  <p class="text-gray ellipsis mb-0">
                    Update dashboard
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-link-variant"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                  <p class="text-gray ellipsis mb-0">
                    New admin wow!
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">See all notifications</h6>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-profile" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <img src="{{route('thumbnail').'/'.Auth::user()->m_image}}" alt="image">
              <span class="d-none d-lg-inline">{{Auth::user()->m_name}}</span>
            </a>
            <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached mr-2 text-success"></i>
                Activity Log
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ url('logout') }}">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
            </div>
          </li>
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="{{ url('logout') }}">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
          <form id="logout-form" action="{{ url('logout') }}" method="post" style="display: none;">
              {{ csrf_field() }}
          </form>
          <li class="nav-item nav-settings d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="mdi mdi-format-line-spacing"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="row row-offcanvas row-offcanvas-right">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav" id="ayaysir">
            <li class="nav-item {{Request::is('home') ? 'active' : ''}}">
              <a class="nav-link" href="{{url('/home')}}">
                <span class="menu-title">Dashboard</span>
                <span class="menu-sub-title">( 2 new updates )</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item {{Request::is('setting') ? 'active' : '' || Request::is('setting/*') ? 'active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#setting" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Setting</span>
                <span class="d-none">
                  Setting Level Account
                  Setting Account
                  Setting Hak Akses
                  Setting Daftar Menu
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-settings menu-icon mdi-spin"></i>
              </a>
              <div class="collapse {{Request::is('setting') ? 'show' : '' || Request::is('setting/*') ? 'show' : '' }}" id="setting">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link {{Request::is('setting/jabatan') ? 'active' : '' || Request::is('setting/jabatan/*') ? 'active' : '' }}" href="{{url('setting/jabatan')}}">Setting Level Account</a></li>

                  <li class="nav-item"> <a class="nav-link {{Request::is('setting/akun') ? 'active' : '' || Request::is('setting/akun/*') ? 'active' : '' }}" href="{{url('setting/akun')}}">Setting Account </a></li>

                  <li class="nav-item"> <a class="nav-link {{Request::is('setting/hak_akses') ? 'active' : '' || Request::is('setting/hak_akses/*') ? 'active' : '' }}" href="{{url('setting/hak_akses')}}">Setting Hak Akses</a></li>

                  <li class="nav-item"> <a class="nav-link {{Request::is('setting/daftar_menu') ? 'active' : '' || Request::is('setting/daftar_menu/*') ? 'active' : '' }}" href="{{url('setting/daftar_menu')}}">Setting Daftar Menu</a></li>
                </ul>
                </div>
            </li>
            <li class="nav-item {{Request::is('master') ? 'active' : '' || Request::is('master/*') ? 'active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#master" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Master</span>
                  <span class="d-none">
                    Master Data Customer
                    Master Data Vendor
                    Master Data Pegawai
                    Master Data Jabatan
                    Master Data Akun Keuangan
                    Master Data Transaksi Keuangan
                    Master Data Barang
                    Master Data Bundle Item
                    Master Data Tipe Barang
                    Master Data Status Q.O.#
                    Master Data TTD
                    Master Currency
                    Master Data Bank
                    Master Data Jasa
                  </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse {{Request::is('master') ? 'show' : '' || Request::is('master/*') ? 'show' : '' }}" id="master">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link {{Request::is('master/vendor/vendor') ? 'active' : '' || Request::is('master/vendor/*') ? 'active' : '' }}" href="{{url('master/vendor/vendor')}}">Master Data Vendor</a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('master/customer/cust') ? 'active' : '' || Request::is('master/customer/*') ? 'active' : '' }}" href="{{url('master/customer/cust')}}">Master Data Customer</a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('master/pegawai/pegawai') ? 'active' : '' || Request::is('master/pegawai/*') ? 'active' : '' }}" href="{{url('master/pegawai/pegawai')}}">Master Data Pegawai</a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('master/jabatan/jabatan') ? 'active' : '' || Request::is('master/jabatan/*') ? 'active' : '' }}" href="{{url('master/jabatan/jabatan')}}">Master Data Jabatan</a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('master/akun/a_keuangan') ? 'active' : '' || Request::is('master/akun/*') ? 'active' : '' }}" href="{{url('master/akun/a_keuangan')}}">Master Data Akun Keuangan</a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('master/transaksi/t_keuangan') ? 'active' : '' || Request::is('master/transaksi/*') ? 'active' : '' }}" href="{{url('master/transaksi/t_keuangan')}}">Master Data Transaksi<br> Keuangan</a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('master/barang/barang') ? 'active' : '' || Request::is('master/barang/*') ? 'active' : '' }}" href="{{url('master/barang/barang')}}">Master Data Barang</a></li>

                    <li class="nav-item">
                      <a class="{{Request::is('master/jasa/*') ? 'active' : ''}} nav-link" href="{{route('master_jasa')}}">
                        Master Data Jasa
                      </a>
                    </li>

                  <li class="nav-item"> <a class="nav-link {{Request::is('master/type/type') ? 'active' : '' || Request::is('master/type/*') ? 'active' : '' }}" href="{{url('master/type/type')}}">Master Data Tipe Barang</a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('master/bundle/bundle') ? 'active' : '' || Request::is('master/bundle/*') ? 'active' : '' }}" href="{{url('master/bundle/bundle')}}">Master Data Bundle Item</a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('master/status/*') ? 'active' : '' }}" href="{{url('master/status/status')}}">Master Data Status Q.O.#</a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('master/ttd/*') ? 'active' : '' }}" href="{{url('master/ttd/ttd')}}">Master Data TTD</a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('master/currency/*') ? 'active' : '' }}" href="{{url('master/currency/index')}}">Master Currency</a></li>
                  <li class="nav-item">
                    <a class="{{Request::is('master/bank/*') ? 'active' : ''}} nav-link" href="{{route('master_bank')}}">
                      Master Data Bank
                    </a>
                  </li>

                </ul>
                </div>
            </li>
            <li class="nav-item {{Request::is('quotation') ? 'active' : '' || Request::is('quotation/*') ? 'active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#m_pembelian" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Quotation</span>
                <span class="d-none">
                  Tim Marketing
                  {{-- Nilai Penawaran --}}
                 {{--  Klasifikasi Penawaran
                  Penawaran : PDF --}}
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-format-quote-close menu-icon"></i>
              </a>
              <div class="collapse {{Request::is('quotation') ? 'show' : '' || Request::is('quotation/*') ? 'show' : '' }}" id="m_pembelian">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link {{Request::is('quotation/q_quotation/q_quotation') ? 'active' : '' || Request::is('quotation/q_quotation/*') ? 'active' : '' }}" href="{{url('quotation/q_quotation/q_quotation')}}">Quotation</a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('quotation/marketing/marketing') ? 'active' : '' || Request::is('quotation/marketing/*') ? 'active' : '' }}" href="{{url('quotation/marketing/marketing')}}">Tim Marketing<span class="d-none">Quotation</span></a></li>
               {{--    <li class="nav-item"> <a class="nav-link {{Request::is('quotation/n_penawaran/n_penawaran') ? 'active' : '' || Request::is('quotation/n_penawaran/*') ? 'active' : '' }}" href="{{url('quotation/n_penawaran/n_penawaran')}}">Nilai Penawaran<span class="d-none">Quotation</span></a></li> --}}
                  {{-- <li class="nav-item"> <a class="nav-link {{Request::is('quotation/k_penawaran/k_penawaran') ? 'active' : '' || Request::is('quotation/k_penawaran/*') ? 'active' : '' }}" href="{{url('quotation/k_penawaran/k_penawaran')}}">Klasifikasi Penawaran<span class="d-none">Quotation</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('quotation/pdf_penawaran/pdf_penawaran') ? 'active' : '' || Request::is('quotation/pdf_penawaran/*') ? 'active' : '' }}" href="{{url('quotation/pdf_penawaran/pdf_penawaran')}}">Penawaran : PDF<span class="d-none">Quotation</span></a></li> --}}
                </ul>
                </div>
            </li>
            <li class="nav-item {{Request::is('order') ? 'active' : '' || Request::is('order/*') ? 'active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#m_stock" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Order</span>
                <span class="d-none">
                  Proforma Invoice
                  Pembayaran Deposit
                  Sales Order
                  Check Stock
                  Work Order
                  Sales Invoice
                  Payment Order
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cart menu-icon"></i>
              </a>
              <div class="collapse {{Request::is('order') ? 'show' : '' || Request::is('order/*') ? 'show' : '' }}" id="m_stock">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link {{Request::is('order/proforma_invoice') ? 'active' : '' || Request::is('order/proforma_invoice/*') ? 'active' : '' }}" href="{{url('order/proforma_invoice')}}">Proforma Invoice<span class="d-none">Order</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('order/pembayarandeposit/pembayarandeposit') ? 'active' : '' || Request::is('order/pembayarandeposit/*') ? 'active' : '' }}" href="{{url('order/pembayarandeposit/pembayarandeposit')}}">Pembayaran Deposit<span class="d-none">Order</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('order/salesorder/s_order') ? 'active' : '' || Request::is('order/salesorder/*') ? 'active' : '' }}" href="{{url('order/salesorder/s_order')}}"> Sales Order<span class="d-none">Order</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('order/cekbarang/cekbarang') ? 'active' : '' || Request::is('order/cekbarang/*') ? 'active' : '' }}" href="{{url('order/cekbarang/cekbarang')}}">Check Stock<span class="d-none">Order</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('order/workorder/w_order') ? 'active' : '' || Request::is('order/workorder/*') ? 'active' : '' }}" href="{{url('order/workorder/w_order')}}">Work Order<span class="d-none">Order</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('order/s_invoice/s_invoice') ? 'active' : '' || Request::is('order/s_invoice/*') ? 'active' : '' }}" href="{{url('order/s_invoice/s_invoice')}}">Sales Invoice<span class="d-none">Order</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('order/payment_order') ? 'active' : '' || Request::is('order/payment_order/*') ? 'active' : '' }}" href="{{url('order/payment_order')}}">Payment Order<span class="d-none">Order</span></a></li>
                </ul>
                </div>
            </li>
            <li class="nav-item {{Request::is('project/*') ? 'active' : ''}}">
              <a class="nav-link" data-toggle="collapse" href="#pompa" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">After Order</span>
                <span class="d-none">
                  Pengadaan Barang
                  Pengiriman Barang
                  Pemasangan
                  Schedule Uji Coba dan Dokumetasi
                  Sales Common
                  Technician Fee
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-engine menu-icon"></i>
              </a>
              <div class="collapse {{Request::is('project/*') ? 'show' : ''}}" id="pompa">
                <ul class="nav flex-column sub-menu">

                  {{-- <li class="nav-item"> <a class="nav-link {{Request::is('project/pengadaanbarang/*') ? 'active' : ''
                  }}" href="{{url('project/pengadaanbarang/pengadaanbarang')}}">Pengadaan Barang<span class="d-none">After Order</span></a></li> --}}

                  <li class="nav-item"> <a class="nav-link {{Request::is('project/pengirimanbarang/*') ? 'active' : ''
                  }}" href="{{url('project/pengirimanbarang/pengirimanbarang')}}">Pengiriman Barang<span class="d-none">After Order</span></a></li>

                  <li class="nav-item"> <a class="nav-link {{Request::is('project/pemasangan/*') ? 'active' : ''
                  }}" href="{{url('project/pemasangan/pemasangan')}}">Pemasangan<span class="d-none">After Order</span></a></li>

                  <li class="nav-item"> <a class="nav-link {{Request::is('project/jadwalujicoba/*') ? 'active' : ''
                 }}" href="{{url('project/jadwalujicoba/jadwalujicoba')}}">Schedule Uji Coba dan <br>Dokumentasi<span class="d-none">After Order Schedule Uji Coba dan Dokumentasi</span></a></li>

                  <li class="nav-item"> <a class="nav-link {{Request::is('project/salescommon/*') ? 'active' : ''
                  }}" href="{{url('project/salescommon/salescommon')}}">Sales Common<span class="d-none">After Order</span></a></li>

                  <li class="nav-item"> <a class="nav-link {{Request::is('project/technicianfee/*') ? 'active' : ''
                  }}" href="{{url('project/technicianfee/technicianfee')}}">Technician Fee<span class="d-none">After Order</span></a></li>


                </ul>

                </div>
            </li>
            <li class="nav-item {{Request::is('purchase') ? 'active' : '' || Request::is('purchase/*') ? 'active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#m_penjualan" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Purchase</span>
                <span class="d-none">

                  Request Order
                  Belanja Langsung
                  Purchase Order
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-credit-card menu-icon"></i>
              </a>
              <div class="collapse {{Request::is('purchase') ? 'show' : '' || Request::is('purchase/*') ? 'show' : '' }}" id="m_penjualan">
                <ul class="nav flex-column sub-menu">

                  <li class="nav-item"> <a class="nav-link {{Request::is('purchase/rencanapembelian/rencanapembelian') ? 'active' : '' || Request::is('purchase/rencanapembelian/*') ? 'active' : '' }}" href="{{url('purchase/rencanapembelian/rencanapembelian')}}">Request Order<span class="d-none">Purchase</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('purchase/purchaseorder/purchaseorder') ? 'active' : '' || Request::is('purchase/purchaseorder/*') ? 'active' : '' }}" href="{{url('purchase/purchaseorder/purchaseorder')}}">Purchase Order<span class="d-none">Purchase</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('purchase/belanjalangsung/belanjalangsung') ? 'active' : '' || Request::is('purchase/belanjalangsung/*') ? 'active' : '' }}" href="{{url('purchase/belanjalangsung/belanjalangsung')}}">Belanja Langsung<span class="d-none">Purchase</span></a></li>
                </ul>
                </div>
            </li>



            <li class="nav-item {{Request::is('inventory') ? 'active' : '' || Request::is('inventory/*') ? 'active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#inven" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Inventory</span>
                <span class="d-none">
                  Penerimaan Barang
                  Pengeluaran Barang
                  Stock Opname
                  Stock Gudang
                  Stock Barang
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-arrow-up-bold-box-outline menu-icon"></i>
              </a>
              <div class="collapse {{Request::is('inventory') ? 'show' : '' || Request::is('inventory/*') ? 'show' : '' }}" id="inven">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link {{Request::is('inventory/penerimaan_barang/penerimaan_barang') ? 'active' : '' || Request::is('inventory/penerimaan_barang/*') ? 'active' : '' }}" href="{{url('inventory/penerimaan_barang/penerimaan_barang')}}">Penerimaan Barang<span class="d-none">Inventory</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('inventory/barangkeluar/barangkeluar') ? 'active' : '' || Request::is('inventory/barangkeluar/*') ? 'active' : '' }}" href="{{url('inventory/barangkeluar/barangkeluar')}}">Pengeluaran Barang<span class="d-none">Inventory</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('inventory/stockbarang/stockbarang') ? 'active' : '' || Request::is('inventory/stockbarang/*') ? 'active' : '' }}" href="{{url('inventory/stockbarang/stockbarang')}}">Input Stock Barang<span class="d-none">Inventory</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('inventory/stockgudang/stockgudang') ? 'active' : '' || Request::is('inventory/stockgudang/*') ? 'active' : '' }}" href="{{url('inventory/stockgudang/stockgudang')}}">Stock Gudang<span class="d-none">Inventory</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('inventory/opname/opname') ? 'active' : '' || Request::is('inventory/opname/*') ? 'active' : '' }}" href="{{url('inventory/opname/opname')}}">Stock Opname<span class="d-none">Inventory</span></a></li>
                </ul>
                </div>
            </li>
            <li class="nav-item {{Request::is('hrd') ? 'active' : '' || Request::is('hrd/*') ? 'active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#hrd" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">HRD</span>
                <span class="d-none">
                  Rekruitment
                  Payroll
                  Freelance
                  Kesejahteraan
                  Data KPI
                  
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-account-multiple menu-icon"></i>
              </a>
              <div class="collapse {{Request::is('hrd') ? 'show' : '' || Request::is('hrd/*') ? 'show' : '' }}" id="hrd">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link {{Request::is('hrd/absensi/absensi') ? 'active' : '' || Request::is('hrd/absensi/*') ? 'active' : '' }}" href="{{url('hrd/absensi/absensi')}}">Absensi<span class="d-none">HRD</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('hrd/payroll/payroll') ? 'active' : '' || Request::is('hrd/payroll/*') ? 'active' : '' }}" href="{{url('hrd/payroll/payroll')}}">Payroll<span class="d-none">HRD</span></a></li>
                  {{-- <li class="nav-item"> <a class="nav-link {{Request::is('hrd/payroll_manajemen/payroll_manajemen') ? 'active' : '' || Request::is('hrd/payroll_manajemen/*') ? 'active' : '' }}" href="{{url('hrd/payroll_manajemen/payroll_manajemen')}}">Payroll Pegawai Manajemen<span class="d-none">HRD</span></a></li> --}}
                  <li class="nav-item"> <a class="nav-link {{Request::is('hrd/scoreboard_pegawai/scoreboard_pegawai') ? 'active' : '' || Request::is('hrd/scoreboard_pegawai/*') ? 'active' : '' }}" href="{{url('hrd/scoreboard_pegawai/scoreboard_pegawai')}}">Scoreboard Pegawai<span class="d-none">HRD</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('hrd/data_kpi/data_kpi') ? 'active' : '' || Request::is('hrd/data_kpi/*') ? 'active' : '' }}" href="{{url('hrd/data_kpi/data_kpi')}}">Data KPI<span class="d-none">HRD</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('hrd/manajemen_scoreboard/manajemen_scoreboard') ? 'active' : '' || Request::is('hrd/manajemen_scoreboard/*') ? 'active' : '' }}" href="{{url('hrd/manajemen_scoreboard/manajemen_scoreboard')}}">Manajemen Scoreboard<span class="d-none">HRD</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('hrd/manajemen_scoreboard_kpi/manajemen_scoreboard_kpi') ? 'active' : '' || Request::is('hrd/manajemen_scoreboard_kpi/*') ? 'active' : '' }}" href="{{url('hrd/manajemen_scoreboard_kpi/manajemen_scoreboard_kpi')}}">Scoreboard & KPI<span class="d-none">HRD</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('hrd/recruitment/recruitment') ? 'active' : '' || Request::is('hrd/recruitment/*') ? 'active' : '' }}" href="{{url('hrd/recruitment/recruitment')}}">Recruitment<span class="d-none">HRD</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('hrd/manajemen_surat/manajemen_surat') ? 'active' : '' || Request::is('hrd/manajemen_surat/*') ? 'active' : '' }}" href="{{url('hrd/manajemen_surat/manajemen_surat')}}">Manajemen Surat<span class="d-none">HRD</span></a></li>
                </ul>
                </div>
            </li>
            <li class="nav-item {{Request::is('finance') ? 'active' : '' || Request::is('finance/*') ? 'active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#finance" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Finance</span>
                <span class="d-none">
                  Cost Manajemen
                  Bookkeeping
                  Reporting
                  Evaluating
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-chart-areaspline menu-icon"></i>
              </a>
              <div class="collapse {{Request::is('finance') ? 'show' : '' || Request::is('finance/*') ? 'show' : '' }}" id="finance">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link {{Request::is('finance/costmanajemen/costmanajemen') ? 'active' : '' || Request::is('finance/costmanajemen/*') ? 'active' : '' }}" href="{{url('finance/costmanajemen/costmanajemen')}}">Cost Manajemen<span class="d-none">Finance</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('finance/bookkeeping/bookkeeping') ? 'active' : '' || Request::is('finance/bookkeeping/*') ? 'active' : '' }}" href="{{url('finance/bookkeeping/bookkeeping')}}">Bookkeeping<span class="d-none">Finance</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('finance/reporting/reporting') ? 'active' : '' || Request::is('finance/reporting/*') ? 'active' : '' }}" href="{{url('finance/reporting/reporting')}}">Reporting<span class="d-none">Finance</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('finance/evaluating/evaluating') ? 'active' : '' || Request::is('finance/evaluating/*') ? 'active' : '' }}" href="{{url('finance/evaluating/evaluating')}}">Evaluating<span class="d-none">Finance</span></a></li>
                </ul>
                </div>
            </li>
            <li class="nav-item {{Request::is('manajemenaset') ? 'active' : '' || Request::is('manajemenaset/*') ? 'active' : '' }}">
              <a class="nav-link" data-toggle="collapse" href="#aset" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Manajemen Aset</span>
                <span class="d-none">
                  Irventarisasi
                  History
                  Penyusutan
                </span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-chart-line menu-icon"></i>
              </a>
              <div class="collapse {{Request::is('manajemenaset') ? 'show' : '' || Request::is('manajemenaset/*') ? 'show' : '' }}" id="aset">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link {{Request::is('manajemenaset/irventarisasi/irventarisasi') ? 'active' : '' || Request::is('manajemenaset/irventarisasi/*') ? 'active' : '' }}" href="{{url('manajemenaset/irventarisasi/irventarisasi')}}">Irventarisasi<span class="d-none">Manajemen Aset</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('manajemenaset/history/history') ? 'active' : '' || Request::is('manajemenaset/history/*') ? 'active' : '' }}" href="{{url('manajemenaset/history/history')}}">History<span class="d-none">Manajemen Aset</span></a></li>
                  <li class="nav-item"> <a class="nav-link {{Request::is('manajemenaset/penyusutan/penyusutan') ? 'active' : '' || Request::is('manajemenaset/penyusutan/*') ? 'active' : '' }}" href="{{url('manajemenaset/penyusutan/penyusutan')}}">Penyusutan<span class="d-none">Manajemen Aset</span></a></li>
                </ul>
                </div>
            </li>
          </ul>

        </nav>
