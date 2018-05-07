@extends('main')
@section('content')
@include('order/workorder/cari_workorder')
<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Order</li>
				<li class="breadcrumb-item active" aria-current="page">Work Order</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Work Order</h4>
	          	
	          		
					
					
					<div class="table-responsive" style="margin-bottom: 15px;">
			            <table class="table table-hover data-table" cellspacing="0">
			              <thead class="bg-gradient-info">
			                <tr>
			                  <th>W.O.#</th>
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
			                  <td>B002</td>
			                  <td>I001</td>
			                  <td>Alpha</td>
			                  <td align="left">Rp. 700.000,00</td>
			                  <td align="left">Rp. 700.000,00</td>
			                  <td align="left">Rp. 0,00</td>
			                  <td>
			                  	<div class="btn-group">
			                    	<a href="{{url('order/workorder/w_order/detail_workorder')}}" class="btn btn-info btn-sm">Detail</a>
			                    	<a href="{{url('order/workorder/print_workorder')}}" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
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