@extends('main')
@section('content')

@include('master/akun/tambah_akun_keuangan')
@include('master/akun/edit_akun_keuangan')
<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active" aria-current="page">Data Akun Keuangan</li>
        </ol>
      </nav>
    </div>

    <div class="col-lg-12 alamraya-row-nav">
      <ul class="nav nav-tabs tab-solid tab-solid-primary alamraya-navtab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="tab-6-1" data-toggle="tab" href="#absakeuangan" role="tab" aria-controls="absakeuangan" aria-selected="true"><i class="mdi mdi-file-document"></i>Master Data Akun Keuangan</a>
        </li>
      </ul>

      <div class="tab-content tab-content-solid col-lg-12 ">

        <div class="tab-pane fade show active" id="abslembur" role="tabpanel" aria-labelledby="tab-6-1">
          <div class="col-lg-12 grid-margin stretch-card alamraya-no-padding">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Master Data Akun Keuangan</h4>
              
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button class="btn btn-info alamraya-btn-add pull-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
                </div>

                <div class="row">

                  <div class="table-responsive">
                    <table class="table table-hover data-table" cellspacing="0">
                      <thead class="bg-gradient-info">
                        <tr>
                        <th>Nomor Akun</th>
                        <th>Nama Akun</th>
                        <th>Kelompok Akun</th>
                        <th>Debet/Kredit</th>
                        <th>Neraca</th>
                        <th>Laba Rugi</th>
                        <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody class="center">
                        <tr>
                          <td>1.00.01</td>
                          <td>Kas Besar</td>
                          <td>Kas</td>
                          <td>DEBET</td>
                          <td>A1-00</td>
                          <td>-</td>
                          <td>
                            <center>
                              <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-lg alamraya-btn-aksi" title="edit" data-toggle="modal" data-target="#edit">
                                  <label class="fa fa-pencil-alt"></label>
                                </button>
                                <button type="button" class="btn btn-danger btn-lg alamraya-btn-aksi" title="hapus" onclick="hapus()">
                                  <label class="fa fa-trash"></label>
                                </button>
                              </div>
                            </center>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                        
                </div>
              </div>
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
  
  function hapus(){
  // function hapus(parm){
    // var par   = $(parm).parents('tr');
    // var id    = $(par).find('.d_id').text();

    iziToast.show({
            overlay: true,
            close: false,
            timeout: 20000, 
            color: 'dark',
            icon: 'fas fa-question-circle',
            title: 'Important!',
            message: 'Apakah Anda Yakin ?',
            position: 'center',
            progressBarColor: 'rgb(240, 0, 0)',
            buttons: [
              [
                '<button style="background: rgb(190, 0, 0); color: white;" onclick="success()">Delete</button>',
                function (instance, toast) {

                  // $.ajax({
                  //  type: "get",
                  //    url: baseUrl + '/hrd/data_lembur/hapus_data_lembur',
                  //    data: {id},
                  //    success: function(data){
                  //     console.log(data);
                  //     var table = $('#table-data-lembur').DataTable();
                  //     table.ajax.reload();
                      
                     
                  //    },
                  //    error: function(){
                  //     iziToast.warning({
                  //       icon: 'fa fa-times',
                  //       message: 'Terjadi Kesalahan!',
                  //     });
                  //    },
                  //    async: false
                  //  });
                 
                }
              ],
              [
                '<button class="btn btn-info">Cancel</button>',
                function (instance, toast) {
                  instance.hide({
                    transitionOut: 'fadeOutUp'
                  }, toast);
                }
              ]
            ]
          });


  }

  function success(){

    iziToast.success({
      title: 'OK',
      message: 'Successfully deleted record!',
  });

  }

</script>

@endsection