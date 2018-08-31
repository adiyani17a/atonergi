@extends('main')
@section('content')

@include('master.vendor.tambah')

<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active" aria-current="page">Master Data Vendor</li>
        </ol>
      </nav>
    </div>
  	<div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Master Data Vendor</h4>
                    <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
                    	<button type="button" class="btn btn-info" id="button_add" data-toggle="modal" data-target="#tambah-vendor"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
                    </div>
                    <div class="table-responsive">
        				        <table class="table table-hover" id="table-vendor" cellspacing="0">
                            <thead class="bg-gradient-info">
                              <tr>
                                <th>Vendor kode</th>
                                <th>Vendor Name</th>
                                <th>PIC Name</th>
                                <th>HomeTown</th>
                                <th>Birth Date</th>
                                <th>Vendor Type</th>
                                <th>Information</th>
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
<script type="text/javascript">

  var table =  $('#table-vendor').DataTable({
            processing: true,
            // responsive:true,
            serverSide: true,
            ajax: {
                url:'{{ route('datatalble_vendor') }}',
            },
             columnDefs: [

                  {
                     targets: 0 ,
                     className: 'center d_id'
                  },
                  {
                     targets: 1 ,
                     className: ' user_id'
                  }, 
                ],
            "columns": [
            { "data": "s_kode" },
            { "data": "s_company" },
            { "data": "s_name" },
            { "data": "s_hometown" },
            { "data": "s_date" },
            { "data": "s_type" },
            { "data": "s_information" },
            { "data": "aksi" },
            ]
      });

  $('#button_add').click(function(){
    var v_name      = $("input[name='v_name']").val('');
    var v_company   = $("input[name='v_company']").val(''); 
    var v_hometown  = $("select[name='v_hometown']").val('').trigger('change');
    var v_tlp       = $("input[name='v_tlp']").val(''); 
    var v_email     = $("input[name='v_email']").val(''); 
    var v_tgl       = $("input[name='v_tgl']").val(''); 
    var v_alamat    = $("textarea#v_alamat").val(''); 
    var v_tipe      = $("select[name='v_tipe']").val('').trigger('change'); 
    var v_plafon    = $("input[name='v_plafon']").val(''); 
    var v_credit    = $("input[name='v_credit']").val(''); 
    var v_namabank  = $("input[name='v_namabank']").val(''); 
    var v_noakun    = $("input[name='v_noakun']").val(''); 
    var v_npwp      = $("input[name='v_npwp']").val(''); 
    var v_informasi = $("textarea#v_informasi").val('');
    var v_kode_old  = $("input[name='v_kode_old']").val('');
    $('#change_function').html('<button class="btn btn-primary" type="button" id="save_data" >Save Data</button>')
  })

  $('#change_function').on("click", "#save_data",function(){
    $.ajax({
         type: "get",
         url: baseUrl + '/master/simpanvendor/simpan_vendor',
         data: $('#save_vendor').serialize(),
         success: function(data){
            $('#tambah-vendor').modal('hide');
            var table = $('#table-vendor').DataTable();
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
           url: baseUrl + '/master/updatevendor/update_vendor',
           data: $('#save_vendor').serialize(),
           success: function(data){
              $('#tambah-vendor').modal('hide');
              var table = $('#table-vendor').DataTable();
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
    

  function edit(parm){
    var par   = $(parm).parents('tr');
    var id    = $(par).find('.d_id').text();
    $('#tambah-vendor').modal('show');
    $.ajax({
       type: "get",
         url: baseUrl + '/master/dataeditvendor/dataedit_vendor',
         data: {id},
         success: function(data){
          console.log(data);
            var v_name      = $("input[name='v_name']").val(data[0].s_name);
            var v_hometown  = $("select[name='v_hometown']").val(data[0].s_hometown).trigger('change'); 
            var v_company   = $("input[name='v_company']").val(data[0].s_company); 
            var v_tlp       = $("input[name='v_tlp']").val(data[0].s_phone); 
            var v_email     = $("input[name='v_email']").val(data[0].s_email); 
            var v_tgl       = $("input[name='v_tgl']").val(data[0].s_date); 
            var v_alamat    = $("textarea#v_alamat").val(data[0].s_address); 
            var v_tipe      = $("select[name='v_tipe']").val(data[0].s_type).trigger('change'); 
            var v_plafon    = $("input[name='v_plafon']").val(data[0].s_limit); 
            var v_credit    = $("input[name='v_credit']").val(data[0].s_termin); 
            var v_namabank  = $("input[name='v_namabank']").val(data[0].s_bankname); 
            var v_noakun    = $("input[name='v_noakun']").val(data[0].s_accountnumber); 
            var v_npwp      = $("input[name='v_npwp']").val(data[0].s_npwp); 
            var v_informasi = $("textarea#v_informasi").val(data[0].s_information);
            var v_kode_old  = $("input[name='v_kode_old']").val(data[0].s_kode);

            $('#change_function').html('<button class="btn btn-primary" type="button" onclick="update()">Update Data</button>')
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

  function hapus(parm){
    var par   = $(parm).parents('tr');
    var id    = $(par).find('.d_id').text();

    iziToast.show({
            overlay: true,
            close: false,
            timeout: 20000, 
            color: 'dark',
            icon: 'fas fa-question-circle',
            title: 'Important!',
            message: 'Apakah Anda Yakin ?!',
            position: 'center',
            progressBarColor: 'rgb(0, 255, 184)',
            buttons: [
              [
                '<button style="background-color:red;">Delete</button>',
                function (instance, toast) {

                  $.ajax({
                   type: "get",
                     url: baseUrl + '/master/hapusvendor/hapus_vendor',
                     data: {id},
                     success: function(data){
                      console.log(data);
                      var table = $('#table-vendor').DataTable();
                      table.ajax.reload();
                      
                     
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
              ],
              [
                '<button style="background-color:#44d7c9;">Cancel</button>',
                function (instance, toast) {
                  instance.hide({
                    transitionOut: 'fadeOutUp'
                  }, toast);
                }
              ]
            ]
          });

    
  }




</script>
@endsection