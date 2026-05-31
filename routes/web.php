<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderMail;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\SanksiController;
use App\Http\Controllers\PasswordController;

/*
|--------------------------------------------------------------------------
| HALAMAN LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return view('login.index');

});

/*
|--------------------------------------------------------------------------
| TEST EMAIL
|--------------------------------------------------------------------------
*/

Route::get('/test-email', function () {

    $transaksi = (object)[

        'nama' => 'Egi Kurniawan',

        'judul_buku' => 'Atomic Habits',

        'tanggal_kembali' => now()->addDay(),

    ];

    Mail::to('farelmboiss@gmail.com')
        ->send(

            new ReminderMail(
                $transaksi,
                'reminder'
            )

        );

    return 'Email berhasil dikirim';

});

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::post('/login', [

    LoginController::class,
    'login'

])->name('login');

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [

    LoginController::class,
    'logout'

])->name('logout');

/*
|--------------------------------------------------------------------------
| FORGOT PASSWORD
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', [

    PasswordController::class,
    'forgotForm'

])->name('forgot.password');

Route::post('/forgot-password', [

    PasswordController::class,
    'sendReset'

])->name('forgot.password.send');

/*
|--------------------------------------------------------------------------
| RESET PASSWORD
|--------------------------------------------------------------------------
*/

Route::get('/reset-password', [

    PasswordController::class,
    'resetForm'

])->name('password.reset.form');

Route::post('/reset-password', [

    PasswordController::class,
    'resetPassword'

])->name('password.reset');

/*
|--------------------------------------------------------------------------
| UBAH PASSWORD SISWA
|--------------------------------------------------------------------------
*/

Route::get('/ubah-password', [

    PasswordController::class,
    'form'

])->name('password.form');

Route::post('/ubah-password', [

    PasswordController::class,
    'update'

])->name('password.update');

/*
|--------------------------------------------------------------------------
| UBAH PASSWORD PETUGAS
|--------------------------------------------------------------------------
*/

Route::get('/ubah-password-petugas', [

    PasswordController::class,
    'form'

])->name('password.petugas.form');

Route::post('/ubah-password-petugas', [

    PasswordController::class,
    'update'

])->name('password.petugas.update');

/*
|--------------------------------------------------------------------------
| UBAH PASSWORD KEPALA SEKOLAH
|--------------------------------------------------------------------------
*/

Route::get('/ubah-password-kepsek', [

    PasswordController::class,
    'form'

])->name('password.kepsek.form');

Route::post('/ubah-password-kepsek', [

    PasswordController::class,
    'update'

])->name('password.kepsek.update');

/*
|--------------------------------------------------------------------------
| DASHBOARD SISWA
|--------------------------------------------------------------------------
*/

Route::middleware('siswa')->group(function () {

    Route::get('/dashboard/siswa', [

        DashboardController::class,
        'dashboardSiswa'

    ])->name('dashboard.siswa');

});

/*
|--------------------------------------------------------------------------
| DASHBOARD PETUGAS
|--------------------------------------------------------------------------
*/

Route::middleware('petugas')->group(function () {

    Route::get('/dashboard/petugas', [

        DashboardController::class,
        'dashboardPetugas'

    ])->name('dashboard.petugas');

});

/*
|--------------------------------------------------------------------------
| DASHBOARD KEPALA SEKOLAH
|--------------------------------------------------------------------------
*/

