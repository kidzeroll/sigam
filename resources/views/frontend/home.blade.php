<x-frontend-layout>
    <x-slot name="title">Home</x-slot>

    <x-slot name="hero">
        <x-frontend.hero />
    </x-slot>


    @if ($artikel->count() >= 3)
        <section id="berita" data-aos="fade-up" date-aos-delay="200">
            <div class="container">

                <div class="row">
                    <div class="col-12 entries">
                        <article class="entry">
                            <h2 class="entry-title">
                                <a href="{{ route('berita.show', ['slug' => $artikel[0]->slug]) }}">
                                    {{ $artikel[0]->judul }}
                                </a>
                            </h2>

                            <div class="entry-meta">
                                <ul class="list-group list-group-horizontal">
                                    <li class="d-flex align-items-center" style="margin-right: 10px">
                                        <i class="bi bi-person"></i>
                                        <a href="" style="pointer-events: none">
                                            {{ $artikel[0]->user->name }}
                                        </a>
                                    </li>

                                    <li class="d-flex align-items-center ">
                                        <i class="bi bi-clock"></i>
                                        <a href="" style="pointer-events: none">
                                            {{ $artikel[0]->created_at->diffForHumans() }}
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p style="text-align: justify">
                                    {!! strip_tags(Str::limit($artikel[0]->isi, 600, '...')) !!}
                                </p>
                            </div>

                        </article>

                        <article class="entry">
                            <h2 class="entry-title">
                                <a href="{{ route('berita.show', ['slug' => $artikel[1]->slug]) }}">
                                    {{ $artikel[1]->judul }}
                                </a>
                            </h2>

                            <div class="entry-meta">
                                <ul class="list-group list-group-horizontal">
                                    <li class="d-flex align-items-center" style="margin-right: 10px">
                                        <i class="bi bi-person"></i>
                                        <a href="" style="pointer-events: none">
                                            {{ $artikel[1]->user->name }}
                                        </a>
                                    </li>

                                    <li class="d-flex align-items-center ">
                                        <i class="bi bi-clock"></i>
                                        <a href="" style="pointer-events: none">
                                            {{ $artikel[1]->created_at->diffForHumans() }}
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p style="text-align: justify">
                                    {!! strip_tags(Str::limit($artikel[1]->isi, 600, '...')) !!}
                                </p>
                            </div>

                        </article>

                        <article class="entry">
                            <h2 class="entry-title">
                                <a href="{{ route('berita.show', ['slug' => $artikel[2]->slug]) }}">
                                    {{ $artikel[2]->judul }}
                                </a>
                            </h2>

                            <div class="entry-meta">
                                <ul class="list-group list-group-horizontal">
                                    <li class="d-flex align-items-center" style="margin-right: 10px">
                                        <i class="bi bi-person"></i>
                                        <a href="" style="pointer-events: none">
                                            {{ $artikel[2]->user->name }}
                                        </a>
                                    </li>

                                    <li class="d-flex align-items-center ">
                                        <i class="bi bi-clock"></i>
                                        <a href="" style="pointer-events: none">
                                            {{ $artikel[2]->created_at->diffForHumans() }}
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p style="text-align: justify">
                                    {!! strip_tags(Str::limit($artikel[2]->isi, 600, '...')) !!}
                                </p>
                            </div>

                        </article>

                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <a href="{{ route('berita') }}" class="btn btn-primary">Lihat lebih banyak</a>
                    </div>
                </div>

            </div>

        </section>
    @endif

    @if ($galeris->isNotEmpty())
        <section id="galeri" class="section-bg" data-aos="fade-up" date-aos-delay="200">

            <div class="container">

                <div class="row">
                    @foreach ($galeris as $galeri)
                        <div class="col-md-3 col-12 mb-5">
                            <div class="card p-1 shadow">
                                <img src="{{ asset('storage/' . $galeri->photo_path) }}" alt="" width="100%"
                                    height="200px">
                                <p class="text-center">{{ $galeri->deskripsi }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <a href="{{ route('foto') }}" class="btn btn-primary">Lihat lebih banyak</a>
                    </div>
                </div>

            </div>

        </section>
    @endif


</x-frontend-layout>
