@extends('main')
@section('content')

@include('purchase.rencanapembelian.tambah')
@include('purchase.rencanapembelian.detail')


<!-- partial -->
<div class="content-wrapper">
  <div class="col-lg-12">
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb bg-info">
        <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
        <li class="breadcrumb-item">Purchase</li>
        <li class="breadcrumb-item active" aria-current="page">Request Order</li>
      </ol>
    </nav>
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <div class="card-title">
                    <ul class="nav nav-tabs tab-solid  tab-solid-primary" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="tab-6-1" data-toggle="tab" href="#daftar" role="tab" aria-controls="daftar" aria-selected="true"><i class="fa fa-list"></i>List Request Order</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="tab-6-2" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false"><i class="mdi mdi-history"></i>History Request Order</a>
                      </li>
                      <!-- <li class="nav-item">
                        <a class="nav-link" id="tab-6-3" data-toggle="tab" href="#tab-ke-3" role="tab" aria-controls="tab-ke-3" aria-selected="false"><i class="mdi mdi-message-text-outline"></i>Contact</a>
                      </li> -->
                    </ul>
                  </div>

                      <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-bottom: 15px;">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
                      </div>

                  <div class="tab-content tab-content-solid">
                    <div class="tab-pane fade show active" id="daftar" role="tabpanel" aria-labelledby="tab-6-1">

                      <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="table_datatable_rencana" cellspacing="0">
                          <thead class="bg-gradient-info">
                              <tr>
                                <th class="wd-15p">Kode</th>
                                <th class="wd-20p">Vendor</th>
                                <th class="wd-15p">Amount Requested</th>
                                <th class="wd-10p">Amount Approved</th>
                                <th class="wd-10p">Detail</th>
                                <th class="wd-15p">Action</th>
                              </tr>
                            </thead>
                            <tbody>
<<<<<<< HEAD
                             
=======
                                <tr>
                                  <td>1</td>
                                  <td>Kabel</td>
                                  <td><i class="fa fa-check"></i></td>
                                  <td>10</td>
                                  <td></td>
                                  <td>
                                    <span class="badge badge-warning badge-pill">Waiting</span>
                                  </td>
                                  <td>
                                    <div class="btn-group">    
                                      <a href="#" class="btn btn-info btn-sm" title="Approve"><i class="fa fa-check"></i></a>
                                      <a href="#" class="btn btn-warning btn-sm" title="Pending"><i class="fa fa-times"></i></a>
                                      <a href="{{url('purchase/rencanapembelian/edit_rencanapembelian')}}" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                      <button type="button" title="Delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </div> 
                                  </td>
                                </tr>
>>>>>>> ac80f4f4f1a691d731d041235ad7d6022b40d365
                                
                            </tbody>
                                       
                          </table> 
                      </div>

                    </div> <!-- end div daftar -->

                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="tab-6-2">
                      <div class="table-responsive">
                        <table class="table table-hover table-bordered " id="table_datatable_histori" cellspacing="0">
                          <thead class="bg-gradient-info">
                            <tr>
                              <th class="wd-15p">Kode</th>
                              <th class="wd-20p">Vendor</th>
                              <th class="wd-15p">Amount Requested</th>
                              <th class="wd-10p">Amount Approved</th>
                              <th class="wd-15p">Action</th>
                            </tr>
                          </thead>

                          <tbody>
<<<<<<< HEAD
=======
                            <tr>
                                <td>1</td>
                                <td>Kabel</td>
                                <td><i class="fa fa-check"></i></td>
                                <td>10</td>
                                <td></td>
                                <td>
                                  <span class="badge badge-success badge-pill">Approved</span>
                                </td>
                                <td align="center">
                                 .. 
                                </td>
                              </tr>
                             
