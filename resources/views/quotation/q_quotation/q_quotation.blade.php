@extends('main')
@section('content')

@include('quotation/q_quotation/tambah')

@include('master/customer/tambah')

@include('quotation/q_quotation/detail')

@include('quotation/q_quotation/detail_status')

<style type="text/css">
.ui-autocomplete {
	z-index: 99999999999;
}
</style>
<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Quotation</li>
				<li class="breadcrumb-item active" aria-current="page">Quotation</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Quotation</h4>
	          	<div class="row">
	          		
					<div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
						<button class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Create Quotation</button>
					</div>
					<div class="table-responsive">
						<table class="table table-hover" id="table_quote" cellspacing="0">
						  <thead class="bg-gradient-info">
						    <tr>
						      <th>No</th>
						      <th>Quote#</th>
						      <th>Customer Item</th>
						      <th>Total</th>
						      <th>Status</th>
						      <th>History Status</th>
						      <th>Action</th>
						    </tr>
						  </thead>
						  <tbody>
						    
						  </tbody>
						</table>
					</div>
					
	        	</div>
	      	</div>
    	</div>
	</div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

<script>
$(document).ready(function(){
		$('#table_quote').DataTable({
          processing: true,
          serverSide: true,
          ajax: {
              url:'{{ route('quote_datatable') }}',
          },
          // columnDefs: [

          //         {
          //            targets: 0 ,
          //            className: 'center d_id'
          //         },
          //         {
          //            targets: 1,
          //            className: 'd_nama'
          //         },
          //         {
          //            targets: 2,
          //            className: 'center d_grup'
          //         },
          //         {
          //            targets: 4,
          //            className: 'center'
          //         }
          //       ],
          columns: [
            {data: 'DT_Row_Index', name: 'DT_Row_Index'},
            {data: 'q_nota', name: 'q_nota'},
            {data: 'detail', name: 'detail'},
            {data: 'total', name: 'total'},
            {data: 'status', name: 'status'},
            {data: 'histori', name: 'histori'},
            {data: 'aksi', name: 'aksi'},

          ]

    	});


    	$('#tax').maskMoney({
		    precision : 0,
		    thousands:'.',
		    allowZero:true,
		    defaultZero: true
		});
})



function hitung_total() {
	var tax = $('#tax').val();
	var sub = $('#subtotal').val();

	tax = tax.replace(/[^0-9\-]+/g,"")/1;
	sub = sub.replace(/[^0-9\-]+/g,"")/100;

	$('#total').val(accounting.formatMoney(tax + sub, "", 2, ".",','))
}

$('#tax').keyup(function(){
	hitung_total();
})

function hitung_dpp() {
	var total = 0;
	$('.line_total').each(function(){
		var temp = $(this).val();
		temp 	 = temp.replace(/[^0-9\-]+/g,"")/100;
		total += temp;
	})
	$('#subtotal').val(accounting.formatMoney(total, "", 2, ".",','));
	hitung_total();
}


function qty(p) {
	var par  		= $(p).parents('tr');
	var unit_price  = $(par).find('.unit_price').val();
	unit_price 	    = unit_price.replace(/[^0-9\-]+/g,"")/100;
	var qty 	    = $(par).find('.jumlah').val();

    $(par).find('.line_total').val(accounting.formatMoney(unit_price * qty, "", 2, ".",','));
    hitung_dpp();
}

function edit_item(p) {
	var par  = $(p).parents('tr');
	var qty  = $(par).find('.jumlah').val();
	var item  = $(par).find('.item_name').val();

	$.ajax({
      url:baseUrl + '/quotation/q_quotation/edit_item',
      data:{item},
      dataType:'json',
      success:function(data){

        $(par).find('.description').val(data.data.i_description);
        $(par).find('.unit_price').val(accounting.formatMoney(data.data.i_price, "", 2, ".",','));
        $(par).find('.line_total').val(accounting.formatMoney(data.data.i_price * qty, "", 2, ".",','));
        hitung_dpp();
      }
    });
}


var q_qty         = $("#q_qty");
var q_kodeitem    = $("#q_kodeitem");

var x = 1;

