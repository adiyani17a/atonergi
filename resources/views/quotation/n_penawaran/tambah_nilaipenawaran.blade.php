<!-- Modal -->
<div id="tambah" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-gradient-info">
        <h4 class="modal-title">Form Nilai Penawaran</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <label>Marketing Name</label>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="">
            </div>
          </div>
        </div>
        <div class="row" style="margin-top: 15px;border-top: 1px solid #98c3d1;padding-top:15px;border-bottom: 1px solid #98c3d1; margin-bottom: 15px;">
          <div class="col-md-2 col-sm-6 col-xs-12">
            <label>Item Name</label>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="" id="n_item">
            </div>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <label>Item Price</label>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" readonly="" name="" id="n_price">
            </div>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <label title="Harga Batas Bawah">Lower Limit Price</label>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="" id="n_lowerprice">
            </div>
          </div>
          
         </div>
         <div class="table-responsive">
           <table class="table table-hover data-table" cellspacing="0" id="object_906">
             <thead class="bg-gradient-info">
               <tr>
                 <th>Item Name</th>
                 <th>Item Price</th>
                 <th>Lower Limit Price</th>
                 <th width="1%">Action</th>
               </tr>
             </thead>
           </table>
         </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button">Save Data</button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@section('extra_script')
<script type="text/javascript">
  $(document).ready(function(){
    var m_table           = $("#object_906").DataTable();
        var n_lowerprice             = $("#n_lowerprice");
        var n_item          = $("#n_item");
        var n_price    = $("#n_price");

        var x = 1;
 
    n_lowerprice.keypress(function(e) {
      if(e.which == 13 || e.keyCode == 13){
        m_table.row.add( [
            '<input type="text" id="item_name[]" class="form-control input-sm min-width" value="'+ n_item.val() +'">',
            '<input type="text" id="item_price[]" class="form-control input-sm min-width" readonly value="'+ n_price.val() +'">',
            '<input type="text" id="item_lowerprice[]" class="form-control input-sm min-width" value="'+ n_lowerprice.val() +'">',            '<button type="button" class="delete btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></button>',
        ] ).draw( false );
  
        x++;
        n_item.focus();
        n_item.val('');
        n_lowerprice.val('');
      }
    } );
 
    

    $('#object_906 tbody').on( 'click', '.delete', function () {
    m_table
        .row( $(this).parents('tr') )
        .remove()
        .draw();
    });


  });
  
</script>
@endsection