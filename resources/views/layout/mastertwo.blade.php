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
        <div class="container-fluid bg-light sticky-top">
            @include('layout.menutwo')
        </div>
        <!-- End header section -->

        <!-- Content -->
            @yield('dyncontent')
        <!-- End Content -->

        <!-- Footer Section-->
        <footer class="bg-light py-4">
            @include('layout.footer')
        </footer>

        <!-- End Footer section -->
    </main>

</body>

</html>
