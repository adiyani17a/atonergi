@extends('main')
@section('content')

@include('setting.akun.tambah')

<!-- partial -->
<div class="content-wrapper">
  <div class="col-lg-12"> 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb bg-info">
        <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
        <li class="breadcrumb-item">Setting</li>
        <li class="breadcrumb-item active" aria-current="page">Setting Account</li>
      </ol>
    </nav>
  </div>
	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card row">
                <div class="card-body">
                  <h4 class="card-title">Setting Account</h4>
                  <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
                  	<button type="button" class="btn btn-info btn_modal" data-toggle="modal" data-target="#tambah-akun"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
                  </div>
                  <div class="table-responsive">
      				        <table id="table_data" class="table table-striped table-hover" cellspacing="0">
                          <thead class="bg-gradient-info">
                            <tr>
                              <th>No</th>
                              <th>Username</th>
                              <th>Nama</th>
                              <th>Jabatan</th>
                              <th>Last Login</th>
                              <th>Last Logout</th>
                              <th>Aksi</th>
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

     $('#table_data').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url:'{{ route('datatable_akun') }}',
          },
          // columnDefs: [

                //   {
                //      targets: 0 ,
                //      className: 'center d_id'
                //   },
                //   {
                //      targets: 1 ,
                //      className: 'd_nama'
                //   },
                //   {
                //      targets: 2 ,
                //      className: 'd_keterangan'
                //   },
                //   {
                //      targets: 3 ,
                //      className: 'center'
                //   },
                  
                  
                // ],
          // columns: [
          //   {data: 'j_id', name: 'j_id'},
          //   {data: 'j_nama', name: 'j_nama'},
          //   {data: 'j_keterangan', name: 'j_keterangan'},
          //   {data: 'aksi', name: 'aksi'}
          // ]

    });
  })

  $('.btn_modal').click(function(){
    $('.nama').focus();
  })

$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});

function previewFile() {
  var preview = document.querySelector('img');
  var file    = document.querySelector('input[type=file]').files[0];
  var reader  = new FileReader();

  reader.onload = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}

  $('.simpan').click(function(){
    $.ajax({
        url:baseUrl +'/setting/simpan_jabatan',
        type:'get',
        data:$('.tabel_modal :input').serialize(),
        dataType:'json',
        success:function(data){
            if (data.status == 0) {
              iziToast.warning({
                  icon: 'fa fa-times',
                  title: 'Nama',
                  message: 'Sudah Digunakan!',
              });
            }else if(data.status == 1){
              iziToast.success({
                  icon: 'fa fa-save',
                  title: 'Berhasil',
                  message: 'Menambah Data!',
              });
            }else{
              iziToast.success({
                  icon: 'fa fa-pencil-alt',
                  title: 'Berhasil',
                  message: 'Mengupdate Data!',
              });
            }
            $('#tambah-jabatan').modal('hide');
            var table = $('#table_data').DataTable();
            table.ajax.reload();
            $('.tabel_modal input').val('');
        },
        error:function(){
          iziToast.danger({
            icon: 'fa fa-times',
            message: 'Terjadi Kesalahan!',
          });
        }
    });
  });

  function edit(a) {
    
    var par   = $(a).parents('tr');
    var id    = $(par).find('.d_id').text();
    var nama  = $(par).find('.d_nama').text();
    var ket   = $(par).find('.d_keterangan').text();

    $('.id').val(id);
    $('.nama').val(nama);
    $('.keterangan').val(ket);
    $('#tambah-jabatan').modal('show');


  }


  function hapus(a) {
    var par   = $(a).parents('tr');
    var id    = $(par).find('.d_id').text();
    $.ajax({
        url:baseUrl +'/setting/hapus_jabatan',
        type:'get',
        data:{id},
        dataType:'json',
        success:function(data){
          $('#tambah-jabatan').modal('hide');
          var table = $('#table_data').DataTable();
          table.ajax.reload();
          if (data.status == 1) {
            iziToast.success({
                  icon: 'fa fa-trash',
                  title: 'Berhasil',
                  color:'yellow',
                  message: 'Menghapus Data!',
            });
          }else{
            iziToast.warning({
                  icon: 'fa fa-times',
                  title: 'Oops,',
                  message: ' Superuser Tidak Boleh Dihapus!',
            });
          }
        },
        error:function(){
          iziToast.danger({
            icon: 'fa fa-times',
            message: 'Terjadi Kesalahan!',
          });
        }
    });
  }
</script>
@endsection