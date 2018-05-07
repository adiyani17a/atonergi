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
        <h4 class="modal-title">Form Rencana Pembelian</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          
          
          <div class="col-md-3 col-sm-6 col-xs-12">
            <label>Purchase Plan Code</label>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="">
            </div>
          </div>
          <div class="col-md-6 col-sm-0 col-xs-0">
            <!-- empty -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <label>Date Purchase Plan</label>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm datepicker" name="">
            </div>
          </div>
          <div class="col-md-6 col-sm-0 col-xs-0">
            <!-- empty -->
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <label>Vendor</label>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <select class="form-control form-control-sm">
                <option>--Select--</option>
              </select>
            </div>
          </div>
          <div class="col-md-6 col-sm-0 col-xs-0">
            <!-- empty -->
          </div>
        </div> 
         <div class="row" style="margin-top: 15px;border-top: 1px solid #98c3d1;padding-top:15px;border-bottom: 1px solid #98c3d1; margin-bottom: 15px;">
          <div class="col-md-2 col-sm-12 col-xs-12">
            <label>Item</label>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="" readonly="" id="rp_kodeitem">
            </div>
          </div>
          <div class="col-md-2 col-sm-12 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="" id="rp_item">
            </div>
          </div>
          <div class="col-md-3 col-sm-12 col-xs-12">
            <label>Qty</label>
          </div>
          <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="form-group">
              <input type="number" class="form-control form-control-sm" name="" id="rp_qty">
            </div>
          </div>
        </div>

         <div class="table-responsive">
           <table class="table data-table table-hover" cellspacing="0" id="t72a">
             <thead class="bg-gradient-info">
               <tr>
                <th>Item Code</th>
                 <th>Item Name</th>
                 <th width="1%">Qty</th>
                 <th width="1%">Stock Warehouse</th>
                 <th width="1%">Action</th>
               </tr>
             </thead>
           </table>
         </div>

      </div> <!-- End div modal-content -->
      <div class="modal-footer">
        <button class="btn btn-primary" type="button">Process</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@section('extra_script')
<script type="text/javascript">
  $(document).ready(function(){
    var table           = $("#t72a").DataTable();
        var rp_qty         = $("#rp_qty");
        var rp_item          = $("#rp_item");
        var rp_kodeitem       = $("#rp_kodeitem");

        var x = 1;
 
    rp_qty.keypress(function(e) {
      if(e.which == 13 || e.keyCode == 13){
        table.row.add( [
            '<input type="text" id="item_name[]" class="form-control input-sm min-width" readonly value="'+ rp_kodeitem.val() +'">',
            '<input type="text" id="item_name[]" class="form-control input-sm min-width" value="'+ rp_item.val() +'">',
            '<input type="number" id="jumlah[]" class="form-control input-sm min-width" value="'+ rp_qty.val() +'">',
            '<input type="text" id="unit_price[]" class="form-control input-sm min-width">',
            '<button type="button" class="delete btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></button>',
        ] ).draw( false );
  
        x++;
        rp_item.focus();
        rp_item.val('');
        rp_qty.val('');
      }
    } );
 
    

    $('#t72a tbody').on( 'click', '.delete', function () {
    table
        .row( $(this).parents('tr') )
        .remove()
        .draw();
    });

    

  });
</script>
@endsection