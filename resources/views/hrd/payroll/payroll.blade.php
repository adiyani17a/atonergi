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
					<li class="breadcrumb-item active" aria-current="page">Payroll</li>
				</ol>
			</nav>
		</div>

		<div class="col-lg-12 alamraya-row-nav">
			<ul class="nav nav-tabs tab-solid tab-solid-primary alamraya-navtab" role="tablist">
		        <li class="nav-item">
		          <a class="nav-link active" id="tab-6-1" data-toggle="tab" href="#absmanajemen" role="tab" aria-controls="absmanajemen" aria-selected="true"><i class="mdi mdi-folder-account"></i>Manajemen</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " id="tab-6-2" data-toggle="tab" href="#abstunjangan" role="tab" aria-controls="abstunjangan" aria-selected="true"><i class="mdi mdi-coin"></i>Tunjangan</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " id="tab-6-3" data-toggle="tab" href="#absproduksi" role="tab" aria-controls="absproduksi" aria-selected="true"><i class="mdi mdi-forklift"></i>Produksi</a>
		        </li>
		    </ul>

			<div class="tab-content tab-content-solid col-lg-12">

	            <div class="tab-pane fade show active" id="absmanajemen" role="tabpanel" aria-labelledby="tab-6-1">
					<div class="col-lg-12 grid-margin stretch-card alamraya-no-padding">
				      	<div class="card">
					        <div class="card-body">
					          <h4 class="card-title">Manajemen Payroll</h4>
					          	<div class="row">
					          		
									<div class="col-md-12 col-sm-12 col-xs-12 alamraya-btn-add-row" align="right">
										<a class="btn btn-info " href="{{url('hrd/payroll/tambah_payroll')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</a>
									</div>
									<div class="table-responsive">
										<table class="table table-hover data-table" cellspacing="0">
										  <thead class="bg-gradient-info">
										    <tr>
										      <th>Nama</th>
										      <th>SMA</th>
										      <th>D3</th>
										      <th>S1</th>
										      <th>Pangkat</th>
										      <th>Aksi</th>
										    </tr>
										  </thead>
										  <tbody class="center">
										    <tr>
										    	<td>Gaji Pokok</td>
										    	<td>
										    		<div class="pull-left">Rp.</div>
										    		<div class="pull-right">1.040.000,00</div>
										    	</td>
										    	<td>
										    		<div class="pull-left">Rp.</div>
										    		<div class="pull-right">1.430.000,00</div>
										    	</td>
										    	<td>
										    		<div class="pull-left">Rp.</div>
										    		<div class="pull-right">1.560.000,00</div>
										    	</td>
										    	<td>Semua</td>
										    	<td>
										    		<center>
											    		<div class="btn-group">
											    			<button type="button" class="btn btn-primary btn-lg alamraya-btn-aksi" title="edit"><label class="fa fa-pencil-alt"></label></button>
											    			<button type="button" class="btn btn-danger btn-lg alamraya-btn-aksi" title="hapus"><label class="fa fa-trash"></label></button>
											    		</div>
										    		</center>
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

				<div class="tab-pane fade " id="abstunjangan" role="tabpanel" aria-labelledby="tab-6-2">
					<div class="col-lg-12 grid-margin stretch-card alamraya-no-padding">
				      	<div class="card">
					        <div class="card-body">
					          <h4 class="card-title">Payroll Tunjangan</h4>
					          	<div class="row">
					          		
									<div class="col-md-12 col-sm-12 col-xs-12 alamraya-btn-add-row" align="right">
										<a class="btn btn-warning " href="{{url('hrd/payroll/setting_tunjangan')}}"><i class="fa fa-cog"></i>&nbsp;&nbsp;Setting Tunjangan Pegawai</a>
										<a class="btn btn-info " href="{{url('hrd/payroll/tambah_payroll')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</a>
									</div>
									<div class="table-responsive">
										<table class="table table-hover data-table" cellspacing="0">
										  <thead class="bg-gradient-info">
										    <tr>
										      <th>Nama</th>
										      <th>Periode</th>
										      <th>Nilai</th>
										      <th>Aksi</th>
										    </tr>
										  </thead>
										  <tbody class="center">
										    <tr>
										    	<td>Kehadiran (Leader)</td>
										    	<td>Hari</td>
										    	<td>
										    		<div class="pull-left">Rp.</div>
										    		<div class="pull-right">40.000,00</div>
										    	</td>
										    	<td>
										    		<center>
											    		<div class="btn-group">
											    			<button type="button" class="btn btn-primary btn-lg alamraya-btn-aksi" title="edit"><label class="fa fa-pencil-alt"></label></button>
											    			<button type="button" class="btn btn-danger btn-lg alamraya-btn-aksi" title="hapus"><label class="fa fa-trash"></label></button>
											    		</div>
										    		</center>
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

				<div class="tab-pane fade" id="absproduksi" role="tabpanel" aria-labelledby="tab-6-3">
					<div class="col-lg-12 grid-margin stretch-card alamraya-no-padding">
				      	<div class="card">
					        <div class="card-body">
					          <h4 class="card-title">Payroll Produksi</h4>
					          	<div class="row">
					          		
									<div class="col-md-12 col-sm-12 col-xs-12 alamraya-btn-add-row" align="right">
										<a class="btn btn-info " href="{{url('hrd/payroll/tambah_payroll')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</a>
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