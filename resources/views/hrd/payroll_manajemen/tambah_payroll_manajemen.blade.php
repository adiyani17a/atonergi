<!-- Modal -->
<div id="tambahpayman" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-primary">
        <h4 class="modal-title">Tambah Payroll Manajemen</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>Periode (Mulai - Selesai)</label>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <div id="datepicker-popup" class="input-group date datepicker">
                    <input type="text" class="form-control" placeholder="dd-mm-yyyy">
                    <div class="input-group-addon alamraya-input-group-addon">
                      <span class="mdi mdi-calendar"></span>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <div id="datepicker-popup" class="input-group date datepicker">
                    <input type="text" class="form-control" placeholder="dd-mm-yyyy">
                    <div class="input-group-addon alamraya-input-group-addon">
                      <span class="mdi mdi-calendar"></span>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>Divisi</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <select class="form-control form-control-sm" id="filter">
                  <option disabled selected>--Pilih--</option>
                  <option value="hrd">HRD dan General Affair</option>
                  <option value="keu">Keuangan dan Akuntansi</option>
                  <option value="snm">Sales dan Marketing</option>
                  <option value="prd">Produksi</option>
                  <option value="gnp">Gudang dan Pengiriman</option>
                  <option value="opr">Operator</option>
                  <option value="gmr">General Manager</option>
                </select>
              </div>
            </div>
             <div class="col-md-12 col-sm-12 col-xs-12">
              <label>Jabatan</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <select class="form-control form-control-sm" id="filter" disabled>
                  <option disabled selected>--Pilih--</option>
                  <option value="ldr">Leader</option>
                  <option value="stf">Staff</option>
                  <option value="all">Semua</option>
                </select>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>Nama Pegawai</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control" disabled>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <button type="button" class="btn btn-info btn-block">Proses Data</button>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <br>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>Gaji Pokok</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control currency" min="0">   
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>Total Tunjangan</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control currency" min="0">   
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>Total Potongan</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control currency" min="0">   
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>Total Gaji</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control currency" min="0">   
              </div>
            </div>
          

         </div> <!-- End div row -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" type="button">Submit</button>
      </div>
    </div>

  </div>
</div>
