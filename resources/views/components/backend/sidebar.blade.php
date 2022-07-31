 <div class="main-sidebar sidebar-style-2">
     <aside id="sidebar-wrapper">
         <div class="sidebar-brand">
             <a href="{{ route('dashboard') }}">
                 <img alt="image" src="{{ asset('storage/' . $gampong->logo_path) }}" class="header-logo" />
                 <span class="logo-name">{{ config('app.name') }}</span>
             </a>
         </div>

         <ul class="sidebar-menu">

             <li class="menu-header">Main</li>

             <!-- dashboard -->
             <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                 <a class="nav-link" href="{{ route('dashboard') }}">
                     <i class="fas fa-chart-pie"></i>
                     <span>Dashboard</span>
                 </a>
             </li>

             <!-- galeri -->
             <li class="{{ request()->is('galeri') ? 'active' : '' }}">
                 <a class="nav-link" href="{{ route('galeri.index') }}">
                     <i class="fas fa-images"></i>
                     <span>Galeri Foto</span>
                 </a>
             </li>

             <!-- arsip surat -->
             <li
                 class="dropdown {{ request()->is('surat-masuk*') ? 'active' : '' }} {{ request()->is('surat-keluar*') ? 'active' : '' }}">
                 <a href="#" class="menu-toggle nav-link has-dropdown">
                     <i class="fas fa-book"></i>
                     <span>Arsip Surat</span>
                 </a>
                 <ul class="dropdown-menu">
                     <li class="{{ request()->is('surat-masuk*') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('surat-masuk.index') }}">Surat Masuk</a>
                     </li>
                     <li class="{{ request()->is('surat-keluar*') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('surat-keluar.index') }}">Surat Keluar</a>
                     </li>
                 </ul>
             </li>

             <li class="menu-header">Artikel</li>

             <!--artikel-->
             <li class="{{ request()->is('artikel*') ? 'active' : '' }}">
                 <a class="nav-link" href="{{ route('artikel.index') }}">
                     <i class="fab fa-blogger"></i>
                     <span>Kelola Artikel</span>
                 </a>
             </li>

             <!--kategori-->
             <li class="{{ request()->is('kategori*') ? 'active' : '' }}">
                 <a class="nav-link" href="{{ route('kategori.index') }}">
                     <i class="fas fa-at"></i>
                     <span>Kelola Kategori</span>
                 </a>
             </li>

             <li class="menu-header">Pelayanan Masyarakat</li>

             <!--pengaduan-->
             <li class="{{ request()->is('pengaduan') ? 'active' : '' }}">
                 <a class="nav-link" href="{{ route('pengaduan.index') }}">
                     <i class="fas fa-bullhorn"></i>
                     <span>Pengaduan</span>
                 </a>
             </li>

             <!-- surat -->
             <li class="dropdown {{ request()->is('surat') ? 'active' : '' }}">
                 <a href="{{ route('surat.index') }}" class="nav-link">
                     <i class="fas fa-file-alt"></i>
                     <span>Administrasi Surat</span>
                 </a>
             </li>

             <li class="menu-header">Penduduk</li>

             <!-- mutasi penduduk -->
             <li
                 class="dropdown {{ request()->is('penduduk*') ? 'active' : '' }} {{ request()->is('pendatang*') ? 'active' : '' }} {{ request()->is('kelahiran*') ? 'active' : '' }} {{ request()->is('kematian*') ? 'active' : '' }} {{ request()->is('perpindahan*') ? 'active' : '' }}">
                 <a href="#" class="menu-toggle nav-link has-dropdown">
                     <i class="fas fa-users"></i>
                     <span>Mutasi Penduduk</span>
                 </a>
                 <ul class="dropdown-menu">
                     <!--penduduk-->
                     <li class="{{ request()->is('penduduk*') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('penduduk.index') }}">Penduduk</a>
                     </li>

                     <!--kematian-->
                     <li class="{{ request()->is('kematian*') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('kematian.index') }}">Kematian</a>
                     </li>

                     <!--kelahiran-->
                     <li class="{{ request()->is('kelahiran*') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('kelahiran.index') }}">Kelahiran</a>
                     </li>

                     <!--perpindahan-->
                     <li class="{{ request()->is('perpindahan*') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('perpindahan.index') }}">Perpindahan</a>
                     </li>

                     <!--kedatangan-->
                     <li class="{{ request()->is('pendatang*') ? 'active' : '' }}">
                         <a class="nav-link" href="{{ route('pendatang.index') }}">Pendatang</a>
                     </li>
                 </ul>
             </li>

             <!-- admin -->
             @can('isAdmin')
                 <li class="menu-header">Admin</li>

                 <!-- profil gampong -->
                 <li class="{{ request()->is('admin/profil-gampong') ? 'active' : '' }}">
                     <a class="nav-link" href="{{ route('profil-gampong.index') }}">
                         <i class="fab fa-magento"></i>
                         <span>Profil Gampong</span>
                     </a>
                 </li>

                 <!--perangkat-gampong-->
                 <li class="{{ request()->is('admin/perangkat-gampong') ? 'active' : '' }}">
                     <a class="nav-link" href="{{ route('perangkat-gampong.index') }}">
                         <i class="fas fa-address-card"></i>
                         <span>Perangkat Gampong</span>
                     </a>
                 </li>

                 <!-- atribut penduduk -->
                 <li
                     class="dropdown {{ request()->is('admin/hubungan') ? 'active' : '' }} {{ request()->is('admin/perkawinan') ? 'active' : '' }} {{ request()->is('admin/pekerjaan') ? 'active' : '' }} {{ request()->is('admin/dusun') ? 'active' : '' }} {{ request()->is('admin/pendidikan') ? 'active' : '' }} {{ request()->is('admin/agama') ? 'active' : '' }}">

                     <a href="#" class="menu-toggle nav-link has-dropdown">
                         <i class="fas fa-users-cog"></i>
                         <span>Atribut Penduduk</span>
                     </a>
                     <ul class="dropdown-menu">
                         <!--agama-->
                         <li class="{{ request()->is('admin/agama') ? 'active' : '' }}">
                             <a class="nav-link" href="{{ route('agama.index') }}">
                                 <span>Kelola Agama</span>
                             </a>
                         </li>

                         <!--pendidikan-->
                         <li class="{{ request()->is('admin/pendidikan') ? 'active' : '' }}">
                             <a class="nav-link" href="{{ route('pendidikan.index') }}">
                                 <span>Kelola Pendidikan</span>
                             </a>
                         </li>

                         <!--dusun-->
                         <li class="{{ request()->is('admin/dusun') ? 'active' : '' }}">
                             <a class="nav-link" href="{{ route('dusun.index') }}">
                                 <span>Kelola Dusun</span>
                             </a>
                         </li>

                         <!--pekerjaan-->
                         <li class="{{ request()->is('admin/pekerjaan') ? 'active' : '' }}">
                             <a class="nav-link" href="{{ route('pekerjaan.index') }}">
                                 <span>Kelola Pekerjaan</span>
                             </a>
                         </li>

                         <!--perkawinan-->
                         <li class="{{ request()->is('admin/perkawinan') ? 'active' : '' }}">
                             <a class="nav-link" href="{{ route('perkawinan.index') }}">
                                 <span>Kelola Status Perkawinan</span>
                             </a>
                         </li>

                         <!--hubungan-->
                         <li class="{{ request()->is('admin/hubungan') ? 'active' : '' }}">
                             <a class="nav-link" href="{{ route('hubungan.index') }}">
                                 <span>Kelola Hubungan</span>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <!--user-->
                 <li class="{{ request()->is('admin/user') ? 'active' : '' }}">
                     <a class="nav-link" href="{{ route('user.index') }}">
                         <i class="fas fa-user"></i>
                         <span>Kelola User</span>
                     </a>
                 </li>
             @endcan

         </ul>
     </aside>
 </div>
