<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Atonergi</title>
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('assets/node_modules/jquery-bar-rating/dist/themes/css-stars.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/node_modules/select2/dist/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/select2-bootstrap-theme/dist/select2-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/node_modules/icheck/skins/all.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('assets/node_modules/jquery-toast-plugin/dist/jquery.toast.min.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('assets/node_modules/font-awesome/css/font-awesome.min.css')}}" />
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" />
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/data-table.min.css')}}"> -->

  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/datepicker/css/bootstrap-datepicker3.min.css')}}"> -->
  {{-- TOASTR --}}
  <link rel="stylesheet" href="{{asset('node_modules/izitoast/dist/css/iziToast.min.css')}}">
  <link rel="stylesheet" href="{{asset('node_modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css')}}" />

<style type="text/css">

td > div.form-check.form-check-flat > label.form-check-label {
  margin-bottom: -25px;
}
.modal {
  overflow-y:auto;
}
.pilih-link:hover{
  transition: 0.3s;
  -webkit-transition: 0.3s;
  background-color: rgba(0,0,0,0.2);
  border-radius: 3px;
}
.huruf_besar{
  text-transform: uppercase;
}
.disabled{
  pointer-events: none;
  opacity: 0.7;
}
.center{
  text-align: center;
}

.right{
  text-align: right;
}
.left{
  text-align: left;
}

.file-upload{display:block;text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
.file-upload .file-select{display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select .file-select-button{background:#dce4ec;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
.file-upload .file-select:hover{border-color:#34495e;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select:hover .file-select-button{background:#34495e;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select{border-color:#3fa46a;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select .file-select-button{background:#3fa46a;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select input[type=file]{z-index:100;cursor:pointer;position:absolute;height:100%;width:100%;top:0;left:0;opacity:0;filter:alpha(opacity=0);}
.file-upload .file-select.file-select-disabled{opacity:0.65;}
.file-upload .file-select.file-select-disabled:hover{cursor:default;display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;margin-top:5px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select.file-select-disabled:hover .file-select-button{background:#dce4ec;color:#666666;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select.file-select-disabled:hover .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
</style>
</head>