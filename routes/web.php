<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FileDownloadController;
use App\Http\Controllers\HumanResourceController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisJenjangController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuDinamisController;
use App\Http\Controllers\MenuHyperlinkController;
use App\Http\Controllers\MenuStatisController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfilInstansiController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SarprasController;
use App\Http\Controllers\SDMController;
use App\Http\Controllers\Section4Controller;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\SubMenuHyperlinkController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Models\MenuDinamis;
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

// Artikel
Route::get('/artikel', [WebsiteController::class, 'artikel']);

// Berita
Route::get('/berita', [WebsiteController::class, 'berita']);
Route::get('/berita-detail/{Publication:slug}', [WebsiteController::class, 'berita_detail']);

// Infografis
Route::get('/infografis', [WebsiteController::class, 'infografis']);
Route::get('/informasi-detail/{Publication:slug}', [WebsiteController::class, 'infografis_detail']);

// Pengumuman
Route::get('/pengumuman', [WebsiteController::class, 'pengumuman']);

// Sarana Prasarana Frontend
Route::get('/prasarana-sarana', [WebsiteController::class, 'website_sarpras']);

// Menu
Route::get('/ANRI/{Pages:nama_menu}', [WebsiteController::class, 'view_menu']);
Route::get('/sub-menu/{SubMenu:url}', [WebsiteController::class, 'view_submenu']);

// Calendar
Route::get('/kalender-diklat', [ProgramController::class, 'getEvent'])->name('getevent');
Route::get('/pencarian-kalender-diklat', [ProgramController::class, 'search_program'])->name('getevent');

// Search
Route::get('/hasil-pencarian', [WebsiteController::class, 'search']);
Route::get('/hasil-pencarian-berita-artikel', [WebsiteController::class, 'search_berita']);
Route::get('/hasil-pencarian-infografis-artikel', [WebsiteController::class, 'search_infografis']);
Route::get('/hasil-pencarian-artikel', [WebsiteController::class, 'search_artikel']);
Route::get('/hasil-pencarian-pengumuman', [WebsiteController::class, 'search_pengumuman']);
Route::get('/hasil-pencarian-program', [WebsiteController::class, 'search_program']);

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
    
    // Approval program dan unapproval
    Route::put('/approve-program/{Program:id}', [ProgramController::class, 'approve_program'])->name('approve-program');
    Route::put('/approve-program/approve', [ProgramController::class, 'approve_program'])->name('approve-program-mass');
    Route::put('/unapprove-program/{Program:id}', [ProgramController::class, 'unapprove_program'])->name('unapprove-program');
    Route::put('/unapprove-program/unapprove', [ProgramController::class, 'unapprove_program'])->name('unapprove-program-mass');
   
    Route::put('/approve-testimoni/{Testimoni:id}', [TestimoniController::class, 'approve_testimoni'])->name('approve-testimoni');
    Route::put('/unapprove-testimoni/{Testimoni:id}', [TestimoniController::class, 'unapprove_testimoni'])->name('unapprove-testimoni');
    Route::put('/approve-faq/{Faq:id}', [FaqController::class, 'approve_faq'])->name('approve-faq');
    Route::put('/unapprove-faq/{Faq:id}', [FaqController::class, 'unapprove_faq'])->name('unapprove-faq');
    Route::put('/approve-faq/{Faq:id}', [FaqController::class, 'approve_faq'])->name('approve-faq');
    Route::put('/unapprove-faq/{Faq:id}', [FaqController::class, 'unapprove_faq'])->name('unapprove-faq');
    Route::put('/approve-slideshow/{Slideshow:id}', [SlideshowController::class, 'approve_slideshow'])->name('approve-slideshow');
    Route::put('/unapprove-slideshow/{Slideshow:id}', [SlideshowController::class, 'unapprove_slideshow'])->name('unapprove-slideshow');
    
    // Approve dan Unap
    Route::put('/approve-publikasi/{Publication:id}', [PublicationController::class, 'approve_publikasi'])->name('approve-publikasi');
    Route::put('/approve-publikasi/aprrove', [PublicationController::class, 'approve_publikasi'])->name('approve-publikasi-mass');
    Route::put('/unapprove-publikasi/{Publication:id}', [PublicationController::class, 'unapprove_publikasi'])->name('unapprove-publikasi');
    Route::put('/unapprove-publikasi/unapprove', [PublicationController::class, 'unapprove_publikasi'])->name('unapprove-publikasi-mass');
    
    // Approve dan Unapprove File Download
    Route::put('/approve-file/{FileDownload:id}', [FileDownloadController::class, 'approve_file'])->name('approve-file');
    Route::put('/approve-file/aprrove', [FileDownloadController::class, 'approve_file'])->name('approve-file-mass');
    Route::put('/unapprove-file/{FileDownload:id}', [FileDownloadController::class, 'unapprove_file'])->name('unapprove-file');
    Route::put('/unapprove-file/unapprove', [FileDownloadController::class, 'unapprove_file'])->name('unapprove-file-mass');

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
    Route::delete('/program-diklat/delete', [ProgramController::class, 'destroy'])->name('program.delete');
    Route::resource('/jenis-jenjang', JenisJenjangController::class);

    // Profil Instansi
    Route::resource('/profil-instansi', ProfilInstansiController::class);

    // Profil Pejabat - SDM
    Route::resource('/profil-pejabat/SDM', HumanResourceController::class);
    Route::resource('/profil-pejabat/jabatan', JabatanController::class);
    Route::delete('/profil-pejabat/jabatan/delete', [JabatanController::class, 'destroy'])->name('jabatan.delete');

    // Publikasi File
    Route::resource('/publikasi', PublicationController::class);
    Route::delete('/publikasi/delete', [PublicationController::class, 'destroy'])->name('publikasi.delete');
    Route::resource('/publikasi-file', FileDownloadController::class);
    Route::delete('/publikasi-file/delete', [FileDownloadController::class, 'destroy'])->name('publikasi-file.delete');

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

    // Manajemen Menu
    Route::resource('/manajemen-menu', MenuStatisController::class);

    // Manajemen Sub Menu
    Route::resource('/manajemen-sub-menu', SubMenuController::class);
    Route::delete('/delete-submenu/{Submenu:id}', [MenuStatisController::class, 'destroy_submenu'])->name('delete-submenu');

    // Manajemen Menu Hyperlink
    Route::resource('/manajemen-menu-hyperlink', MenuHyperlinkController::class);

    // Manajemen Sub Menu Hyperlink
    Route::resource('/manajemen-submenu-hyperlink', SubMenuHyperlinkController::class);

    // Edit Menu Hyperlink
    Route::get('/update-submenu/{SubMenu:id}/edit', [MenuStatisController::class, 'edit_submenu']);
    Route::get('/update-menu/{MenuStatis:id}/edit', [MenuStatisController::class, 'edit_menu']);
    Route::put('/update-submenu/{SubMenu:id}', [MenuStatisController::class, 'update_submenu']);
    Route::put('/update-menu/{MenuStatis:id}', [MenuStatisController::class, 'update_menu']);
});

Route::group(['middleware' => ['auth', 'role:operator,admin', 'status']], function () {
    // dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard.dashboard_home');
    });

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
    Route::resource('/konfigurasi-section', Section4Controller::class);

    // Rubah Password dari sidebar dan navbar
    Route::get('/ubah-password', [UserController::class, 'changePassword'])->name('change-password');
    Route::post('/ubah-password', [UserController::class, 'updatePassword'])->name('update-password');

    // Pages
    Route::resource('/pages', PagesController::class);
});
