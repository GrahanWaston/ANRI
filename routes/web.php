<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FileDownloadController;
use App\Http\Controllers\HumanResourceController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisJenjangController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfilInstansiController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SarprasController;
use App\Http\Controllers\SDMController;
use App\Http\Controllers\Section4Controller;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Login & Logout
Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/sejarah', [ProfilInstansiController::class, 'sejarah']);
Route::get('/visi-misi', [ProfilInstansiController::class, 'visi_misi']);
Route::get('/tugas-fungsi', [ProfilInstansiController::class, 'tugas_fungsi']);
Route::get('/struktur-organisasi', [ProfilInstansiController::class, 'struktur_organisasi']);
Route::get('/sumber-daya-manusia', [ProfilInstansiController::class, 'sumber_daya_manusia']);
Route::get('/maklumat-layanan', [ProfilInstansiController::class, 'maklumat_layanan']);
Route::get('/faq-anri', [FaqController::class, 'website']);

Route::get('/', [Section4Controller::class, 'section']);

// Beranda Website
Route::get('/', [WebsiteController::class, 'website_beranda']);
Route::get('/kontak-kami', [WebsiteController::class, 'website_kontak']);

// Program Diklat
Route::get('/program-diklat-anri', [WebsiteController::class, 'program_diklat']);

// Detail Program Diklat
Route::get('/detail-program-diklat/{Program:kode_diklat}', [WebsiteController::class, 'program_detail']);

// Kalender
// Route::get('/kalender-diklat', [WebsiteController::class, 'kalender']);

// Artikel
Route::get('/artikel', [WebsiteController::class, 'artikel']);

// Berita
Route::get('/berita', [WebsiteController::class, 'berita']);

// Infografis
Route::get('/infografis', [WebsiteController::class, 'infografis']);

// Pengumuman
Route::get('/pengumuman', [WebsiteController::class, 'pengumuman']);

// Sarana Prasarana Frontend
Route::get('/prasarana-sarana', [WebsiteController::class, 'website_sarpras']);

// Menu
Route::get('/ANRI/{Pages:nama_menu}', [WebsiteController::class, 'view_menu']);

// Calendar
Route::get('/kalender-diklat', [ProgramController::class, 'getEvent'])->name('getevent');

Route::group(['middleware' => ['auth', 'role:admin', 'status']], function () {
    // dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard.dashboard_home');
    });

    // Approval admin
    Route::put('/approve-jenis/{Jenis:id}', [JenisJenjangController::class, 'approve_jenis'])->name('approve-jenis');
    Route::put('/unapprove-jenis/{Jenis:id}', [JenisJenjangController::class, 'unapprove_jenis'])->name('unapprove-jenis');
    Route::put('/approve-jenjang/{Jenjang:id}', [JenisJenjangController::class, 'approve_jenjang'])->name('approve-jenjang');
    Route::put('/unapprove-jenjang/{Jenjang:id}', [JenisJenjangController::class, 'unapprove_jenjang'])->name('unapprove-jenjang');
    Route::put('/approve-program/{Program:id}', [ProgramController::class, 'approve_program'])->name('approve-program');
    Route::put('/unapprove-program/{Program:id}', [ProgramController::class, 'unapprove_program'])->name('unapprove-program');
    Route::put('/approve-testimoni/{Testimoni:id}', [TestimoniController::class, 'approve_testimoni'])->name('approve-testimoni');
    Route::put('/unapprove-testimoni/{Testimoni:id}', [TestimoniController::class, 'unapprove_testimoni'])->name('unapprove-testimoni');
    Route::put('/approve-faq/{Faq:id}', [FaqController::class, 'approve_faq'])->name('approve-faq');
    Route::put('/unapprove-faq/{Faq:id}', [FaqController::class, 'unapprove_faq'])->name('unapprove-faq');
    Route::put('/approve-faq/{Faq:id}', [FaqController::class, 'approve_faq'])->name('approve-faq');
    Route::put('/unapprove-faq/{Faq:id}', [FaqController::class, 'unapprove_faq'])->name('unapprove-faq');
    Route::put('/approve-slideshow/{Slideshow:id}', [SlideshowController::class, 'approve_slideshow'])->name('approve-slideshow');
    Route::put('/unapprove-slideshow/{Slideshow:id}', [SlideshowController::class, 'unapprove_slideshow'])->name('unapprove-slideshow');
    Route::put('/approve-publikasi/{Publication:id}', [PublicationController::class, 'approve_publikasi'])->name('approve-publikasi');
    Route::put('/unapprove-publikasi/{Publication:id}', [PublicationController::class, 'unapprove_publikasi'])->name('unapprove-publikasi');
    Route::put('/approve-file/{FileDownload:id}', [FileDownloadController::class, 'approve_file'])->name('approve-file');
    Route::put('/unapprove-file/{FileDownload:id}', [FileDownloadController::class, 'unapprove_file'])->name('unapprove-file');

    // Manajemen User
    Route::resource('/manajemen-user', UserController::class);

    // Jenis dan Jenjang
    Route::delete('/delete-jenis/{Jenis:id}', [JenisJenjangController::class, 'destroy_jenis'])->name('delete-jenis');
    Route::delete('/delete-jenjang/{Jenjang:id}', [JenisJenjangController::class, 'destroy_jenjang'])->name('delete-jenjang');

    // Jenjang dan Jenis
    Route::get('/create-jenis', [JenisJenjangController::class, 'create_jenis'])->name('create-jenis');
    Route::post('/create-jenis', [JenisJenjangController::class, 'store_jenis'])->name('store-jenis');
    Route::get('/update-jenis/{Jenis:id}/edit', [JenisJenjangController::class, 'edit_jenis'])->name('update-jenis');
    Route::put('/update-jenis/{Jenis:id}', [JenisJenjangController::class, 'update_jenis'])->name('update-jenis');
    Route::get('/create-jenjang', [JenisJenjangController::class, 'create_jenjang'])->name('create-jenjang');
    Route::post('/create-jenjang', [JenisJenjangController::class, 'store_jenjang'])->name('store-jenjang');
    Route::get('/update-jenjang/{Jenjang:id}/edit', [JenisJenjangController::class, 'edit_jenjang'])->name('update-jenjang');
    Route::put('/update-jenjang/{Jenjang:id}', [JenisJenjangController::class, 'update_jenjang'])->name('update-jenjang');

    // Program dan Jenis Jenjang
    Route::resource('/program-diklat', ProgramController::class);
    Route::resource('/jenis-jenjang', JenisJenjangController::class);

    // Profil Instansi
    Route::resource('/profil-instansi', ProfilInstansiController::class);

    // Profil Pejabat - SDM
    Route::resource('/profil-pejabat/SDM', HumanResourceController::class);
    Route::resource('/profil-pejabat/jabatan', JabatanController::class);

    // Publikasi File
    Route::resource('/publikasi', PublicationController::class);
    Route::resource('/publikasi-file', FileDownloadController::class);

    // Sarana Prasarana
    Route::resource('/sarana-prasarana', SarprasController::class);

    // Layanan
    Route::resource('/layanan', LayananController::class);

    // Slideshow
    Route::resource('/slideshow', SlideshowController::class);

    // FAQ
    Route::resource('/faq', FaqController::class);

    // Testimoni
    Route::resource('/testimoni', TestimoniController::class);

    // Konfigurasi Situs dan Section
    Route::resource('/konfigurasi-situs', WebsiteController::class);
    Route::resource('/konfigurasi-section', Section4Controller::class);

    // Rubah Password dari sidebar dan navbar
    Route::get('/ubah-password', [UserController::class, 'changePassword'])->name('change-password');
    Route::post('/ubah-password', [UserController::class, 'updatePassword'])->name('update-password');

    // Pages
    Route::resource('/pages', PagesController::class);
});

