@extends('main')
@section('content')

@include('inventory/barangmasuk/detail_barangmasuk')
<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Inventory</li>
				<li class="breadcrumb-item active" aria-current="page">Barang Masuk</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Barang Masuk</h4>
	          	<div class="row">
	          		
					<div class="table-responsive">
						<table class="table table-hover data-table" cellspacing="0">
						  <thead class="bg-gradient-info">
						    <tr>
						      <th>No</th>
						      <th>P.O.#</th>
						      <th>Vendor</th>
						      <th>Status</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						    	<td>1</td>
						    	<td>P001</td>
						    	<td>Bravo</td>
						    	<td><span class="badge badge-success">Complete</span></td>
						    	<td>
						    		<button class="btn btn-outline-success" data-toggle="modal" data-target="#detail"><i class="fa fa-check"></i></button>
						    		<button class="btn btn-outline-info"><i class="fa fa-print"></i></button>
						    	</td>
						    </tr>
						    <tr>
						    	<td>2</td>
						    	<td>P002</td>
						    	<td>Charlie</td>
						    	<td><span class="badge badge-warning">Uncomplete</span></td>
						    	<td>
						    		<button class="btn btn-outline-success" data-toggle="modal" data-target="#detail"><i class="fa fa-check"></i></button>
						    		<button class="btn btn-outline-info"><i class="fa fa-print"></i></button>
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