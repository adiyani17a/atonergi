<!-- Modal -->
<div id="editmanajemen" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Edit Manajemen Payroll</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>Nama Gaji</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control" value="Gaji Pokok">
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>Jabatan</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <select class="form-control form-control-sm" id="filter">
                  <option disabled>--Pilih--</option>
                  <option value="ldr">Leader</option>
                  <option value="stf">Staff</option>
                  <option value="all" selected>Semua</option>
                </select>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>Jumlah Gaji</label>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control" min="0" id="jumlah">   
              </div>
            </div>
            <div class="col-md-3 col-sm-12 alamraya-no-padding">
              <span class="input-group-append">
                <button type="button" class="btn btn-primary btn-sm icon-btn ml-2" onclick="samakan()">
                  Samakan
                </button>
              </span>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>SD</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control" min="0" id="sd">   
              </div>
            </div>  
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>SMP</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control" min="0" id="smp">   
              </div>
            </div>  
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>SMA</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control" min="0" id="sma">   
              </div>
            </div>  
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>D1</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control" min="0" id="d1">   
              </div>
            </div>  
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>D2</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control" min="0" id="d2">   
              </div>
            </div>  
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>D3</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control" min="0" id="d3">   
              </div>
            </div>  
            <div class="col-md-12 col-sm-12 col-xs-12">
              <label>S1</label>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group">
                <input type="number" class="form-control" min="0" id="s1">   
              </div>
            </div>          

         </div> <!-- End div row -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" type="button">Simpan</button>
      </div>
    </div>

  </div>
</div>
