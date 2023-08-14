<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\mapsController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfilController;

// admin controller
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\layananController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmenuItemController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\SubmenuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');


Route::get('/load-more', [PostController::class, 'loadMore'])->name('loadMore');
Route::get('/search-news', [PostController::class, 'searchNews'])->name('search.news');

Route::get('post/{article}', [PostController::class, 'lihat'])->name('post.show');

Route::get('/petasitus', [mapsController::class, 'showMap'])->name('petasitus.maps');

//route contact me
Route::get('/kontak', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/kontak', [ContactController::class, 'submitForm'])->name('contact.submit');

//route untuk program kerja
Route::get('/program', [ProkerController::class, 'showDropdown'])->name('program.index');
Route::get('/program/{id}', [ProkerController::class, 'show'])->name('program.show');

//route untuk profil
Route::get('/profil', [ProfileController::class, 'showProfi'])->name('profil.show');
Route::get('/profil/{id}', [ProkerController::class, 'show'])->name('profil.show');


Route::get('/proker/{id}', [ProkerController::class, 'tampil'])->name('proker.tampil');
Route::get('/proker/{label}', [ProkerController::class, 'tampilProker'])->name('proker.tampil.proker');
Route::get('/proker/{kode}', [ProkerController::class, 'tampilKode'])->name('proker.tampil.kode');

Route::get('/bidang/{id}', [BidangController::class, 'tampilBidang'])->name('bidang.tampil');
Route::get('/bidang/{label}', [BidangController::class, 'tampilLabel'])->name('bidang.tampil.label');
// Route::get('/bidang/{kode}', [ProkerController::class, 'tampilKode'])->name('bidang.tampil.kode');

Route::get('/regulasi/{id}', [RegulasiController::class, 'tampilRegulasi'])->name('regulasi.tampil');

Route::get('/profil/{id}', [ProfilController::class, 'tampilProfil'])->name('profil.tampil');
Route::get('/profil/{label}', [ProfilController::class, 'tampilProf'])->name('profil.tampil.profil');

Route::get('/publik', [LayananController::class, 'tampil'])->name('publik.tampil');

Route::get('/galeri', [GaleriController::class, 'tampil'])->name('galeri.tampil');

//=========> buku tamu <==========//
Route::get('/buktam', [BukuTamuController::class, 'tampilTamu'])->name('tampil.tamu');
Route::post('/buktam', [BukuTamuController::class, 'store'])->name('tambah.tamu');


//-------------------------- admin routes ---------------------------//

Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login/post', [AdminLoginController::class, 'login'])->name('login.post');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Kelola Postingan
    Route::get('/post', function () {
        return (new PostController)->daftarPostingan('post');
    })->name('post');
    Route::post('/tambah-postingan', [PostController::class, 'tambahPostingan'])->name('tambah-postingan');
    Route::get('/form-tambahPostingan', [PostController::class, 'formTambah'])->name('tambah-form');
    Route::post('/upload-image', [PostController::class, 'uploadImage'])->name('image.upload');
    Route::post('/delete-image', [PostController::class, 'deleteImage'])->name('image.delete');
    Route::post('/postingan/{id}/hapus', [PostController::class, 'hapusPostingan'])->name('postingan.hapus');
    Route::get('/edit-postingan/{id}', [PostController::class, 'editPostingan'])->name('edit-postingan');
    Route::post('/postingan/{id}', [PostController::class, 'updatePostingan'])->name('postingan.update');
    Route::post('/postingan/update-status/{id}', [PostController::class, 'updateStatusPostingan'])->name('postingan.updateStatus');
    Route::get('/galeriPost', function () {
        return (new PostController)->daftarPostingan('galeriPost');
    })->name('galeriPost');

    // Kelola Kategori Postingan
    Route::get('/kategoriPost', [KategoriController::class, 'daftarKategoriPost'])->name('daftar-kategori');
    Route::post('/kategoriPost/tambah', [KategoriController::class, 'tambahKategori'])->name('tambah-kategori');
    Route::post('/kategoriPost/edit/{id}', [KategoriController::class, 'editKategori'])->name('edit-kategori');
    Route::post('/kategoriPost/hapus/{id}', [KategoriController::class, 'hapusKategori'])->name('hapus-kategori');


    // Kelola Program Kegiatan
    Route::get('/proker', [ProkerController::class, 'daftarProker'])->name('proker');
    Route::get('/tambah-foto', [ProkerController::class, 'tambahImage'])->name('tambah-foto');
    Route::post('/tambah-program', [ProkerController::class, 'tambahProgram'])->name('tambah-program');
    Route::post('/program/{id}/hapus', [ProkerController::class, 'hapusProgram'])->name('program.hapus');
    Route::post('/proker/edit/{id}', [ProkerController::class, 'editProgram'])->name('proker-edit');
    Route::post('/deleteImage', [ProkerController::class, 'hapusImageProgram'])->name('deleteImage');
    // Kelola Layanan Publik
    Route::get('/layanan-publik', [LayananController::class, 'daftarLayanan'])->name('layanan-publik');
    Route::post('/tambah-layanan', [LayananController::class, 'tambahLayanan'])->name('tambah-layanan');
    Route::post('/layanan-publik/{id}', [LayananController::class, 'editLayanan'])->name('edit-layanan');
    Route::post('/layanan/{id}/hapus', [LayananController::class, 'hapusLayanan'])->name('layanan-hapus');

    // Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])->name('home');

    // Kelola Akun
    Route::get('/akun', [AkunController::class, 'daftarAkun'])->name('akun');
    Route::post('/tambah-akun', [AkunController::class, 'tambahAkun'])->name('tambah-akun');
    Route::post('/akun/{id}', [AkunController::class, 'editAkun'])->name('akun-edit');
    Route::post('/akun/{id}/hapus', [AkunController::class, 'hapusAkun'])->name('akun-hapus');

    //  Kelola Buku Tamu
    Route::get('/buku-tamu', [BukuTamuController::class, 'daftarBukuTamu'])->name('buku-tamu');
    Route::post('/tambah-buku', [BukuTamuController::class, 'tambahTamu'])->name('tambah-tamu');
    Route::get('/pegawai', [PegawaiController::class, 'tampilPegawai'])->name('pegawai');
    Route::post('/tambah-pegawai', [PegawaiController::class, 'tambahPegawai'])->name('tambah-pegawai');
    Route::post('/pegawai/edit/{id}', [PegawaiController::class, 'updatePegawai'])->name('pegawai-edit');
    Route::post('/pegawai/{id}/hapus', [PegawaiController::class, 'hapusPegawai'])->name('pegawai-hapus');

    // kelola menu
    Route::get('/menu', [MenuItemController::class, 'create'])->name('menu.create');
    Route::post('/menu', [MenuItemController::class, 'store'])->name('menuitem.store');

    // kelola submenu
    Route::get('/submenu', [SubmenuItemController::class, 'create'])->name('submenu.create');
    Route::post('/submenu', [SubmenuItemController::class, 'store'])->name('submenuitem.store');

    //kelola saran
    Route::get('/saran', [ContactController::class, 'index'])->name('saran.index');

    Route::post('/tambah-foto-kegiatan', [ProkerController::class, 'tambahFotoKegiatan'])->name('tambah-foto-kegiatan');
    //kelola saran
    // Route::get('/profil', [ProfilController::class, 'index'])->name('saran.index');
    Route::get('/profil', function () {
        return view('backend.pages.profil');
    });


    Route::get('/bidang', function () {
        return view('backend.pages.bidang');
    });

    Route::get('/list', [PengumumanController::class, 'lihat'])->name('list.lihat');
    Route::post('/tambah-gambar', [PengumumanController::class, 'tambahGambar'])->name('tambah-gambar');
    Route::post('/list/{id}/hapus', [PengumumanController::class, 'hapusGambar'])->name('gambar.hapus');
    Route::post('/gambar/{id}/aktifkan', [PengumumanController::class, 'aktifkanGambar'])->name('gambar.aktifkan');
});
