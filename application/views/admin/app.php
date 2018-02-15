<!DOCTYPE html>
<html>

@include('layouts.admin.header')
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.admin.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.admin.topnavbar')
            @include('layouts.admin.breadcrumb')
            
            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.admin.bodyfooter')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->
@include('layouts.admin.footer')

</body>
</html>
