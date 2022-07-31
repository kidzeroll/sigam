<script src="{{ asset('frontend/assets/vendor/purecounter/purecounter.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('backend/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('backend/assets/bundles/izitoast/js/iziToast.min.js') }}"></script>



<!-- Template Main JS File -->
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

<!-- iziToast -->
<script>
    @if (Session('error'))
        iziToast.error({
            message: '{{ session('error') }}',
            position: 'topRight'
        });
    @endif
</script>

<script>
    @if (Session('success'))
        iziToast.success({
            message: '{{ session('success') }}',
            position: 'topRight'
        });
    @endif
</script>
