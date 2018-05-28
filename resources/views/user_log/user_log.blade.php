@extends('main')
@section('content')

<!-- partial -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">	
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb bg-info">
					<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">User Log Activity</li>
				</ol>
			</nav>
		</div>
		<div class="col-lg-12 grid-margin stretch-card">
	      	<div class="card">
		        <div class="card-body">
		          <h4 class="card-title">User Log Activity</h4>
		          	<div class="row">
						<div class="table-responsive">
							<table class="table table-hover data-table" cellspacing="0">
							  <thead class="bg-gradient-info">
							    <tr>
							      <th>No</th>
							      <th>Date Time</th>
							      <th>Username</th>
							      <th>Menu</th>
							      <th>Status</th>
							      <th>Description</th>
							    </tr>
							  </thead>
							  <tbody>
							    <tr>
							    	<td>1</td>
							    	<td>2018-05-28 15:52:56</td>
							    	<td>admin</td>
							    	<td>Master Data Barang</td>
							    	<td>Add Data</td>
							    	<td>Pompa Air</td>
							    </tr>
							    <tr>
							    	<td>2</td>
							    	<td>2018-05-28 14:51:56</td>
							    	<td>admin</td>
							    	<td>Master Data Barang</td>
							    	<td>Edit Data</td>
							    	<td>Controller to Kontroler</td>
							    </tr>
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