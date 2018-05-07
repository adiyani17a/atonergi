<!-- Modal -->
<div id="detail" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Barang Masuk</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          
          
            <div class="col-md-3 col-sm-6 col-xs-12">
              <label>Vendor</label>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm" name="">
              </div>
            </div>
            <div class="col-md-6 col-sm-0 col-xs-0">
              <!-- Empty -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <label>Date of Receipt</label>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm date-picker" value="{{date('d-m-Y')}}" name="">
              </div>
            </div>
            <div class="col-md-6 col-sm-0 col-xs-0">
              <!-- Empty -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <label>No P.O.#</label>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="form-group">
                <input type="text" class="form-control form-control-sm" name="">
              </div>
            </div>
            
            <div class="table-responsive" style="margin-top: 15px;">
              <table class="table table-hover">
                <thead class="bg-gradient-info">
                  <tr>
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Unit</th>
                    <th>Amount Sent</th>
                    <th>Amount Received</th>
                    <th>Remains</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Kabel</td>
                    <td>Meter</td>
                    <td>100</td>
                    <td><input type="text" class="form-control form-control-sm" name=""></td>
                    <td><input type="text" class="form-control form-control-sm" name=""></td>
                  </tr>
                </tbody>
              </table>
            </div>
          
          

         </div> <!-- End div row -->
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button">Save</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>