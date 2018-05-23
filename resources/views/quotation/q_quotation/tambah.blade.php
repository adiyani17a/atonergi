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
        <h4 class="modal-title">Form Quotation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
          
          <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-md-3 col-sm-6 col-xs-12">
                <label>Customer</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="input-group mb-3">
                  <input type="text" class="form-control form-control-sm">
                  <div class="input-group-append">
                    <button class="btn btn-outline-info btn-sm" type="button" title="Add Customer" data-toggle="modal" data-target="#tambah-customer"><i class="fa fa-plus"></i></button>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-0 col-xs-0">
                <!-- empty -->
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <label>Order By</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" name="">
                </div>
              </div>
              <div class="col-md-3 col-sm-0 col-xs-0">
                <!-- empty -->
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <label>Address</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <textarea class="form-control"></textarea>
                </div>
              </div>
              <div class="col-md-3 col-sm-0 col-xs-0">
                <!-- empty -->
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12">
                <label>Type Quotation</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <select class="form-control form-control-sm" id="type_qo" onchange="kepala_suku()">
                    <option>--Select Type--</option>
                    <option>SWP</option>
                    <option>WP</option>
                    <option>Accesories</option>
                    <option>Off Grid</option>
                    <option>On Grid</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-sm-0 col-xs-0">
                <!-- empty -->
              </div>
              <div class="col-md-3 col-sm-6 col-xs-12 122mm d-none" >
                <label>Work Order</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 122mm d-none" >
                <div class="form-group">
                  <select class="form-control form-control-sm" id="w_order">
                    <option value="">--Select Work Order--</option>
                    <option value="pompa">Project Manajemen Pompa</option>
                    <option value="shs">Project Manajemen SHS</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-sm-0 col-xs-0 122mm d-none">
                <!-- empty -->
              </div>

            </div>

          </div>

          <div class="col-md-4 col-sm-12 col-xs-12" style="height: 1%;">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label>Date</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm datepicker" name="">
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label>Quote#</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" name="">
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <label>Ship to</label>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" name="">
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 15px;margin-top: 25px;">
            <div class="row">
              <div class="col-md-2 col-sm-6 col-xs-12">
                <label>Shipping Method</label>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="form-group">
                  <select class="form-control form-control-sm">
                    <option>--Select Shipping Method--</option>
                    <option>Sea</option>
                    <option>Land Freight</option>
                    <option>Air Freight</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <label>Shipping Terms</label>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control-sm form-control" name="">
                </div>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <label>Delivery Date</label>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control-sm form-control datepicker" name="">
                </div>
              </div>
            </div>
          </div>
        </div><!-- End div row -->
        <div class="row" style="margin-top: 15px;border-top: 1px solid #98c3d1;padding-top:15px;border-bottom: 1px solid #98c3d1; margin-bottom: 15px;">
          <div class="col-md-2 col-sm-6 col-xs-12">
            <label>Item Name</label>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" readonly="" name="" id="q_kodeitem">
            </div>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="" id="q_item">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <label>Qty</label>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="number" class="form-control form-control-sm" name="" id="q_qty">
            </div>
          </div>
        </div>
          <div class="table-responsive" style="margin-bottom: 15px;">
            <table class="table table-hover data-table" cellspacing="0" id="apfsds">
              <thead class="bg-gradient-info">
                <tr>
                  <th>Item Code</th>
                  <th>Item Name</th>
                  <th>Qty</th>
                  <th>Unit</th>
                  <th>Description</th>
                  <th>Unit Price</th>
                  <th>Line Total</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="row">
                <div class="offset-md-8 col-md-2 col-sm-6 col-xs-12">
                  <label>Subtotal</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="form-group">  
                    <input type="text" class="form-control form-control-sm" readonly="" name="" id="subtotal">
                  </div>
                </div>
                <div class="offset-md-8 col-md-2 col-sm-6 col-xs-12">
                  <label>Sales Tax</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="form-group">  
                    <input type="text" class="form-control form-control-sm" name="" id="">
                  </div>
                </div>
                <div class="offset-md-8 col-md-2 col-sm-6 col-xs-12">
                  <label>Total</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="form-group">  
                    <input type="text" class="form-control form-control-sm" readonly="" name="" id="total">
                  </div>
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
@section('extra_script')
<script type="text/javascript">
  

  function kepala_suku()
  {
    var div = $('.122mm');
    var select = $('#type_qo').val();
    var select2 = $('#w_order');


    if (select == "wo") 
    {
      div.removeClass('d-none');
    } 
    else 
    {
      div.addClass('d-none');
      select2.val('');
    }
  }

  $(document).ready(function(){
    var m_table           = $("#apfsds").DataTable();
        var q_qty             = $("#q_qty");
        var q_item          = $("#q_item");
        var q_kodeitem    = $("#q_kodeitem");

        var x = 1;
 
    q_qty.keypress(function(e) {
      if(e.which == 13 || e.keyCode == 13){
        m_table.row.add( [
            '<input type="text" id="item_kode[]" class="form-control input-sm min-width" readonly value="'+ q_kodeitem.val() +'">',
            '<input type="text" id="item_name[]" class="form-control input-sm min-width" value="'+ q_item.val() +'">',
            '<input type="number" id="jumlah[]" class="form-control input-sm min-width" value="'+ q_qty.val() +'">',
            '<input type="text" id="unit[]" class="form-control input-sm min-width">',
            '<input type="text" id="description[]" class="form-control input-sm min-width">',
            '<input type="text" id="unit_price[]" class="form-control input-sm min-width">',
            '<input type="text" id="line_total[]" class="form-control input-sm min-width">',
            '<button type="button" class="delete btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>',
        ] ).draw( false );
  
        x++;
        q_item.focus();
        q_item.val('');
        q_qty.val('');
      }
    } );
 
    

    $('#apfsds tbody').on( 'click', '.delete', function () {
    m_table
        .row( $(this).parents('tr') )
        .remove()
        .draw();
    });

    

  });
</script>
@endsection