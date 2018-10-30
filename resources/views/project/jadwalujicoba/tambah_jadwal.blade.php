@extends('main')
@section('content')

<!-- partial -->
<div class="content-wrapper">

  <div class="row">
    <div class="col-lg-12"> 
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb bg-info">
            <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
            <li class="breadcrumb-item">Project Manajemen Pompa | SHS</li>
            <li class="breadcrumb-item"><a href="{{url('project/jadwalujicoba/jadwalujicoba')}}">Schedule Jadwal Uji Coba Dan Dokumentasi</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Schedule Jadwal Uji Coba dan Dokumentasi</li>
          </ol>
        </nav>
    </div>
  </div>
  <form id="forum-dokumentasi" enctype="multipart/form-data">
    <div class="row" id="form-dokumentasi">
      

      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Form Schedule Jadwal Uji Coba dan Dokumentasi</h4>
              
              <div class="row">

                <div class="col-md-3 col-sm-4 col-xs-12">
                  <label>Report Title</label>
                </div>

                <div class="col-md-9 col-sm-8 col-xs-12">
                  <div class="form-group form-group-sm">
                    <textarea rows="3" name="judul_laporan" class="form-control"></textarea>
                  </div>
                </div>

                <div class="col-md-3 col-sm-4 col-xs-12">
                  <label>Report Description</label>
                </div>

                <div class="col-md-9 col-sm-8 col-xs-12">
                  <div class="form-group form-group-sm">
                    <textarea rows="3" name="deskripsi_laporan" class="form-control"></textarea>
                  </div>
                </div>


              </div>
          
          </div>
        </div>
      </div>

      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">

          <div class="card-body">

            <div class="row" id="form-gambar-1">
              
              <div class="col-md-3 col-sm-4 col-xs-12">
                <label>Title</label>
              </div>

              <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="form-group form-group-sm">
                  <input type="text" class="form-control judul" name="judul[]">
                </div>
              </div>

              <div class="col-md-3 col-sm-4 col-xs-12">
                <label>Image</label>
              </div>

              <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="form-group form-group-sm">
                  <input type="file" class="form-control judul" name="gambar[]" accept="image/*">
                </div>
              </div>

            </div>
            <div class="row">
              <div class="col-md-12">
                <button type="button" class="btn btn-primary btn-block btn-tambah-gambar"><i class="fa fa-plus"></i> Add More Image</button>
              </div>
            </div>

            
          </div>
          
        </div>
      </div>

      <div class="col-lg-12 grid-margin text-center">
        <button type="button" class="btn btn-success btn-tambah"><i class="fa fa-plus"></i> Add</button>
      </div>

    </div>
  </form>
  <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">

          <div class="card-body">
             
            <div class="text-right">
              <div class="row">
                <div class="col-lg-12">
                  <button class="btn btn-info btn-sm m-2 btn-block btn-simpan" type="button">Save Data</button>
                </div>
                <div class="col-lg-12">
                  <a href="{{url('project/jadwalujicoba/jadwalujicoba')}}" class="btn btn-secondary btn-sm m-2 btn-block">Back</a>
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
var int = 2;

$('div[id*=form-gambar-]').each(function(){

  var i = $(this).find('input[type="file"]').length;

  $(document).on('click','.btn-tambah-gambar', function(){
  alert(i);
    if (i < 4) {
      $(this).parents('.card-body').find('div[id*="form-gambar-"]')
      .append('<div class="col-lg-12" id="m8-'+ i +'">'+
                '<div class="row">'+

                  '<div class="col-md-3 col-sm-4 col-xs-12">'+
                    '<label>Image</label>'+
                  '</div>'+

                  '<div class="col-md-9 col-sm-8 col-xs-12">'+
                    '<div class="form-group form-group-sm">'+

                      '<div class="input-group">'+
                        '<input type="file" class="form-control judul" name="gambar[]" accept="image/*">'+
                        '<div class="input-group-addon">'+
                          '<button type="button" class="btn btn-danger btn-hapus-gambar">'+
                            '<i class="fa fa-trash"></i>'+
                          '</button>'+
                        '</div>'+
                      '</div>'+

                    '</div>'+
                  '</div>'+

                '</div>'+
              '</div>'
              );
    } else {
      iziToast.error({
        message:"Maksimal 4!"
      });
    }
  });

  $(document).on('click', '.btn-hapus-gambar', function(){
    $(this).parents('div[id*="m8-"]').remove();
  });
});

$('.btn-tambah').on('click', function(){
  $('#form-dokumentasi')
  .append(
    '<div class="col-lg-12 m4">'+
      '<div class="row">'+
        '<div class="col-lg-12 grid-margin stretch-card">'+
          '<div class="card">'+

            '<div class="card-body">'+

              '<div class="row" id="form-gambar-'+int+'">'+
                
                '<div class="col-md-3 col-sm-4 col-xs-12">'+
                  '<label>Title</label>'+
                '</div>'+

                '<div class="col-md-9 col-sm-8 col-xs-12">'+
                  '<div class="form-group form-group-sm">'+
                    '<input type="text" class="form-control judul" name="judul[]">'+
                  '</div>'+
                '</div>'+

                '<div class="col-md-3 col-sm-4 col-xs-12">'+
                  '<label>Image</label>'+
                '</div>'+

                '<div class="col-md-9 col-sm-8 col-xs-12">'+
                  '<div class="form-group form-group-sm">'+
                    '<input type="file" class="form-control judul" name="gambar[]" accept="image/*">'+
                  '</div>'+
                '</div>'+

              '</div>'+
              '<div class="row">'+
                '<div class="col-md-12">'+
                  '<button type="button" class="btn btn-primary btn-block btn-tambah-gambar"><i class="fa fa-plus"></i> Add More Image</button>'+
                '</div>'+
              '</div>'+

              
            '</div>'+
            
          '</div>'+
        '</div>'+
        '<div class="col-lg-12 grid-margin text-center">'+
          '<button type="button" class="btn btn-hapus btn-danger">'+
            '<i class="fa fa-trash"></i> Delete'+
          '</button>'+
        '</div>'+
      '</div>'+
    '</div>'
  );
  int++;
});

$(document).on('click', '.btn-hapus', function(){
  $(this).parents('.m4').remove();

  $('html, body').animate({scrollTop:200}, 'slow');

  int--;
});

function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#review').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});

</script>
@endsection