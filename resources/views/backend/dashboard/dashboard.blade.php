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
                        'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Dec'
                    ],
                    datasets: [{
                            label: 'SKKM',
                            data: [1, 8, 7, 7, 0, 8, 4, 0, 2, 10, 7, 4],
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'red'
                        },
                        {
                            label: 'SKBM',
                            data: [5, 4, 5, 0, 0, 1, 7, 0, 12, 10, 7, 5],
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'green'
                        },
                        {
                            label: 'SKBB',
                            data: [1, 2, 3, 4, 0, 1, 7, 4, 9, 8, 2, 6],
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'blue'
                        },
                        {
                            label: 'SKP',
                            data: [10, 9, 9, 3, 2, 0, 6, 3, 2, 1, 4, 4],
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'yellow'
                        },
                        {
                            label: 'SKU',
                            data: [2, 5, 7, 8, 1, 5, 9, 2, 1, 4, 5, 0],
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'black'
                        },
                        {
                            label: 'SKD',
                            data: [5, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
                            fill: true,
                            borderWidth: 1,
                            borderColor: 'brown'
                        },
                        {
                            label: 'SKK',
                            data: [5, 1, 5, 6, 8, 1, 0, 4, 8, 0, 1, 2],
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
