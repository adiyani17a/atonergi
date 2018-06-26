@extends('main')
@section('content')

@include('hrd/kpi/tambah_kpi')
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
                
                <div class="table-responsive">
                  <table class="table table-hover" cellspacing="0" id="dm33">
                    <thead class="bg-gradient-info">
                      <tr>
                        <th>No</th>
                        <th>Preview</th>
                        <th>Picture</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="index">1</td>
                        <td>
                          <div class="preview_td">
                              <img style="width: 100px;height: 100px;border:1px solid pink" id="output" >
                          </div>
                        </td>
                        <td>
                          <div class="file-upload">
                            <div class="file-select">
                              <div class="file-select-button" id="fileName">Image</div>
                              <div class="file-select-name" id="noFile">Choose Image...</div> 
                              <input type="file" name="image" onchange="loadFile(event)" id="chooseFile" accept="image/*">
                            </div>
                          </div>
                        </td>
                        <td>
                          <input type="text" class="form-control form-control-sm" name="">
                        </td>
                        <td>
                          <textarea class="form-control form-control-sm"></textarea>
                        </td>
                        <td>
                          <button type="button" class="btn btn-sm btn-primary addRow"><i class="fa fa-plus"></i></button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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
  
  $(document).ready(function() {
    var t = $('#dm33').DataTable();
    var counter = 1;
 
    $('.addRow').on('click', function () {
        t.row.add( [
            counter,
            '<tr>'+
              '<td>'+
                '<div class="preview_td">'+
                    '<img style="width: 100px;height: 100px;border:1px solid pink" id="output" >'+
                '</div>'+
              '</td>',

              '<td>'+
                '<div class="file-upload">'+
                  '<div class="file-select">'+
                    '<div class="file-select-button" id="fileName">Image</div>'+
                    '<div class="file-select-name" id="noFile">Choose Image...</div>'+
                    '<input type="file" name="image" onchange="loadFile(event)" id="chooseFile" accept="image/*">'+
                  '</div>'+
                '</div>'+
              '</td>',

              '<td>'+
                '<input type="text" class="form-control form-control-sm" name="">'+
              '</td>',

              '<td>'+
                '<textarea class="form-control form-control-sm"></textarea>'+
              '</td>',

              '<td>'+
                  '<button type="button" class="btn btn-sm btn-danger delete" title="Delete"><i class="fa fa-trash"></i></button>'+
                '</div>'+
              '</td>'+
            '</tr>'
        ] ).draw( true );
 
        counter++;
    } );

    $('#dm33 tbody').on( 'click', '.delete', function () {
    t
        .row( $(this).parents('tr') )
        .remove()
        .draw();
    } );



} );



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