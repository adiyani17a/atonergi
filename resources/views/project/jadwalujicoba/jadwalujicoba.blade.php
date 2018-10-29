
@extends('main')

@section('extra_style')

<style type="text/css">

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
					<li class="breadcrumb-item">Project Manajemen Pompa | SHS</li>
					<li class="breadcrumb-item active" aria-current="page">Schedule Uji Coba dan Dokumentasi</li>
				</ol>
			</nav>
		</div>
		<div class="col-lg-12 grid-margin stretch-card">
	            <div class="card">
	                <div class="card-body">
						<h4 class="card-title">Schedule Uji Coba dan Dokumentasi</h4>
						<div class="text-right mb-3">
							<a href="{{url('project/jadwalujicoba/tambah_jadwal')}}" class="btn btn-info" ><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</a>
						</div>

					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped data-table">
							<thead class="bg-gradient-info">
								<tr>
									<th width="1%">No.</th>
									<th>Date Created</th>
									<th>Title</th>
									<th width="15%">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Friday, 6 October 2018 15:54:39</td>
									<td>Ini Judul</td>
									<td>
										<div class="btn-group btn-group-sm">
											<button class="btn btn-warning" type="button" title="Edit"><i class="fa fa-pencil-alt"></i></button>
											<button class="btn btn-primary" type="button" title="Print"><i class="fa fa-print"></i></button>
											<button class="btn btn-danger" type="button" title="Delete"><i class="fa fa-trash"></i></button>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
	                  
	                </div>
	            </div>
	    </div>
	</div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')


<script>




</script>

@endsection