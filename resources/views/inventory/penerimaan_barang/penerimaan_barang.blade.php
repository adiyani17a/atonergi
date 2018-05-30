@extends('main')
@section('content')

@include('inventory/penerimaan_barang/cari_po')
<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Inventory</li>
				<li class="breadcrumb-item active" aria-current="page">Penerimaan Barang</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Penerimaan Barang</h4>
	          	<div class="row">
	          		<div class="col-md-12 col-sm-12 col-xs-12" align="right">
	          			<button class="btn btn-info btn-sm" type="button" data-target="#cari_po" id="button_add" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Add Data</button>
	          		</div>
	          		
					<div class="table-responsive" style="margin-top: 15px;">
						<table class="table table-hover data-table" cellspacing="0">
						  <thead class="bg-gradient-info">
						    <tr>
						      <th>No</th>
						      <th>P.O.#</th>
						      <th>Vendor</th>
						      <th>Status</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						    	<td>1</td>
						    	<td>P001</td>
						    	<td>Bravo</td>
						    	<td><span class="badge badge-success badge-pill">Complete</span></td>
						    	<td>
						    		<div class="btn-group">
							    		<!-- <button class="btn btn-primary" data-toggle="modal" data-target="#detail"><i class="fa fa-check"></i></button> -->
							    		<button class="btn btn-info"><i class="fa fa-print"></i></button>
							    	</div>
						    	</td>
						    </tr>
						    <tr>
						    	<td>2</td>
						    	<td>P002</td>
						    	<td>Charlie</td>
						    	<td><span class="badge badge-warning badge-pill">Uncomplete</span></td>
						    	<td>
						    		<div class="btn-group">
							    		<button class="btn btn-primary" data-toggle="modal" data-target="#detail"><i class="fa fa-check"></i></button>
							    		<button class="btn btn-info"><i class="fa fa-print"></i></button>
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

<script type="text/javascript">

	function cari_purchaseorder() {
		var this_val = $('#cari_purchaseorder').val();
		console.log(this_val);
		$.ajax({
         type: "get",
         url: '{{ route('cari_penerimaan_barang') }}',
         data: {this_val},
         success: function(data){
            iziToast.success({
              icon: 'fas fa-check-circle',
              message: 'Data Telah Tersimpan!',
            });
         },
         error: function(){
          iziToast.warning({
            icon: 'fa fa-times',
            message: 'Terjadi Kesalahan!',
          });
         },
         async: false
       });	
	}


</script>


@endsection