<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - {{ $title }}</title>

    <!-- css -->
    <x-backend.css />

    <!-- style-->
    @stack('style')

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            <!-- navbar -->
            <x-backend.navbar />

            <!-- sidebar -->
            <x-backend.sidebar />

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">

                        {{ $slot }}

                    </div>
                </section>

                <!-- modal -->
                @stack('modal')

            </div>

            <!-- footer -->
            <x-backend.footer />

        </div>
    </div>

    <!-- js -->
    <x-backend.js />

    <!-- script -->
    @stack('script')

</body>

</html>
