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
                          <table id="t55" class="table table-hover table-bordered" cellspacing="0">
                            <thead class="bg-gradient-info">
                                <tr>
                                  <th>Image</th>
                                  <th class="wd-15p" width="5%">Item Code</th>
                                  <th class="wd-15p">Item Name</th>
                                  <th>Item Price</th>
                                  <th class="wd-15p" width="5%">Unit</th>
                                  <th class="wd-15p">Description Item</th>
                                  <th width="15%">Action</th>
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
<!-- content-wrapper ends -->
@endsection


@section('extra_script')
<script>

$(document).ready(function(){

    $('#t55').DataTable({
            processing: true,
            // responsive:true,
            serverSide: true,
            ajax: {
                url:'{{ route("datatable_barang") }}',
            },
            columnDefs: [

                  {
                     targets: 0 ,
                     className: 'center d_id'
                  },
                  {
                     targets: 1,
                     className: 'd_nama'
                  },
                  {
                     targets: 2,
                     className: 'center d_grup'
                  },
                  {
                     targets: 4,
                     className: 'center'
                  }
                ],
            "columns": [
            { "data": "gambar"},
            { "data": "i_code" },
            { "data": "i_name" },
            { "data": "i_price"},
            { "data": "i_unit" },
            { "data": "i_description" },
            { "data": "aksi" },
            
            ]
      });
  });

function hapus(a) {
    var par   = $(a).parents('tr');
    var id    = $(par).find('.d_id').text();
    $.ajax({
        url: baseUrl +'/master/barang/baranghapus',
        type:'get',
        data: {id},
        dataType:'json',
        success:function(data){        
          var table = $('#t55').DataTable();
          table.ajax.reload();
          iziToast.success({
            icon: 'fa fa-check',
            message: 'Data Berhasil Dihapus!',
          });
          
        },
        error:function(){
          iziToast.warning({
            icon: 'fa fa-times',
            message: 'Terjadi Kesalahan!',
          });
        }
    });
  }

</script>
@endsection