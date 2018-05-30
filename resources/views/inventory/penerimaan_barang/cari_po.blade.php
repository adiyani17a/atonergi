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
          
          
            <div class="col-md-3 col-sm-6 col-xs-12">
              <label>P.O.#</label>
            </div>
            <div class="col-md-9 col-sm-6 col-xs-12">
              <div class="form-group">
                <select name="cari_purchaseorder" id="cari_purchaseorder">
                  <option>--Search P.O.#--</option>
                  @foreach ($po as $e)
                     <option value="{{ $e->po_code }}">{{ $e->po_code }}</option>
                  @endforeach
                </select>
              </div>
            </div>
           
          
          

         </div> <!-- End div row -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" onclick="cari_purchaseorder()">Procces</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>