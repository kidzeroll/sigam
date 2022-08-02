<?php

use App\Http\Controllers\{
    AgamaController,
    ArtikelController,
    AuthController,
    DashboardController,
    DusunController,
    GaleriController,
    HomeController,
    HubunganController,
    KategoriController,
    KelahiranController,
    KematianController,
    PekerjaanController,
    PendatangController,
    PendidikanController,
    PendudukController,
    PengaduanController,
    PerangkatGampongController,
    PerkawinanController,
    PerpindahanController,
    ProfilController,
    ProfilGampongController,
    SuratController,
    SuratKeluarController,
    SuratMasukController,
    UserController,
};
use App\Models\{
    Agama,
    Dusun,
    Pekerjaan,
    Penduduk,
    PerangkatGampong,
};
use Illuminate\Support\Facades\Route;

// home
Route::get('/', HomeController::class)->name('home');

// frontend profil
Route::get('/profil-gampong', function () {
    $perangkats = PerangkatGampong::all('nama', 'photo_path', 'jabatan', 'alamat');
    $total = Penduduk::count();
    $dusuns = Dusun::all('nama');
    return view('frontend.profil', compact('perangkats', 'total', 'dusuns'));
})->name('frontend.profil');

// frontend berita
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [HomeController::class, 'showBerita'])->name('berita.show');
Route::get('/kategori-berita/{slug}', [HomeController::class, 'kategori'])->name('kategori');

// frontend foto
Route::get('/foto', [HomeController::class, 'foto'])->name('foto');


// login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.action');

// pengaduan
Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

// surat
Route::prefix('administrasi-surat')->group(
    function () {
        Route::post('/store', [SuratController::class, 'FrontendStore'])->name('administrasi.store');

        // skkm
        Route::get('skkm', function () {
            $agamas = Agama::all('id', 'nama');
            $pekerjaans = Pekerjaan::all('id', 'nama');
            return view('frontend.skkm', compact('agamas', 'pekerjaans'));
        })->name('skkm');

        // skbb
        Route::get('skbb', function () {
            $agamas = Agama::all('id', 'nama');
            $pekerjaans = Pekerjaan::all('id', 'nama');
            return view('frontend.skbb', compact('agamas', 'pekerjaans'));
        })->name('skbb');

        // skbm
        Route::get('skbm', function () {
            $agamas = Agama::all('id', 'nama');
            $pekerjaans = Pekerjaan::all('id', 'nama');
            return view('frontend.skbm', compact('agamas', 'pekerjaans'));
        })->name('skbm');

        // skp
        Route::get('skp', function () {
            $agamas = Agama::all('id', 'nama');
            $pekerjaans = Pekerjaan::all('id', 'nama');
            return view('frontend.skp', compact('agamas', 'pekerjaans'));
        })->name('skp');

        // sku
        Route::get('sku', function () {
            $agamas = Agama::all('id', 'nama');
            $pekerjaans = Pekerjaan::all('id', 'nama');
            return view('frontend.sku', compact('agamas', 'pekerjaans'));
        })->name('sku');

        // skd
        Route::get('skd', function () {
            $agamas = Agama::all('id', 'nama');
            $pekerjaans = Pekerjaan::all('id', 'nama');
            return view('frontend.skd', compact('agamas', 'pekerjaans'));
        })->name('skd');

        // skk
        Route::get('skk', function () {
            $agamas = Agama::all('id', 'nama');
            $pekerjaans = Pekerjaan::all('id', 'nama');
            return view('frontend.skk', compact('agamas', 'pekerjaans'));
        })->name('skk');
    }
);


// auth
Route::middleware(['auth'])->group(function () {

    // auth
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // profil
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil/{id}', [ProfilController::class, 'update'])->name('profil.update');

    // dashboard
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // kategori
    Route::resource('kategori', KategoriController::class);

    // artikel
    Route::resource('artikel', ArtikelController::class);

    // surat masuk
    Route::resource('surat-masuk', SuratMasukController::class);

    // surat keluar
    Route::resource('surat-keluar', SuratKeluarController::class);

    // galeri
    Route::resource('galeri', GaleriController::class);

    // pendatang
    Route::resource('pendatang', PendatangController::class);

    // kelahiran
    Route::resource('kelahiran', KelahiranController::class);

    // penduduk
    Route::resource('penduduk', PendudukController::class);
    // Route::post('penduduk/import', [PendudukController::class, 'import'])->name('penduduk.import');

    // kematian
    Route::resource('kematian', KematianController::class);

    // perpindahan
    Route::resource('perpindahan', PerpindahanController::class);

    // pengaduan
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/{pengaduan}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::delete('/pengaduan/{pengaduan}', [PengaduanController::class, 'destroy'])->name('pengaduan.destroy');
    Route::post('/pengaduan/{pengaduan}', [PengaduanController::class, 'tanggapi'])->name('pengaduan.tanggapi');
    Route::post('/pengaduan/send-message/{pengaduan}', [PengaduanController::class, 'beritahukan'])->name('pengaduan.beritahukan');

    // surat
    Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
    Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
    Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
    Route::delete('/surat/{surat}', [SuratController::class, 'destroy'])->name('surat.destroy');
    Route::post('/surat/{surat}', [SuratController::class, 'tandatangan'])->name('surat.ttd');
    Route::post('/surat/send-message/{surat}', [SuratController::class, 'whatsapp'])->name('surat.wa');


    // prefix admin
    Route::prefix('admin')->middleware('can:isAdmin')->group(function () {

        // profil gampong
        Route::get('/profil-gampong', [ProfilGampongController::class, 'index'])->name('profil-gampong.index');
        Route::put('/profil-gampong/{id}', [ProfilGampongController::class, 'update'])->name('profil-gampong.update');

        // user
        Route::resource('user', UserController::class);

        // perangkat gampong
        Route::resource('perangkat-gampong', PerangkatGampongController::class);

        // agama
        Route::resource('agama', AgamaController::class);

        // pendidikan
        Route::resource('pendidikan', PendidikanController::class);

        // dusun
        Route::resource('dusun', DusunController::class);

        // pekerjaan
        Route::resource('pekerjaan', PekerjaanController::class);

        // perkawinan
        Route::resource('perkawinan', PerkawinanController::class);

        // hubungan
        Route::resource('hubungan', HubunganController::class);
    });
});
