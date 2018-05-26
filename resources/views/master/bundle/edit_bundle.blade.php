@extends('main')
@section('content')


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
                              <input type="text"  class="form-control form-control-sm" name="ib_name">                                    
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                          
                              <label class="tebal">Bundle Price</label>
                         
                        </div>
                        <div class="col-md-3 col-sm-8 col-xs-12">
                          <div class="form-group">
                              <input type="text"  class="form-control form-control-sm format_money right" name="ib_price" readonly="">                               
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
                              {{-- @foreach ($item as $e)
                                <option value="{{ $e->i_code }}" data-harga="{{ $e->i_price }}" data-name="{{ $e->i_name }}">{{ $e->i_code }} - {{ $e->i_name }}</option>
                              @endforeach --}}
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
                      <table class="table table-hover table-bordered data-table gogo"  cellspacing="0" id="t72bu" width="100%">

                        <thead class="bg-gradient-info">
                          <tr>
                            <th width="20%">Item Code</th>
                            <th width="20%">Item Name</th>
                            <th width="5%">Qty</th>
                            <th width="5%">Unit</th>
                            <th width="30%">Item Price</th>
                            <th width="1%">Action</th>

                          </tr>
                        </thead>
                        <tbody id="edit_rep">
                          
                        </tbody>
                        
                      </table>
                    </div>
                    <div align="right" style="margin-top: 15px;">
                      <button class="btn btn-info btn-sm" type="button">Save Data</button>
                      <a class="btn btn-secondary btn-sm" href="{{url('master/bundle/bundle')}}">Back</a>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- content-wrapper ends -->
@endsection

@section('extra_script')

@endsection
