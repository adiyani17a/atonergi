@section('extra_style')
<style type="text/css">
  .min-width{
    min-width: 100px;
  }
</style>
@endsection
<!-- Modal -->
<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Master Data Bundle Item</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
                                
            <div class="col-md-3 col-sm-4 col-xs-12">
             
                  <label class="tebal">Bundle Name</label>
             
            </div>
            <div class="col-md-3 col-sm-8 col-xs-12">
              <div class="form-group">
                  <input type="text"  class="form-control form-control-sm">                                  
              </div>
            </div>

            

            <div class="col-md-3 col-sm-4 col-xs-12">
              
                  <label class="tebal">Bundle Price</label>
             
            </div>
            <div class="col-md-3 col-sm-8 col-xs-12">
              <div class="form-group">
                  <input type="text"  class="form-control form-control-sm">                               
              </div>
            </div>

        </div> 
        <div class="row" style="border-top: 1px solid #98c3d1;padding-top: 15px;margin-top: 15px;margin-bottom: 15px;border-bottom: 1px solid #98c3d1;">
          <div class="col-md-2 col-sm-4 col-xs-12">
            <label>Item Name</label>
          </div>
          <div class="col-md-2 col-sm-8 col-xs-12">
            <div class="form-group">  
              <input type="text" class="form-control form-control-sm" readonly="" name="" id="bund_kodeitem">
            </div>
          </div>
          <div class="col-md-2 col-sm-8 col-xs-12">
            <div class="form-group">  
              <input type="text" class="form-control form-control-sm" name="" id="bund_item">
            </div>
          </div>
          <div class="col-md-3 col-sm-4 col-xs-12">
            <label>Qty</label>
          </div>
          <div class="col-md-3 col-sm-8 col-xs-12">
            <div class="form-group">  
              <input type="number" class="form-control form-control-sm" name="" id="bund_qty">
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-bordered data-table" cellspacing="0" id="t72bu">

            <thead class="bg-gradient-info">
              <tr>
                <th>Item Code</th>
                <th>Item Name</th>
                <th width="9%">Qty</th>
                <th width="15%">Unit</th>
                <th width="">Item Price</th>
                <th width="1%">Action</th>

              </tr>
            </thead>
            <tbody>
              
            </tbody>
            
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" onclick="ay()">Save Data</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@section('extra_script')
<script type="text/javascript">
  $(document).ready(function(){
    var table           = $("#t72bu").DataTable();
    var bund_kodeitem = $('#bund_kodeitem');
        var bund_item         = $("#bund_item");
        var bund_qty          = $("#bund_qty");

        var x = 1;
 
    bund_qty.keypress(function(e) {
      if(e.which == 13 || e.keyCode == 13){
        table.row.add( [
          '<input type="text" id="item_kode[]" class="form-control input-sm min-width" readonly="" value="'+ bund_kodeitem.val() +'">',
            '<input type="text" id="item_name[]" class="form-control input-sm min-width" value="'+ bund_item.val() +'">',
            '<input type="number" id="jumlah[]" class="form-control input-sm min-width" value="'+ bund_qty.val() +'">',
            '<input type="text" id="[]" class="form-control input-sm min-width">',
            '<input type="text" id="unit_price[]" class="form-control input-sm min-width">',
            '<button type="button" class="delete btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></button>',
        ] ).draw( false );
  
        x++;
        bund_item.focus();
        bund_qty.val('');
        bund_item.val('');
      }
    } );
 
    

    $('#t72bu tbody').on( 'click', '.delete', function () {
    table
        .row( $(this).parents('tr') )
        .remove()
        .draw();
    });

    

  });
</script>
@endsection