@extends('main')
@section('content')

@include('master/type/tambah_type')
<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Master</li>
				<li class="breadcrumb-item active" aria-current="page">Master Data Tipe Barang</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Master Data Tipe Barang</h4>
	          	<div class="row">
	          		
					<div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
						<button class="btn btn-info" id="tombol_modal_tambah" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
					</div>
					<div class="table-responsive">
						<table class="table table-hover data-table" cellspacing="0" id="t-80um">
						  <thead class="bg-gradient-info">
						    <tr>
						      <th>No</th>
						      <th>Type Code</th>
						      <th>Type Item</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@foreach($type as $tipe)
						  	<tr>
						  		<td class="it_id">{{$tipe['it_id']}}</td>
						  		<td>{{$tipe['it_code']}}</td>
						  		<td>{{$tipe['it_name']}}</td>
						  		<td>
						  			<div class="btn-group">
						  				<button class="btn btn-info btn-sm" type="button" title="Edit" onclick="edit(this)"><i class="fa fa-pencil-alt"></i></button>
						  				<button class="btn btn-danger btn-sm" type="button" title="Delete" onclick="hapus(this)"><i class="fa fa-trash"></i></button>
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
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script type="text/javascript">
	$('#tombol_modal_tambah').click(function(){


    
    var weight = $('input[name="weight"]').val('');
    var min_stock = $('input[name="min_stock"]').val('');
    var description = $('textarea[name="description"]').val('');
    var item_codex = $('input[name="it_codex"]').val('');

    $('#ganti_tombol').html('<button class="btn btn-primary" type="button" onclick="simpan()">Save Data</button>');

  });

	function simpan()
	{
		var form = $('#simpan_tipe').serialize();
		$.ajax({
	         type: "get",
	         url: baseUrl + '/master/type/typeproses',
	         data: form,
	         success: function(data){
	            $('#tambah').modal('hide');
	            var table = $('#t-80um').DataTable();
	            table.ajax.reload();

	            iziToast.success({
	              icon: 'fa fa-check-circle',
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

	function edit(m1a2)
{
    var par   = $(m1a2).parents('tr');
    var id    = $(par).find('.it_id').text();
    $.ajax({
       type: "get",
         url: baseUrl + '/master/type/type_edit',
         data: {id},
         success: function(data){
          $('#tambah').modal('show');
         
          	var t_codex	   = $("input[name='it_codex']").val(data[0].it_id);
            var it_id      = $("input[name='t_code']").val(data[0].it_code);
            var it_code    = $("input[name='t_name']").val(data[0].it_name);

            $('#ganti_tombol').html('<button class="btn btn-primary" type="button" onclick="update()">Update Data</button>')
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