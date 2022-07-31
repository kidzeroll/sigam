<x-backend-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="row ">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
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
                                    <img src="{{ asset('backend/assets/img/banner/1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
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
                                    <img src="{{ asset('backend/assets/img/banner/2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
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
                                    <img src="{{ asset('backend/assets/img/banner/3.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
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
                                    <img src="{{ asset('backend/assets/img/banner/4.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card col-12">
            <div class="card-header">
                <h4>Grafik Total Request Administrasi Surat Perbulan</h4>
            </div>

            <div class="card-body">
                <canvas id="surat-chart"></canvas>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            const ctx = document.getElementById('surat-chart').getContext('2d');

            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'
                    ],
                    datasets: [{
                            label: 'SKKM',
                            data: {{ json_encode($chart['SKKM']) }},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'red'
                        },
                        {
                            label: 'SKBM',
                            data: {{ json_encode($chart['SKBM']) }},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'green'
                        },
                        {
                            label: 'SKBB',
                            data: {{ json_encode($chart['SKBB']) }},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'blue'
                        },
                        {
                            label: 'SKP',
                            data: {{ json_encode($chart['SKP']) }},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'yellow'
                        },
                        {
                            label: 'SKU',
                            data: {{ json_encode($chart['SKU']) }},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'black'
                        },
                        {
                            label: 'SKD',
                            data: {{ json_encode($chart['SKD']) }},
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'brown'
                        },
                        {
                            label: 'SKK',
                            data: {{ json_encode($chart['SKK']) }},
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
    @endpush
</x-backend-layout>
