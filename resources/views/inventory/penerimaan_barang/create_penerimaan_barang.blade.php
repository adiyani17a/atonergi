@extends('main')
@section('content')
<form id="form-save">
<!-- partial -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">	
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb bg-info">
					<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
					<li class="breadcrumb-item">Inventory</li>
					<li class="breadcrumb-item"><a href="{{url('inventory/penerimaan_barang/penerimaan_barang')}}">Penerimaan Barang</a></li>
					<li class="breadcrumb-item active" aria-current="page">Process Penerimaan Barang</li>
				</ol>
			</nav>
		</div>
		<div class="col-lg-12 grid-margin stretch-card">
	      	<div class="card">
		        <div class="card-body">
		          <h4 class="card-title">Process Penerimaan Barang</h4>
					<div class="row">
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <label>Kode Vendor</label>
				    </div>
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <div class="form-group">
				        <input type="text" class="form-control form-control-sm readonly" value="{{ $header_cari->po_vendor }}" name="pb_vendor">
				      </div>
				    </div>
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <label>Vendor Name</label>
				    </div>
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <div class="form-group">
				        <input type="text" class="form-control form-control-sm readonly" value="{{ $header_cari->s_company }} - {{ $header_cari->s_name }}" name="">
				      </div>
				    </div>
				    
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <label>No Delivery Order</label>
				    </div>
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <div class="form-group">
				        <input type="text" class="form-control form-control-sm" value="" name="pb_delivery_order">
				      </div>
				    </div>
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <label>Date of Receipt</label>
				    </div>
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <div class="form-group">
				        <input type="text" class="form-control form-control-sm datepicker" value="{{date('d-m-Y',strtotime($header_cari->po_date))}}" name="pb_date">
				      </div>
				    </div>
				    
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <label>No P.O.#</label>
				    </div>
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <div class="form-group">
				        <input type="text" class="form-control form-control-sm readonly" value="{{ $header_cari->po_code }}" name="pb_ref">
				      </div>
				    </div>
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <label>CheckList</label>
				    </div>
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <div class="form-group">
				         <label class="label">
		                   <input class="checkbox hapus" name="pb_check" onclick="centang()" type="checkbox">
		                  </label>
				      </div>
				    </div>
				    
				    <div class="table-responsive " style="margin-top: 15px;">
				      <table class="table table-hover data-table">
				        <thead class="bg-gradient-info">
				          <tr>
				            <th>No</th>
				            <th>Item Name</th>
				            <th>Unit</th>
				            <th>Amount Sent</th>
				            <th>Amount Received</th>
				            <th>Remains</th>
				          </tr>
				        </thead>
				        <tbody>
			        	@foreach ($seq_cari as $a)
			        		<tr>
				            <td>{{ $a->podt_id }}</td>
				            <td><input type="hidden" class="form-control form-control-sm po_item" value="{{ $a->i_code }}" name="po_item[]">{{ $a->i_name }}</td>
				            <td><input type="hidden" class="form-control form-control-sm" value="{{ $a->podt_unit_price }}" name="po_harga[]">{{ $a->i_unit }}</td>
				            <td><input type="text" class="format_money_kosongan form-control form-control-sm qty_approved right readonly" value="{{ $a->podt_qty_approved }}" name="qty_approved[]"></td>
				            <td><input type="text" class="format_money_kosongan form-control form-control-sm qty_received right" onkeyup="qty_received(this);" name="qty_received[]"></td>
				            <td><input type="hidden" class="format_money_kosongan form-control form-control-sm qty_remain_temp right readonly" value="{{ $a->podt_qty_approved }}" name="">
				            	<input type="text" class="format_money_kosongan form-control form-control-sm qty_remain right readonly" value="{{ $a->podt_qty_approved }}" name="qty_remain[]"></td>
				          </tr>
			        	@endforeach
				        </tbody>
				      </table>
				    </div>

					

		      	</div>
		      <div class="pull-right" style="margin-top: 10px">
				<button type="button" class="btn btn-info btn-sm" onclick="save_data()" >Add Data</button>
				<a href="{{url('inventory/penerimaan_barang/penerimaan_barang')}}" class="btn btn-secondary btn-sm">Back</a>
			  </div>
	    	</div>
	    	
		</div>
	</div>
</div>
</div>
</form>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script type="text/javascript">
	

	function qty_received(a) {
    var par   = $(a).parents('tr');
    var qty_approved = $(par).find('.qty_approved').val();
    var qty_received = $(par).find('.qty_received').val();
    var qty_remain = $(par).find('.qty_remain').val();
    var qty_remain_temp = $(par).find('.qty_remain_temp').val();


    var qty_hitung = parseFloat(qty_approved)-parseFloat(qty_received);

    $(par).find('.qty_remain').val(qty_hitung);

		if (parseFloat(qty_received) > parseFloat(qty_remain) ) {
			iziToast.warning({
	            icon: 'fa fa-times',
	            message: 'Qty Melebihi Batas MAX!',
	          });
			$(par).find('.qty_received').val(0);
			$(par).find('.qty_remain_temp').val(qty_remain_temp);
		}

	}

	function save_data(){

		 $.ajax({
           type: "get",
             url: '{{ route('save_penerimaan_barang') }}',
             data:$('#form-save').serialize(),
             success: function(data){

              iziToast.success({
                icon: 'fas fa-check-circle',
                message: 'Data Telah Tersimpan!',
              });
         	
         	// window.location.href= '{{ route('penerimaan_barang') }}';

             
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
	var check = 0;
		if ($('.checkbox').is(':checked')) {
			function centang(){
				$.each($('.qty_approved'), function (index, value) { 
					 console.log(index+'_'+$(this).val());
				     check = $(this).val();
				     $('.qty_received').val(check);	
				     qty_received($(this));
				})
			}
		}else{
			$.each($('.qty_approved'), function (index, value) { 
    			var qty_received = $('.qty_received').val();
	    		var qty_approved = $('.qty_approved').val(0);
   				var qty_remain = $('.qty_remain').val(qty_received);

			})
		}
		


</script>
@endsection