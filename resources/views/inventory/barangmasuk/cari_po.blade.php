<!-- Modal -->
<div id="cari_po" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Add Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          
          
            <div class="col-md-6 col-sm-6 col-xs-12">
              <label>P.O.#</label>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <select>
                  <option>--Search P.O.#--</option>
                </select>
              </div>
            </div>
           
          
          

         </div> <!-- End div row -->
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" href="{{url('inventory/barangmasuk/process_po')}}">Process</a>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>