@extends('main')
@section('content')

<!-- partial -->
<div class="content-wrapper">
	<div class="col-lg-12">	
		<nav aria-label="breadcrumb" role="navigation">
			<ol class="breadcrumb bg-info">
				<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
				<li class="breadcrumb-item">Order</li>
				<li class="breadcrumb-item active" aria-current="page">Pembayaran Deposit</li>
			</ol>
		</nav>
	</div>
	<div class="col-lg-12 grid-margin stretch-card">
      	<div class="card">
	        <div class="card-body">
	          <h4 class="card-title">Pembayaran Deposit</h4>
	          	
	          	<div class="table-responsive" style="margin-bottom: 15px;">
		            <table id="table_quote" class="table table-hover " cellspacing="0">
			              <thead class="bg-gradient-info">
			                <tr>
			                  <th>No</th>
			                  <th>Q.O.#</th>
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
<script type="text/javascript">

$(document).ready(function(){
	$('#table_quote').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
          url:'{{ route('datatable_deposit') }}',
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
        {data: 'DT_Row_Index', name: 'DT_Row_Index'},
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