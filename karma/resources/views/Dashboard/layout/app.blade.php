<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Starter</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{ asset('dashboard/plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('dashboard/dist/css/adminlte.min.css') }}>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!--Toastr-->
    <link rel="stylesheet" href="{{asset('dashboard/plugins/toastr/toastr.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
     @include('Dashboard.layout.Partial.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('Dashboard.layout.Partial.Sidebar',['name'=>'Yaqoot'])
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src={{asset('dashboard/plugins/jquery/jquery.min.js')}}></script>
    <!-- Bootstrap 4 -->
    <script src={{asset('dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}></script>
    <!-- AdminLTE App -->
    <script src={{asset('dashboard/dist/js/adminlte.min.js')}}></script>
    <!--Toastr-->
    <script src="{{asset('dashboard/plugins/toastr/toastr.min.js')}}"></script>

    <script>

@if(session()->has('success'))
toastr.success("{{session('success')}}")

@endif
@if(session()->has('error'))
toastr.error();("{{session('success')}}")

@endif


   </script>
</body>

</html>
