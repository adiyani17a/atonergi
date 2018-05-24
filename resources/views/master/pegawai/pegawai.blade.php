@extends('main')
@section('content')

@include('master.pegawai.tambah')

<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Master</li>
				<li class="breadcrumb-item active" aria-current="page">Master Data Pegawai</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Master Data Pegawai</h4>
                  <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
                  	<button type="button" class="btn btn-info" data-toggle="modal" id="button_add" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
                  </div>
                  <div class="table-responsive">
				      <table class="table table-hover table-bordered" id="table-pegawai" cellspacing="0">
				                          <thead class="bg-gradient-info">
				                            <tr>
				                              <th>ID</th>
				                              <th>NIK</th>
				                              <th>Employee Name</th>
				                              <th>Address</th>
				                              <th>Employee Status</th>
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
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script type="text/javascript">
	

    $('#table-pegawai').DataTable({
            processing: true,
            // responsive:true,
            serverSide: true,
            ajax: {
                url:'{{ route('datatalble_customer') }}',
            },
             columnDefs: [

                  {
                     targets: 1 ,
                     className: 'center d_id'
                  }, 
                ],
            "columns": [
            { "data": "c_birthday" },
            { "data": "c_code" },
            { "data": "c_name" },
            { "data": "c_type" },
            { "data": "c_information" },
            { "data": "aksi" },
            ]
      });

  $('#button_add').click(function(){
    
  })

   $('#save_data').click(function(){
    $.ajax({
         type: "get",
         url: baseUrl + '/master/simpancustomer/simpan_customer',
         data: $('#form_save').serialize(),
         success: function(data){
            $('#tambah-customer').modal('hide');
            var table = $('#table-cust').DataTable();
            table.ajax.reload();

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
  })

   function update() {
      $.ajax({
           type: "get",
           url: baseUrl + '/master/updatecustomer/update_customer',
           data: $('#form_save').serialize(),
           success: function(data){
              $('#tambah-customer').modal('hide');
              var table = $('#table-cust').DataTable();
              table.ajax.reload();

              iziToast.success({
                icon: 'fas fa-check-circle',
                message: 'Data Telah Terupdate!',
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