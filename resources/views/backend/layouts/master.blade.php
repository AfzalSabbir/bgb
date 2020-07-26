<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Demo | Admin</title>
  <meta name="description" content="Demo | Demo Admin">
  <meta name="author" content="Demo Web Development - https://domain">

  @include('backend.partials.styles')

  @yield('styles')

</head>

<body class="adminbody">

  <div id="main">

    <!-- top bar navigation -->
    @include('backend.partials.nav')
    <!-- End Navigation -->


    <!-- Left Sidebar -->
      @include('backend.partials.sidebar')
    <!-- End Sidebar -->


    <div class="content-page">

      <!-- Start content -->
      <div class="content">

        <div class="container-fluid">

          @section('content')
          @show


        </div>
        <!-- END container-fluid -->

      </div>
      <!-- END content -->

    </div>
    <!-- END content-page -->

  @include('backend.partials.footer')

  </div>
  <!-- END main -->

  @include('backend.partials.scripts')

  @yield('scripts')

</body>
</html>
