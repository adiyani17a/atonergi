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
              <div class="form-group ">
                  <input type="text" value="{{$data->i_name}}"  class="form-control form-control-sm ib_name" name="ib_name">                                    
              </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
              
                  <label class="tebal">Bundle Price</label>
             
            </div>
            <div class="col-md-3 col-sm-8 col-xs-12">
              <div class="form-group disabled">
                  <input type="text" readonly="" value="{{number_format($data->i_price,0,"",".")}}"  class="form-control form-control-sm format_money right ib_price" name="ib_price" >                               
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-12">
              
                  <label class="tebal">Keterangan</label>
             
            </div>
            <div class="col-md-3 col-sm-8 col-xs-12">
              <div class="form-group">
                  <input type="text" value="{{$data->i_description}}"  class="form-control form-control-sm   keterangan" name="keterangan" >
              </div>
            </div>

            <div class="col-md-3 col-sm-4 col-xs-12">
              
                  <label class="tebal">Sell Price</label>
             
            </div>
            <div class="col-md-3 col-sm-8 col-xs-12">
              <div class="form-group">
                  <input type="text" value="{{number_format($data->i_sell_price,0,"",".")}}"  class="form-control form-control-sm format_money right sell_price" name="sell_price" value="0">                               
              </div>
            </div>


            <div class="col-md-6 col-sm-8 col-xs-12">
              <div class="form-group">
              </div>
            </div>


            <div class="col-md-3 col-sm-4 col-xs-12">
              
                  <label class="tebal">Lower Price</label>
             
            </div>
            <div class="col-md-3 col-sm-8 col-xs-12">
              <div class="form-group">
                  <input type="text" value="{{number_format($data->i_lower_price,0,"",".")}}" class="form-control form-control-sm format_money right lower_price" name="lower_price" value="0">                               
              </div>
            </div>

            </div> 
            <div class="row" style="border-top: 1px solid #98c3d1;padding-top: 15px;margin-top: 15px;margin-bottom: 15px;border-bottom: 1px solid #98c3d1;">
              <div class="col-md-2 col-sm-4 col-xs-12">
            <label>Item Name</label>
          </div>
          <div class="col-md-2 col-sm-8 col-xs-10">
            <div class="form-group">  
              <select class="form-control form-control-sm" name="" id="bund_kodeitem"> 
                  <option selected="" value="">- Pilih -</option>
                  @foreach ($item as $e)
                    <option value="{{ $e->i_code }}" data-harga="{{ $e->i_price }}" data-name="{{ $e->i_name }}" data-currency="{{ $e->i_currency_id }}">{{ $e->i_code }} - {{ $e->i_name }}</option>
                  @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-1 col-sm-6 col-xs-2">
            <div class="form-group">  
              <input style="text-align: center; width: 70%" type="text" readonly="" class="form-control form-control-sm  right"  id="currency">
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-1">
            <label>Harga</label>
          </div>
          <div class="col-md-2 col-sm-6 col-xs-12">
            <div class="form-group">  
              <input type="text" class="form-control form-control-sm" name="" readonly="" id="bund_item">
            </div>
          </div>
          <div class="col-md-1 col-sm-1 col-xs-1">
            <label>Qty</label>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="form-group">  
              <input type="text" class="form-control form-control-sm format_money right" name="bund_qty" id="bund_qty">
            </div>
          </div>
          </div>
          <div class="table-responsive">
            <table class="table table-hover table-bordered  gogo"  cellspacing="0" id="bundle_table" width="100%">

            <thead class="bg-gradient-info">
              <tr>
                <th width="20%">Item Code</th>
                <th width="20%">Item Name</th>
                <th width="7%">Qty</th>
                <th width="7%">Unit</th>
                <th width="30%">Price</th>
                <th width="30%">Total Price</th>
                <th width="1%">Action</th>
              </tr>
            </thead>
            <tbody id="edit_rep">
              
            </tbody>
            
          </table>
            </div>
            <input type="hidden" name="kode_old" value="">
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