>>>>>>> ac80f4f4f1a691d731d041235ad7d6022b40d365
                          </tbody>
                        
                        </table> 
                      </div>
                    </div>
                    <div class="tab-pane fade" id="tab-ke-3" role="tabpanel" aria-labelledby="tab-6-3">
                      <!-- content -->
                    </div>
                    

                  </div> <!-- end div tab-content -->

                </div><!-- end div card --> 
              </div>
            </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script type="text/javascript">
  $(document).ready(function(){

     $('#table_datatable_rencana').DataTable({
            processing: true,
            // responsive:true,
            serverSide: true,
            ajax: {
                url:'{{ route('datatable_rencanapembelian') }}',
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
            { "data": "ro_code" },
            { "data": "ro_vendor" },
            { "data": "ro_qty" },
            { "data": "approved" },
            { "data": "detail" },
            { "data": "aksi" },
            ]
      });


    var table           = $("#t72a").DataTable();
    var rp_qty         = $("#rp_qty");
    var rp_item          = $("#rp_item");
    var rp_kodeitem       = $("#rp_kodeitem");

    var x = 1;
 
    $('#rp_qty').attr('disabled',true); 
    $('#rp_kodeitem').change(function(){
      var this_val = $(this).find(':selected').data('price');   
          if($(this).val() != '') {
            $('#rp_qty').attr('disabled',false);
          }else{
            $('#rp_qty').attr('disabled',true);          
          }    
      var price = $('#rp_item').val(accounting.formatMoney(this_val,"",0,'.',','));
    });


    rp_qty.keypress(function(e) {
      if(e.which == 13 || e.keyCode == 13){
        var qty = rp_qty.val();
        var harga_1 = rp_item.val();

        qty = qty.replace(/[^0-9\-]+/g,"");
        harga_1 = harga_1.replace(/[^0-9\-]+/g,"");

        var total = parseInt(harga_1)*parseInt(qty);
        table.row.add( [
            '<input type="text" id="item_kode[]"   name="ro_item_seq[]"    class="form-control input-sm min-width readonly" readonly value="'+ rp_kodeitem.val() +'">',
            '<input type="text" id="item_name[]"      class="form-control input-sm min-width readonly" value="'+ rp_kodeitem.find(':selected').data('name') +'">',
            '<input type="text" id="item_harga[]"   name="ro_price_seq[]"    class="form-control input-sm min-width right readonly total_price " value="'+ accounting.formatMoney(total,"",0,'.',',') +'">',
            '<input type="number" id="jumlah[]"   name="ro_qty_seq[]"    class="form-control input-sm min-width right readonly total_qty " value="'+ accounting.formatMoney(rp_qty.val(),"",0,'.',',') +'">',
            '<input type="text" id="unit_price[]"   name=""    class="form-control input-sm min-width right readonly">',
            '<button type="button" class="delete btn btn-outline-danger btn-sm"><i class="fa fa-trash-o"></i></button>',
        ] ).draw( false );
      
        x++;

        var total_price = 0;
        $('.total_price').each(function(){
          var total = $(this).val();
          total = total.replace(/[^0-9\-]+/g,"");
          total_price += parseInt(total);
        });
        $("input[name='ro_total_header']").val(accounting.formatMoney(total_price,"",0,'.',','));

        var total_qty = 0;
        $('.total_qty').each(function(){
          var total = $(this).val();
          total = total.replace(/[^0-9\-]+/g,"");
          total_qty += parseInt(total);
        });
        $("input[name='ro_qty_header']").val(accounting.formatMoney(total_qty,"",0,'.',','));

        rp_item.focus();
        rp_item.val('');
        rp_kodeitem.val('').trigger('change');
        rp_qty.val('');
      }
    } );
 
    

    $('#t72a tbody').on( 'click', '.delete', function () {
        table
            .row($(this).parents('tr'))
            .remove()
            .draw();

        var parents = $(this).parents('tr');
        var total_price_seq = $(parents).find('.total_price').val();
        var total_qty_seq = $(parents).find('.total_qty').val();
        var total_price_header = $("input[name='ro_total_header']").val();
        var total_qty_header = $("input[name='ro_qty_header']").val();

        total_price_header = total_price_header.replace(/[^0-9\-]+/g,"");
        total_qty_header = total_qty_header.replace(/[^0-9\-]+/g,"");
        total_price_seq = total_price_seq.replace(/[^0-9\-]+/g,"");
        total_qty_seq = total_qty_seq.replace(/[^0-9\-]+/g,"");

        var kurang_total = parseInt(total_price_header)-parseInt(total_price_seq);
        var kurang_qty = parseInt(total_qty_header)-parseInt(total_qty_seq);
        $("input[name='ro_total_header']").val(accounting.formatMoney(kurang_total,"",0,'.',','));
        $("input[name='ro_qty_header']").val(accounting.formatMoney(kurang_qty,"",0,'.',','));

    });

   $('#change_function').on("click", "#save_data",function(){
    $.ajax({
         type: "get",
         url: '{{ route('simpan_rencanapembelian') }}',
         data: $('#form-save').serialize(),
         success: function(data){
            $('#tambah').modal('hide');
            var table_history = ('#table_datatable_histori').DataTable();
            var table_rencana = $('#table_datatable_rencana').DataTable();
            table_history.ajax.reload();
            table_rencana.ajax.reload();

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

  $('#ro_vendor_header').change(function(){
    var this_val = $(this).val();
      $.ajax({
         type: "get",
         url: '{{ route('kode_rencanapembelian') }}',
         data: {vendor:this_val},
         success: function(data){
            $('#ro_code').val(data);
         }
       });
  })

  


  });
function detail(parm) {
    var par   = $(parm).parents('tr');
    var id    = $(par).find('.d_id').text();
    $('#detail_modal').modal('show');
    $.ajax({
       type: "get",
         url: '{{ route('detail_rencanapembelian') }}',
         data: {id:id},
         success: function(data){
          console.log(data);
          var array_nama='';
          $.each(data, function(i, item) {
              array_nama += '<tr>';
                array_nama += '<td>'+data[i].rodt_barang+' - '+data[i].i_name+'</td>';
                array_nama += '<td align="right">'+accounting.formatMoney(data[i].rodt_price,"",0,'.',',')+'</td>';
                array_nama += '<td align="right">'+accounting.formatMoney(data[i].rodt_qty,"",0,'.',',')+'</td>';
                array_nama += '<td align="right"><input type="text" class="form-control right"></td>';
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
</script>
@endsection