
<!DOCTYPE html>
<html lang="en">
<head>
    @include('component.style')
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
    @include('component.navbar')

    @include('sweetalert::alert')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('component.sidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
    @include('component.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

    @include('component.script')

  
    
    @stack('addon-script')
    
    @stack('js')

    @if (session()->has('pesan'))
        <script>
            Swal.fire({
                icon: 'pesan',
                title: '{{ session('pesan') }}',
            })

        </script>
    @endif

</body>
</html>