Route::group(['middleware' => ['auth', 'role:operator,admin', 'status']], function () {
    // dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard.dashboard_home');
    });

    // Manajemen User
    // Route::resource('/manajemen-user', UserController::class);

    // Jenis dan Jenjang
    Route::delete('/delete-jenis/{Jenis:id}', [JenisJenjangController::class, 'destroy_jenis'])->name('delete-jenis');
    Route::delete('/delete-jenjang/{Jenjang:id}', [JenisJenjangController::class, 'destroy_jenjang'])->name('delete-jenjang');

    // Jenjang dan Jenis
    Route::get('/create-jenis', [JenisJenjangController::class, 'create_jenis'])->name('create-jenis');
    Route::post('/create-jenis', [JenisJenjangController::class, 'store_jenis'])->name('store-jenis');
    Route::get('/update-jenis/{Jenis:id}/edit', [JenisJenjangController::class, 'edit_jenis'])->name('update-jenis');
    Route::put('/update-jenis/{Jenis:id}', [JenisJenjangController::class, 'update_jenis'])->name('update-jenis');
    Route::get('/create-jenjang', [JenisJenjangController::class, 'create_jenjang'])->name('create-jenjang');
    Route::post('/create-jenjang', [JenisJenjangController::class, 'store_jenjang'])->name('store-jenjang');
    Route::get('/update-jenjang/{Jenjang:id}/edit', [JenisJenjangController::class, 'edit_jenjang'])->name('update-jenjang');
    Route::put('/update-jenjang/{Jenjang:id}', [JenisJenjangController::class, 'update_jenjang'])->name('update-jenjang');

    // Program dan Jenis Jenjang
    Route::resource('/program-diklat', ProgramController::class);
    Route::resource('/jenis-jenjang', JenisJenjangController::class);

    // Profil Instansi
    // Route::resource('/profil-instansi', ProfilInstansiController::class);

    // Profil Pejabat - SDM
    // Route::resource('/profil-pejabat/SDM', HumanResourceController::class);
    // Route::resource('/profil-pejabat/jabatan', JabatanController::class);

    // Publikasi File
    Route::resource('/publikasi', PublicationController::class);
    Route::resource('/publikasi-file', FileDownloadController::class);

    // Sarana Prasarana
    // Route::resource('/sarana-prasarana', SarprasController::class);

    // Layanan
    Route::resource('/layanan', LayananController::class);

    // Slideshow
    Route::resource('/slideshow', SlideshowController::class);

    // FAQ
    Route::resource('/faq', FaqController::class);

    // Testimoni
    Route::resource('/testimoni', TestimoniController::class);

    // Konfigurasi Situs dan Section
    // Route::resource('/konfigurasi-situs', WebsiteController::class);
    Route::resource('/konfigurasi-section', Section4Controller::class);

    // Rubah Password dari sidebar dan navbar
    Route::get('/ubah-password', [UserController::class, 'changePassword'])->name('change-password');
    Route::post('/ubah-password', [UserController::class, 'updatePassword'])->name('update-password');

    // Pages
    Route::resource('/pages', PagesController::class);
});
