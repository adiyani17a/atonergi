@extends('main')
@section('content')

@include('quotation/q_quotation/tambah')

@include('master/customer/tambah')

@include('quotation/q_quotation/detail')
<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Quotation</li>
				<li class="breadcrumb-item active" aria-current="page">Quotation</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Quotation</h4>
	          	<div class="row">
	          		
					<div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
						<button class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Create Quotation</button>
					</div>
					<div class="table-responsive">
						<table class="table table-hover data-table" id="pziv" cellspacing="0">
						  <thead class="bg-gradient-info">
						    <tr>
						      <th>No</th>
						      <th>Quote#</th>
						      <th>Customer Item</th>
						      <th>Total</th>
						      <th>Status</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						    	<td>1</td>
						    	<td>30-04-2018/Q001</td>
						    	<td><button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#detail_item">Detail</button></td>
						    	<td>Rp. 600.000,-</td>
						    	<td><span class="badge badge-pill badge-warning">Not yet paid off</span></td>
						    	<td>
                    			<div class="btn-group" role="group">
						    		<a href="{{url('quotation/q_quotation/edit_quotation')}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
						    		<a href="{{url('quotation/q_quotation/print_quotation')}}" class="btn btn-info btn-sm" target="_blank" title="Print"><i class="fa fa-print"></i></a>
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
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script type="text/javascript">
	$(document).ready(function(){
		$("#pziv").DataTable();
	});
</script>
@endsection