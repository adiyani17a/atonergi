@extends('main')
@section('content')

@include('hrd/Absensi/tambah_Absensi')
<!-- partial -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">	
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb bg-info">
					<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
					<li class="breadcrumb-item">HRD</li>
					<li class="breadcrumb-item active" aria-current="page">Absensi</li>
				</ol>
			</nav>
		</div>

		<div class="col-lg-12 alamraya-row-nav">
			<ul class="nav nav-tabs tab-solid tab-solid-primary alamraya-navtab" role="tablist">
		        <li class="nav-item">
		          <a class="nav-link active" id="tab-6-1" data-toggle="tab" href="#absmanajemen" role="tab" aria-controls="absmanajemen" aria-selected="true"><i class="mdi mdi-home-outline"></i>Absensi Manajemen</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" id="tab-6-2" data-toggle="tab" href="#absproduksi" role="tab" aria-controls="absproduksi" aria-selected="false"><i class="mdi mdi-account-outline"></i>Absensi Produksi</a>
		        </li>
		    </ul>

			<div class="tab-content tab-content-solid col-lg-12">

	            <div class="tab-pane fade show active" id="absmanajemen" role="tabpanel" aria-labelledby="tab-6-1">
					<div class="col-lg-12 grid-margin stretch-card alamraya-no-padding">
				      	<div class="card">
					        <div class="card-body">
					          <h4 class="card-title">Absensi Manajemen</h4>
					          	<div class="row alamraya-dwld-row">
					          		<button type="button" class="btn btn-warning btn-rounded btn-fw alamraya-dwld-btn"><i class="fa fa-download"></i>&nbsp;&nbsp;Download Contoh Master</button>&nbsp;&nbsp;
					          		<button type="button" class="btn btn-warning btn-rounded btn-fw"><i class="fa fa-download"></i>&nbsp;&nbsp;Download ID Manajemen</button>
					          	</div><br>
					          	<div class="row ">
					          		<div class="col-md-12 ">
						          		<label class="col-lg-12 col-form-label alamraya-no-padding">Upload File Absensi (Maks. 5mb)</label>
						          		<input type="file" class="dropify" data-height="100" data-max-file-size="5000kb"/>
						          	</div>
				                </div><br>
				                <div class="row form-group">
				                	<div class="col-lg-8 col-md-12 col-sm-12">
					                	<label class="col-lg-12 col-form-label alamraya-no-padding">Tanggal</label>

					                	<div class="col-lg-12 col-md-12 col-sm-12">
					                		<div class="row">
												<div class="col-lg-4 col-md-4 col-sm-12 alamraya-no-padding">
													<div id="datepicker-popup" class="input-group date datepicker">
								                        <input type="text" class="form-control" placeholder="dd-mm-yyyy">
								                        <div class="input-group-addon">
								                          <span class="mdi mdi-calendar"></span>
								                        </div>
								                    </div>
												</div>
												<span class="alamraya-span-addon">
													-
												</span>
												<div class="col-lg-4 col-md-4 col-sm-12 alamraya-no-padding">
													<div id="datepicker-popup" class="input-group date datepicker">
								                        <input type="text" class="form-control" placeholder="dd-mm-yyyy">
								                        <div class="input-group-addon">
								                          <span class="mdi mdi-calendar"></span>
								                        </div>
								                    </div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12 alamraya-no-padding alamraya-opt-btn">
													<span class="input-group-append">
														<button type="button" class="btn btn-primary btn-sm icon-btn ml-2">
							                              <i class="fa fa-search"></i>
							                            </button>
							                             <button type="button" class="btn btn-info btn-sm icon-btn ml-2" >
							                              <i class="fa fa-refresh"></i>
							                            </button>
							                        </span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-12 col-sm-12 ">
					                	<label class="col-lg-12 col-form-label alamraya-label-padding">Divisi</label>

					                	<div class="col-lg-12 col-md-12 col-sm-12 alamraya-no-padding">
											<div class="form-group">
												<select class="form-control form-control-sm" id="filter">
													<option disabled selected>--Pilih--</option>
													<option value="hrd">HRD dan General Affair</option>
													<option value="keu">Keuangan dan Akuntansi</option>
													<option value="snm">Sales dan Marketing</option>
													<option value="prd">Produksi</option>
													<option value="gnp">Gudang dan Pengiriman</option>
													<option value="opr">Operator</option>
													<option value="gmr">General Manager</option>
												</select>
											</div>
										</div>
									</div>
				                </div>
					          	<div class="row ">
									<!-- <div class="col-md-12 col-sm-12 col-xs-12 alamraya-btn-add-row" align="right"> -->
										<!-- <button class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button> -->
									<!-- </div> -->
									<div class="table-responsive">
										<table class="table table-hover data-table" cellspacing="0">
										  <thead class="bg-gradient-info">
										    <tr>
												<th>Tanggal</th>
												<th>Kode Nama Pegawai</th>
												<th>Jam Kerja</th>
												<th>Jam Masuk</th>
												<th>Jam Pulang</th>
												<th>Scan Masuk</th>
												<th>Scan Pulang</th>
												<th>Terlambat</th>
												<th>Total Kerja</th>
										    </tr>
										  </thead>
										  <tbody>
										    <tr>
										    	<td>12-12-2018</td>
										    	<td>#123456789</td>
										    	<td>8</td>
										    	<td>09.00</td>
										    	<td>17.00</td>
										    	<td>09.00</td>
										    	<td>17.00</td>
										    	<td>-</td>
										    	<td>8</td>
										    </tr>
										  </tbody>
										</table>
									</div>
					        	</div>
					      	</div>
				    	</div>
					</div>
				</div>

	            <div class="tab-pane fade" id="absproduksi" role="tabpanel" aria-labelledby="tab-6-2">
					<div class="col-lg-12 grid-margin stretch-card alamraya-no-padding">
				      	<div class="card">
					        <div class="card-body">
					          <h4 class="card-title">Absensi Produksi</h4>
					          	<div class="row alamraya-dwld-row">
					          		<button type="button" class="btn btn-warning btn-rounded btn-fw alamraya-dwld-btn"><i class="fa fa-download"></i>&nbsp;&nbsp;Download Contoh Master</button>&nbsp;&nbsp;
					          		<button type="button" class="btn btn-warning btn-rounded btn-fw"><i class="fa fa-download"></i>&nbsp;&nbsp;Download ID Manajemen</button>
					          	</div><br>
					          	<div class="row ">
					          		<div class="col-md-12 ">
						          		<label class="col-lg-12 col-form-label alamraya-no-padding">Upload File Absensi (Maks. 5mb)</label>
						          		<input type="file" class="dropify" data-height="100" data-max-file-size="5000kb"/>
						          	</div>
				                </div><br>
				                <div class="row form-group">
				                	<div class="col-lg-8 col-md-12 col-sm-12">
					                	<label class="col-lg-12 col-form-label alamraya-no-padding">Tanggal</label>

					                	<div class="col-lg-12 col-md-12 col-sm-12">
					                		<div class="row">
												<div class="col-lg-4 col-md-4 col-sm-12 alamraya-no-padding">
													<div id="datepicker-popup" class="input-group date datepicker">
								                        <input type="text" class="form-control" placeholder="dd-mm-yyyy">
								                        <div class="input-group-addon">
								                          <span class="mdi mdi-calendar"></span>
								                        </div>
								                    </div>
												</div>
												<span class="alamraya-span-addon">
													-
												</span>
												<div class="col-lg-4 col-md-4 col-sm-12 alamraya-no-padding">
													<div id="datepicker-popup" class="input-group date datepicker">
								                        <input type="text" class="form-control" placeholder="dd-mm-yyyy">
								                        <div class="input-group-addon">
								                          <span class="mdi mdi-calendar"></span>
								                        </div>
								                    </div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-12 alamraya-no-padding alamraya-opt-btn">
													<span class="input-group-append">
														<button type="button" class="btn btn-primary btn-sm icon-btn ml-2">
							                              <i class="fa fa-search"></i>
							                            </button>
							                             <button type="button" class="btn btn-info btn-sm icon-btn ml-2" >
							                              <i class="fa fa-refresh"></i>
							                            </button>
							                        </span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-12 col-sm-12 ">
					                	<label class="col-lg-12 col-form-label alamraya-label-padding">Divisi</label>

					                	<div class="col-lg-12 col-md-12 col-sm-12 alamraya-no-padding">
											<div class="form-group">
												<select class="form-control form-control-sm" id="filter">
													<option>--Select--</option>
													<option value="hrd">HRD dan General Affair</option>
													<option value="keu">Keuangan dan Akuntansi</option>
													<option value="snm">Sales dan Marketing</option>
													<option value="prd">Produksi</option>
													<option value="gnp">Gudang dan Pengiriman</option>
													<option value="opr">Operator</option>
													<option value="gmr">General Manager</option>
												</select>
											</div>
										</div>
									</div>
				                </div>
					          	<div class="row ">
									<!-- <div class="col-md-12 col-sm-12 col-xs-12 alamraya-btn-add" align="right"> -->
										<!-- <button class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button> -->
									<!-- </div> -->
									<div class="table-responsive">
										<table class="table table-hover data-table" cellspacing="0">
										  <thead class="bg-gradient-info">
										    <tr>
												<th>Tanggal</th>
												<th>Kode Nama Pegawai</th>
												<th>Jam Kerja</th>
												<th>Jam Masuk</th>
												<th>Jam Pulang</th>
												<th>Scan Masuk</th>
												<th>Scan Pulang</th>
												<th>Terlambat</th>
												<th>Total Kerja</th>
										    </tr>
										  </thead>
										  <tbody>
										    <tr>
										    	<td>12-12-2018</td>
										    	<td>#123456789</td>
										    	<td>8</td>
										    	<td>09.00</td>
										    	<td>17.00</td>
										    	<td>09.00</td>
										    	<td>17.00</td>
										    	<td>-</td>
										    	<td>8</td>
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
		</div>

	</div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

<script type="text/javascript">
	function alert() {
		window.location.reload();
	}
</script>

@endsection