@extends('main')
@section('content')
<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Order</li>
				<li class="breadcrumb-item active" aria-current="page">Sales Order</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Sales Order</h4>
	          		
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

					<div class="table-responsive">
						<table class="table table-hover table-bordered data-table" cellspacing="0">
							<thead class="bg-gradient-info">
								<tr>
									<th>S.O.#</th>
									<th>S.I.#</th>
									<th>Customer</th>
									<th>Total Bill</th>
									<th>DP</th>
									<th>Total Balance</th>
									<th>Action</th>
                				</tr>
							</thead>
							<tbody>
				                <tr>
				                  <td>A002</td>
				                  <td>I001</td>
				                  <td>Bravo</td>
				                  <td align="left">Rp. 700.000,-</td>
				                  <td align="left">Rp. 700.000,-</td>
				                  <td align="left">Rp. 0,-</td>
				                  <td>
				                  	<div class="btn-group">
				                  		<a href="{{url('order/salesorder/s_order/detail_salesorder')}}" class="btn btn-info btn-sm">Detail</a>
				                  		<a href="{{url('order/salesorder/print_salesorder')}}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
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