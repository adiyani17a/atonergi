@extends('main')
@section('content')
<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Order</li>
				<li class="breadcrumb-item active" aria-current="page">Sales Order</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Sales Order</h4>
	          		
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="alert alert-primary alert-dismissible" title="DP sudah Lunas">
							    <button type="button" class="close" data-dismiss="alert">&times;</button>
							    <strong>Notice!</strong> <br>
							    DP Paid Off
							    <label class="badge badge-pill badge-primary">0</label>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="alert alert-warning alert-dismissible" title="DP belum Lunas">
							    <button type="button" class="close" data-dismiss="alert">&times;</button>
							    <strong>Notice!</strong> <br>
							    DP not yet paid off
							    <label class="badge badge-pill badge-warning">0</label>
							</div>
						</div>
					</div>

					<div class="table-responsive">
						<table id="table_quote" class="table table-hover table-bordered " cellspacing="0">
							<thead class="bg-gradient-info">
								<tr>
									<th>S.O.#</th>
									<th>S.I.#</th>
									<th>Customer</th>
									<th>Total Bill</th>
									<th>DP</th>
									<th>Total Balance</th>
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
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<script>
$(document).ready(function(){
	$('#table_quote').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
          url:'{{ route('datatable_so') }}',
      },
      columnDefs: [

              {
                 targets: 0 ,
                 className: 'center'
              },
              {
                 targets: 1 ,
                 className: 'q_nota'
              },
              {
                 targets: 3,
                 className: 'right'
              },
              {
                 targets: 4,
                 className: 'right'
              },
              {
                 targets: 5,
                 className: 'right'
              },
              {
                 targets: 6,
                 className: 'center'
              },
            ],
      columns: [
        {data: 'so_nota', name: 'so_nota'},
        {data: 'q_nota', name: 'q_nota'},
        {data: 'q_customer', name: 'q_customer'},
        {data: 'total', name: 'total'},
        {data: 'dp', name: 'dp'},
        {data: 'remain', name: 'remain'},
        {data: 'aksi', name: 'aksi'},

      ]

	});
})
</script>
@endsection