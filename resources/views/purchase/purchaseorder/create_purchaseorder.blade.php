@extends('main')
@section('content')

<!-- partial -->
<form id="form-save">
<div class="content-wrapper">
  <div class="col-lg-12"> 
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb bg-info">
        <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
        <li class="breadcrumb-item">Purchase</li>
        <li class="breadcrumb-item">Purchase Order</li>
        <li class="breadcrumb-item active" aria-current="page">Edit Purchase Order</li>
      </ol>
    </nav>
  </div>
  <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Purchase Order</h4>
             

         <div class="row">

            
            
            <div class="col-md-8 col-sm-12 col-xs-12">
              <div class="row">
                
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <label>Vendor Id</label>
                </div>
                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-sm readonly" name="po_vendor" value="{{ $data_header->ro_vendor }}">
                        <input type="hidden" name="nomor_ro" value="{{ $no_ro }}">
                        <input type="hidden" name="vedor_ro" value="{{ $no_vendor }}">
                      </div>
                  </div>
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12">
                  <label>Vendor Name</label>
                </div>
                
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-sm readonly" name="po_name" value="{{ $data_header->s_name }} - {{ $data_header->s_company }}">
                      </div>
                  </div>
                </div>

                <div class="col-md-2 col-sm-6 col-xs-12">
                  <label>Adress</label>
                </div>
                <div class="col-md-9 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <textarea class="form-control readonly" name="po_address">{{ $data_header->s_address }}</textarea>
                  </div>
                </div>
                <div class="col-md-3 col-sm-0 col-xs-0">
                  <!-- Empty -->
                </div>
              

                <div class="col-md-3 col-sm-0 col-xs-0">
                  <!-- Empty -->
                </div>
              </div>
           </div>

        
               <div class="col-md-4 col-sm-12 col-xs-12" style="height: 1%;">

                <div class="row">

                  <div class="col-md-2 col-sm-6 col-xs-12">
                    <label>Date</label>
                  </div>
                  <div class="col-md-10 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm datepicker_today" name="po_date">
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-6 col-xs-12">
                    <label>P.O.#</label>
                  </div>
                  <div class="col-md-10 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm readonly"  name="po_noro" value="{{ $nota }}">
                    </div>
                  </div>
                </div>

               </div>

            </div>

        <div class="row" style="margin-top: 15px;">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
             <div class="col-md-2 col-sm-6 col-xs-12">
                <label>Shipping Method</label>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="form-group" >
                  <select name="po_shipping_method">
                    <option selected="" value="">- Pilih -</option>
                    <option value="DARAT">DARAT</option>
                    <option value="LAUT">LAUT</option>
                    <option value="UDARA">UDARA</option>
                  </select>
                </div>
              </div>

              

              <div class="col-md-2 col-sm-6 col-xs-12">
                <label>Shipping Term</label>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" name="po_shipping_term">
                </div>
              </div>

              

              <div class="col-md-2 col-sm-6 col-xs-12">
                <label>Delivery Date</label>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm datepicker" name="po_shipping_date">
                </div>
              </div>
            </div>
          </div>
        </div>

      {{--  <div class="row" style="margin-top: 15px;border-top: 1px solid #98c3d1;padding-top:15px;border-bottom: 1px solid #98c3d1; margin-bottom: 15px;">
          <div class="col-md-2 col-sm-6 col-xs-12">
            <label>Item Name</label>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" readonly="" name="" id="po_kodeitem">
            </div>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="text" class="form-control form-control-sm" name="" id="po_item">
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <label>Qty</label>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">
              <input type="number" class="form-control form-control-sm" name="" id="po_qty">
            </div>
          </div>
        </div> --}}

           <div class="table-responsive" style="margin-bottom: 15px;">
             <table class="table table-bordered table-hover" cellspacing="0" id="datatable">
               <thead class="bg-gradient-info">
                 <tr>
                   <th>Item Code</th>
                   <th>Item Name</th>
                   <th>Qty Requested</th>
                   <th>Qty Approved</th>
                   <th>Unit</th>
                   <th>Unit Price</th>
                   <th>Line Total</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                 @foreach ($data_seq as $seq)
                   <tr>
                      <td><input type="text" class="form-control form-control-sm readonly" name="podt_barang[]" value="{{ $seq->rodt_barang }}"></td>
                      <td><input type="text" class="form-control form-control-sm readonly" name="podt_name[]" value="{{ $seq->i_name }}"></td>
                      <td><input type="text" class="form-control form-control-sm right format_money readonly qty" value="{{ $seq->rodt_qty }}"></td>
                      <td><input type="text" class="form-control form-control-sm right format_money qty_approved_value"  onkeyup="hitung_qty(this)" name="podt_qty[]" value="{{ $seq->rodt_qty_approved }}"></td>
                      <td><input type="text" class="form-control form-control-sm readonly" name="podt_unit[]" value="{{ $seq->i_unit }}"></td>
                      <td><input type="text" class="form-control form-control-sm right format_money readonly unit_price" name="podt_unit_price[]" value="{{ number_format($seq->rodt_unit_price,0,',','.') }}"></td>
                      <td><input type="text" class="form-control form-control-sm right format_money total_price readonly" name="podt_price[]" onchange="hitung_total(this)" value="{{ number_format($seq->rodt_price,0,',','.') }}"></td>
                      <td><button type="button" class="delete btn btn-outline-danger btn-sm hapus"><i class="fa fa-trash-o"></i></button></td>
                   </tr>
                 @endforeach
               </tbody>
             </table>
           </div>

           <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="row">
                <div class="offset-md-8 col-md-2 col-sm-12 col-xs-12">
                  <label>Subtotal</label>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm right" readonly="" name="po_subtotal" id="po_subtotal">
                  </div>
                </div>
                <div class="offset-md-8 col-md-2 col-sm-12 col-xs-12">
                  <label>Sales Tax</label>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm right format_money" name="po_tax" value="0" id="po_tax">
                  </div>
                </div>
                <div class="offset-md-8 col-md-2 col-sm-12 col-xs-12">
                  <label>Total</label>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm right format_money" readonly="po_total_net" name="total_net" id="total_net">
                  </div>
                </div>
              </div>
              
             </div>
           </div>
          
          <div align="right" style="margin-top: 15px;">
            <div id="change_function">
              <button class="btn-info btn-sm btn" type="button" id="save_data">Create Po</button>
              <a href="{{ route('purchaseorder') }}" class="btn btn-secondary btn-sm">Back</a>
            </div>
          </div>
          </div>
      </div>
  </div>
