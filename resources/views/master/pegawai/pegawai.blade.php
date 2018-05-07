@extends('main')
@section('content')

@include('master.pegawai.tambah')

<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Master</li>
				<li class="breadcrumb-item active" aria-current="page">Master Data Pegawai</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Master Data Pegawai</h4>
                  <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
                  	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
                  </div>
                  <div class="table-responsive">
				      <table class="table data-table table-hover table-bordered" cellspacing="0">
				                          <thead class="bg-gradient-info">
				                            <tr>
				                              <th>ID</th>
				                              <th>NIK</th>
				                              <th>Employee Name</th>
				                              <th>Address</th>
				                              <th>Employee Status</th>
				                              <th>Action</th>
				                            </tr>
				                          </thead>

				                          <tbody>
				                            <tr>
				                              <td>PG-0001</td>
				                              <td>11111</td>
				                              <td>Delta</td>
				                              <td>Jl. Delta</td>
				                              <td>Sudah Menikah</td>                            
				                             <td class="text-center">
				                               <div class="">    
				                               <a href="#" class="btn btn-outline-info btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
				                               <a href="#" class="btn btn-outline-danger btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></a>
				                              </div>                              
				                              </td>
				                            </tr>
				                            <tr>
				                              <td>PG-0002</td>
				                              <td>11112</td>
				                              <td>Charlie</td>
				                              <td>Jl. Charlie</td>
				                              <td>Lajang</td>                              
				                             <td class="text-center">
				                               <div class="">    
				                               <a href="#" class="btn btn-outline-info btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
				                               <a href="#" class="btn btn-outline-danger btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></a>
				                              </div>                               
				                              </td>
				                            </tr>
				                            
				                            <tr>
				                              <td>PG-0003</td>
				                              <td>11113</td>
				                              <td>Kilo</td>
				                              <td>Jl. Kilo</td>
				                              <td>Sudah Menikah</td>                              
				                             <td class="text-center">
				                               <div class="">    
				                               <a href="#" class="btn btn-outline-info btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
				                               <a href="#" class="btn btn-outline-danger btn-sm" title="Hapus"><i class="fa fa-trash-o"></i></a>
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