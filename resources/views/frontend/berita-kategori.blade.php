<x-frontend-layout>
    <x-slot name="title">Kategori</x-slot>

    <section id="kategori" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry">
                        <h3 class="text-center">
                            Kategori {{ $kategori->nama }}
                        </h3>
                    </article>

                    @foreach ($artikels as $artikel)
                        <article class="entry">
                            <h2 class="entry-title">
                                <a href="{{ route('berita.show', ['slug' => $artikel->slug]) }}">
                                    {{ $artikel->judul }}
                                </a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-person"></i>
                                        <a href="" style="pointer-events: none">
                                            {{ $artikel->user->name }}
                                        </a>
                                    </li>

                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-clock"></i>
                                        <a href="" style="pointer-events: none">
                                            {{ $artikel->created_at->diffForHumans() }}
                                        </a>
                                    </li>

                                </ul>
                                <span><small>{{ $artikel->kategori->nama }}</small></span>
                            </div>

                            <div class="entry-content">
                                <p style="text-align: justify">
                                    {!! strip_tags(Str::limit($artikel->isi, 600, '...')) !!}
                                </p>
                                <div class="read-more">
                                    <a href="{{ route('berita.show', ['slug' => $artikel->slug]) }}">Read More</a>
                                </div>
                            </div>

                        </article>
                    @endforeach


                    <div class="blog-pagination">
                        {{ $artikels->links() }}
                    </div>

                </div>

                <!--sidebar-->
                <div class="col-lg-4">

                    <div class="sidebar">
                        <h3 class="sidebar-title">Kategori</h3>
                        <div class="">
                            <ul>
                                @foreach ($kategoris as $kategori)
                                    <li><a href="{{ route('kategori', $kategori->slug) }}">{{ $kategori->nama }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <h3 class="sidebar-title mt-5">Perangkat Gampong</h3>
                        <div class="testimonials">
                            <div class="testimonials-carousel swiper mt-3">
                                <div class="swiper-wrapper">

                                    @foreach ($perangkats as $perangkat)
                                        <div class="testimonial-item swiper-slide">
                                            <img src="{{ asset('storage/' . $perangkat->photo_path) }}"
                                                class="testimonial-img" alt=""
                                                style="width: 100px; height: 100px; overflow: hidden;">
                                            <h3>{{ $perangkat->nama }}</h3>
                                            <h4>{{ $perangkat->jabatan }}</h4>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-pagination"></div>

                            </div>
                        </div>

                        <h3 class="sidebar-title ">Kontak Kami</h3>
                        <div class="">
                            <a href="{!! $gampong->whatsapp !!}" target="_blank">Whatsapp</a> <br>
                            <a href="{!! $gampong->facebook !!}" target="_blank">Facebook</a> <br>
                            <a href="{!! $gampong->instagram !!}" target="_blank">Instagram</a> <br>
                            <a href="{!! $gampong->twitter !!}" target="_blank">Twitter</a> <br>
                        </div>

                        <h3 class="sidebar-title mt-5">Map</h3>
                        <div class="">
                            {!! $gampong->map !!}
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

</x-frontend-layout>
