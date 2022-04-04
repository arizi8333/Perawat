<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('logout', [App\Http\Controllers\Auth\LoginController::class,'logout']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // Komite
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'komiteindex'])->name('admin.home');

        // Master Data
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
            Route::get('/data', [App\Http\Controllers\UserController::class, 'data']);
            Route::post('/create', [App\Http\Controllers\UserController::class, 'create']);
            Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
            Route::post('/update/{id}', [App\Http\Controllers\UserController::class, 'update']);
            Route::get('/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']);
        });

        Route::group(['prefix' => 'tempat-dinas'], function () {
            Route::get('/', [App\Http\Controllers\TempatDinasController::class, 'index'])->name('lokasi.index');
            Route::get('/data', [App\Http\Controllers\TempatDinasController::class, 'data']);
            Route::post('/create', [App\Http\Controllers\TempatDinasController::class, 'create']);
            Route::get('/edit/{id}', [App\Http\Controllers\TempatDinasController::class, 'edit']);
            Route::post('/update/{id}', [App\Http\Controllers\TempatDinasController::class, 'update']);
            Route::get('/delete/{id}', [App\Http\Controllers\TempatDinasController::class, 'delete']);
        });

        Route::group(['prefix' => 'jenis-kredensial'], function () {
            Route::get('/', [App\Http\Controllers\JenisKredensialController::class, 'index'])->name('jenis-kredensial.index');
            Route::get('/data', [App\Http\Controllers\JenisKredensialController::class, 'data']);
            Route::post('/create', [App\Http\Controllers\JenisKredensialController::class, 'create']);
            Route::get('/edit/{id}', [App\Http\Controllers\JenisKredensialController::class, 'edit']);
            Route::post('/update/{id}', [App\Http\Controllers\JenisKredensialController::class, 'update']);
            Route::get('/delete/{id}', [App\Http\Controllers\JenisKredensialController::class, 'delete']);
        });

        Route::group(['prefix' => 'perawat-klinik'], function () {
            Route::get('/', [App\Http\Controllers\JenisPerawatKlinikController::class, 'index'])->name('perawat-klinik.index');
            Route::get('/data', [App\Http\Controllers\JenisPerawatKlinikController::class, 'data']);
            Route::post('/create', [App\Http\Controllers\JenisPerawatKlinikController::class, 'create']);
            Route::get('/edit/{id}', [App\Http\Controllers\JenisPerawatKlinikController::class, 'edit']);
            Route::post('/update/{id}', [App\Http\Controllers\JenisPerawatKlinikController::class, 'update']);
            Route::get('/delete/{id}', [App\Http\Controllers\JenisPerawatKlinikController::class, 'delete']);
        });

        // Credensial Requeirement

        Route::group(['prefix' => 'persyaratan'], function () {
            Route::get('/', [App\Http\Controllers\PersyaratanController::class, 'index'])->name('persyaratan.index');
            Route::get('/data', [App\Http\Controllers\PersyaratanController::class, 'data']);
            Route::post('/create', [App\Http\Controllers\PersyaratanController::class, 'create']);
            Route::get('/edit/{id}', [App\Http\Controllers\PersyaratanController::class, 'edit']);
            Route::post('/update/{id}', [App\Http\Controllers\PersyaratanController::class, 'update']);
            Route::get('/delete/{id}', [App\Http\Controllers\PersyaratanController::class, 'delete']);
        });

        Route::group(['prefix' => 'kewenangan'], function () {
            Route::get('/', [App\Http\Controllers\KewenanganController::class, 'index'])->name('kewenangan.index');
            Route::get('/data', [App\Http\Controllers\KewenanganController::class, 'data']);
            Route::post('/create', [App\Http\Controllers\KewenanganController::class, 'create']);
            Route::get('/edit/{id}', [App\Http\Controllers\KewenanganController::class, 'edit']);
            Route::post('/update/{id}', [App\Http\Controllers\KewenanganController::class, 'update']);
            Route::get('/delete/{id}', [App\Http\Controllers\KewenanganController::class, 'delete']);
        });

        // Kredensial Masuk

        Route::group(['prefix' => 'Kredensial-masuk'], function () {
            Route::get('/', [App\Http\Controllers\RequestKredensialController::class, 'index'])->name('request-kredensial.index');
            Route::get('/data', [App\Http\Controllers\RequestKredensialController::class, 'data']);
            Route::post('/create', [App\Http\Controllers\RequestKredensialController::class, 'create']);
            Route::post('/store', [App\Http\Controllers\RequestKredensialController::class, 'store']);

            Route::get('/edit/{id}', [App\Http\Controllers\RequestKredensialController::class, 'edit']);
            Route::post('/update/{id}', [App\Http\Controllers\RequestKredensialController::class, 'update']);
            Route::get('/delete/{id}', [App\Http\Controllers\RequestKredensialController::class, 'delete']);

            Route::get('/detail/{id}', [App\Http\Controllers\RequestKredensialController::class, 'detail']);
            Route::get('/detail/action/{id}/{id1}', [App\Http\Controllers\RequestKredensialController::class, 'action']);

            Route::get('/detail/berkas/{id}', [App\Http\Controllers\BerkasController::class, 'databerkas']);
            Route::post('/detail/berkas/action', [App\Http\Controllers\BerkasController::class, 'actionberkas']);
        });

        Route::group(['prefix' => 'Kredensial-riwayat'], function () {
            Route::get('/', [App\Http\Controllers\LaporanKredensialController::class, 'RiwayatKredensialPerawat'])->name('riwayat-kredensial.index');
            Route::get('/data', [App\Http\Controllers\UserController::class, 'data_perawat']);
            Route::get('/detail/{id}', [App\Http\Controllers\LaporanKredensialController::class, 'DetailRiwayatKredensialPerawat'])->name('DetailRiwayatKredensialPerawat');
            Route::get('/detail/data/{id}', [App\Http\Controllers\LaporanKredensialController::class, 'data_DetailRiwayatKredensialPerawat']);
            Route::get('/detail/kewenangan/{id}', [App\Http\Controllers\LaporanKredensialController::class, 'DetailKewenanganKredensialPerawat']);
        });

        Route::group(['prefix' => 'Kredensial-laporan'], function () {
            Route::get('/', [App\Http\Controllers\LaporanKredensialController::class, 'LaporanPembuatanKredensial'])->name('laporan-kredensial.index');
            Route::get('/data/{id}/{id1}', [App\Http\Controllers\LaporanKredensialController::class, 'data_laporan']);
        });

        Route::group(['prefix' => 'spk-rkk'], function () {
            Route::get('/', [App\Http\Controllers\LaporanKredensialController::class, 'spk_rkk'])->name('spk-rkk.index');
            Route::get('/data', [App\Http\Controllers\LaporanKredensialController::class, 'data_spk_rkk']);
            Route::get('/kompetensi/{id}', [App\Http\Controllers\KewenanganController::class, 'unitkompetensi']);
            Route::post('/kompetensi/update', [App\Http\Controllers\KewenanganController::class, 'update_unitkompetensi']);
        });
    });
    
    // Direktur Utama
    
    Route::group(['prefix' => 'dirut'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'direkturHome'])->name('direktur.home');

        Route::group(['prefix' => 'Kredensial-masuk'], function () {
            Route::get('/', [App\Http\Controllers\RequestKredensialController::class, 'index'])->name('request-kredensial.index');
            Route::post('/action/{id}', [App\Http\Controllers\RequestKredensialController::class, 'upload_ttd']);
        });

        Route::group(['prefix' => 'Kredensial-riwayat'], function () {
            Route::get('/', [App\Http\Controllers\LaporanKredensialController::class, 'RiwayatKredensialPerawat']);
            Route::get('/data', [App\Http\Controllers\UserController::class, 'data_perawat']);
            Route::get('/detail/{id}', [App\Http\Controllers\LaporanKredensialController::class, 'DetailRiwayatKredensialPerawat']);
            Route::get('/detail/data/{id}', [App\Http\Controllers\LaporanKredensialController::class, 'data_DetailRiwayatKredensialPerawat']);
            Route::get('/detail/kewenangan/{id}', [App\Http\Controllers\LaporanKredensialController::class, 'DetailKewenanganKredensialPerawat']);
        });

        Route::group(['prefix' => 'Kredensial-laporan'], function () {
            Route::get('/', [App\Http\Controllers\LaporanKredensialController::class, 'LaporanPembuatanKredensial']);
            Route::get('/data/{id}/{id1}', [App\Http\Controllers\LaporanKredensialController::class, 'data_laporan']);
        });
    });

    // Perawat
    Route::group(['prefix' => 'perawat'], function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'perawatHome'])->name('perawat.home');

        Route::group(['prefix' => 'Kredensial-masuk'], function () {
            Route::get('/', [App\Http\Controllers\RequestKredensialController::class, 'index'])->name('request-kredensial.perawat');
            Route::get('/data', [App\Http\Controllers\RequestKredensialController::class, 'data']);

            Route::post('/create', [App\Http\Controllers\RequestKredensialController::class, 'create']);
            Route::post('/store', [App\Http\Controllers\RequestKredensialController::class, 'store']);

            Route::get('/edit/{id}', [App\Http\Controllers\RequestKredensialController::class, 'edit']);

            Route::get('/delete/{id}', [App\Http\Controllers\RequestKredensialController::class, 'delete']);

            Route::get('/detail/{id}', [App\Http\Controllers\RequestKredensialController::class, 'detail']);

            Route::get('/detail/berkas/{id}', [App\Http\Controllers\BerkasController::class, 'databerkas']);
            Route::post('/detail/berkas/update', [App\Http\Controllers\RequestKredensialController::class, 'berkas_update']);
        });

        Route::group(['prefix' => 'spk-rkk'], function () {
            Route::get('/', [App\Http\Controllers\LaporanKredensialController::class, 'spk_rkk'])->name('spk-rkk.index');
            Route::get('/data', [App\Http\Controllers\LaporanKredensialController::class, 'data_spk_rkk']);
        });

        Route::group(['prefix' => 'persyaratan'], function () {
            Route::get('/', [App\Http\Controllers\PersyaratanController::class, 'index']);
        });

        Route::group(['prefix' => 'kewenangan'], function () {
            Route::get('/', [App\Http\Controllers\KewenanganController::class, 'index']);
        });
    });

    Route::get('/berkas/{id}/{id1}', [App\Http\Controllers\BerkasController::class, 'cekberkas']);
    Route::get('/cetak/spk/{id}', [App\Http\Controllers\LaporanKredensialController::class, 'cetak_spk']);
    Route::get('/cetak/rkk/{id}', [App\Http\Controllers\LaporanKredensialController::class, 'cetak_rkk']);
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile']);
    Route::get('/notif', [App\Http\Controllers\UserController::class, 'notif']);
});
