<x-frontend-layout>
    <x-slot name="title">Galeri Foto</x-slot>

    @push('style')
        <style>
            @media screen and (max-width: 520px) {

                li.page-item {

                    display: none;
                }

                .page-item:first-child,
                .page-item:last-child,
                .page-item.active {

                    display: block;
                }
            }
        </style>
    @endpush

    <section class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-12">
                    <div class="row" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

                        @foreach ($galeris as $galeri)
                            <div class="col-md-3 col-12 mb-5">
                                <div class="card p-1 shadow">
                                    <a href="{{ asset('storage/' . $galeri->photo_path) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $galeri->photo_path) }}" alt=""
                                            width="100%" height="200px">
                                        <p class="text-center">{{ $galeri->deskripsi }}</p>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                        <div class="blog-pagination">
                            {{ $galeris->links() }}
                        </div>
                    </div>
                </div>

                <!--sidebar-->

                <div class="col-md-2 col-12">
                    <div class="row" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
                        <div class="card shadow">
                            <div class="card-header bg-white">
                                <h5>Tahun Upload</h4>
                            </div>
                            <div class="card-body">
                                <ul>
                                    @foreach ($archives as $stats)
                                        <li>
                                            <a href="{{ route('foto') }}/?tahun={{ $stats['tahun'] }}">
                                                {{ $stats['tahun'] }}
                                            </a>
                                            <span>
                                                ({{ $stats['total'] }})
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>

</x-frontend-layout>
