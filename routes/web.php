<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    DashboardController,
    UserController,
    InformasiController,
    BidangController,
    FormController,
    KategoriJadwalIbadahController,
    JadwalIbadahController,
    JadwalSepekanController,
    GuestController,
    FormKategoriController
};
use App\Models\Information;

// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// });
Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/announcement/{id}', [GuestController::class, 'showPengumumanDetail'])->name('guestpengumuman.show');
Route::get('/announcement', [GuestController::class, 'showPengumuman'])->name('guestpengumuman');
Route::get('/news/{id}', [GuestController::class, 'showBeritaDetail'])->name('guestberita.show');
Route::get('/news', [GuestController::class, 'showBerita'])->name('guestberita');
Route::get('/vacancy/{id}', [GuestController::class, 'showLowonganDetail'])->name('guestlowongan.show');
Route::get('/vacancy', [GuestController::class, 'showLowongan'])->name('guestlowongan');
Route::get('/beasiswa/{id}', [GuestController::class, 'showBeasiswaDetail'])->name('guestbeasiswa.show');
Route::get('/beasiswa', [GuestController::class, 'showBeasiswa'])->name('guestbeasiswa');
Route::get('/wartafile', [GuestController::class, 'showWarta'])->name('guestwarta');
Route::get('/komisi', [GuestController::class, 'showKomisi'])->name('guestkomisi');
Route::get('/komisi/{id}', [GuestController::class, 'showKomisiDetail'])->name('guestkomisi.show');
Route::get('/paduan-suara', [GuestController::class, 'showPaduanSuara'])->name('guestpaduansuara');
Route::get('/paduan-suara/{id}', [GuestController::class, 'showPaduanSuaraDetail'])->name('guestpaduansuara.show');
Route::get('/formsakramen', [GuestController::class, 'showForm'])->name('guestformsakramen');
Route::get('visi-misi', function(){
    return view('guest.visimisi.tampilan');
});
Route::get('/sejarah', function() {
    return view ('guest.sejarah.tampilan');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    // Route::get('/register', [RegisterController::class, 'create'])->name('register');
    // Route::post('/register', [RegisterController::class, 'store']);
    // Route::get('/form', [GuestController::class, 'showForm'])->name('guestform');
    // Route::get('/form/{id}', [GuestController::class, 'showFormDetail'])->name('guestform.show');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kategori-jadwalibadah', [KategoriJadwalIbadahController::class, 'index'])->name('kategori-jadwalibadah');
    Route::get('/kategori-jadwalibadah/create', [KategoriJadwalIbadahController::class, 'create'])->name('kategori-jadwalibadah.create');
    Route::post('/kategori-jadwalibadah/store', [KategoriJadwalIbadahController::class, 'store'])->name('kategori-jadwalibadah.store');
    Route::get('/kategori-jadwalibadah/edit/{id}', [KategoriJadwalIbadahController::class, 'edit'])->name('kategori-jadwalibadah.edit');
    Route::post('/kategori-jadwalibadah/update/{id}', [KategoriJadwalIbadahController::class, 'update'])->name('kategori-jadwalibadah.update');
    Route::delete('/kategori-jadwalibadah/delete/{id}', [KategoriJadwalIbadahController::class, 'destroy'])->name('kategori-jadwalibadah.destroy');

    Route::get('/jadwalibadah', [JadwalIbadahController::class, 'index'])->name('jadwalibadah');
    Route::get('/jadwalibadah/create', [JadwalIbadahController::class, 'create'])->name('jadwalibadah.create');
    Route::post('/jadwalibadah/store', [JadwalIbadahController::class, 'store'])->name('jadwalibadah.store');
    Route::get('/jadwalibadah/edit/{id}', [JadwalIbadahController::class, 'edit'])->name('jadwalibadah.edit');
    Route::post('/jadwalibadah/update/{id}', [JadwalIbadahController::class, 'update'])->name('jadwalibadah.update');
    Route::delete('/jadwalibadah/delete/{id}', [JadwalIbadahController::class, 'destroy'])->name('jadwalibadah.destroy');

    Route::get('/jadwalsepekan', [JadwalSepekanController::class, 'index'])->name('jadwalsepekan');
    Route::get('/jadwalsepekan/create', [JadwalSepekanController::class, 'create'])->name('jadwalsepekan.create');
    Route::post('/jadwalsepekan/store', [JadwalSepekanController::class, 'store'])->name('jadwalsepekan.store');
    Route::get('/jadwalsepekan/edit/{id}', [JadwalSepekanController::class, 'edit'])->name('jadwalsepekan.edit');
    Route::post('/jadwalsepekan/update/{id}', [JadwalSepekanController::class, 'update'])->name('jadwalsepekan.update');
    Route::delete('/jadwalsepekan/delete/{id}', [JadwalSepekanController::class, 'destroy'])->name('jadwalsepekan.destroy');

    Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna');
    Route::get('/pengguna/create', [UserController::class, 'create'])->name('pengguna.create');
    Route::post('/pengguna/store', [UserController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/edit/{id}', [UserController::class, 'edit'])->name('pengguna.edit');
    Route::post('/pengguna/edit/{id}', [UserController::class, 'update'])->name('pengguna.update');
    Route::delete('/pengguna/{id}', [UserController::class, 'destroy'])->name('pengguna.destroy');

    Route::get('/pengumuman', [InformasiController::class, 'showPengumuman'])->name('pengumuman');
    Route::get('/pengumuman/create', [InformasiController::class, 'createPengumuman'])->name('pengumuman.create');
    Route::get('/pengumuman/edit/{id}', [InformasiController::class, 'editPengumuman'])->name('pengumuman.edit');
    Route::post('/pengumuman/store', [InformasiController::class, 'storePengumuman'])->name('pengumuman.store');
    Route::post('/pengumuman/update/{id}', [InformasiController::class, 'updatePengumuman'])->name('pengumuman.update');
    Route::delete('/pengumuman/delete/{id}', [InformasiController::class, 'destroyPengumuman'])->name('pengumuman.destroy');
    Route::get('/pengumuman/{id}', [InformasiController::class, 'showDetailPengumuman'])->name('pengumuman.show');

    Route::get('/berita', [InformasiController::class, 'showBerita'])->name('berita');
    Route::get('/berita/create', [InformasiController::class, 'createBerita'])->name('berita.create');
    Route::get('/berita/edit/{id}', [InformasiController::class, 'editBerita'])->name('berita.edit');
    Route::post('/berita/store', [InformasiController::class, 'storeBerita'])->name('berita.store');
    Route::post('/berita/update/{id}', [InformasiController::class, 'updateBerita'])->name('berita.update');
    Route::delete('/berita/delete/{id}', [InformasiController::class, 'destroyBerita'])->name('berita.destroy');
    Route::get('/berita/{id}', [InformasiController::class, 'showDetailBerita'])->name('berita.show');

    Route::get('/info-lowongan', [InformasiController::class, 'showInfoLowongan'])->name('info-lowongan');
    Route::get('/info-lowongan/create', [InformasiController::class, 'createLowongan'])->name('info-lowongan.create');
    Route::get('/info-lowongan/edit/{id}', [InformasiController::class, 'editLowongan'])->name('info-lowongan.edit');
    Route::post('/info-lowongan/store', [InformasiController::class, 'storeLowongan'])->name('info-lowongan.store');
    Route::post('/info-lowongan/update/{id}', [InformasiController::class, 'updateLowongan'])->name('info-lowongan.update');
    Route::delete('/info-lowongan/delete/{id}', [InformasiController::class, 'destroyLowongan'])->name('info-lowongan.destroy');
    Route::get('/info-lowongan/{id}', [InformasiController::class, 'showDetailLowongan'])->name('info-lowongan.show');

    Route::get('/scholarship', [InformasiController::class, 'showScholarship'])->name('scholarship');
    Route::get('/scholarship/create', [InformasiController::class, 'createScholarship'])->name('scholarship.create');
    Route::get('/scholarship/edit/{id}', [InformasiController::class, 'editScholarship'])->name('scholarship.edit');
    Route::post('/scholarship/store', [InformasiController::class, 'storeScholarship'])->name('scholarship.store');
    Route::post('/scholarship/update/{id}', [InformasiController::class, 'updateScholarship'])->name('scholarship.update');
    Route::delete('/scholarship/delete/{id}', [InformasiController::class, 'destroyScholarship'])->name('scholarship.destroy');
    Route::get('/scholarship/{id}', [InformasiController::class, 'showDetailScholarship'])->name('scholarship.show');

    Route::get('/warta', [InformasiController::class, 'showWarta'])->name('warta');
    Route::get('/warta/create', [InformasiController::class, 'createWarta'])->name('warta.create');
    Route::get('/warta/edit/{id}', [InformasiController::class, 'editWarta'])->name('warta.edit');
    Route::post('/warta/store', [InformasiController::class, 'storeWarta'])->name('warta.store');
    Route::post('/warta/update/{id}', [InformasiController::class, 'updateWarta'])->name('warta.update');
    Route::delete('/warta/delete/{id}', [InformasiController::class, 'destroyWarta'])->name('warta.destroy');
    Route::get('/warta/{id}', [InformasiController::class, 'showDetailWarta'])->name('warta.show');

    Route::get('/commission', [BidangController::class, 'showKomisi'])->name('commission');
    Route::get('/commission/create', [BidangController::class, 'createKomisi'])->name('commission.create');
    Route::post('/commission/store', [BidangController::class, 'storeKomisi'])->name('commission.store');
    Route::get('/commission/edit/{id}', [BidangController::class, 'editKomisi'])->name('commission.edit');
    Route::post('/commission/update/{id}', [BidangController::class, 'updateKomisi'])->name('commission.update');
    Route::delete('/commission/delete/{id}', [BidangController::class, 'destroyKomisi'])->name('commission.destroy');
    Route::get('/commission/{id}', [BidangController::class, 'showDetailKomisi'])->name('commission.show');

    Route::get('/choir', [BidangController::class, 'showChoir'])->name('choir');
    Route::get('/choir/create', [BidangController::class, 'createChoir'])->name('choir.create');
    Route::post('/choir/store', [BidangController::class, 'storeChoir'])->name('choir.store');
    Route::get('/choir/edit/{id}', [BidangController::class, 'editChoir'])->name('choir.edit');
    Route::post('/choir/update/{id}', [BidangController::class, 'updateChoir'])->name('choir.update');
    Route::delete('/choir/delete/{id}', [BidangController::class, 'destroyChoir'])->name('choir.destroy');
    Route::get('/choir/{id}', [BidangController::class, 'showDetailChoir'])->name('choir.show');

    Route::get('/form', [FormController::class, 'showForm'])->name('form');
    Route::get('/form/create', [FormController::class, 'createForm'])->name('form.create');
    Route::post('/form/store', [FormController::class, 'storeForm'])->name('form.store');
    Route::get('/form/edit/{id}', [FormController::class, 'editForm'])->name('form.edit');
    Route::post('/form/update/{id}', [FormController::class, 'updateForm'])->name('form.update');
    Route::delete('/form/delete/{id}', [FormController::class, 'destroyForm'])->name('form.destroy');
    Route::get('/form/{id}', [FormController::class, 'showDetailForm'])->name('form.show');

    // Route::resource('/kategori-form', FormKategoriController::class)->except('show');
    Route::get('/kategori-form', [FormKategoriController::class, 'index'])->name('kategori-form');
    Route::get('/kategori-form/create', [FormKategoriController::class, 'create'])->name('kategori-form.create');
    Route::post('/kategori-form/store', [FormKategoriController::class, 'store'])->name('kategori-form.store');
    Route::get('/kategori-form/edit/{id}', [FormKategoriController::class, 'edit'])->name('kategori-form.edit');
    Route::post('/kategori-form/update/{id}', [FormKategoriController::class, 'update'])->name('kategori-form.update');
    Route::delete('/kategori-form/delete/{id}', [FormKategoriController::class, 'destroy'])->name('kategori-form.destroy');
});
