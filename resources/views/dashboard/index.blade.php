@include('dashboard.layouts.header')
@include('dashboard.layouts.nav')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @include('dashboard.layouts.massege')
    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@include('dashboard.layouts.footer')
