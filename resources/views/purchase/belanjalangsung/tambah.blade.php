@extends('main')
@section('extra_style')
<style type="text/css">
  .min-width{
    min-width: 120px;
  }
  .min-width2{
    min-width: 50px;
  }
</style>
@endsection
@section('content')

<!-- partial -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12"> 
      <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb bg-info">
          <li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
          <li class="breadcrumb-item">Purchase</li>
          <li class="breadcrumb-item">Belanja Langsung</li>
          <li class="breadcrumb-item active" aria-current="page">Tambah Belanja Langsung</li>
        </ol>
      </nav>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <form id="form-save">
              <div class="card-body">
                <h4 class="card-title">Tambah Belanja Langsung</h4>
                 

                <div class="row">

                    
                    
                        <div class="col-md-7 col-sm-12 col-xs-12">
                          <div class="row">
                            
                            <div class="col-md-2 col-sm-6 col-xs-12">
                              <label>Vendor Id</label>
                            </div>
                            
                            <div class="col-md-10 col-sm-6 col-xs-12">
                              <div class="form-group">
                                  <div class="form-group">
                                    <select class="form-control form-control-sm">
                                      <option>--Select Vendor--</option>
                                    </select>
                                  </div>
                              </div>
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-12">
                              <label>Vendor Name</label>
                            </div>
                            
                            <div class="col-md-10 col-sm-6 col-xs-12">
                              <div class="form-group">
                                  <div class="form-group">
                                    <input type="text" class="form-control form-control-sm readonly" name="po_name" value="{{-- {{ $data_header->s_name }} - {{ $data_header->s_company }} --}}">
                                  </div>
                              </div>
                            </div>

                            <div class="col-md-2 col-sm-6 col-xs-12">
                              <label>Adress</label>
                            </div>

                            <div class="col-md-10 col-sm-6 col-xs-12">
                              <div class="form-group">
                                <textarea class="form-control readonly" name="po_address">{{-- {{ $data_header->s_address }} --}}</textarea>
                              </div>
                            </div>

                          </div>
                       </div>

                
                       <div class="col-md-5 col-sm-12 col-xs-12" style="height: 1%;">

                        <div class="row">

                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <label>Date</label>
                          </div>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-sm datepicker_today" name="po_date">
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <label>P.O.#</label>
                          </div>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-sm readonly"  name="po_nopo" value="{{-- {{ $nota }} --}}">
                            </div>
                          </div>
                          <div class="col-md-4 col-sm-6 col-xs-12">
                            <label>Ship to</label>
                          </div>
                          <div class="col-md-8 col-sm-6 col-xs-12">
                            <div class="form-group">
                              <input type="text" class="form-control form-control-sm" name="po_shipping_to">
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

                <div class="row" style="margin-top: 15px;border-top: 1px solid #98c3d1;padding-top:15px;border-bottom: 1px solid #98c3d1; margin-bottom: 15px;">
                  <div class="col-md-3 col-sm-6 col-xs-12">

                    <label>Item</label>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <select class="form-control form-control-sm" id="rp_kodeitem">
                        <option selected="" value="">- Pilih -</option>
                        <option value="T-80U">T-80U</option>
                        {{-- @foreach ($item as $i)
                          <option value="{{ $i->i_code }}" data-name="{{ $i->i_name }}" data-price="{{ $i->i_price }}" 
                            @if ($i->sg_qty != null)
                              data-qty="{{ $i->sg_qty }}"
                            @else
                              data-qty='0'
                            @endif
                          >{{ $i->i_code }} - {{ $i->i_name }} </option>
                        @endforeach --}}
                      </select>
                    </div>
                  </div>
                  <div class="col-md-2 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm right readonly" name="" id="rp_item">
                    </div>
                  </div>
                  <div class="col-md-1 col-sm-12 col-xs-12">
                    <label>Qty</label>
                  </div>
                  <div class="col-md-3 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm right hanya_angka"  name="" id="rp_qty" >
                    </div>
                  </div>
                </div>
               
               <div class="table-responsive" style="margin-bottom: 15px;">
                 <table class="table table-bordered table-hover" cellspacing="0" id="t80b">
                   <thead class="bg-gradient-info">
                     <tr>
                       <th>Item Code</th>
                       <th width="30%">Item Name</th>
                       <th>Qty Requested</th>
                       <th>Unit</th>
                       <th>Unit Price</th>
                       <th>Line Total</th>
                       <th>PPn</th>
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                     {{-- @foreach ($data_seq as $seq)
                       <tr>
                          <td><input type="text" class="form-control form-control-sm min-width readonly" name="podt_barang[]" value="{{ $seq->rodt_barang }}"></td>
                          <td><input type="text" class="form-control form-control-sm min-width readonly" name="podt_name[]" value="{{ $seq->i_name }}"></td>
                          <td><input type="text" class="form-control form-control-sm min-width2 right format_money readonly qty" value="{{ $seq->rodt_qty }}"></td>
                          <td><input type="text" class="form-control form-control-sm min-width2 right format_money qty_approved_value"  onkeyup="hitung_qty(this)" name="podt_qty[]" value="{{ $seq->rodt_qty_approved }}"></td>
                          <td><input type="text" class="form-control form-control-sm min-width2 readonly" name="podt_unit[]" value="{{ $seq->i_unit }}"></td>
                          <td><input type="text" class="form-control form-control-sm min-width right format_money readonly unit_price" name="podt_unit_price[]" value="{{ number_format($seq->rodt_unit_price,0,',','.') }}"></td>
                          <td><input type="text" class="form-control form-control-sm min-width right format_money total_price readonly" name="podt_price[]" onchange="hitung_total(this)" value="{{ number_format($seq->rodt_price,0,',','.') }}"></td>
                          <td><input type="checkbox" name="podt_ppn[]" class="ppn" onchange="ppn_10(this)">10%</td>
                          <td><button type="button" class="delete btn btn-outline-danger btn-sm hapus"><i class="fa fa-trash"></i></button></td>
                       </tr>
                     @endforeach --}}
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
                    <button class="btn-info btn-sm btn" type="button" id="save_data">Create Belanja Langsung</button>
                    <a href="{{ route('belanjalangsung') }}" class="btn btn-secondary btn-sm">Back</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
    </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script type="text/javascript">

  $(document).ready(function() {
    var t = $('#t80b').DataTable();
    var counter = 1;
 
    $('#rp_qty').keypress(function(e){
      if (e.which == 13 || e.keyCode == 13) {

      var i_name = $('#rp_kodeitem').val();
      var i_qty = $('#rp_qty').val();
        t.row.add( [
            '<input type="text" class="form-control form-control-sm">',
            '<input type="text" class="form-control form-control-sm" value="'+i_name+'">',
            '<input type="text" class="form-control form-control-sm" value="'+i_qty+'">',
            '<input type="text" class="form-control form-control-sm">',
            '<input type="text" class="form-control form-control-sm">',
            '<input type="text" class="form-control form-control-sm">',
            '<input type="checkbox" class="form-control form-control-sm">',
            '<button type="button" class="delete btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>'
            
        ] ).draw( false );
 
        counter++;
        $('#rp_qty').val('');
        $('#rp_kodeitem').val('');
      }
    });

 
    $('#t80b tbody').on( 'click', '.delete', function () {
    t
        .row( $(this).parents('tr') )
        .remove()
        .draw();
    } );
} );

</script>
@endsection




