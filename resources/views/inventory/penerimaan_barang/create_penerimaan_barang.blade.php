@extends('main')
@section('content')

<!-- partial -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">	
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb bg-info">
					<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
					<li class="breadcrumb-item">Inventory</li>
					<li class="breadcrumb-item"><a href="{{url('inventory/penerimaan_barang/penerimaan_barang')}}">Penerimaan Barang</a></li>
					<li class="breadcrumb-item active" aria-current="page">Process Penerimaan Barang</li>
				</ol>
			</nav>
		</div>
		<div class="col-lg-12 grid-margin stretch-card">
	      	<div class="card">
		        <div class="card-body">
		          <h4 class="card-title">Process Penerimaan Barang</h4>
								<div class="row">
              
              
		              <div class="col-md-7 col-sm-12 col-xs-12">
		                <div class="row">
		                  
		                  <div class="col-md-2 col-sm-6 col-xs-12">
		                    <label>Vendor Id</label>
		                  </div>
		                  
		                  <div class="col-md-4 col-sm-6 col-xs-12">
		                    <div class="form-group">
		                        <div class="form-group">
		                          <input type="text" class="form-control form-control-sm readonly" name="po_vendor" >
		                          <input type="hidden" name="nomor_ro" ">
		                          <input type="hidden" name="vedor_ro" ">
		                        </div>
		                    </div>
		                  </div>

		                  <div class="col-md-2 col-sm-6 col-xs-12">
		                    <label>Vendor Name</label>
		                  </div>
		                  
		                  <div class="col-md-4 col-sm-6 col-xs-12">
		                    <div class="form-group">
		                        <div class="form-group">
		                          <input type="text" class="form-control form-control-sm readonly" name="po_name">
		                        </div>
		                    </div>
		                  </div>

		                  <div class="col-md-2 col-sm-6 col-xs-12">
		                    <label>Adress</label>
		                  </div>
		                  <div class="col-md-10 col-sm-6 col-xs-12">
		                    <div class="form-group">
		                      <textarea class="form-control readonly" name="po_address"></textarea>
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
	                        <input type="text" class="form-control form-control-sm readonly" name="po_date">
	                      </div>
	                    </div>
	                    <div class="col-md-4 col-sm-6 col-xs-12">
	                      <label>P.O.#</label>
	                    </div>
	                    <div class="col-md-8 col-sm-6 col-xs-12">
	                      <div class="form-group">
	                        <input type="text" class="form-control form-control-sm readonly"  name="po_noro">
	                      </div>
	                    </div>
	                    <div class="col-md-4 col-sm-6 col-xs-12">
	                      <label>Customer ID</label>
	                    </div>
	                    <div class="col-md-8 col-sm-6 col-xs-12">
	                      <div class="form-group">
	                        <input type="text" class="form-control form-control-sm readonly" name="" >
	                      </div>
	                    </div>
	                    <div class="col-md-4 col-sm-6 col-xs-12">
	                      <label>Ship to</label>
	                    </div>
	                    <div class="col-md-8 col-sm-6 col-xs-12">
	                      <div class="form-group">
	                        <input type="text" class="form-control form-control-sm readonly" name="">
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
			                    <select name="po_shipping_method readonly">
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
			                    <input type="text" class="form-control form-control-sm readonly" name="po_shipping_term">
			                  </div>
			                </div>

			                

			                <div class="col-md-2 col-sm-6 col-xs-12">
			                  <label>Delivery Date</label>
			                </div>
			                <div class="col-md-2 col-sm-6 col-xs-12">
			                  <div class="form-group">
			                    <input type="text" class="form-control form-control-sm datepicker readonly" name="po_shipping_date">
			                  </div>
			                </div>
			              </div>
			            </div>
			          </div>

			          <div class="table-responsive" style="margin-bottom: 15px;">
		               <table class="table table-bordered table-hover data-table" cellspacing="0" id="challanger">
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
		                     <tr>
		                        <td><input type="text" class="form-control form-control-sm readonly" name="podt_barang[]"></td>
		                        <td><input type="text" class="form-control form-control-sm readonly" name="podt_name[]"></td>
		                        <td><input type="text" class="form-control form-control-sm readonly right qty"></td>
		                        <td><input type="text" class="form-control form-control-sm readonly right qty_approved_value" name="podt_qty[]"></td>
		                        <td><input type="text" class="form-control form-control-sm readonly" name="podt_unit[]"></td>
		                        <td><input type="text" class="form-control form-control-sm readonly right unit_price" name="podt_unit_price[]"></td>
		                        <td><input type="text" class="form-control form-control-sm readonly right total_price" name="podt_price[]"></td>
		                        <td><button type="button" class="delete btn btn-outline-danger btn-sm hapus disabled"><i class="fa fa-trash"></i></button></td>
		                     </tr>
		                 </tbody>
		               </table>
		            </div>
		          		
								<div align="right">
									<button type="button" class="btn btn-info btn-sm">Add Data</button>
									<a href="{{url('inventory/penerimaan_barang/penerimaan_barang')}}" class="btn btn-secondary btn-sm">Back</a>
								</div>
						
		        		
		      	</div>
	    		</div>
		</div>
	</div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

@endsection