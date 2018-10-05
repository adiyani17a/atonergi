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
											<td align="center">
												<button type="button" onclick="detail({{$value->dbl_id}})" class="btn btn-outline-primary icon-btn btn-sm" name="button"> <i class="fa fa-folder"></i> </button>
												<button type="button" class="btn btn-outline-warning icon-btn btn-sm" name="button"> <i class="fa fa-edit"></i> </button>
												<button type="button" onclick="hapus({{$value->dbl_id}})" class="btn btn-outline-danger icon-btn btn-sm" name="button"> <i class="fa fa-trash"></i> </button>
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
</div>

<!-- Modal -->
<div id="detail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Detail</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        <div class="modal-body">
					<div class="table-responsive" style="margin-bottom: 15px;">
						<table class="table table-bordered table-hover" cellspacing="0" id="t80b">
							<thead class="bg-gradient-info">
								<tr>
									<th>Item Code</th>
									<th width="30%">Item Name</th>
									<th>Qty Requested</th>
									<th>Unit</th>
									<th>Unit Price</th>
									<th>Line Total</th>
									<th>PPn</th>
								</tr>
							</thead>
							<tbody id="showdata">

							</tbody>
						</table>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
						 <div class="row">
							 <div class="offset-md-8 col-md-2 col-sm-12 col-xs-12">
								 <label>Subtotal</label>
							 </div>
							 <div class="col-md-2 col-sm-12 col-xs-12">
								 <div class="form-group">
									 <input type="text" class="form-control form-control-sm right dbldt_subtotal" readonly="" name="po_subtotal" id="dbldt_subtotal">
								 </div>
							 </div>
							 <div class="offset-md-8 col-md-2 col-sm-12 col-xs-12">
								 <label>Sales Tax</label>
							 </div>
							 <div class="col-md-2 col-sm-12 col-xs-12">
								 <div class="form-group">
									 <input type="text" class="form-control form-control-sm right format_money dbldt_tax" name="dbldt_tax" id="dbldt_tax" readonly>
								 </div>
							 </div>
							 <div class="offset-md-8 col-md-2 col-sm-12 col-xs-12">
								 <label>Total</label>
							 </div>
							 <div class="col-md-2 col-sm-12 col-xs-12">
								 <div class="form-group">
									 <input type="text" class="form-control form-control-sm right format_money total_net" readonly="dbldt_total_net" name="total_net" id="total_net">
								 </div>
							 </div>
						 </div>
						</div>
					</div>
          </div>
        <div class="modal-footer">
          <div id="ganti_tombol">
            <button class="btn btn-primary" type="button" onclick="simpan()">Save Data</button>
          </div>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>

<!-- content-wrapper ends -->
@endsection
@section('extra_script')
	<script type="text/javascript">
	$(document).ready(function(){
		var table = $('#datatable').DataTable();
	});

	function hapus(id){
    iziToast.show({
    timeout: false,
    theme: 'dark',
    icon: 'fa fa-question',
    title: 'Hapus?',
    message: 'Anda yakin ingin menhapus data?,<br>Data yang sudah dihapus tidak bisa dikembalikan!',
    position: 'center', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
    progressBarColor: '#57c7d4',
    buttons: [
        ['<button>Ya</button>', function (instance, toast) {
          waitingDialog.show()
          $.ajax({
            type: 'get',
            data: {id:id},
            dataType: 'json',
            url: baseUrl + '/purchase/belanjalangsung/hapus',
            success : function(result){
              if (result.status == 'berhasil') {
                iziToast.success({
                  icon: 'fa fa-check',
                  message: 'Berhasil Dihapus!',
                });
								setTimeout(function () {
                              waitingDialog.hide();
                          }, 500);
                window.location.reload();
              } else if (result.status == 'gagal') {
                iziToast.warning({
                  icon: 'fa fa-times',
                  message: 'Gagal Dihapus!',
                });
                setTimeout(function () {
                              waitingDialog.hide();
                          }, 500);
              }
            }
          });
        }, true], // true to focus
        ['<button>Tidak</button>', function (instance, toast) {
            instance.hide();
        }]
    ],
});
}

		function detail(id){
			var html = '';
			$.ajax({
				type: 'get',
				data: {id:id},
				dataType: 'json',
				url: baseUrl + '/purchase/belanjalangsung/detail',
				success : function(result){
					for (var i = 0; i < result.length; i++) {
						html += '<tr>'+
										'<td>'+result[i].dbldt_item+'</td>'+
										'<td>'+result[i].i_name+'</td>'+
										'<td>'+result[i].dbldt_qty+'</td>'+
										'<td>'+result[i].u_unit+'</td>'+
										'<td>'+accounting.formatMoney(result[i].dbldt_unit_price,"",0,'.',',')+'</td>'+
										'<td>'+accounting.formatMoney(result[i].dbldt_line_total,"",0,'.',',')+'</td>'+
										'<td>'+accounting.formatMoney(result[i].dbldt_ppn,"",0,'.',',')+'</td>'+
										'</tr>';
					}
				}
			});
			$('#detail').modal('show');
		}
	</script>
@endsection
