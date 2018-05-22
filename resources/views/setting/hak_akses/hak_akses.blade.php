@extends('main')
@section('content')




<!-- partial -->
<div class="content-wrapper">

<div class="col-lg-12"> 
  <nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb bg-info">
      <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
      <li class="breadcrumb-item">Master</li>
      <li class="breadcrumb-item active" aria-current="page">Setting Hak Akses</li>
    </ol>
  </nav>
</div>

  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="col-md-12 col-xs-12 col-xs-12">
                    
                      <div class="panel-default">
                        <a data-toggle="collapse" href="#collapse1">
                        <div class="panel-heading bg-gradient-primary panel-bg panel-top" style="border: 1px solid #e5e5e5;color:white;padding-left: 15px;">
                          <h4 class="panel-title">
                            Setting
                          </h4>
                        </div>
                        </a>
                        <div id="collapse1" class="panel-collapse collapse">
                          <div class="panel-body" style="border: 1px solid #e5e5e5;">
                            <div class="table-responsive">
                            <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                              <thead class="bg-gradient-info">
                                <tr>
                                  <th>Nama Menu</th>
                                  <th>Aksi</th>
                                  <th>Tambah</th>
                                  <th>Ubah</th>
                                  <th>Hapus</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td></td>
                                  <td><input type="checkbox" name="tambah" class="tambah"></td>
                                  <td><input type="checkbox" name="tambah" class="tambah"></td>
                                  <td><input type="checkbox" name="tambah" class="tambah"></td>
                                  <td><input type="checkbox" name="tambah" class="tambah"></td>
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
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

@endsection