@extends('main')
@section('content')

<form id="form-save">
<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Master</li>
				<li class="breadcrumb-item"><a href="{{url('master/bundle/bundle')}}">Master Data Bundle Item</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Master Data Bundle Item</li>

			</ol>
		</nav>
	</div>

	<div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
	                <h4 class="card-title">Edit Master Data Bundle Item</h4>
                  <div class="row">
                                
                        <div class="col-md-3 col-sm-4 col-xs-12">
                         
                              <label class="tebal">Bundle Name</label>
                         
                        </div>
                        <div class="col-md-3 col-sm-8 col-xs-12">
                          <div class="form-group">
                              <input type="text"  class="form-control form-control-sm" name="ib_name" value="{{ $header->ib_item }}">                                    
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                          
                              <label class="tebal">Bundle Price</label>
                         
                        </div>
                        <div class="col-md-3 col-sm-8 col-xs-12">
                          <div class="form-group">
                              <input type="text"  class="form-control form-control-sm format_money right" name="ib_price" readonly="" value="{{ number_format($header->ib_price,0,',','.') }}">                               
                          </div>
                        </div>

                    </div> 
                    <div class="row" style="border-top: 1px solid #98c3d1;padding-top: 15px;margin-top: 15px;margin-bottom: 15px;border-bottom: 1px solid #98c3d1;">
                      <div class="col-md-2 col-sm-4 col-xs-12">
                        <label>Item Name</label>
                      </div>
                      <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">  
                          <select class="form-control form-control-sm" name="" id="bund_kodeitem"> 
                              <option selected="" value="">- Pilih -</option>
                              @foreach ($item as $e)
                                <option value="{{ $e->i_code }}" data-harga="{{ $e->i_price }}" data-name="{{ $e->i_name }}">{{ $e->i_code }} - {{ $e->i_name }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">  
                          <input type="text" class="form-control form-control-sm" name="" readonly="" id="bund_item">
                        </div>
                      </div>
                      <div class="col-md-3 col-sm-4 col-xs-12">
                        <label>Qty</label>
                      </div>
                      <div class="col-md-3 col-sm-8 col-xs-12">
                        <div class="form-group">  
                          <input type="text" class="form-control form-control-sm format_money right" name="" id="bund_qty">
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-hover table-bordered gogo"  cellspacing="0" id="t72bu" width="100%">

                        <thead class="bg-gradient-info">
                          <tr>
                            <th width="20%">Item Code</th>
                            <th width="20%">Item Name</th>
                            <th width="14%">Qty</th>
                            <th width="14%">Unit</th>
                            <th width="30%">Item Price</th>
                            <th width="1%">Action</th>

                          </tr>
                        </thead>
                        <tbody id="edit_rep">
                          @foreach ($sequence as $seq)
                            <tr>
                              <td><input type="text" name="ib_kode_dt[]" class="form-control input-sm min-width" readonly="" value="{{ $seq->i_code }}"></td></td>
                              <td><input type="text" name="ib_name_dt[]" class="form-control input-sm min-width" readonly="" value="{{ $seq->i_name }}"></td>
                              <td><input type="text" name="ib_qty_dt[]" class="form-control input-sm min-width right format_money" readonly="" value="{{ number_format($seq->ibd_qty,0,',','.') }}"></td>
                              <td><input type="text" name="ib_unit_dt[]" class="form-control input-sm min-width right format_money" value="{{ $seq->ibd_unit }}"></td>
                              <td><input type="text" name="ib_price_dt[]" class="form-control input-sm min-width right format_money total" readonly="" value="{{ number_format($seq->ibd_price,0,',','.') }}"></td>
                              <td><button type='button' class='delete btn btn-outline-danger btn-sm hapus'><i class='fa fa-trash-o'></i></button></td>
                            </tr>
                          @endforeach
                        </tbody>
                        
                      </table>
                    </div>
                    <input type="hidden" name="kode_old" value="{{ $header->ib_detailid }}">
                    <div align="right" style="margin-top: 15px;">
                      <div id="change_function">
                          <button class="btn btn-info btn-sm" type="button" id="save_data">Update Data</button>
                          <a class="btn btn-secondary btn-sm" href="{{url('master/bundle/bundle')}}">Back</a>
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
        var table             = $("#t72bu").DataTable();
        var bund_kodeitem     = $('#bund_kodeitem');
        var bund_item         = $("#bund_item");
        var bund_qty          = $("#bund_qty");


        var x = 1;
      $('#bund_qty').attr('disabled',true); 
      $('#bund_kodeitem').change(function(){
          var ini = $('#bund_kodeitem').find(':selected').val();

          if(ini != '') {
            $('#bund_qty').attr('disabled',false);
          }else{
            $('#bund_qty').attr('disabled',true);          
          }
          var h_price = $(this).find(':selected').data('harga');
          $('#bund_item').val(accounting.formatMoney(h_price,"",0,'.',','));
      })


    
    bund_qty.keypress(function(e) {
      if(e.which == 13 || e.keyCode == 13){
        var qty = bund_qty.val();
        var harga_1 = bund_item.val();

        qty = qty.replace(/[^0-9\-]+/g,"");
        harga_1 = harga_1.replace(/[^0-9\-]+/g,"");

        var price  = parseInt(qty)*parseInt(harga_1);
        table.row.add( [
            '<input type="text" id="item_kode[]" name="ib_kode_dt[]" class="form-control input-sm min-width" readonly="" value="'+ bund_kodeitem.val() +'">',
            '<input type="text" id="item_name[]" name="ib_name_dt[]" class="form-control input-sm min-width" readonly="" value="'+ bund_kodeitem.find(':selected').data('name') +'">',
            '<input type="text" id="jumlah[]" name="ib_qty_dt[]" class="form-control input-sm min-width right format_money" readonly="" value="'+ bund_qty.val() +'">',
            '<input type="text" id="[]" name="ib_unit_dt[]" class="form-control input-sm min-width right format_money">',
            '<input type="text" id="unit_price[]" name="ib_price_dt[]" class="form-control input-sm min-width right format_money total" readonly="" value="'+ accounting.formatMoney(price,"",0,'.',',') +'">',
            '<button type="button" class="delete btn btn-outline-danger btn-sm hapus"><i class="fa fa-trash"></i></button>',
        ] ).draw( false );
        x++;
        var awal = 0;
        $('.total').each(function(){
          var total = $(this).val();
          total = total.replace(/[^0-9\-]+/g,"");
          awal += parseInt(total);
        });
        $("input[name='ib_price']").val(accounting.formatMoney(awal,"",0,'.',','));

        bund_item.focus();
        bund_qty.val('');
        bund_item.val('');
        bund_kodeitem.val('').trigger('change');
      }
    });
    
    

    $('#t72bu tbody').on( 'click', '.delete', function () {
    var parents = $(this).parents('tr');
    var ib_price_dt = $(parents).find('.total').val();
    var ib_price = $("input[name='ib_price']").val();
    
    table
        .row(parents)
        .remove()
        .draw();

          ib_price_dt = ib_price_dt.replace(/[^0-9\-]+/g,"");
          ib_price = ib_price.replace(/[^0-9\-]+/g,"");
          var kurang = parseInt(ib_price)-parseInt(ib_price_dt);

          $("input[name='ib_price']").val(accounting.formatMoney(kurang,"",0,'.',','));

    });

  $('#change_function').on("click", "#save_data",function(){
    $(this).prop('readonly',true);
    $.ajax({
         type: "get",
         url: '{{ route('update_bundleitem') }}',
         data: $('#form-save').serialize(),
         success: function(data){
            window.location.href = ('{{ route('bundleitem') }}');
            iziToast.success({
              icon: 'fas fa-check-circle',
              message: 'Data Telah Tersimpan!',
            });
         },
         error: function(){
          iziToast.warning({
            icon: 'fa fa-times',
            message: 'Terjadi Kesalahan!',
          });
         },
         async: false
       });
  })
</script>

@endsection
