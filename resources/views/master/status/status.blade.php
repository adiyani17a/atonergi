@extends('main')
@section('content')

@include('master.status.tambah_status')

<!-- partial -->
<div class="content-wrapper">
  <div class="col-lg-12"> 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb bg-info">
        <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
        <li class="breadcrumb-item">Master</li>
        <li class="breadcrumb-item active" aria-current="page">Master Data Status Q.O.#</li>
      </ol>
    </nav>
  </div>
	<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Master Data Status Q.O.#</h4>
                  <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
                  	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
                  </div>
                  <div class="table-responsive">
      				        <table class="table table-hover data-table" cellspacing="0">
                          <thead class="bg-gradient-info">
                            <tr>
                              <th>No</th>
                              <th>ID</th>
                              <th>Status Name</th>
                              <th>Color</th>
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
<script>

  function ganti_color()
  {
    var input = $('#i_status_color').val();
    var span  = $('#status_color');
    var div   = $('#div_status_color');

    // primary
    if(input=='badge-primary'){
      div.html('<span class="badge badge-pill badge-primary">Primary</span>');
    }else{
      div.html('');
    }
    // secondary
    if (input=='badge-secondary') 
    {
      div.html('<span class="badge badge-pill badge-secondary">Secondary</span>');
    }else{
      span.text('');
    }
    // success
    if (input=='badge-success') 
    {
      div.html('<span class="badge badge-pill badge-success">Success</span>');
    }else{
      span.text('');
    }
    // info
    if (input=='badge-info') 
    {
      div.html('<span class="badge badge-pill badge-info">Info</span>');
    }else{
      span.text('');
    }
    // warning
    if (input=='badge-warning') 
    {
      div.html('<span class="badge badge-pill badge-warning">Warning</span>');
    }else{
      span.text('');
    }
    // danger
    if (input=='badge-danger') 
    {
      div.html('<span class="badge badge-pill badge-danger">Danger</span>');
    }else{
      span.text('');
    }

  }
</script>
@endsection