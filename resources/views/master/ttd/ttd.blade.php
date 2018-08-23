@extends('main')
@section('content')

@include('master.ttd.tambah_ttd')

<!-- partial -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">	
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb bg-info">
					<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
					<li class="breadcrumb-item">Master</li>
					<li class="breadcrumb-item active" aria-current="page">Master Data TTD</li>
				</ol>
			</nav>
		</div>
		<div class="col-lg-12 grid-margin stretch-card">
	              <div class="card">
	                <div class="card-body">
	                  <h4 class="card-title">Master Data TTD</h4>
	                  <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
	                  	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah_ttd"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
	                  </div>
	                  <div class="table-responsive">
		                  <table class="table data-table table-hover" cellspacing="0">
		                  	<thead class="bg-gradient-info">
		                  		<tr>
		                  			<th>No</th>
		                  			<th>Name</th>
		                  			<th>Signature Image</th>
		                  			<th>Action</th>
		                  		</tr>
		                  	</thead>
		                  	<tbody>
		                  		<tr>
		                  			<td>1</td>
		                  			<td>PT. Alpha</td>
									<td class="center">
										<img src="#">
									</td>
		                  			<td class="center">
		                  				<div class="btn-group">
			                  				<button class="btn btn-info btn-sm" title="Edit"><i class="fa fa-pencil-alt"></i></button>
			                  				<button class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
			                  			</div>
		                  			</td>

		                  		</tr>
		                  		<tr>
		                  			<td>2</td>
		                  			<td>PT. Bravo</td>
									<td class="center">
										<img src="#">
									</td>
		                  			<td class="center">
		                  				<div class="btn-group">
			                  				<button class="btn btn-info btn-sm" title="Edit"><i class="fa fa-pencil-alt"></i></button>
			                  				<button class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
			                  			</div>
		                  			</td>

		                  		</tr>
		                  		<tr>
		                  			<td>3</td>
		                  			<td>PT. Charlie</td>
		                  			<td class="center">
		                  				<img src="#">
		                  			</td>
		                  			<td class="center">
		                  				<div class="btn-group">
			                  				<button class="btn btn-info btn-sm" title="Edit"><i class="fa fa-pencil-alt"></i></button>
			                  				<button class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></button>
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