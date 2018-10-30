@extends('main')

@section('extra_style')
<style type="text/css">
  #settings-trigger{
    box-shadow: none;
  }
</style>

<style type="text/css">
  .wizard {
      margin: 20px auto;
      background: transparent;
  }

  .wizard .nav-tabs {
      position: relative;
      margin: 40px auto;
      margin-bottom: 0;
      border-bottom-color: #e0e0e0;
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-flex-flow: row wrap;
      justify-content: space-around;
      -webkit-justify-content: space-around;
      flex-wrap: nowrap;
      -webkit-flex-wrap: nowrap;
  }

  .wizard > div.wizard-inner {
      position: relative;
  }

  .nav-tabs .nav-link.disabled{
    cursor: not-allowed;
  }
  .nav.nav-tabs .nav-item .nav-link, .nav.nav-pills .nav-item .nav-link{
    border:none;
  }
  .nav-tabs > li .disabled span.round-tab {
      background-color: #e0e0e0ff;
  }

  .connecting-line {
      height: 2px;
      background: #e0e0e0;
      position: absolute;
      width: 60%;
      margin: 0 auto;
      left: 0;
      right: 0;
      top: 70%;
      z-index: 0;
  }

  .wizard .nav-tabs > li.active > a,
  .wizard .nav-tabs > li.active > a:hover,
  .wizard .nav-tabs > li.active > a:focus {
      color: #555555;
      cursor: default;
      border: 0;
      border-bottom-color: transparent;
  }

  span.round-tab {
      width: 70px;
      height: 70px;
      line-height: 70px;
      display: inline-block;
      border-radius: 100px;
      background: #fff;
      border: 2px solid #e0e0e0;
      z-index: 2;
      position: absolute;
      left: 0;
      text-align: center;
      font-size: 25px;
  }

  span.round-tab i {
      color: #555555;
  }

  .wizard li a.active span.round-tab {
      background: #fff;
      border: 2px solid #5bc0de;

  }

  .wizard li a.active span.round-tab i {
      color: #5bc0de;
  }

  span.round-tab:hover {
      color: #333;
      border: 2px solid #333;
  }

  

  .wizard li a:after {
      content: " ";
      position: relative;
      left: 46%;
      top: -20px;
      opacity: 0;
      margin: 0 auto;
      bottom: 0px;
      border: 5px solid transparent;
      border-bottom-color: #5bc0de;
      transition: 0.1s ease-in-out;
  }

  .wizard li.active.nav-item:after {
      content: " ";
      position: relative;
      left: 46%;
      top: -20px;
      opacity: 1;
      margin: 0 auto;
      bottom: 0px;
      border: 10px solid transparent;
      border-bottom-color: #5bc0de;
  }

  .wizard .nav-tabs > li a {
      width: 70px;
      height: 70px;
      margin: 20px auto;
      border-radius: 100%;
      padding: 0;
      position: relative;
  }

  .wizard .nav-tabs > li a:hover {
      background: transparent;
  }

  .wizard .tab-pane {
      position: relative;
  }

  .wizard h3 {
      margin-top: 0;
  }

  @media( max-width: 585px) {

      .wizard {
          width: 90%;
          height: auto !important;
      }

      span.round-tab {
          font-size: 16px;
          width: 50px;
          height: 50px;
          line-height: 50px;
      }

      .wizard .nav-tabs > li a {
          width: 50px;
          height: 50px;
          line-height: 50px;
      }

      .wizard li.active:after {
          content: " ";
          position: absolute;
          left: 35%;
      }
  }
  .tab-content{
    padding: 0;
    border:none;
    border-radius: none;
  }
</style>
@endsection

@section('content')

