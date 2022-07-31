<header id="header" class="fixed-top d-flex align-items-center {{ request()->is('/') ? 'header-transparent' : '' }}">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <h1 class="text-light"><a href="{{ route('home') }}"><span>{{ config('app.name') }}</span></a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <!--home-->
                <li>
                    <a class="{{ request()->is('/') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>

                <!--berita-->
                <li><a href="#">Berita</a></li>

                <!--galeri-->
                <li><a href="#">Galeri Foto</a></li>

                <!--profil gampong-->
                <li>
                    <a href="{{ route('frontend.profil') }}">Profil Gampong</a>
                </li>

                <!--pengaduan-->
                <li><a href="{{ route('pengaduan.create') }}">Pengaduan</a></li>

                <!--administrasi surat-->
                <li class="dropdown">
                    <a {{ request()->is('administrasi-surat*') ? 'active' : '' }} href="#"><span>Administrasi
                            Surat</span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a href="{{ route('skkm') }}">Surat Keterangan Kurang Mampu</a></li>
                        <li><a href="{{ route('skbb') }}">Surat Keterangan Berkelakuan Baik</a></li>
                        <li><a href="{{ route('skbm') }}">Surat Keterangan Belum Menikah</a></li>
                        <li><a href="{{ route('skp') }}">Surat Keterangan Pindah</a></li>
                        <li><a href="{{ route('sku') }}">Surat Keterangan Usaha</a></li>
                        <li><a href="{{ route('skd') }}">Surat Keterangan Domisili</a></li>
                        <li><a href="{{ route('skk') }}">Surat Keterangan Kematian</a></li>
                    </ul>
                </li>


                <!--login-->
                <li>
                    <a href="{{ route('login') }}">Login</a>
                </li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
