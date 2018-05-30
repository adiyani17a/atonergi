@extends('main')
@section('content')

@include('master.bundle.tambah')

@include('master.bundle.detail')

<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Master</li>
				<li class="breadcrumb-item active" aria-current="page">Master Data Bundle Item</li>
			</ol>
		</nav>
	</div>

	<div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
	                <h4 class="card-title">Master Data Bundle Item</h4>
		                <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
		                  	<button type="button" class="btn btn-info" data-toggle="modal" id="button_add" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
		                </div>
                  <div class="table-responsive">
                          <table class="table table-hover table-bordered " id="table-bundle" cellspacing="0">
                            <thead class="bg-gradient-info">
                                <tr>
                                  <th class="wd-15p" width="5%">Bundle Id</th>
                                  <th class="wd-15p" width="20%">Bundle Name</th>
                                  <th class="wd-15p">Price Bundle</th>
                                  <th width="15%">Action</th>
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
<!-- content-wrapper ends -->
@endsection

@section('extra_script')
<script type="text/javascript">
  $(document).ready(function(){

    $('#button_add').click(function(){
          $("input[name='ib_name']").val('');
          $("input[name='ib_price']").val('');
            var table = $('#object_906').DataTable();
            table.clear().draw();
            $('#change_function').html('<button class="btn btn-primary" type="button" id="save_data" >Save Data</button>')
    })  

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

    $('#table-bundle').DataTable({
            processing: true,
            // responsive:true,
            serverSide: true,
            ajax: {
                url:'{{ route('datatable_bundleitem') }}',
            },
             columnDefs: [

                  {
                     targets: 0 ,
                     className: 'd_id center'
                  }, 
                  {
                     targets: 2 ,
                     className: 'right format_money'
                  },
                ],
            "columns": [
            { "data": "ib_detailid" },
            { "data": "ib_item" },
            { "data": "ib_price" ,render: $.fn.dataTable.render.number( '.', '.', 0, '' )},
            { "data": "aksi" },
            ]
      });
    // $('.sembunyikan').css('display','none');
        var table             = $("#t72bu").DataTable();
        var bund_kodeitem     = $('#bund_kodeitem');
        var bund_item         = $("#bund_item");
        var bund_qty          = $("#bund_qty");


        var x = 1;
 
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
            '<button type="button" class="delete btn btn-outline-danger btn-sm hapus"><i class="fa fa-trash-o"></i></button>',
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
    $.ajax({
         type: "get",
         url: baseUrl + '/master/bundleitem/simpan_bundleitem',
         data: $('#form-save').serialize(),
         success: function(data){
            $('#tambah').modal('hide');
            var table = $('#table-bundle').DataTable();
            table.ajax.reload();

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

  });

function detail(parm) {
    var par   = $(parm).parents('tr');
    var id    = $(par).find('.d_id').text();
    $('#detail').modal('show');
    $.ajax({
       type: "get",
         url: '{{ route('detail_bundleitem') }}',
         data: {id},
         success: function(data){
          console.log(data);
          var array_nama='';
          $.each(data, function(i, item) {
              array_nama += '<tr>';
                array_nama += '<td>'+data[i].ibd_barang+' - '+data[i].i_name+'</td>';
                array_nama += '<td align="right">'+accounting.formatMoney(data[i].ibd_price,"",0,'.',',')+'</td>';
              array_nama += '</tr>';
          })
          $('#detail_rep').html(array_nama);  


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

function edit(parm){
    var par   = $(parm).parents('tr');
    var id    = $(par).find('.d_id').text();
    window.location.href = (baseUrl +'/master/bundle/edit_bundle/'+id);
  }

  function hapus(parm){
    var par   = $(parm).parents('tr');
    var id    = $(par).find('.d_id').text();

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
                '<button style="background-color:red;">Delete</button>',
                function (instance, toast) {

                  $.ajax({
                   type: "get",
                     url: '{{ route('hapus_bundleitem') }}',
                     data: {id},
                     success: function(data){
                      console.log(data);
                      $('#tambah').modal('hide');
                      var table = $('#table-bundle').DataTable();
                      table.ajax.reload();

                      iziToast.success({
                        icon: 'fas fa-check-circle',
                        message: 'Data Telah Terhapus!',
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
    }

    function update() {
      $.ajax({
           type: "get",
           url: '{{ route('hapus_bundleitem') }}',
           data: $('#form-save').serialize(),
           success: function(data){
              $('#tambah').modal('hide');
              var table = $('#table-bundle').DataTable();
              table.ajax.reload();

              iziToast.success({
                icon: 'fas fa-check-circle',
                message: 'Data Telah Terupdate!',
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
   }
</script>
@endsection