@extends('main')
@section('content')

@include('purchase.purchaseorder.tambah')

@include('purchase.purchaseorder.detail_purchaseorder')

<!-- partial -->
<div class="content-wrapper">
  <div class="col-lg-12"> 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb bg-info">
        <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
        <li class="breadcrumb-item">Purchase</li>
        <li class="breadcrumb-item active" aria-current="page">Purchase Order</li>
      </ol>
    </nav>
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Purchase Order</h4>
                  <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover data-table" cellspacing="0">
                      <thead class="bg-gradient-info">
                        <tr>
                          <th>No</th>
                          <th>P.O.#</th>
                          <th>Vendor</th>
                          <th>Item</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>PO-001</td>
                          <td>Zulu</td>
                          <td>
                            <button data-toggle="modal" data-target="#detail_item" class="btn btn-outline-primary btn-sm">Detail</button>
                          </td>
                          <td>Rp. 600.000,00</td>
                          <td><span class="badge badge-warning badge-pill">In Process</span></td>
                          <td>
                            <div class="btn-group">
                              <a href="{{url('purchase/purchaseorder/print_purchaseorder')}}" class="btn btn-info btn-sm" target="_blank" title="Print"><i class="fa fa-print"></i></a>
                              <a href="#" class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                              <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash-o"></i></a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

@endsection