Route::middleware('kepala_sekolah')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard/kepala-sekolah', [

        DashboardController::class,
        'dashboardKepalaSekolah'

    ])->name('dashboard.kepsek');

    /*
    |--------------------------------------------------------------------------
    | INFORMASI BUKU
    |--------------------------------------------------------------------------
    */

    Route::get('/kepsek/buku', [

        DashboardController::class,
        'dataBukuKepsek'

    ])->name('kepsek.buku');

    /*
    |--------------------------------------------------------------------------
    | DETAIL BUKU
    |--------------------------------------------------------------------------
    */

    Route::get('/kepsek/buku/{id}', [

        BukuController::class,
        'detailkepsek'

    ])->name('kepsek.buku.detail');

    /*
    |--------------------------------------------------------------------------
    | INFORMASI SISWA
    |--------------------------------------------------------------------------
    */

    Route::get('/kepsek/siswa', [

        DashboardController::class,
        'dataSiswaKepsek'

    ])->name('kepsek.siswa');

    /*
    |--------------------------------------------------------------------------
    | DETAIL SISWA
    |--------------------------------------------------------------------------
    */

    Route::get('/kepsek/siswa/{id}', [

        SiswaController::class,
        'detailkepsek'

    ])->name('kepsek.siswa.detail');

    /*
    |--------------------------------------------------------------------------
    | INFORMASI TRANSAKSI
    |--------------------------------------------------------------------------
    */

    Route::get('/kepsek/transaksi', [

        DashboardController::class,
        'transaksiKepsek'

    ])->name('kepsek.transaksi');

    /*
    |--------------------------------------------------------------------------
    | DETAIL TRANSAKSI
    |--------------------------------------------------------------------------
    */

    Route::get('/kepsek/transaksi/{id}', [

        TransaksiController::class,
        'detailkepsek'

    ])->name('kepsek.transaksi.detail');

});

/*
|--------------------------------------------------------------------------
| KATEGORI NONAKTIF
|--------------------------------------------------------------------------
*/

Route::get('/kategori/nonaktif', [

    KategoriController::class,
    'nonaktif'

])->name('kategori.nonaktif');

Route::put('/kategori/{id}/aktifkan', [

    KategoriController::class,
    'aktifkan'

])->name('kategori.aktifkan');

/*
|--------------------------------------------------------------------------
| BUKU NONAKTIF
|--------------------------------------------------------------------------
*/

Route::get('/buku/nonaktif', [

    BukuController::class,
    'nonaktif'

])->name('buku.nonaktif');

Route::put('/buku/{id}/aktifkan', [

    BukuController::class,
    'aktifkan'

])->name('buku.aktifkan');

/*
|--------------------------------------------------------------------------
| SISWA NONAKTIF
|--------------------------------------------------------------------------
*/

Route::get('/siswa/nonaktif', [

    SiswaController::class,
    'nonaktif'

])->name('siswa.nonaktif');

Route::put('/siswa/{id}/aktifkan', [

    SiswaController::class,
    'aktifkan'

])->name('siswa.aktifkan');

/*
|--------------------------------------------------------------------------
| RESOURCE
|--------------------------------------------------------------------------
*/

Route::resource(
    'kategori',
    KategoriController::class
);

Route::resource(
    'buku',
    BukuController::class
);

Route::resource(
    'siswa',
    SiswaController::class
);

Route::resource(
    'petugas',
    PetugasController::class
);

Route::resource(
    'sanksi',
    SanksiController::class
);

Route::resource(
    'transaksi',
    TransaksiController::class
);

/*
|--------------------------------------------------------------------------
| IMPORT
|--------------------------------------------------------------------------
*/

Route::post('/buku/import', [

    BukuController::class,
    'import'

])->name('buku.import');

Route::post('/siswa/import', [

    SiswaController::class,
    'import'

])->name('siswa.import');

/*
|--------------------------------------------------------------------------
| SCAN QR
|--------------------------------------------------------------------------
*/

Route::get('/scan', [

    TransaksiController::class,
    'scanForm'

])->name('scan');

Route::post('/scan-siswa-process', [

    TransaksiController::class,
    'scanSiswaProcess'

])->name('scan.siswa');

Route::post('/scan-buku-process', [

    TransaksiController::class,
    'scanBukuProcess'

])->name('scan.buku');

/*
|--------------------------------------------------------------------------
| PENGEMBALIAN
|--------------------------------------------------------------------------
*/

Route::get('/pengembalian/{id}', [

    TransaksiController::class,
    'formPengembalian'

])->name('pengembalian.form');

Route::post('/pengembalian/{id}', [

    TransaksiController::class,
    'pengembalian'

])->name('pengembalian');

/*
|--------------------------------------------------------------------------
| SANKSI SELESAI
|--------------------------------------------------------------------------
*/

Route::post('/sanksi-selesai/{id}', [

    DashboardController::class,
    'sanksiSelesai'

])->name('sanksi.selesai');