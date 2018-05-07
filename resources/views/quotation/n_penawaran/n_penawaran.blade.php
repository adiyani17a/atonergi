@extends('main')
@section('content')

@include('quotation.n_penawaran.tambah_nilaipenawaran')

<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Quotation</li>
				<li class="breadcrumb-item active" aria-current="page">Nilai Penawaran</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Nilai Penawaran</h4>
	          	<div class="row">
	          		
	          		<div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
	          			<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
	          		</div>

					<div class="table-responsive">
						<table class="table table-hover data-table" cellspacing="0">
						  <thead class="bg-gradient-info">
						    <tr>
						      <th>No</th>
						      <th>Item Name</th>
						      <th>Item Price</th>
						      <th title="Harga Batas Bawah">Lower Limit Price</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						    	<td>1</td>
						    	<td>Kabel</td>
						    	<td>Rp. 10.000,-</td>
						    	<td>Rp. 15.000,-</td>
						    	<td>
						    		<div class="btn-group">
						    			<button class="btn btn-primary" type="button" title="Edit"><i class="fa fa-pencil"></i></button>
						    			<button class="btn btn-danger" type="button" title="Delete"><i class="fa fa-trash-o"></i></button>
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

@endsection