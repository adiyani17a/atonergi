@extends('main')
@section('content')

<!-- partial -->
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
                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <label>Vendor</label>
                </div>
                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                      <div class="form-group">
                        <input type="text" class="form-control form-control-sm readonly" name="">
                      </div>
                  </div>
                </div>

                <div class="col-md-6 col-sm-0 col-xs-0">
                  <!-- Empty -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                  <label>Adress</label>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                    <textarea class="form-control"></textarea>
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

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label>Date</label>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm datepicker" name="">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label>P.O.#</label>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-sm" name="">
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
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" name="">
                </div>
              </div>

              

              <div class="col-md-2 col-sm-6 col-xs-12">
                <label>Shipping Term</label>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" name="">
                </div>
              </div>

              

              <div class="col-md-2 col-sm-6 col-xs-12">
                <label>Delivery Date</label>
              </div>
              <div class="col-md-2 col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm datepicker" name="">
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
             <table class="table table-bordered table-hover data-table" cellspacing="0" id="abrams">
               <thead class="bg-gradient-info">
                 <tr>
                  <th>Item Code</th>
                   <th>Item Name</th>
                   <th>Qty</th>
                   <th>Description</th>
                   <th>Price</th>
                   <th>Unit Price</th>
                   <th>Line Total</th>
                 </tr>
               </thead>
               <tbody>
                 
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
                    <input type="text" class="form-control form-control-sm" readonly="" name="">
                  </div>
                </div>
                <div class="offset-md-8 col-md-2 col-sm-12 col-xs-12">
                  <label>Sales Tax</label>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm" name="">
                  </div>
                </div>
                <div class="offset-md-8 col-md-2 col-sm-12 col-xs-12">
                  <label>Total</label>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-sm" readonly="" name="">
                  </div>
                </div>
              </div>
              
             </div>
           </div>
          
          <div align="right" style="margin-top: 15px;">
            <button class="btn-info btn-sm btn" type="button">Save Data</button>
            <a href="{{url('purchase/purchaseorder/purchaseoreder')}}" class="btn btn-secondary btn-sm">Back</a>
          </div>
            
          </div>
      </div>
  </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

@endsection