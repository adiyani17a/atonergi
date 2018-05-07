@extends('main')
@section('content')

@include('master.bundle.tambah')

@include('master.bundle.detail')

<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Master</li>
				<li class="breadcrumb-item active" aria-current="page">Master Data Bundle Item</li>
			</ol>
		</nav>
	</div>

	<div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
	                <h4 class="card-title">Master Data Bundle Item</h4>
		                <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
		                  	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
		                </div>
                  <div class="table-responsive">
                          <table class="table table-hover table-bordered data-table" cellspacing="0">
                            <thead class="bg-gradient-info">
                                <tr>
                                  <th class="wd-15p" width="5%">Bundle Name</th>
                                  <th class="wd-15p">Item</th>
                                  <th class="wd-15p">Price Bundle</th>
                                  <th width="15%">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Pompa</td>
                                  <td>
                                    <button class="btn btn-outline-info" type="button" data-target="#detail" data-toggle="modal">Detail</button>
                                  </td>
                                  <td>Rp. 0,-</td>
                                  <td>
                                    <div class="">    
                                      <a href="#" class="btn btn-outline-info btn-sm" title="Edit"><i class="fa fa-pencil"></i></a>
                                      <a href="#" class="btn btn-outline-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
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

