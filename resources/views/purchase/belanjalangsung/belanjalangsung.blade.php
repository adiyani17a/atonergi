@extends('main')
@section('content')


<!-- partial -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb bg-info">
					<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
					<li class="breadcrumb-item">Purchase</li>
					<li class="breadcrumb-item active" aria-current="page">Belanja Langsung</li>
				</ol>
			</nav>
		</div>
		<div class="col-lg-12 grid-margin stretch-card">
	      	<div class="card">
		        <div class="card-body">
		          <h4 class="card-title">Belanja Langsung</h4>
		          	<div class="row">

						<div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
							<a class="btn btn-info" href="{{url('purchase/belanjalangsung/tambah_belanjalangsung')}}"><i class="fa fa-plus"></i>&nbsp;&nbsp;Create Belanja Langsung</a>
						</div>


		        	</div>
		        	<div class="row">
		                 	<div class="col-md-6 col-sm-12 col-xs-12">
			                    <div class="alert alert-primary alert-dismissible" title="DP sudah Lunas">
			                        <button type="button" class="close" data-dismiss="alert">&times;</button>
			                        <strong>Notice!</strong> <br>
			                        <label class="badge badge-pill badge-primary">1</label>
			                        Inprocess
			                    </div>
		                  	</div>
		                  	<div class="col-md-6 col-sm-12 col-xs-12">
			                    <div class="alert alert-warning alert-dismissible" title="DP belum Lunas">
			                        <button type="button" class="close" data-dismiss="alert">&times;</button>
			                        <strong>Notice!</strong> <br>
			                        <label class="badge badge-pill badge-warning">1</label>
			                        Unprocess
			                    </div>
                      		</div>
                    </div>
						<div class="table-responsive">
							<table class="table table-hover data-table" cellspacing="0" id="datatable">
							  <thead class="bg-gradient-info">
							    <tr>
							      <th>No</th>
							      <th>P.O.#</th>
							      <th>Vendor</th>
							      <th>Total</th>
							      <th>Action</th>
							    </tr>
							  </thead>
							  <tbody>
									@foreach ($data as $key => $value)
										<tr>
											<td>{{$key + 1}}</td>
											<td>{{$value->dbl_code}}</td>
											<td>{{$value->s_company}} ( {{$value->s_name}} )</td>
											<td align="right">{{number_format($value->dbl_total_net,0,',','.')}}</td>
											<td align="center"> <button type="button" class="btn btn-outline-primary icon-btn btn-sm" name="button"> <i class="fa fa-folder"></i> </button> </td>
										</tr>
									@endforeach
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
	<script type="text/javascript">
	$(document).ready(function(){
		$('#datatable').DataTable();
	});
	</script>
@endsection
