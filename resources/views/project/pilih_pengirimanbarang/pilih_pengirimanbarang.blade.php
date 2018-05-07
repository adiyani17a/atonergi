@extends('main')
@section('content')

<!-- partial -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">	
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb bg-info">
					<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="{{url('/home')}}">Home</a></li>
					<li class="breadcrumb-item">Project Manajemen Pompa | SHS</li>
					<li class="breadcrumb-item active" aria-current="page">Pengiriman Barang</li>
				</ol>
			</nav>
		</div>
	</div>
            <div class="row">
	            	<div class="col-md-6 col-sm-6 col-xs-12 stretch-card grid-margin">
		              <div class="card bg-gradient-primary text-white">
            			<a href="{{url('projectmp/pmp_pengirimanbarang/pmp_pengirimanbarang')}}" class="text-white pilih-link">
			                <div class="card-body">
			                  <h1 class="font-weight-normal mb-3"><i class="mdi mdi-engine"></i></h1>
			                  <p class="card-text">Pengiriman Barang</p>
			                  <h2 class="font-weight-normal mb-1">Pompa</h2>
			                </div>
		        		</a>
		              </div>
		            </div>

		            <div class="col-md-6 col-sm-6 col-xs-12 stretch-card grid-margin">
		              <div class="card bg-gradient-success text-white">
		        		<a href="{{url('projectms/shs_pengirimanbarang/shs_pengirimanbarang')}}" class="text-white pilih-link">
			                <div class="card-body">
			                  <h1 class="font-weight-normal mb-3"><i class="mdi mdi-file-document-box"></i></h1>
			                  <p class="card-text">Pengiriman Barang</p>
			                  <h2 class="font-weight-normal mb-1">SHS</h2>
			                </div>
		        		</a>
		              </div>
		            </div>
            </div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

@endsection