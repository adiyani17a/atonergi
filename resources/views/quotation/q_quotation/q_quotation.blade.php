@extends('main')
@section('content')

@include('quotation/q_quotation/tambah')

@include('master/customer/tambah')

@include('quotation/q_quotation/detail')

@include('quotation/q_quotation/detail_status')

<style type="text/css">
.ui-autocomplete {
	z-index: 99999999999;
}
</style>
<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Quotation</li>
				<li class="breadcrumb-item active" aria-current="page">Quotation</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Quotation</h4>
	          	<div class="row">
	          		
					<div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
						<button class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Create Quotation</button>
					</div>
					<div class="table-responsive">
						<table class="table table-hover" id="table_quote" cellspacing="0">
						  <thead class="bg-gradient-info">
						    <tr>
						      <th>No</th>
						      <th>Quote#</th>
						      <th>Customer Item</th>
						      <th>Total</th>
						      <th>Status</th>
						      <th>History Status</th>
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
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

<script>
	$(document).ready(function(){

		$('#table_quote').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url:'{{ route('quote_datatable') }}',
          },
          // columnDefs: [

          //         {
          //            targets: 0 ,
          //            className: 'center d_id'
          //         },
          //         {
          //            targets: 1,
          //            className: 'd_nama'
          //         },
          //         {
          //            targets: 2,
          //            className: 'center d_grup'
          //         },
          //         {
          //            targets: 4,
          //            className: 'center'
          //         }
          //       ],
          columns: [
            {data: 'DT_Row_Index', name: 'DT_Row_Index'},
            {data: 'q_nota', name: 'q_nota'},
            {data: 'detail', name: 'detail'},
            {data: 'total', name: 'total'},
            {data: 'status', name: 'status'},
            {data: 'histori', name: 'histori'},
            {data: 'aksi', name: 'aksi'},

          ]

    	});


    	var m_table       = $("#apfsds").DataTable();
        var q_qty         = $("#q_qty");
        var q_item        = $("#q_item");
        var q_kodeitem    = $("#q_kodeitem");

        var x = 1;
 
	    q_qty.keypress(function(e) {
	      if(e.which == 13 || e.keyCode == 13){
	        m_table.row.add( [
	            '<input type="text" id="item_kode[]" class="form-control input-sm min-width" readonly value="'+ q_kodeitem.val() +'">',
	            '<input type="text" id="item_name[]" class="form-control input-sm min-width" value="'+ q_item.val() +'">',
	            '<input type="number" id="jumlah[]" class="form-control input-sm min-width" value="'+ q_qty.val() +'">',
	            '<input type="text" id="unit[]" class="form-control input-sm min-width">',
	            '<input type="text" id="description[]" class="form-control input-sm min-width">',
	            '<input type="text" id="unit_price[]" class="form-control input-sm min-width">',
	            '<input type="text" id="line_total[]" class="form-control input-sm min-width">',
	            '<button type="button" class="delete btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>',
	        ] ).draw( false );
	  
	        x++;
	        q_item.focus();
	        q_item.val('');
	        q_qty.val('');
	      }
	    } );
	 
	    

	    $('#apfsds tbody').on( 'click', '.delete', function () {
	    m_table
	        .row( $(this).parents('tr') )
	        .remove()
	        .draw();
	    });

	});

	function auto() {

		$( ".autocomplete" ).autocomplete({
	        source:baseUrl + '/quotation/q_quotation/autocomplete', 
	        minLength: 1,
	        select: function(event, ui) {
	          if (ui.item.validator != null) {
	          }
	          $('.harga_do').val(ui.item.harga);

	      	}

	    });
	}

	
</script>
@endsection