q_qty.keypress(function(e) {
var m_table       = $("#apfsds").DataTable();

  if(e.which == 13 || e.keyCode == 13){
  	var item = $('.item').val();
  	$.ajax({
      url:baseUrl + '/quotation/q_quotation/append_item',
      data:{item},
      dataType:'json',
      success:function(data){
      	var temp;

      	for (var i = 0; i < data.item.length; i++) {
      		var temp1 = '<option value="'+data.item[i].i_code+'">'+data.item[i].i_code+' - '+data.item[i].i_name+'</option>';
      		temp += temp1;
      	}
      	var dropdown = '<select onchange="edit_item(this)" name="item_name[]" style="width:200px" class="item_name">'+temp+'</select>'

         m_table.row.add( [
            dropdown,
            '<input type="number" onkeyup="qty(this)" name="jumlah[]" class="jumlah form-control input-sm min-width" value="'+ q_qty.val() +'">',
            '<input type="text" name="description[]" class="description form-control input-sm min-width" value="'+data.data.i_description+'">',
            '<input type="text" name="unit_price[]" readonly value="'+accounting.formatMoney(data.data.i_price, "", 2, ".",',')+'" class="unit_price form-control input-sm min-width">',
            '<input type="text" value="'+accounting.formatMoney(data.data.i_price*q_qty.val(), "", 2, ".",',')+'" name="line_total[]" readonly class="line_total form-control input-sm min-width">',
            '<button type="button" class="delete btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>',
        ] ).draw( false );

        $('.item_name').last().val(data.data.i_code);
  		$('.item_name').select2();
        x++;
        q_qty.val('');
        $('.item').val('0');
  		$('.item').select2();
  		hitung_dpp();
      }
    });
   
  }

});

	



	// $(".ship_method").select2({
	//     tags: true,
	//     multiple: true,
	//     tokenSeparators: [',', ' '],
	//     minimumInputLength: 2,
	//     minimumResultsForSearch: 10,
	//     ajax: {
	//         url: URL,
	//         dataType: "json",
	//         type: "GET",
	//         data: function (params) {

	//             var queryParameters = {
	//                 term: params.term
	//             }
	//             return queryParameters;
	//         },
	//         processResults: function (data) {
	//             return {
	//                 results: $.map(data, function (item) {
	//                     return {
	//                         text: item.tag_value,
	//                         id: item.tag_id
	//                     }
	//                 })
	//             };
	//         }
	//     }
	// });



	




	

	    

$('#apfsds tbody').on( 'click', '.delete', function () {
	var m_table       = $("#apfsds").DataTable();

    m_table
        .row( $(this).parents('tr') )
        .remove()
        .draw();
    });

	$('.customer').change(function(){
		var customer = $(this).val();
		$.ajax({
	      url:baseUrl + '/quotation/q_quotation/customer',
	      data:{customer},
	      dataType:'json',
	      success:function(data){
	        $('.address').text(data.data.c_address)
	      }
	    });
	})

	$('.type_qo').change(function(){
		var type_q = $('.type_qo').val();
		var type_p = $('.type_p').val();
		var date   = $('.date').val();

		$.ajax({
	      url:baseUrl + '/quotation/q_quotation/nota_quote',
	      data:{type_q,type_p,date},
	      dataType:'json',
	      success:function(data){
	        $('.quote').val(data.nota)
	      }
	    });
	})


	$('.type_p').change(function(){
		var type_q = $('.type_qo').val();
		var type_p = $('.type_p').val();
		var date   = $('.date').val();

		$.ajax({
	      url:baseUrl + '/quotation/q_quotation/nota_quote',
	      data:{type_q,type_p,date},
	      dataType:'json',
	      success:function(data){
	        $('.quote').val(data.nota)
	      }
	    });
	})

	$('.save').click(function(){

		var 

		var m_table = $("#apfsds").DataTable();
		iziToast.show({
            overlay: true,
            close: false,
            timeout: 20000, 
            color: 'dark',
            icon: 'fas fa-question-circle',
            title: 'Simpan Data!',
            message: 'Apakah Anda Yakin ?!',
            position: 'center',
            progressBarColor: 'rgb(0, 255, 184)',
            buttons: [
              [
                '<button style="background-color:#32CD32;">Simpan</button>',
                function (instance, toast) {

                  $.ajax({
				      url:baseUrl + '/quotation/q_quotation/save_quote',
				      data:m_table.$('input').serialize()+'&'+
				     	   m_table.$('.item_name').serialize()+'&'+
				      	   $('.form_quote :input').serialize()+'&'+
				      	   $('.total_form').serialize(),
				      dataType:'json',
				      success:function(data){
				      	iziToast.success({
				            icon: 'fa fa-success',
				            message: 'Data Berhasil Disimpan!',
				        });
				      }
				    });
                }
              ],
              [
                '<button style="background-color:#44d7c9;">Cancel</button>',
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