</div>
</form>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script type="text/javascript">
  var table = $('#datatable').DataTable({});
  
  
    //HITUNG SALES TAX
    $('#po_tax').keyup(function(){
      var total_net = $("#po_subtotal").val();
      var this_val = $(this).val();
      total_net = total_net.replace(/[^0-9\-]+/g,"");
      this_val = this_val.replace(/[^0-9\-]+/g,"");
      var hitung = parseInt(total_net)-parseInt(this_val);
      $('#total_net').val(accounting.formatMoney(hitung,"",0,'.',','));
    })



   
   $('#datatable tbody').on( 'click', '.delete', function () {
    var parents = $(this).parents('tr');  
    // ib_price_dt = ib_price_dt.replace(/[^0-9\-]+/g,"");
    // ib_price = ib_price.replace(/[^0-9\-]+/g,"");
    // var kurang = parseInt(ib_price)-parseInt(ib_price_dt);

    table
        .row(parents)
        .remove()
        .draw();


        // $("#hitung_qty").val(accounting.formatMoney(kurang,"",0,'.',','));
    });


    //HITUNG TOTAL NET DAN SUB TOTAL
    var total_price = 0;
      $('.total_price').each(function(){
        var total = $(this).val();
        total = total.replace(/[^0-9\-]+/g,"");
        total_price += parseInt(total);
    });
    $("#po_subtotal").val(accounting.formatMoney(total_price,"",0,'.',','));
    $('#total_net').val(accounting.formatMoney(total_price,"",0,'.',','));
    //



    function hitung_qty(a){
      //HITUNG QTY PADA TABLE
      var parents_qty = $(a).parents('tr');    
      var qty_value = $(parents_qty).find('.qty').val();
      var qty_approved_value = $(parents_qty).find('.qty_approved_value').val();
      var unit_value = $(parents_qty).find('.unit_price').val();
      //regex
      qty_approved_value = qty_approved_value.replace(/[^0-9\-]+/g,"");
      unit_value = unit_value.replace(/[^0-9\-]+/g,"");
      qty_value = qty_value.replace(/[^0-9\-]+/g,"");


      //PERINGATAN MELEBIHI BATAS QTY
      if (parseInt(qty_approved_value) > parseInt(qty_value)) {
        console.log(qty_approved_value);
        console.log(qty_value);
        iziToast.warning({
            icon: 'fa fa-times',
            message: 'Qty Melebihi Batas MAX!',
        });

        $(parents_qty).find('.qty_approved_value').val(0);

      }

      var hitung = parseInt(qty_approved_value)*parseInt(unit_value);
      var replace_price = $(parents_qty).find('.total_price').val(accounting.formatMoney(hitung,"",0,'.',','));


      //HITUNG SUBTOTAL DAN TOTAL NET PADA TABLE
      var total_price = 0;
      $('.total_price').each(function(){
        var total = $(this).val();
        total = total.replace(/[^0-9\-]+/g,"");
        total_price += parseInt(total);
      });

      $("#po_subtotal").val(accounting.formatMoney(total_price,"",0,'.',','));
      
      //PENGURANGAN TAX
      var tax =  $('#po_tax').val();
      tax = tax.replace(/[^0-9\-]+/g,"");
      hitung_tax = parseInt(total_price)-parseInt(tax);
      $('#total_net').val(accounting.formatMoney(hitung_tax,"",0,'.',','));

    }


   


 
  $('#change_function').on("click","#save_data",function(){

     iziToast.show({
            overlay: true,
            close: false,
            timeout: 20000, 
            color: 'dark',
            icon: 'fas fa-question-circle',
            title: 'Important!',
            message: 'Apakah Anda Yakin ?!',
            position: 'center',
            progressBarColor: 'rgb(0, 255, 184)',
            buttons: [
              [
                '<button style="background-color:#44d7c9;">Process</button>',
                function (instance, toast) {

                  $.ajax({
                   type: "get",
                   url: '{{ route('save_purchaseorder') }}',
                   data: $('#form-save').serialize(),
                   success: function(data){
                      

                      iziToast.success({
                        icon: 'fas fa-check-circle',
                        message: 'Data Telah Tersimpan!',
                      });
                      if (data.status == 1) {
                        window.location.href=('{{ route('purchaseorder') }}')
                      }
                   },
                   error: function(){
                    iziToast.warning({
                      icon: 'fa fa-times',
                      message: 'Terjadi Kesalahan!',
                    });
                   },
                   async: false
                 });


                 
                }
              ],
              [
                '<button style="background-color:red;">Cancel</button>',
                function (instance, toast) {
                  instance.hide({
                    transitionOut: 'fadeOutUp'
                  }, toast);
                }
              ]
            ]
          });

   
  })



</script>
@endsection




