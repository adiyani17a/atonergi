@extends('main')
@section('content')

<!-- partial -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">	
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb bg-info">
					<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
					<li class="breadcrumb-item">HRD</li>
					<li class="breadcrumb-item active" aria-current="page">Payroll Pegawai Manajemen</li>
				</ol>
			</nav>
		</div>
		
		<div class="col-lg-12 alamraya-row-nav">
			<ul class="nav nav-tabs tab-solid tab-solid-primary alamraya-navtab" role="tablist">
		        <li class="nav-item">
		          <a class="nav-link active" id="tab-6-1" data-toggle="tab" href="#abspayroll" role="tab" aria-controls="abspayroll" aria-selected="true"><i class="mdi mdi-file-document"></i>Payroll Pegawai Manajemen</a>
		        </li>
		    </ul>

			<div class="tab-content tab-content-solid col-lg-12">

	            <div class="tab-pane fade show active" id="abspayroll" role="tabpanel" aria-labelledby="tab-6-1">
					<div class="col-lg-12 grid-margin stretch-card alamraya-no-padding">
				      	<div class="card">
					        <div class="card-body">
					          <h4 class="card-title">Payroll Pegawai Manajemen</h4>
					          	<div class="row">
					          		
									<div class="col-md-12 col-sm-12 col-xs-12 alamraya-btn-add-row" align="right">
										<a class="btn btn-info" href="{{url('hrd/payroll/tambah_payroll')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</a>
									</div>
									<div class="table-responsive">
										<table class="table table-hover data-table" cellspacing="0">
										  <thead class="bg-gradient-info">
										    <tr>
										      <th>No</th>
										      <th>Payday Date</th>
										      <th>Number of Employees</th>
										      <th>Total Employees Salary</th>
										      <th>Status</th>
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
		</div>
	</div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

@endsection