var table  = $("#bundle_table").DataTable({
                      columnDefs: [
                          {
                             targets: 6,
                             className: 'center'
                          }
                        ],
                    });
      $(document).ready(function(){
    $('#bund_qty').maskMoney({
      precision : 0,
      thousands:'',
    });

    $('.sell_price').maskMoney({
      precision : 0,
      thousands:'.',
      allowZero:true,
      defaultZero: true
    });

    $('lower_price').maskMoney({
      precision : 0,
      thousands:'.',
      allowZero:true,
      defaultZero: true
    });




    $('#bund_qty').attr('disabled',true); 
    $('#bund_kodeitem').change(function(){
          var ini = $('#bund_kodeitem').find(':selected').val();

          if(ini != '') {
            $('#bund_qty').attr('disabled',false);
          }else{
            $('#bund_qty').attr('disabled',true);          
          }
          var h_price = $(this).find(':selected').data('harga');
          var currency = $(this).find(':selected').data('currency');
          $('#bund_item').val(accounting.formatMoney(h_price,"",0,'.',','));
          $('#currency').val(currency);
      })



        
        var x = 1;
    // $('#bund_qty').keyup(function(){
    //   var jumlah = $('#bund_item').val().replace(/[^0-9\-]+/g,"")*1;
    //   var qty = $(this).val();
    //   $('.ib_price').val(accounting.formatMoney(jumlah * qty,"",0,'.',','))
    // })
    $('#bund_qty').keypress(function(e) {
      if(e.which == 13 || e.keyCode == 13){
        var kode = $('#bund_kodeitem').val();
        var qty = $('#bund_qty').val().replace(/[^0-9\-]+/g,"");
        // harga_1 = harga_1.replace(/[^0-9\-]+/g,"");
        $.ajax({
         type: "get",
         url: baseUrl + '/master/bundle/cari_item',
         dataType:'json',
         data:{kode},
         success: function(data){

            if (data.data.cu_value == null) {
              currency = 1;
            } else{
              var currency = parseInt(data.data.cu_value);
            }

            var price  = parseInt(qty)*parseFloat(data.data.i_price)*currency;
            table.row.add( [
               '<input type="text" id="item_kode[]" name="ib_kode_dt[]" class="form-control input-sm min-width" readonly="" value="'+data.data.i_code+'">',
                '<input type="text" id="item_name[]" name="ib_name_dt[]" class="form-control input-sm min-width" readonly="" value="'+data.data.i_name+'">',
                '<input type="text" id="jumlah[]" name="ib_qty_dt[]" class="form-control input-sm min-width right format_money" readonly="" value="'+qty+'">',
                '<input type="text" readonly id="[]" name="ib_unit_dt[]" class="form-control input-sm min-width right format_money" value="'+data.data.u_unit+'">',
                '<input type="text" name="ib_price_dt[]" class="ib_price_dt form-control input-sm min-width right format_money" readonly="" value="'+ accounting.formatMoney(data.data.i_price*currency,"",0,'.',',') +'">',
                '<input type="text" name="ib_total_price[]" class="ib_total_price form-control input-sm min-width right format_money" readonly="" value="'+ accounting.formatMoney(price,"",0,'.',',') +'">',
                '<button type="button" class="delete btn btn-outline-danger btn-sm hapus"><i class="fa fa-trash"></i></button>',
            ]).draw( false );
    
            x++;
            var awal = 0;
            table.$('.ib_total_price').each(function(){
              var total = $(this).val();
              total = total.replace(/[^0-9\-]+/g,"");
              awal += parseInt(total);
            });
            $(".ib_price").val(accounting.formatMoney(awal,"",0,'.',','));
            $('#bund_kodeitem').val('').trigger('change');
            $('#bund_qty').val('');
            $('.lower_price').val(accounting.formatMoney(awal,"",0,'.',','));
            $('.sell_price').val(accounting.formatMoney(awal,"",0,'.',','));
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
    });

    
    

    $('#bundle_table tbody').on( 'click', '.delete', function () {
    var parents = $(this).parents('tr');
    var ib_price_dt = $(parents).find('.ib_price_dt').val();
    var ib_price = $("input[name='ib_price']").val();
    
    table
        .row(parents)
        .remove()
        .draw();

    var awal = 0;
    table.$('.ib_total_price').each(function(){
      var total = $(this).val();
      total = total.replace(/[^0-9\-]+/g,"");
      awal += parseInt(total);
    });  
          

    $("input[name='ib_price']").val(accounting.formatMoney(awal,"",0,'.',','));
    $(".sell_price").val(accounting.formatMoney(awal,"",0,'.',','));
    $(".lower_price").val(accounting.formatMoney(awal,"",0,'.',','));

    });

  $('.form-control').keyup(function(){
    $(this).removeClass('border-danger');
  });
    

  $('#change_function').on("click", "#save_data",function(){

    var name = $('.ib_name');
    var price = $('.ib_price');
    var sell_price = $('.sell_price');
    var lower_price = $('.lower_price');
    var keterangan = $('.keterangan');
    var valid = [];
    var id = '{{$id}}';
    if (name.val() == '') {
        name.addClass('border-danger');
        valid.push(0);
    } else {
        name.removeClass('border-danger');
        valid.push(1);
    }

    if (price.val() == '' || price.val() == '0') {
        price.addClass('border-danger');
        valid.push(0);
    } else {
        price.removeClass('border-danger');
        valid.push(1);
    }

    if (sell_price.val() == '' || sell_price.val() == '0') {
        sell_price.addClass('border-danger');
        valid.push(0);
    } else {
        sell_price.removeClass('border-danger');
        valid.push(1);
    }

    if (lower_price.val() == '' || lower_price.val() == '0') {
        lower_price.addClass('border-danger');
        valid.push(0);
    } else {
        lower_price.removeClass('border-danger');
        valid.push(1);
    }


    if (keterangan.val() == '') {
        keterangan.addClass('border-danger');
        valid.push(0);
    } else {
        keterangan.removeClass('border-danger');
        valid.push(1);
    }

    var index = valid.indexOf(0);
    if (index !=  -1) {
      iziToast.error({
        icon: 'fa fa-exclamation-circle ',
        message: 'Harap Lengkapi Data!',
      });
      return false;
    }
    $.ajax({
         type: "get",
         url: baseUrl + '/master/bundleitem/update_bundleitem?id='+id,
         data: $('#form-save').serialize(),
         success: function(data){
            if (data.status == 1) {
              location.href = "{{url('/master/bundle/bundle')}}";
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
  })

  });

@foreach ($data_dt as $i=> $val)
console.log('{{$val->i_code}}');  
var i_code = '{{$val->i_code}}';
var i_name = '{{$val->i_name}}';
var qty    = '{{$val->id_qty}}';
var u_unit = '{{$val->id_unit}}';
var i_price = '{{$val->i_price}}';
var price  = '{{$val->id_total_price}}';
    table.row.add( [
       '<input type="text" id="item_kode[]" name="ib_kode_dt[]" class="form-control input-sm min-width" readonly="" value="'+i_code+'">',
        '<input type="text" id="item_name[]" name="ib_name_dt[]" class="form-control input-sm min-width" readonly="" value="'+i_name+'">',
        '<input type="text" id="jumlah[]" name="ib_qty_dt[]" class="form-control input-sm min-width right format_money" readonly="" value="'+qty+'">',
        '<input type="text" readonly id="[]" name="ib_unit_dt[]" class="form-control input-sm min-width right format_money" value="'+u_unit+'">',
        '<input type="text" name="ib_price_dt[]" class="ib_price_dt form-control input-sm min-width right format_money" readonly="" value="'+ accounting.formatMoney(i_price,"",0,'.',',') +'">',
        '<input type="text" name="ib_total_price[]" class="ib_total_price form-control input-sm min-width right format_money" readonly="" value="'+ accounting.formatMoney(price,"",0,'.',',') +'">',
        '<button type="button" class="delete btn btn-outline-danger btn-sm hapus"><i class="fa fa-trash"></i></button>',
    ]).draw( );
    
@endforeach
</script>

@endsection
