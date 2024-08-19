<!DOCTYPE html>
<html lang="en">

@include('home.layouts.header')

<body>
    @include('home.layouts.navbar')

        @yield('container')

    {{-- @include('home.layouts.footer') --}}

    {{-- Arrow Back to Up --}}
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    {{-- End of Arrow Back to Up --}}
</body>

<!-- Vendor JS Files -->
<script src={{ secure_asset("assets/vendor/aos/aos.js")}}></script>
<script src={{ secure_asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")}}></script>
<script src={{ secure_asset("assets/vendor/glightbox/js/glightbox.min.js")}}></script>
<script src={{ secure_asset("assets/vendor/isotope-layout/isotope.pkgd.min.js")}}></script>
<script src={{ secure_asset("assets/vendor/swiper/swiper-bundle.min.js")}}></script>
<script src={{ secure_asset("assets/vendor/waypoints/noframework.waypoints.js")}}></script>
<script src={{ secure_asset("assets/vendor/php-email-form/validate.js")}}></script>

<!-- Template Main JS File -->
<script src={{ secure_asset("assets/js/main.js")}}></script>

</html>
