<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="apple-touch-icon" sizes="180x180" href="https://laravel.com/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="https://laravel.com/img/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="https://laravel.com/img/favicon/favicon-16x16.png">

  <title>Laravel Contact System | @yield('title')</title>

  <!-- Custom fonts for this template-->
  <link href="{{ url('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ url('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

  {{-- Page level custom style --}}
  @yield('custom_css')

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    {{-- Sidebar --}}
    @if(auth()->user()->role()->name == 'admin')
      @include('admin.layouts.sidebar')
    @else
      @include('user.layouts.sidebar')
    @endif
  
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        {{-- Topbar --}}
        @include('user.layouts.topbar')
        {{-- Page content --}}
        @yield('content')
      </div>
      <!-- End of Main Content -->
      {{-- Footer --}}
      @if(auth()->user()->role()->name == 'admin')
        @include('admin.layouts.footer')
      @else
        @include('user.layouts.footer')
      @endif
      
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
  </a>

  {{-- Modal Logout --}}
  @include('shared.modals.logout')

  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('assets/js/sb-admin-2.min.js') }}"></script>

  <script>
    $(document).ready(function(){
      // Enable tooltips everywhere
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
  {{-- Page level for custom js & plugins --}}
  @yield('custom_js_plugin')
  
</body>

</html>