<!-- partial -->
<div class="content-wrapper">
  <div class="btn-scrolltop">
    <i class="fa fa-angle-up"></i>
  </div>
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
  <form id="forum-dokumentasi" class="form cf" enctype="multipart/form-data">
    <div class="wizard">

      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Form Schedule Jadwal Uji Coba dan Dokumentasi</h4>

                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="nav-item">
                            <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Gambar" class="nav-link active">
                                <span class="round-tab">
                                    <i class="fa fa-file-image-o"></i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="nav-item">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2" class="nav-link disabled">
                                <span class="round-tab">
                                    <i class="fa fa-info"></i>
                                </span>
                            </a>
                        </li>
                        <li role="presentation" class="nav-item">
                            <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab" title="Finish" class="nav-link disabled">
                                <span class="round-tab">
                                    <i class="fa fa-check"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
          </div>
        </div>
      </div>
      <div class="tab-content">

        <div class="tab-pane active" role="tabpanel" id="step1">
          <div class="row" id="form-dokumentasi">
            

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  
                    
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

                    <div class="col-md-6 col-sm-6 col-xs-12 text-center image-file">
                      <div class="form-group">
                        <img src="{{asset('assets/images/add-image-icon.png')}}" class="preview-image">
                      </div>
                      <div class="row">

                        <div class="col-md-12">
                          <div class="form-group">
                            <input type="file" class="form-control form-control-sm" name="image[]" accept="image/*">
                          </div>
                        </div>
                        
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
        </div>

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


  $(document).on('click','.btn-tambah-gambar', function(){
  var i = $(this).parents('.card-body').find('input[type="file"]').length;
  // console.log(i);
    if (i < 4) {
      $(this).parents('.card-body').find('div[id*="form-gambar-"]')
      .append(
        '<div class="col-md-6 col-sm-6 col-xs-12 text-center image-file">'+
          '<div class="form-group">'+
            '<img src="{{asset('assets/images/add-image-icon.png')}}" class="preview-image">'+
          '</div>'+
          '<div class="row">'+

            '<div class="col-md-12">'+
              '<div class="form-group">'+
                '<div class="input-group">'+
                  '<div class="input-group-addon">'+
                    '<button class="btn btn-danger btn-hapus-gambar btn-xs" type="button">'+
                      '<i class="fa fa-trash"></i>'+
                    '</button>'+
                  '</div>'+
                  '<input type="file" class="form-control form-control-sm" name="image[]" accept="image/*">'+
                '</div>'+
              '</div>'+
            '</div>'+
            
          '</div>'+
        '</div>'
              );
    } else {
      iziToast.error({
        message:"Maximum only 4!"
      });
    }
  });

  $(document).on('click', '.btn-hapus-gambar', function(){
    $(this).parents('.image-file').remove();
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

                  '<div class="col-md-6 col-sm-6 col-xs-12 text-center image-file">'+
                    '<div class="form-group">'+
                      '<img src="{{asset('assets/images/add-image-icon.png')}}" class="preview-image">'+
                    '</div>'+
                    '<div class="row">'+

                      '<div class="col-md-12">'+
                        '<div class="form-group">'+
                          '<input type="file" class="form-control form-control-sm" name="image[]" accept="image/*">'+
                        '</div>'+
                      '</div>'+
                      
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

          '<div class="col-lg-12 text-center grid-margin">'+
            '<button type="button" class="btn btn-danger btn-hapus">'+
              '<i class="fa fa-trash"></i> Delete'+
            '</button>'+
          '</div>'+
        '</div>'+
      '</div>'
                  );
  var get_scroll = $('#form-gambar-'+int).offset();

  var scroll = get_scroll.top - 100;

  console.log(scroll);
  console.log(get_scroll.top);
  $('html, body').animate({scrollTop:scroll}, 'slow');

  int++;
});

$(document).on('click', '.btn-hapus', function(){
  $(this).parents('.m4').remove();

  var get_tambah_posisi = $('.btn-tambah').offset();
  var tambah_posisi = get_tambah_posisi.top - 100;
  $('html, body').animate({scrollTop:tambah_posisi}, 'slow');

  int--;
});
// image preview
function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $(input).parents('.image-file').find('.preview-image').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}
// end image preview
$(document).on('change', "input[type='file']",function() {
  readURL(this);
});

$(document).on('click', '.preview-image', function(){
  $(this).parents('.image-file').find('input[type="file"]').click();
});
$('.btn-scrolltop').on('click', function(){
  $('html, body').animate({scrollTop:0}, 'slow');
});

</script>
<script type="text/javascript">
   //Initialize tooltips
   $('.nav-tabs > li a[title]').tooltip();

   //Wizard
   $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

       var $target = $(e.target);

       if ($target.hasClass('disabled')) {
           return false;
       }
   });

   $(".next-step").click(function (e) {
       var $active = $('.wizard .nav-tabs .nav-item .active');
       var $activeli = $active.parent("li");

       $($activeli).next().find('a[data-toggle="tab"]').removeClass("disabled");
       $($activeli).next().find('a[data-toggle="tab"]').click();
   });


   $(".prev-step").click(function (e) {

       var $active = $('.wizard .nav-tabs .nav-item .active');
       var $activeli = $active.parent("li");

       $($activeli).prev().find('a[data-toggle="tab"]').removeClass("disabled");
       $($activeli).prev().find('a[data-toggle="tab"]').click();

   });

</script>
@endsection