<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('admin/css/bootstrap-responsive.min.css')}}" />
<link rel="stylesheet" href="{{asset('admin/css/uniform.css')}}" />
<link rel="stylesheet" href="{{asset('admin/css/select2.css')}}" />
<link rel="stylesheet" href="{{asset('admin/css/matrix-style.css')}}" />
<link rel="stylesheet" href="{{asset('admin/css/matrix-media.css')}}" />
<link href="{{asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('admin/css/jquery.gritter.css')}}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="{{url('/admin/dashboard')}}">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->

@include('admin.adminLayout.admin_header')

<!--sidebar-menu-->

@include('admin.adminLayout.admin_sidebar')


<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> @yield('content-title')</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
@yield('dashboardContent')

<!--end-main-container-part-->

<!--Footer-part-->

@include('admin.adminLayout.admin_footer')

<!--end-Footer-part-->
<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.ui.custom.js')}}"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.uniform.js')}}"></script>
<script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/js/select2.min.js')}}"></script>
<script src="{{asset('admin/js/jquery.validate.js')}}"></script>
<script src="{{asset('admin/js/matrix.js')}}"></script>
<script src="{{asset('admin/js/matrix.form_validation.js')}}"></script>
<script src="{{asset('admin/js/matrix.popover.js')}}"></script>
<script src="{{asset('admin/js/matrix.tables.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

</body>
</html>
