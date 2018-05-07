@extends('main')
@section('content')

@include('order/s_invoice/detail_salesinvoice')

<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Order</li>
				<li class="breadcrumb-item active" aria-current="page">Sales Invoice</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Sales Invoice</h4>
	          		<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="alert alert-primary alert-dismissible" title="DP sudah Lunas">
							    <button type="button" class="close" data-dismiss="alert">&times;</button>
							    <strong>Notice!</strong> <br>
							    DP Paid Off
							    <label class="badge badge-pill badge-primary">0</label>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="alert alert-warning alert-dismissible" title="DP belum Lunas">
							    <button type="button" class="close" data-dismiss="alert">&times;</button>
							    <strong>Notice!</strong> <br>
							    DP not yet paid off
							    <label class="badge badge-pill badge-warning">0</label>
							</div>
						</div>
					</div>

	          	<div class="">
	          		<div class="table-responsive">
	          			<table class="table table-hover table-bordered data-table" cellspacing="0">
	          				<thead class="bg-gradient-info">
	          					<tr>
	          						<th>No</th>
	          						<th>S.O.#/Q.O.#</th>
	          						<th>Customer Item</th>
	          						<th>Total</th>
	          						<th>Status</th>
	          						<th>Action</th>
	          					</tr>
	          				</thead>
	          				<tbody>
	          					<tr>
	          						<td>1</td>
	          						<td>A002</td>
	          						<td>
	          							<button data-toggle="modal" data-target="#detail_item" class="btn-outline-info btn btn-sm">Detail</button>
	          						</td>
	          						<td>Rp. 0</td>
	          						<td>
	          							<span class="badge badge-warning badge-pill">Not yet paid off</span>
	          						</td>
	          						<td>
	          							<a href="{{url('order/s_invoice/print_salesinvoice')}}" target="_blank" class="btn btn-outline-primary btn-sm" title="Print"><i class="fa fa-print"></i></a>
	          						</td>
	          					</tr>
	          				</tbody>
	          			</table>
	          		</div>
	        	</div>
	      	</div>
    	</div>
	</div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

@endsection