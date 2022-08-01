<x-frontend-layout>
    <x-slot name="title">Profil Gampong</x-slot>


    <section class="profil" id="profil" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">
            <div class="card shadow">
                <div class="card-header">
                    <h5>Profil Gampong</h5>
                </div>
                <div class="card-body">
                    <p class="align-justify">
                        Gampong {{ $gampong->nama_gampong }} dipimpin oleh <b>{{ $gampong->nama_keuchik }}</b> merupakan
                        salah satu gampong yang berada di Kecamatan {{ $gampong->nama_kecamatan }} Kabupaten
                        {{ $gampong->nama_kabupaten }} Provinsi {{ $gampong->nama_provinsi }} dengan jumlah penduduk
                        sebanyak <b>{{ $total }}</b> Orang yang rata-rata mata pencahariannya berupa Petani,
                        Pegawai Negeri Sipil, Pegawai Swasta, Pengusaha dan lain sebagainya.
                    </p>

                    <p class="align-justify mt-3">
                    <h5 class="text-bold">Dusun</h5>
                    @foreach ($dusuns as $dusun)
                        - {{ $dusun->nama }} <br>
                    @endforeach

                    </p>

                    <p class="align-justify mt-3">
                    <h5 class="text-bold">Fasilitas Umum</h5>
                    Gampong {{ $gampong->nama_gampong }} saat ini memiliki fasilitas umum berupa : <br>
                    - Meunasah <br>
                    - Gedung Serba Guna <br>
                    - Tanah Kuburan Umum, Tanah kebun dan Tanah Sawah <br>
                    - Taman bermain
                    </p>

                    <p class="align-justify mt-3">
                    <h5 class="text-bold">Kegiatan</h5>
                    Masyarakat Gampong {{ $gampong->nama_gampong }} setiap tahunnya melakukan kegiatan berupa : <br>
                    - Gotong Royong menjelang Bulan Ramadhan <br>
                    - Malaksanakan Qurban Kelompok <br>
                    - Malaksanakan Kenduri Maulid Nabi Muhammad saw <br>
                    - Malaksanakan Kenduri Buka Puasa Bersama
                    </p>

                    <hr class="bg-primary mt-5">

                    <div class="testimonials">
                        <u>
                            <b>
                                <h3 class="text-center">Perangkat Gampong</h5>
                            </b>
                        </u>

                        <div class="testimonials-carousel swiper mt-5">
                            <div class="swiper-wrapper">

                                @foreach ($perangkats as $perangkat)
                                    <div class="testimonial-item swiper-slide">
                                        <img src="{{ asset('storage/' . $perangkat->photo_path) }}"
                                            class="testimonial-img" alt=""
                                            style="width: 200px; height: 200px; overflow: hidden;">
                                        <h3>{{ $perangkat->nama }}</h3>
                                        <h4>{{ $perangkat->jabatan }}</h4>
                                        <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            {{ $perangkat->alamat }}
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
