 <!-- plugins:js -->
  <script src="{{asset('assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/select2/dist/js/select2.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{asset('assets/node_modules/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{asset('assets/node_modules/chart.js/dist/Chart.min.js')}}"></script>

  <script src="{{asset('assets/bower_components/typeahead.js/dist/typeahead.bundle.min.js')}}" tppabs="http://www.bootstrapdash.com/demo/purple/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>
  <script src="{{asset('assets/bower_components/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js')}}"></script>
  <script src="{{asset('assets/node_modules/datatables.net/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('assets/bower_components/switchery/dist/switchery.min.js')}}"></script>
  <!-- End plugin js for  page-->
  <!-- injectjs -->

  <script src="{{asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/js/misc.js')}}"></script>
  <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/js/settings.js')}}" tppabs="http://www.bootstrapdash.com/demo/purple/js/settings.js"></script>
  <script src="{{asset('assets/js/todolist.js')}}" tppabs="http://www.bootstrapdash.com/demo/purple/js/todolist.js"></script>
  <script src="{{asset('assets/js/tabs.js')}}"></script>
  <script src="{{asset('assets/js/select2.js')}}"></script>
  <script src="{{asset('assets/js/file-upload.js')}}"></script>
  <!-- <script src="{{asset('assets/datepicker/js/bootstrap-datepicker.min.js')}}"></script> -->

  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('assets/js/dashboard.js')}}"></script>
  <!-- End custom js for this page-->

  <script src="{{asset('assets/js/data-table.js')}}"></script>
  {{-- toastr --}}
  <script rel="stylesheet" src="{{asset('node_modules/izitoast/dist/js/iziToast.min.js')}}"></script>

  <script type="text/javascript">
  iziToast.settings({
    timeout: 3000,
    icon: 'material-icons',
    transitionIn: 'flipInX',
    transitionOut: 'flipOutX',
    closeOnClick: true,
    position:'topRight'
  });
  $(document).ready(function(){
    $("input[type='number']").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

    var datepicker = $('.datepicker').datepicker({
      format:"dd-mm-yyyy"
    });

    $('select').select2({ 
      width: '100%' 
    });
    $('.data-table').dataTable({
          //"responsive":true,

          "pageLength": 10,
        "lengthMenu": [[10, 20, 50, - 1], [10, 20, 50, "All"]],
        "language": {
            "searchPlaceholder": "Search",
            // "emptyTable": "Tidak ada data",
            // "sInfo": "Menampilkan _START_ - _END_ Dari _TOTAL_ Data",
            "sSearch": '<i class="fa fa-search"></i>'
            // "sLengthMenu": "Menampilkan &nbsp; _MENU_ &nbsp; Data",
            // "infoEmpty": "",
            // "paginate": {
            //         "previous": "Sebelumnya",
            //         "next": "Selanjutnya",
            //      }
          }

        });
  });
  var t ;
  var baseUrl = '{{ url('/') }}';
  // var regex_huruf = replace(/[A-Za-z$. ,-]/g, "");
  // var regex_angka = replace(/[^0-9\-]+/g,"");

</script>