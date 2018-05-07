@extends('main')
@section('content')

@include('purchase.rencanapembelian.tambah')


<!-- partial -->
<div class="content-wrapper">
  <div class="col-lg-12">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb bg-info">
        <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
        <li class="breadcrumb-item">Purchase</li>
        <li class="breadcrumb-item active" aria-current="page">Rencana Pembelian</li>
      </ol>
    </nav>
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <div class="card-title">
                    <ul class="nav nav-tabs tab-solid  tab-solid-primary" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="tab-6-1" data-toggle="tab" href="#daftar" role="tab" aria-controls="daftar" aria-selected="true"><i class="fa fa-list"></i>Daftar Rencana Pembelian</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="tab-6-2" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false"><i class="mdi mdi-history"></i>History Rencana Pembelian</a>
                      </li>
                      <!-- <li class="nav-item">
                        <a class="nav-link" id="tab-6-3" data-toggle="tab" href="#tab-ke-3" role="tab" aria-controls="tab-ke-3" aria-selected="false"><i class="mdi mdi-message-text-outline"></i>Contact</a>
                      </li> -->
                    </ul>
                  </div>

                      <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
                      </div>

                  <div class="tab-content tab-content-solid">
                    <div class="tab-pane fade show active" id="daftar" role="tabpanel" aria-labelledby="tab-6-1">

                      <div class="table-responsive">
                        <table class="table data-table table-hover table-bordered" cellspacing="0">
                          <thead class="bg-gradient-info">
                              <tr>
                                <th class="wd-15p">No</th>
                                <th class="wd-15p">Item Name</th>
                                <th class="wd-20p">Vendor</th>
                                <th class="wd-15p">Amount Requsted</th>
                                <th class="wd-10p">Amount Approved</th>
                                <th class="wd-15p">Status</th>
                                <th class="wd-15p">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <td>1</td>
                                  <td>Kabel</td>
                                  <td><i class="fa fa-check"></i></td>
                                  <td>10</td>
                                  <td></td>
                                  <td>
                                    <span class="badge badge-warning">Waiting</span>
                                  </td>
                                  <td>
                                    <div class="">    
                                      <a href="#" class="btn btn-outline-info btn-sm" title="Setuju"><i class="fa fa-check"></i></a>
                                      <a href="#" class="btn btn-outline-danger btn-sm" title="Pending"><i class="fa fa-times"></i></a>
                                    </div> 
                                  </td>
                                </tr>
                                
                            </tbody>
                                       
                          </table> 
                      </div>

                    </div> <!-- end div daftar -->

                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="tab-6-2">
                      <div class="table-responsive">
                        <table class="table table-hover table-bordered data-table" cellspacing="0">
                          <thead class="bg-gradient-info">
                            <tr>
                              <th class="wd-15p">No</th>
                              <th class="wd-15p">Item Name</th>
                              <th class="wd-20p">Vendor</th>
                              <th class="wd-15p">Amount Requested</th>
                              <th class="wd-10p">Amount Approved</th>
                              <th class="wd-15p">Status</th>
                              <th class="wd-15p">Action</th>
                            </tr>
                          </thead>

                          <tbody>
                            <tr>
                                <td>1</td>
                                <td>Kabel</td>
                                <td><i class="fa fa-check"></i></td>
                                <td>10</td>
                                <td></td>
                                <td>
                                  <span class="badge badge-success">Approved</span>
                                </td>
                                <td align="center">
                                 .. 
                                </td>
                              </tr>
                             
                          </tbody>
                        
                        </table> 
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tab-ke-3" role="tabpanel" aria-labelledby="tab-6-3">
                      <!-- content -->
                    </div>

                  </div> <!-- end div tab-content -->

                </div><!-- end div card --> 
              </div>
            </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

@endsection