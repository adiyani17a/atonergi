@extends('main')
@section('content')

<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Order</li>
				<li class="breadcrumb-item active" aria-current="page">Pembayaran Deposit</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Pembayaran Deposit</h4>
	          	
	          	<div class="table-responsive" style="margin-bottom: 15px;">
		            <table class="table table-hover data-table" cellspacing="0">
			              <thead class="bg-gradient-info">
			                <tr>
			                  <th>Q.O.#</th>
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
			                  <td>Bravo</td>
			                  <td align="left">Rp. 700.000,-</td>
			                  <td align="left">Rp. 0,-</td>
			                  <td align="left">Rp. 700.000,-</td>
			                  <td><a href="{{url('order/pembayarandeposit/pembayarandeposit/detail_pembayarandeposit')}}" class="btn btn-outline-info btn-sm">Process</a></td>
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