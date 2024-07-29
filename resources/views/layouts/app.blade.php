<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{!empty($header_title) ?$header_title: '' }}. School </title>      
  
 

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('css&js/allcss.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css&js/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('css&js/all2css.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('css&js/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('css&js/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('css&js/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css&js/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('css&js/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('css&js/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('css&js/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @yield('style')
 @include('layouts.header')
  @yield('content')
   
  @include('layouts.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('css&js/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('css&js/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('css&js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('css&js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('css&js/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('css&js/jquery.vmap.min.js')}}"></script>
<script src="{{asset('css&js/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('css&js/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('css&js/moment.min.js')}}"></script>
<script src="{{asset('css&js/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('css&js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('css&js/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('css&js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('css&js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('css&js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('css&js/dashboard.js')}}"></script>
@yield('script')
</body>
</html>
