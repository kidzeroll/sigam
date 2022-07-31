<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - {{ $title }}</title>

    <!-- css -->
    <x-frontend.css />

    <!-- style-->
    @stack('style')

</head>

<body>

    <!--header-->
    <x-frontend.header />

    <!--hero-->
    @isset($hero)
        {{ $hero }}
    @endisset

    <main id="main">

        {{ $slot }}

    </main>

    <!--footer-->
    <x-frontend.footer />

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!--js-->
    <x-frontend.js />

    <!-- script -->
    @stack('script')

</body>

</html>
