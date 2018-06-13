
@extends('main')

@section('extra_style')


@endsection

@section('content')

@include('project.jadwalujicoba.tambah_jadwal')

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
					<div align="right" style="margin-bottom: 15px;">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</button>
					</div>

						<div id="demo">
							<div class="panel-jplist" style="margin-bottom: 15px;">		
								<div class="row">	
									<!-- items per page dropdown -->
			                        <div 
			                           class="jplist-drop-down col-md-3 col-sm-6 col-xs-12" 
			                           data-control-type="items-per-page-drop-down" 
			                           data-control-name="paging" 
			                           data-control-action="paging">

			                           <ul>
			                             <li><span data-number="4" data-default="true"> 4 per page </span></li>
			                             <li><span data-number="8"> 8 per page </span></li>
			                             <li><span data-number="16"> 16 per page </span></li>
			                             <li><span data-number="all"> View All </span></li>
			                           </ul>
			                        </div>
			                        
									<div 
									   class="jplist-label col-md-3 col-sm-6 col-xs-12" 
									   data-type="Page {current} of {pages}" 
									   data-control-type="pagination-info" 
									   data-control-name="paging" 
									   data-control-action="paging">
									</div>	

									<div 
									   class="jplist-pagination row col-md-3 col-sm-6 col-xs-12" 
									   data-control-type="pagination" 
									   data-control-name="paging" 
									   data-control-action="paging"
									   style="margin-top:10px;">
									</div>			
														
									<!-- search any text in the element -->
									<div class=" input-group input-group-sm col-md-3 col-sm-12 col-xs-12" style="height: 30px;margin-top: 10px;">
										
										<span class="input-group-addon bg-info">
									   		<i class="fa fa-search text-white"></i>
										</span>
									   
										<input class="form-control form-control-sm" 
										  data-path="*" 
										  type="text" 
										  value="" 
										  placeholder="Search any text in the element" 
										  data-control-type="textbox" 
										  data-control-name="title-filter" 
										  data-control-action="filter"
										/>
									</div>
								</div>
								
							</div>	

							<div id="lightgallery" class="row lightGallery">
								<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#">
								  <img src="{{asset('assets/images/samples/300x300/1.jpg')}}"  /> City
								</a>
								<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#">
								  <img src="{{asset('assets/images/samples/300x300/2.jpg')}}"  /> Jogging
								</a>
								<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#">
								  <img src="{{asset('assets/images/samples/300x300/3.jpg')}}"  /> Laptop
								</a>
								<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#">
								  <img src="{{asset('assets/images/samples/300x300/4.jpg')}}"  /> Traffic
								</a>
								<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#">
								  <img src="{{asset('assets/images/samples/300x300/5.jpg')}}"  /> Wemen
								</a>
								<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#">
								  <img src="{{asset('assets/images/samples/300x300/6.jpg')}}"  /> Air Balon
								</a>
								<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#">
								  <img src="{{asset('assets/images/samples/300x300/7.jpg')}}"  />  A Man
								</a>
								<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#">
								  <img src="{{asset('assets/images/samples/300x300/8.jpg')}}"  /> Snow
								</a>
								<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#">
								  <img src="{{asset('assets/images/samples/300x300/9.jpg')}}"  /> A Man (2)
								</a>
								<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#">
								  <img src="{{asset('assets/images/samples/300x300/10.jpg')}}"  /> A Thing
								</a>
								<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#">
								  <img src="{{asset('assets/images/samples/300x300/11.jpg')}}"  /> A Man (3)
								</a>
								<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="#">
								  <img src="{{asset('assets/images/samples/300x300/12.jpg')}}"  /> A Sun Between Mountains
								</a>
							</div>

							<div class="panel-jplist">
								<div class="row">
									<div 
									   class="jplist-label col-md-6 col-sm-6 col-xs-12" 
									   data-type="Page {current} of {pages}" 
									   data-control-type="pagination-info" 
									   data-control-name="paging" 
									   data-control-action="paging">
									</div>	

									<div 
									   class="jplist-pagination row col-md-6 col-sm-6 col-xs-12" 
									   data-control-type="pagination" 
									   data-control-name="paging" 
									   data-control-action="paging"
									   style="margin-top:10px;">
									</div>	
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


<script>
	$(document).ready(function () {


		// $("#lightgallery").lightGallery();

		$('#demo').jplist({				
				itemsBox: '.lightGallery' 
				,itemPath: '.image-tile' 
				,panelPath: '.panel-jplist'	
                ,debug: true
                ,deepLinking: true
			});	



	});

</script>

@endsection