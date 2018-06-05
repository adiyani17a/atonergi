@extends('main')
@section('content')

@include('order/pelunasanorder/cari_pelunasanorder')
<!-- partial -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">	
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb bg-info">
					<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
					<li class="breadcrumb-item">Order</li>
					<li class="breadcrumb-item active" aria-current="page">Payment</li>
				</ol>
			</nav>
		</div>
		<div class="col-lg-12 grid-margin stretch-card">
	      	<div class="card">
		        <div class="card-body">
		          <h4 class="card-title">Payment</h4>
		          	<div class="row">
		          		
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="form-group">
								<select class="form-control">
									<option>-</option>
									<optgroup label="Q.O.#">
										<option>A001</option>
										<option selected="">A002</option>
									</optgroup>
									<optgroup label="S.O.#">
										<option>B001</option>
										<option>B002</option>
									</optgroup>
								</select>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12" style="margin-bottom: 15px;">
							<button class="btn btn-info" data-toggle="modal" data-target="#cari"><i class="fa fa-search"></i>&nbsp;&nbsp;Search S.O.#/Q.O.#</button>
						</div>
						<div class="table-responsive">
							<table class="table table-hover data-table" cellspacing="0">
							  <thead class="bg-gradient-info">
							    <tr>
							      <th>Code</th>
							      <th>Tanggal</th>
							      <th>Customer</th>
							      <th>Total Bill</th>
							      <th>Payment</th>
							      <th>Total Balance</th>
							      <th>Action</th>
							    </tr>
							  </thead>
							  <tbody>
							    
							  </tbody>
							</table>
						</div>
						
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