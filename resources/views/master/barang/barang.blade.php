@extends('main')
@section('content')

@include('master.barang.tambah')


<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Master</li>
				<li class="breadcrumb-item active" aria-current="page">Master Data Barang</li>
			</ol>
		</nav>
	</div>

	<div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
	                <h4 class="card-title">Master Data Barang</h4>
		                <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
		                  	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
		                </div>
                  <div class="table-responsive">
                          <table class="table table-hover table-bordered data-table" cellspacing="0">
                            <thead class="bg-gradient-info">
                                <tr>
                                  <th class="wd-15p" width="5%">Item Code</th>
                                  <th class="wd-15p">Item Name</th>
                                  <th class="wd-15p" width="5%">Unit</th>
                                  <th class="wd-15p">Description Item</th>
                                  <th width="15%">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($barang as $item)

                                <tr>
                                  <td>{{$item['i_code']}}</td>
                                  <td>{{$item['i_name']}}</td>
                                  <td>{{$item['i_unit']}}</td>
                                  <td>{{$item['i_description']}}</td>
                                  <td>
                                    <div class="btn-group">    
                                      <a href="#" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-pencil-alt"></i></a>

                                      <a href="baranghapus/{{$item['i_id']}}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
                                    </div>  
                                  </td>
                                </tr>
                                @endforeach
                                
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