<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- title -->
    <title>{{ config('app.name') }} - Login</title>

    <!-- css -->
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/bundles/izitoast/css/iziToast.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">

    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/custom.css') }}">

    <!-- icon -->
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('storage/' . $gampong->logo_path) }}' />

</head>

<body>
    <div id="app">
        <section class="section">

            <!-- content -->
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <x-card label="Login" class="card-primary">
                            <form action="{{ route('login.action') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="{{ old('password') }}">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>

                                <a href="{{ route('home') }}" class="btn btn-danger btn-block">Kembali</a>

                            </form>
                        </x-card>

                    </div>
                </div>
            </div>

        </section>
    </div>

    <!-- js -->
    <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

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

</body>

</html>
