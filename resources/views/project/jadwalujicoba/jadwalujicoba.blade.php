
@extends('main')

@section('extra_style')

<style type="text/css">
	.list-item .action{
		color:#440e00;font-size:12px;float:right
	}
	.list-item .tag{
		color:#440e00;font-size:12px;float:right
	}
	.list-item{
		border-bottom: 1px solid #abcaf1;
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
						<a href="{{url('project/jadwalujicoba/tambah_jadwal')}}" class="btn btn-info" ><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Data</a>
					</div>

						<!-- div demo -->
						<div id="demo"> 
							<div class="panel-jplist" style="margin-bottom: 15px;">		
								<div class="row">	
									
					
									<div class="col-md-3">
										<div class="row">
											<!-- pagination info label -->
											<div 
												align="center"
												class="pull-left jplist-pagination-info col-md-6"
												data-type="<strong>Page {current} of {pages}</strong><br/> <small>{start} - {end} of {all}</small>" 
												data-control-type="pagination-info" 
												data-control-name="paging" 
												data-control-action="paging"></div>
												
											<!-- items per page dropdown -->
											<div align="center"
												class="dropdown pull-left jplist-items-per-page col-md-6"
												data-control-type="boot-items-per-page-dropdown" 
												data-control-name="paging" 
												data-control-action="paging">

												
												<div class="dropdown">
							                      <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							                        <span data-type="selected-text">Items per Page</span>
													<span class="caret"></span>
							                      </button>
							                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							                        <h6 class="dropdown-header">Items per Page</h6>
							                        <a class="dropdown-item" role="menuitem" tabindex="-1" href="#" data-number="4">4 per page</a>
							                        <a class="dropdown-item" role="menuitem" tabindex="-1" href="#" data-number="8">8 per page</a>
							                        <a class="dropdown-item" role="menuitem" tabindex="-1" href="#" data-number="16">16 per page</a>
							                        <div class="dropdown-divider"></div>
							                        <a class="dropdown-item" role="menuitem" tabindex="-1" href="#" data-number="all">View All</a>
							                      </div>
							                    </div>	

											</div>
										</div>
									
									</div>
									
									<div class="col-md-6" style="align-items: center;">
										
										<!-- bootstrap pagination control -->
										<ul 
											 class="pagination pull-left jplist-pagination btn-group"
											 data-control-type="boot-pagination" 
											 data-control-name="paging" 
											 data-control-action="paging"
											 data-range="5"
											 data-mode="google-like">
										</ul>
									</div>
														
									<!-- search any text in the element -->
									<div class="input-group input-group-sm col-md-3 col-sm-12 col-xs-12" style="height: 32px;">
										
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
								<div class="list-item">
									
										<div class="row">
											<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/1.jpg')}}">
											 	<img src="{{asset('assets/images/samples/300x300/1.jpg')}}"  />
											</a>
											<div class="col-md-9">
												<p class="date">03/18/2012</p>
												<p class="title">Architectur</p>
												<p class="desc">Architectur is both the process and product of planning, designing and construction. Architectural works, in the material form of buildings, are often perceived as cultural symbols and as works of art. Historical civilizations are often identified with their surviving architectural achievements.</p>
												
												<div class="action btn-group">
													<button title="Edit" class="btn btn-xs btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
													<button title="Delete" class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									
								</div>
								<div class="list-item">
									
										<div class="row">
											<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/2.jpg')}}">
											 	<img src="{{asset('assets/images/samples/300x300/2.jpg')}}"  />
											</a>
											<div class="col-md-9">
												<p class="date">03/18/2012</p>
												<p class="title">Jogging</p>
												<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												
												<div class="action btn-group">
													<button title="Edit" class="btn btn-xs btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
													<button title="Delete" class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									
								</div>
								<div class="list-item">
									
										<div class="row">
											<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/3.jpg')}}">
											 	<img src="{{asset('assets/images/samples/300x300/3.jpg')}}"  />
											</a>
											<div class="col-md-9">
												<p class="date">03/18/2012</p>
												<p class="title">Laptop</p>
												<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												
												<div class="action btn-group">
													<button title="Edit" class="btn btn-xs btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
													<button title="Delete" class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									
								</div>
								<div class="list-item">
									
										<div class="row">
											<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/4.jpg')}}">
											 	<img src="{{asset('assets/images/samples/300x300/4.jpg')}}"  />
											</a>
											<div class="col-md-9">
												<p class="date">03/18/2012</p>
												<p class="title">Traffic</p>
												<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												
												<div class="action btn-group">
													<button title="Edit" class="btn btn-xs btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
													<button title="Delete" class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									
								</div>
								<div class="list-item">
									
										<div class="row">
											<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/5.jpg')}}">
											 	<img src="{{asset('assets/images/samples/300x300/5.jpg')}}"  />
											</a>
											<div class="col-md-9">
												<p class="date">03/18/2012</p>
												<p class="title">Wemen</p>
												<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												
												<div class="action btn-group">
													<button title="Edit" class="btn btn-xs btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
													<button title="Delete" class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									
								</div>
								<div class="list-item">
									
										<div class="row">
											<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/6.jpg')}}">
											 	<img src="{{asset('assets/images/samples/300x300/6.jpg')}}"  />
											</a>
											<div class="col-md-9">
												<p class="date">03/18/2012</p>
												<p class="title">Air Balon</p>
												<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												
												<div class="action btn-group">
													<button title="Edit" class="btn btn-xs btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
													<button title="Delete" class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									
								</div>
								<div class="list-item">
									
										<div class="row">
											<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/7.jpg')}}">
											 	<img src="{{asset('assets/images/samples/300x300/7.jpg')}}"  />
											</a>
											<div class="col-md-9">
												<p class="date">03/18/2012</p>
												<p class="title">A Man</p>
												<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												
												<div class="action btn-group">
													<button title="Edit" class="btn btn-xs btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
													<button title="Delete" class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									
								</div>
								<div class="list-item">
									
										<div class="row">
											<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/8.jpg')}}">
											 	<img src="{{asset('assets/images/samples/300x300/8.jpg')}}"  />
											</a>
											<div class="col-md-9">
												<p class="date">03/18/2012</p>
												<p class="title">Snow</p>
												<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												
												<div class="action btn-group">
													<button title="Edit" class="btn btn-xs btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
													<button title="Delete" class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									
								</div>
								<div class="list-item">
									
										<div class="row">
											<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/9.jpg')}}">
											 	<img src="{{asset('assets/images/samples/300x300/9.jpg')}}"  />
											</a>
											<div class="col-md-9">
												<p class="date">03/18/2012</p>
												<p class="title">A Man (2)</p>
												<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												
												<div class="action btn-group">
													<button title="Edit" class="btn btn-xs btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
													<button title="Delete" class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									
								</div>
								<div class="list-item">
									
										<div class="row">
											<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/10.jpg')}}">
											 	<img src="{{asset('assets/images/samples/300x300/10.jpg')}}"  />
											</a>
											<div class="col-md-9">
												<p class="date">03/18/2012</p>
												<p class="title">A Thing</p>
												<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												<p class="theme">
													>
												</p>
												<div class="action btn-group">
													<button title="Edit" class="btn btn-xs btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
													<button title="Delete" class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									
								</div>
								<div class="list-item">
									
										<div class="row">
											<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/11.jpg')}}">
											 	<img src="{{asset('assets/images/samples/300x300/11.jpg')}}"  />
											</a>
											<div class="col-md-9">
												<p class="date">03/18/2012</p>
												<p class="title">A Man (3)</p>
												<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												
												<div class="action btn-group">
													<button title="Edit" class="btn btn-xs btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
													<button title="Delete" class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									
								</div>
								<div class="list-item">
									
										<div class="row">
											<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/12.jpg')}}">
											 	<img src="{{asset('assets/images/samples/300x300/12.jpg')}}"  />
											</a>
											<div class="col-md-9">
												<p class="date">03/18/2012</p>
												<p class="title">A Sun Between Mountains</p>
												<p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
												quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
												consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
												cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
												proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
												
												<div class="action btn-group">
													<button title="Edit" class="btn btn-xs btn-primary" type="button"><i class="fa fa-pencil-alt"></i></button>
													<button title="Delete" class="btn btn-xs btn-danger" type="button"><i class="fa fa-trash"></i></button>
												</div>
											</div>
										</div>
									
								</div>
							</div>

							<div class="panel-jplist" style="margin-top: 15px;">
								<div class="row">
									<div class="col-md-3">
										<div class="row">
											<!-- pagination info label -->
											<div 
												align="center"
												class="pull-left jplist-pagination-info col-md-6"
												data-type="<strong>Page {current} of {pages}</strong><br/> <small>{start} - {end} of {all}</small>" 
												data-control-type="pagination-info" 
												data-control-name="paging" 
												data-control-action="paging"></div>
												
											<!-- items per page dropdown -->
											<div align="center"
												class="dropdown pull-left jplist-items-per-page col-md-6"
												data-control-type="boot-items-per-page-dropdown" 
												data-control-name="paging" 
												data-control-action="paging">

												
												<div class="dropdown">
							                      <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							                        <span data-type="selected-text">Items per Page</span>
													<span class="caret"></span>
							                      </button>
							                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
							                        <h6 class="dropdown-header">Items per Page</h6>
							                        <a class="dropdown-item" role="menuitem" tabindex="-1" href="#" data-number="4">4 per page</a>
							                        <a class="dropdown-item" role="menuitem" tabindex="-1" href="#" data-number="8">8 per page</a>
							                        <a class="dropdown-item" role="menuitem" tabindex="-1" href="#" data-number="16">16 per page</a>
							                        <div class="dropdown-divider"></div>
							                        <a class="dropdown-item" role="menuitem" tabindex="-1" href="#" data-number="all">View All</a>
							                      </div>
							                    </div>	

											</div>
										</div>
									
									</div>

									<div class="box jplist-no-results text-shadow align-center">
						                <p>No results found</p>
						            </div>
									
									<div class="col-md-6" style="align-items: center;">
										
										<!-- bootstrap pagination control -->
										<ul 
											 class="pagination pull-left jplist-pagination btn-group"
											 data-control-type="boot-pagination" 
											 data-control-name="paging" 
											 data-control-action="paging"
											 data-range="5"
											 data-mode="google-like">
										</ul>
									</div>
								</div>
							</div>

						</div> 
						<!-- End div demo -->

	                  
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
			,itemPath: '.list-item' 
			,panelPath: '.panel-jplist'	
            ,debug: true
            ,deepLinking: true
		});	



});




</script>

@endsection