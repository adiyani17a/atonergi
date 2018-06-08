
@extends('main')

@section('extra_style')
<!-- <link rel="stylesheet" href="{{asset('assets/bower_components/lightgallery/dist/css/lightgallery.min.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/lightgallery/css/lightgallery.min.css')}}">
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

					<div id="lightgallery" class="row lightGallery">
						<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/1.jpg')}}">
						  <img src="{{asset('assets/images/samples/300x300/1.jpg')}}"  />
						</a>
						<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/2.jpg')}}">
						  <img src="{{asset('assets/images/samples/300x300/2.jpg')}}"  />
						</a>
						<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/3.jpg')}}">
						  <img src="{{asset('assets/images/samples/300x300/3.jpg')}}"  />
						</a>
						<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/4.jpg')}}">
						  <img src="{{asset('assets/images/samples/300x300/4.jpg')}}"  />
						</a>
						<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/5.jpg')}}">
						  <img src="{{asset('assets/images/samples/300x300/5.jpg')}}"  />
						</a>
						<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/6.jpg')}}">
						  <img src="{{asset('assets/images/samples/300x300/6.jpg')}}"  />
						</a>
						<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/7.jpg')}}">
						  <img src="{{asset('assets/images/samples/300x300/7.jpg')}}"  />
						</a>
						<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/8.jpg')}}">
						  <img src="{{asset('assets/images/samples/300x300/8.jpg')}}"  />
						</a>
						<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/9.jpg')}}">
						  <img src="{{asset('assets/images/samples/300x300/9.jpg')}}"  />
						</a>
						<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/10.jpg')}}">
						  <img src="{{asset('assets/images/samples/300x300/10.jpg')}}"  />
						</a>
						<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/11.jpg')}}">
						  <img src="{{asset('assets/images/samples/300x300/11.jpg')}}"  />
						</a>
						<a alt="image large" class="image-tile col-xl-3 col-lg-3 col-md-3 col-md-4 col-6" href="{{asset('assets/images/samples/1280x768/12.jpg')}}">
						  <img src="{{asset('assets/images/samples/300x300/12.jpg')}}"  />
						</a>
					</div>
	                  
	                </div>
	            </div>
	    </div>
	</div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')
<!-- <script src="{{asset('assets/bower_components/lightgallery/dist/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('assets/js/light-gallery.js')}}"></script> -->
<script src="{{asset('assets/lightgallery/js/lightgallery-all.min.js')}}"></script>
<script>
	$(document).ready(function(){
		$("#lightgallery").lightGallery();
	});
</script>
@endsection