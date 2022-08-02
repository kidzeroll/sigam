<x-backend-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="row ">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card card-primary">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Penduduk</h5>
                                    <h2 class="mb-3 font-18">{{ $penduduk }}</h2>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('img/penduduk.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card card-primary">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Laki-Laki</h5>
                                    <h2 class="mb-3 font-18">{{ $cowo }}</h2>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('img/cowo.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card card-primary">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Perempuan</h5>
                                    <h2 class="mb-3 font-18">{{ $cewe }}</h2>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('img/cewe.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card card-primary">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Artikel</h5>
                                    <h2 class="mb-3 font-18">{{ $artikel }}</h2>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('img/artikel.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card card-primary">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Surat Masuk</h5>
                                    <h2 class="mb-3 font-18">{{ $suratMasuk }}</h2>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('img/surat-masuk.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card card-primary">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Surat Keluar</h5>
                                    <h2 class="mb-3 font-18">{{ $suratKeluar }}</h2>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('img/surat-keluar.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card card-primary">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">User</h5>
                                    <h2 class="mb-3 font-18">{{ $user }}</h2>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('img/user.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card card-primary">
                <div class="card-statistic-4">
                    <div class="align-items-center justify-content-between">
                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                <div class="card-content">
                                    <h5 class="font-15">Galeri Foto</h5>
                                    <h2 class="mb-3 font-18">{{ $foto }}</h2>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                <div class="banner-img">
                                    <img src="{{ asset('img/galeri.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Grafik Total Kelahiran dan Kematian</h4>
                </div>

                <div class="card-body">
                    <canvas id="chart-kelahiran-kematian"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Grafik Total Perpindahan dan Kedatangan</h4>
                </div>

                <div class="card-body">
                    <canvas id="chart-pindah-datang"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Grafik Total Administrasi Surat</h4>
                </div>

                <div class="card-body">
                    <canvas id="chart-surat"></canvas>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            const ctx = document.getElementById('chart-surat').getContext('2d');

            const surat = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'
                    ],
                    datasets: [{
                            label: 'SKKM',
                            data: {!! json_encode($surat['SKKM']) !!},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'red'
                        },
                        {
                            label: 'SKBM',
                            data: {!! json_encode($surat['SKBM']) !!},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'green'
                        },
                        {
                            label: 'SKBB',
                            data: {!! json_encode($surat['SKBB']) !!},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'blue'
                        },
                        {
                            label: 'SKP',
                            data: {!! json_encode($surat['SKP']) !!},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'yellow'
                        },
                        {
                            label: 'SKU',
                            data: {!! json_encode($surat['SKU']) !!},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'black'
                        },
                        {
                            label: 'SKD',
                            data: {!! json_encode($surat['SKD']) !!},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'brown'
                        },
                        {
                            label: 'SKK',
                            data: {!! json_encode($surat['SKK']) !!},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'silver'
                        },

                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

        <script>
            const ctk = document.getElementById('chart-kelahiran-kematian').getContext('2d');

            const kelahiranKematian = new Chart(ctk, {
                type: 'line',
                data: {
                    labels: [
                        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'
                    ],
                    datasets: [{
                            label: 'Kelahiran',
                            data: {!! json_encode($cKelahiran) !!},
                            fill: false,
                            borderWidth: 1,
                            borderColor: '#393F5F'
                        },
                        {
                            label: 'Kematian',
                            data: {!! json_encode($cKematian) !!},
                            fill: false,
                            borderWidth: 1,
                            borderColor: '#E86D5E'
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>

        <script>
            const ctp = document.getElementById('chart-pindah-datang').getContext('2d');

            const pindahDatang = new Chart(ctp, {
                type: 'line',
                data: {
                    labels: [
                        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'
                    ],
                    datasets: [{
                            label: 'Perpindahan',
                            data: {!! json_encode($cPindah) !!},
                            fill: false,
                            borderWidth: 1,
                            borderColor: '#0D7377'
                        },
                        {
                            label: 'Kedatangan',
                            data: {!! json_encode($cDatang) !!},
                            fill: false,
                            borderWidth: 1,
                            borderColor: '#E19A1C'
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    @endpush
</x-backend-layout>
