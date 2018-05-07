@extends('main')
@section('content')
<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Order</li>
				<li class="breadcrumb-item">Work Order</li>
				<li class="breadcrumb-item active" aria-current="page">Process Work Order</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          	<h4 class="card-title">Work Order</h4>

	          		<div class="row">
						
						<div class="col-md-3 col-sm-6 col-xs-12">
							<label>W.O.#</label>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="form-group">
								<input type="text" readonly="" class="form-control-sm form-control" value="WO/02-03-2018/001" name="">
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<label>Quote#</label>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="form-group">
								<input type="text" readonly="" class="form-control form-control-sm" value="QO/01-03-2018/001" name="">
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<label>Customer ID</label>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="form-group">
								<input type="text" readonly="" class="form-control-sm form-control" value="CUS/001" name="">
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<label>Order By</label>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="form-group">
								<input type="text" readonly="" class="form-control form-control-sm" value="Bravo" name="">
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<label>Date</label>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="form-group">
								<input type="text" readonly="" class="form-control-sm form-control" value="02-02-2018" name="">
							</div>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<label>Ship to</label>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<div class="form-group">
							  <input type="text" class="form-control form-control-sm" readonly="" name="">
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-md-2 col-sm-6 col-xs-12">
							<label>Shipping Method</label>
						</div>
						<div class="col-md-2 col-sm-6 col-xs-12">
							<div class="form-group">
								<input type="text" class="form-control-sm form-control" readonly="" value="Air Freight" name="">
							</div>
						</div>
						<div class="col-md-2 col-sm-6 col-xs-12">
							<label>Shipping Terms</label>
						</div>
						<div class="col-md-2 col-sm-6 col-xs-12">
							<div class="form-group">
								<input type="text" class="form-control-sm form-control" readonly="" value="2 Minggu" name="">
							</div>
						</div>
						<div class="col-md-2 col-sm-6 col-xs-12">
							<label>Delivery Date</label>
						</div>
						<div class="col-md-2 col-sm-6 col-xs-12">
							<div class="form-group">
								<input type="text" class="form-control-sm form-control" readonly="" value="" name="">
							</div>
						</div>
					</div>

					
			          
			          <div class="table-responsive" style="margin-bottom: 15px;">
			            <table class="table table-hover data-table" cellspacing="0">
			              <thead class="bg-gradient-info">
			                <tr>
			                  <th>Item#</th>
			                  <th>Qty</th>
			                  <th>Unit</th>
			                  <th>Description</th>
			                  <th>Unit Price</th>
			                  <th>Line Total</th>
			                </tr>
			              </thead>
			              <tbody>
			                <tr>
			                	<td>Cable</td>
			                	<td>300</td>
			                	<td>Meter</td>
			                	<td></td>
			                	<td>Rp. 10.000,-</td>
			                	<td>Rp. 300.000,-</td>
			                </tr>
			                <tr>
			                	<td>Pompa Air</td>
			                	<td>1</td>
			                	<td>Pcs</td>
			                	<td></td>
			                	<td>Rp. 300.000,-</td>
			                	<td>Rp. 300.000,-</td>
			                </tr>
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
				                <input type="text" class="form-control form-control-sm" name="" value="600.000" readonly="">
				              </div>
				            </div>
				            <div class="offset-md-8 col-md-2 col-sm-6 col-xs-12">
				              <label>Sales Tax</label>
				            </div>
				            <div class="col-md-2 col-sm-6 col-xs-12">
				              <div class="form-group">  
				                <input type="text" class="form-control form-control-sm" name="" value="100.000" readonly="">
				              </div>
				            </div>
				            <div class="offset-md-8 col-md-2 col-sm-6 col-xs-12">
				              <label>Total</label>
				            </div>
				            <div class="col-md-2 col-sm-6 col-xs-12">
				              <div class="form-group">  
				                <input type="text" class="form-control form-control-sm" name="" value="700.000" readonly="">
				              </div>
				            </div>
				            <div class="offset-md-8 col-md-2 col-sm-6 col-xs-12">
				              <label>DP</label>
				            </div>
				            <div class="col-md-2 col-sm-6 col-xs-12">
				              <div class="form-group">  
				                <input type="text" class="form-control form-control-sm" name="" value="700.000" readonly="">
				              </div>
				            </div>
				            <div class="offset-md-8 col-md-2 col-sm-6 col-xs-12">
				              <label>Select Payment</label>
				            </div>
				            <div class="col-md-2 col-sm-6 col-xs-12">
				              <div class="form-group">  
				                <select class="form-control" disabled="">
				                  <option>Tunai</option>
				                  <option>Transfer</option>
				                </select>
				              </div>
				            </div>
				            
				            <div class="offset-md-8 col-md-2 col-sm-6 col-xs-12">
				              <label>Remaining DP</label>
				            </div>
				            <div class="col-md-2 col-sm-6 col-xs-12">
				              <div class="form-group">  
				                <input type="text" class="form-control form-control-sm" name="" readonly="" value="0">
				              </div>
				            </div>
				            <div class="offset-md-8 col-md-2 col-sm-6 col-xs-12">
				              <label>Type Quotation</label>
				            </div>
				            <div class="col-md-2 col-sm-6 col-xs-12">
				              <div class="form-group">  
				                <select class="form-control" disabled="">
				                  <option>Work Order</option>
				                  <option>Sales Order</option>
				                </select>
				              </div>
				            </div>
				            <div class="offset-md-8 col-md-2 col-sm-6 col-xs-12">
				              <label>Work Order</label>
				            </div>
				            <div class="col-md-2 col-sm-6 col-xs-12">
				              <div class="form-group">  
				                <select class="form-control" disabled="">
				                  <option>Project Manajemen Pompa</option>
				                  <option>Project Manajemen SHS</option>
				                </select>
				              </div>
				            </div>
				            <div class="col-md-12 col-sm-12 col-xs-12" align="right" style="margin-top: 15px;">
					            <a href="#" class="btn btn-info" target="_blank"><i class="fa fa-print"></i>Print</a>
					            <a href="{{url('order/workorder/w_order')}}" class="btn btn-secondary">Back</a>
					        </div>
					    </div>
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