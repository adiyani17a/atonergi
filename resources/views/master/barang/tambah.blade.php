<!-- Modal -->
<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Master Data Barang</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="{{url('master/barang/barangproses')}}" enctype="multipart/form-data">
        <input type="hidden" value="{{csrf_token()}}" name="_token">
        <div class="modal-body">
            
            <div class="row col-md-12 col-sm-12 col-xs-12">

                                  
              

              

              <div class="col-md-3 col-sm-4 col-xs-12">
                
                    <label class="tebal">Item Name</label>
               
              </div>
              <div class="col-md-3 col-sm-8 col-xs-12">
                <div class="form-group">
                    <input type="text"  class="form-control form-control-sm" name="item_name">                               
                </div>
              </div>

             

              <div class="col-md-3 col-sm-4 col-xs-12">
               
                  <label class="tebal">Upload Image</label>
               
              </div>

              <div class="col-md-3 col-sm-8 col-xs-12">
                <div class="form-group">
                  <input type="file" name="img" class="file-upload-default" multiple accept='image/*'>
                  <div class="input-group col-xs-12">
                    <input type="text" class="form-control file-upload-info" readonly="" placeholder="Upload Image">
                    <span class="input-group-btn">
                      <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-md-3 col-sm-4 col-xs-12">
               
                  <label class="tebal">Type</label>
               
              </div>

              <div class="col-md-3 col-sm-8 col-xs-12">
                <div class="form-group">
                    <select class="form-control-sm form-control" name="type_barang">
                      <option value=""></option>
                      <option value=""></option>
                    </select>
                </div>
              </div>

              <div class="col-md-3 col-sm-4 col-xs-12">
               
                  <label class="tebal">Unit#</label>
               
              </div>

              <div class="col-md-3 col-sm-8 col-xs-12">
                <div class="form-group">
                    <input type="text" class="form-control" name="unit">
                </div>
              </div>
            
             <div class="col-md-3 col-sm-4 col-xs-12">
                
                    <label class="tebal">Price</label>
               
              </div>
              <div class="col-md-3 col-sm-8 col-xs-12">
                <div class="form-group">
                    <input type="text"  class="form-control form-control-sm" name="price">                               
                </div>
              </div>

              <div class="col-md-3 col-sm-4 col-xs-12">
                
                    <label class="tebal">Weight</label>
               
              </div>
              <div class="col-md-3 col-sm-8 col-xs-12">
                <div class="form-group">
                    <input type="text"  class="form-control form-control-sm" name="weight">                               
                </div>
              </div>

              <div class="col-md-3 col-sm-4 col-xs-12">
                
                    <label class="tebal">Min Stock</label>
               
              </div>
              <div class="col-md-3 col-sm-8 col-xs-12">
                <div class="form-group">
                    <input type="text" class="form-control form-control-sm" name="min_stock">                               
                </div>
              </div>
              <div class="col-md-6 col-sm-0 col-xs-0">
                <!-- empty -->
              </div>
      
              <div class="col-md-3 col-sm-4 col-xs-12">
                
                    <label class="tebal">Description</label>
               
              </div>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <div class="form-group">
                    <textarea class="form-control form-control-sm" name="description"></textarea>                               
                </div>
              </div>
            </div> 
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Save Data</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>

  </div>
</div>
