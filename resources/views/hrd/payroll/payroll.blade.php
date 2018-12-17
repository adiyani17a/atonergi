@extends('main')
@section('content')

@include('hrd/payroll/tambah_payroll_manajemen')
@include('hrd/payroll/edit_payroll_manajemen')
@include('hrd/payroll/tambah_payroll_tunjangan')
@include('hrd/payroll/edit_payroll_tunjangan')
@include('hrd/payroll/tambah_payroll_produksi')
@include('hrd/payroll/edit_payroll_produksi')
<!-- partial -->
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">	
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb bg-info">
					<li class="breadcrumb-item"><i class="fa fa-home"></i>&nbsp;<a href="#">Home</a></li>
					<li class="breadcrumb-item">HRD</li>
					<li class="breadcrumb-item active" aria-current="page">Payroll</li>
				</ol>
			</nav>
		</div>

		<div class="col-lg-12 alamraya-row-nav">
			<ul class="nav nav-tabs tab-solid tab-solid-primary alamraya-navtab" role="tablist">
		        <li class="nav-item">
		          <a class="nav-link active" id="tab-6-1" data-toggle="tab" href="#pmanagerial" role="tab" aria-controls="pmanagerial" aria-selected="true"><i class="mdi mdi-folder-account"></i>Managerial</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link " id="tab-6-2" data-toggle="tab" href="#pstaff" role="tab" aria-controls="pstaff" aria-selected="true"><i class="mdi mdi-coin"></i>Staff</a>
		        </li>
		    </ul>

			<div class="tab-content tab-content-solid col-lg-12">

				@include('hrd.payroll.tab_managerial')

				@include('hrd.payroll.tab_staff')


			</div>
		</div>
	</div>
</div>
<!-- content-wrapper ends -->
@endsection
@section('extra_script')

<script type="text/javascript">
	
	function hapus(){
	// function hapus(parm){
    // var par   = $(parm).parents('tr');
    // var id    = $(par).find('.d_id').text();

    iziToast.show({
            overlay: true,
            close: false,
            timeout: 20000, 
            color: 'dark',
            icon: 'fas fa-question-circle',
            title: 'Important!',
            message: 'Apakah Anda Yakin ?',
            position: 'center',
            progressBarColor: 'rgb(240, 0, 0)',
            buttons: [
              [
                '<button style="background: rgb(190, 0, 0); color: white;" onclick="success()">Delete</button>',
                function (instance, toast) {

                  // $.ajax({
                  //  type: "get",
                  //    url: baseUrl + '/hrd/data_lembur/hapus_data_lembur',
                  //    data: {id},
                  //    success: function(data){
                  //     console.log(data);
                  //     var table = $('#table-data-lembur').DataTable();
                  //     table.ajax.reload();
                      
                     
                  //    },
                  //    error: function(){
                  //     iziToast.warning({
                  //       icon: 'fa fa-times',
                  //       message: 'Terjadi Kesalahan!',
                  //     });
                  //    },
                  //    async: false
                  //  });
                 
                }
              ],
              [
                '<button class="btn btn-info">Cancel</button>',
                function (instance, toast) {
                  instance.hide({
                    transitionOut: 'fadeOutUp'
                  }, toast);
                }
              ]
            ]
          });


  }

  function success(){

  	iziToast.success({
	    title: 'OK',
	    message: 'Successfully deleted record!',
	});

  }

</script>

<script type="text/javascript">
	
	function samakan() {
	  var jum = $('#jumlah').val();
	  console.log(jum);
	  $('#sd').val(jum);
	  $('#smp').val(jum);
	  $('#sma').val(jum);
	  $('#smk').val(jum);
	  $('#d1').val(jum);
	  $('#d2').val(jum);
	  $('#d3').val(jum);
	  $('#s1').val(jum);
	}
            
          
</script>

<script type="text/javascript">
	
  $(function() {
    $('.currency').maskMoney(
    	{
    		prefix:'RP. ',
    		allowZero: true,
    		allowNegative: true, 
    		thousands:'.', 
    		decimal:',', 
    		affixesStay: false
    	}
    );
  })

</script>

@endsection