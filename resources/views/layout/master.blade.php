<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<head>
    @include('layout.head')
</head>
<!-- End Head -->

<body>
    <!-- Main -->
    <main class="main-wrapper">
        <!-- Header section -->
        <div class="container-fluid head-foot-bg sticky-top">
            @include('layout.menu')
        </div>
        <!-- End header section -->

        <!-- Content -->
            @yield('dyncontent')
        <!-- End Content -->

        <!-- Footer Section-->
        <footer class="head-foot-bg py-4">
            @include('layout.footer')
        </footer>

        <!-- End Footer section -->
    </main>

    <!-- Search -->
    {{-- <script src="assets/js/search.js"></script> --}}

</body>

</html>
