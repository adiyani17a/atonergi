@extends('main')
@section('content')

<style type="text/css">
	
	.right-border{
		border-right: white 1px solid;
	}

</style>

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
				      <label>Kode Opname</label>
				    </div>
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <div class="form-group">
				        <input type="text" class="form-control form-control-sm readonly" value="{{ $nota }}" name="pb_delivery_order">
				      </div>
				    </div>
				    <div class="col-md-6 col-sm-6 col-xs-12">
				    </div>
				    	
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <label>Item</label>
				    </div>
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <div class="form-group">
				      	<select class="form-control" name="op_item" id="op_item">
				      		<option>- Pilih -</option>
				      		<optgroup label="All">
				      			<option value="all">Show All</option>
				      		</optgroup>
				      		<optgroup label="Item">
				      			@foreach ($item as $e)
				      				<option value="{{ $e->i_code }}">{{ $e->i_code }} - {{ $e->i_name }}</option>
				      			@endforeach
				      		</optgroup>
				      		
				      	</select>
				      </div>
				    </div>
				    <div class="col-md-6 col-sm-6 col-xs-12">
				    </div>

				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <label>Date of Receipt</label>
				    </div>
				    <div class="col-md-3 col-sm-6 col-xs-12">
				      <div class="form-group">
				        <input type="text" class="form-control form-control-sm datepicker_today"  name="pb_date">
				      </div>
				    </div>
				    <div class="col-md-6 col-sm-6 col-xs-12">
				    </div>
				   
				    
				    <div class="table-responsive " style="margin-top: 15px;">
				      <table class="table table-hover data-table">
				        <thead class="bg-gradient-info">
					        <tr>
				                <th rowspan="2" class="right-border" style="width: 15px;">No</th>
				                <th rowspan="2" class="right-border">Item</th>
				                <th rowspan="2" class="right-border">Unit</th>
				                <th colspan="2" class="right-border">Stock Item</th>
				                <th colspan="2" class="right-border">Stock difference</th>
				                <th rowspan="2" class="right-border">Description</th>
				            </tr>
				            <tr>
				                <th class="right-border" style="width: 10px;">Stock Sistem</th>
				                <th class="right-border" style="width: 10px;">Stock Real</th>
				                <th class="right-border" style="width: 100px;">Status Item</th>
				                <th class="right-border" style="width: 10px;">Status Total</th>
				            </tr>
				        </thead>
				        <tbody id="replace">	
			        		 @foreach ($data as $index => $a)
							  <tr>
						        <td>{{ $index+1 }}</td>
						        <td>{{ $a->i_name }}</td>
						        <td>{{ $a->i_unit }}</td>
						        <td><input type="text" name="" value="{{ $a->sg_qty }}" class="form-control right stock_system" readonly=""></td>
						        <td><input type="text" name="" class="form-control stock_real format_money_kosongan right" value="0" onkeyup="stock_real(this)"></td>
						        <td><input type="text" name="" class="form-control status_item" readonly=""></td>
						        <td><input type="text" name="" class="form-control right status_total" readonly=""></td>
						        <td><input type="text" name="" class="form-control" ></td>
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
		
	$('#op_item').change(function(){
		var id = $(this).find(':selected').val();
		 $.ajax({
	         type: "get",
	         url: '{{ route('cari_stockopname') }}',
	         data: {id},
	         success: function(data){
	           $('#replace').html(data);
	         },
	         error: function(){
	          iziToast.warning({
	            icon: 'fa fa-times',
	            message: 'Terjadi Kesalahan!',
	          });
	         },
	         async: false
	    });
	})

	function stock_real(a) {
     var par   = $(a).parents('tr');
     var stock_real = $(par).find('.stock_real').val();
     var stock_system = $(par).find('.stock_system').val();
     var status_item = $(par).find('.status_item').val();
     var status_total = $(par).find('.status_total').val();

     if (parseFloat(stock_real) > parseFloat(stock_system)) {
     	$(par).find(".status_item").val('LEBIH');
     	var hitung = parseFloat(stock_real)-parseFloat(stock_system);
     	$(par).find(".status_total").val(hitung);
     }else if (parseFloat(stock_real) == parseFloat(stock_system)){
     	$(par).find(".status_item").val('SAMA');
     	var hitung = 0;
     	$(par).find(".status_total").val(hitung);
     }else{
     	$(par).find(".status_item").val('KURANG');
     	var hitung = parseFloat(stock_system)-parseFloat(stock_real);
     	$(par).find(".status_total").val(hitung);
     }



	}


</script>
@endsection