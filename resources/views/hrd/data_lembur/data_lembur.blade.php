@extends('main')
@section('content')

@include('hrd/data_lembur/tambah_data_lembur')
<!-- partial -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">	
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb bg-info">
					<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
					<li class="breadcrumb-item">HRD</li>
					<li class="breadcrumb-item active" aria-current="page">Data Lembur Pegawai</li>
				</ol>
			</nav>
		</div>

		<div class="col-lg-12 alamraya-row-nav">
			<ul class="nav nav-tabs tab-solid tab-solid-primary alamraya-navtab" role="tablist">
		        <li class="nav-item">
		          <a class="nav-link active" id="tab-6-1" data-toggle="tab" href="#abslembur" role="tab" aria-controls="abslembur" aria-selected="true"><i class="mdi mdi-file-document"></i>Data Lembur Pegawai</a>
		        </li>
		    </ul>

			<div class="tab-content tab-content-solid col-lg-12">

	            <div class="tab-pane fade show active" id="abslembur" role="tabpanel" aria-labelledby="tab-6-1">
					<div class="col-lg-12 grid-margin stretch-card alamraya-no-padding">
				      	<div class="card">
					        <div class="card-body">
					          	<h4 class="card-title">Data Lembur Pegawai</h4>
								
								<div class="row form-group">
				                	<div class="col-lg-8 col-md-12 col-sm-12">
					                	<label class="col-lg-12 col-form-label alamraya-no-padding">Periode</label>

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
									<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
										<button class="btn btn-info alamraya-btn-add" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
									</div>
				                </div>

					          	<div class="row">

									<div class="table-responsive">
										<table class="table table-hover data-table" cellspacing="0">
										  <thead class="bg-gradient-info">
										    <tr>
												<th>No</th>
												<th>Tanggal</th>
												<th>Kode</th>
												<th>Pegawai</th>
												<th>Nama</th>
												<th>Keperluan</th>
												<th>Aksi</th>
										    </tr>
										  </thead>
										  <tbody>
										    <tr>
										    	<td>1</td>
										    	<td>12-12-2018</td>
										    	<td>#123456789</td>
										    	<td>Manajemen</td>
										    	<td>Nasikhatul Insaniyah</td>
										    	<td>AAA</td>
										    	<td>
										    		<center>
											    		<div class="btn-group">
											    			<button type="button" class="btn btn-primary btn-lg alamraya-btn-aksi" title="edit"><label class="fa fa-pencil-alt"></label></button>
											    			<button type="button" class="btn btn-danger btn-lg alamraya-btn-aksi" title="hapus"><label class="fa fa-trash"></label></button>
											    			<button type="button" class="btn btn-warning btn-lg alamraya-btn-aksi" title="detail"><label class="fa fa-info-circle"></label></button>
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
			</div>
		</div>
	</div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

@endsection