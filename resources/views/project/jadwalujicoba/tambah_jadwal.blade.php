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
    <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Form Schedule Jadwal Uji Coba dan Dokumentasi</h4>
                
                
                
                <div align="right" style="margin-top: 15px;">
                
                  <button class="btn btn-info btn-sm" type="button">Save Data</button>
                  <a href="{{url('project/jadwalujicoba/jadwalujicoba')}}" class="btn btn-secondary btn-sm">Back</a>
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




$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  var fsize = $('#chooseFile')[0].files[0].size;
  if(fsize>2048576) //do something if file size more than 1 mb (1048576)
  {
      return false;
  }
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});

var loadFile = function(event) {
  var fsize = $('#chooseFile')[0].files[0].size;
  if(fsize>1048576) //do something if file size more than 1 mb (1048576)
  {
      iziToast.warning({
        icon: 'fa fa-times',
        message: 'File Is To Big!',
      });
      return false;
  }
  var reader = new FileReader();
  reader.onload = function(){
    var output = document.getElementById('output');
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
};

</script>
@endsection