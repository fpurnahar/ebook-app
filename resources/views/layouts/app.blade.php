<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/fontawesome-free/css/all.min.css">
    <!-- pace-progress -->
    <link rel="stylesheet" href="{{ asset('') }}plugins/pace-progress/themes/black/pace-theme-flat-top.css">
    <!-- adminlte-->
    <link rel="stylesheet" href="{{ asset('') }}dist/css/adminlte.min.css">

    @yield('style')

</head>

<body class="hold-transition sidebar-mini pace-primary">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.components.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.components.main-menu')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('layouts.components.content-header')
            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                @yield('content')
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('') }}plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- pace-progress -->
    <script src="{{ asset('') }}plugins/pace-progress/pace.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('') }}dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('') }}dist/js/demo.js"></script> --}}

    @yield('script')
</body>

</html>
