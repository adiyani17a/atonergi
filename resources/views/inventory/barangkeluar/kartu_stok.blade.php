@extends('main')
@section('content')


<!-- partial -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb bg-info">
					<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
					<li class="breadcrumb-item">Inventory</li>
					<li class="breadcrumb-item"><a href="{{route('barangkeluar')}}">Barang Keluar</a></li>
					<li class="breadcrumb-item active" aria-current="page">Kartu Stok</li>
				</ol>
			</nav>
		</div>
		<div class="col-lg-12 grid-margin stretch-card">
	      	<div class="card">
		        <div class="card-body">
		          <h4 class="card-title">Kartu Stok</h4>
		          	<div class="row">

		          		<div class="col-md-3 col-sm-6 col-xs-12">
		          			<label>Card No</label>
		          		</div>

		          		<div class="col-md-9 col-sm-6 col-xs-12">
		          			<div class="form-group form-group-sm">
		          				<input type="text" class="form-control" readonly="" name="">
		          			</div>
		          		</div>

		          		<div class="col-md-3 col-sm-6 col-xs-12">
		          			<label>Date</label>
		          		</div>

		          		<div class="col-md-9 col-sm-6 col-xs-12">
		          			<div class="form-group form-group-sm">
		          				<input type="text" class="form-control datepicker" id="date" value="{{date('d-m-Y')}}" name="">
		          			</div>
		          		</div>

		          		<div class="col-md-3 col-sm-6 col-xs-12">
		          			<label>Receive From</label>
		          		</div>

		          		<div class="col-md-9 col-sm-6 col-xs-12">
		          			<div class="form-group form-group-sm">
		          				<textarea class="form-control" id="receive" name=""></textarea>
		          			</div>
		          		</div>

		          		<fieldset class="fieldset">
		          			<div class="row">
			          			<div class="col-md-3 col-sm-12">
			          				<div class="row">
			          					<div class="col-lg-12">
					          				<label>Item Code</label>
					          			</div>
					          			<div class="col-lg-12">
					          				<div class="form-group form-group-sm">
					          					<input type="text" class="form-control" readonly="" value="BRG/0001" id="item_code" name="">
					          				</div>
					          			</div>
				          			</div>
			          			</div>
			          			<div class="col-md-7 col-sm-12">
			          				<div class="row">
			          					<div class="col-lg-12">
					          				<label>Item Name</label>
					          			</div>
					          			<div class="col-lg-12">
					          				<div class="form-group form-group-sm">
					          					<input type="text" class="form-control" readonly="" value="Pompa Air" id="item_name" name="">
					          				</div>
					          			</div>
				          			</div>
			          			</div>
			          			<div class="col-md-2 col-sm-12">
			          				<div class="row">
			          					<div class="col-lg-12">
					          				<label>Qty Out</label>
					          			</div>
					          			<div class="col-lg-12">
					          				<div class="form-group form-group-sm">
					          					<input type="number" min="0" class="form-control" id="qty" name="">
					          				</div>
					          			</div>
				          			</div>
			          			</div>
			          		</div>
		          		</fieldset>

		          		<h4 class="ml-3 mt-2 mb-3">History Stock Opname</h4>

						<div class="table-responsive mb-3">
							<table class="table table-hover table-striped table-bordered" id="tabel_history" cellspacing="0">
							  <thead class="bg-gradient-info">
							    <tr>
							    	<th>Date</th>
							    	<th>Receive From</th>
							    	<th>In</th>
							    	<th>Out</th>
							    	<th>Remain</th>
							    </tr>
							  </thead>
							  <tbody>

							  </tbody>
							</table>
						</div>

						<div class="table-responsive">
							<table class="table table-hover table-striped table-bordered" id="tabel_kartu_stok" cellspacing="0">
							  <thead class="bg-gradient-info">
							    <tr>
							    	<th>Date</th>
							    	<th>Receive From</th>
							    	<th>In</th>
							    	<th>Out</th>
							    	<th>Remain</th>
							    	<th width="1%"></th>
							    </tr>
							  </thead>
							  <tbody id="showkartu">

							  </tbody>
							</table>
						</div>

						<div class="content-footer">
							<button class="btn btn-primary btn-simpan" type="button">Save</button>
							<a href="{{route('barangkeluar')}}" class="btn btn-secondary">Back</a>
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
	// var tabel = $('#tabel_kartu_stok').DataTable({
	// 	"pageLength": 10,
 //        "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
 //        "language": {
 //            "searchPlaceholder": "Search",
 //            "sSearch": '<i class="fa fa-search"></i>'
 //           }
	// });
	$('#tabel_history').DataTable({
		"pageLength": 10,
        "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
        "language": {
            "searchPlaceholder": "Search",
            "sSearch": '<i class="fa fa-search"></i>'
           }
	});

	$('#tabel_kartu_stok').DataTable({
		"pageLength": 10,
        "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
        "language": {
            "searchPlaceholder": "Search",
            "sSearch": '<i class="fa fa-search"></i>'
           }
	});

	function tabel_append(){
		var newDate = new Date();
		var date = newDate.getDate();
		var month = newDate.getMonth()+1;
		var year = newDate.getFullYear();
		var tgl = date+'-'+month+'-'+year;

		// console.log(month);
		$('#showkartu').html('');
		$('#tabel_kartu_stok tbody').append(
			'<tr>'+
				'<td><input type="hidden" value="'+$('#date').val()+'" class="date"><span>'+$('#date').val()+'</span></td>'+
				'<td><input type="hidden" value="'+$('#receive').val()+'" class="receive"><pre>'+$('#receive').val()+'</pre></td>'+
				'<td></td>'+
				'<td><input type="hidden" value="'+$('#qty').val()+'" class="qty"><span>'+$('#qty').val()+'</span></td>'+
				'<td></td>'+
				'<td><button type="button" class="btn btn-warning btn-xs btn-edit" title="Edit"><i class="fa fa-pencil-alt"></i></button></td>'+
			'</tr>'
			);

		$('#qty').val('');
		$('#receive').val('');
		$('#date').datepicker('setDate', tgl);
		$('#qty').attr('disabled',true);


	}

	$(document).on('click', '.btn-edit', function(){
		var qty = $(this).parents('tr').find('.qty').val();
		var receive = $(this).parents('tr').find('.receive').val();
		var date = $(this).parents('tr').find('.date').val();

		$('#qty').attr('disabled', false);
		$('#date').datepicker('setDate',date);
		$('#receive').val(receive);
		$('#qty').val(qty);

		$(this).parents('tr').remove();
		$('html, body').animate({scrollTop:0}, 'slow');
	});

	$('#qty').on('keypress', function(e){
		if(e.which === 13 || e.keyCode === 13){
			tabel_append();
		}
	});
</script>
@endsection
