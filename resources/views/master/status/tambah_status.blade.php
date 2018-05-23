<!-- Modal -->
<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Status</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <label>Status Name</label>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <label>Status Text</label>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <label>Status Color</label>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <select class="form-control form-control-sm" onchange="ganti_color()" id="i_status_color">                
                  <option>--Select Status--</option>
                  <option value="badge-primary">Primary</option>                
                  <option value="badge-secondary">Secondary</option>                
                  <option value="badge-success">Success</option>                
                  <option value="badge-info">Info</option>                
                  <option value="badge-warning">Warning</option>                
                  <option value="badge-danger">Danger</option>                
              </select>
              <div class="form-group" id="div_status_color">
                
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button">Process</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>