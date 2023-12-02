<?php

use App\Http\Controllers\ProfileController;
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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])
            ->middleware(['verified'])
            ->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('dashboard')->group(function () {
        Route::group(['middleware' => ['role:operator']], function () {
            Route::resource('sektor', App\Http\Controllers\Operator\SektorController::class);
            Route::resource('izin', App\Http\Controllers\Operator\IzinController::class);
            Route::resource('/lapor-izin', App\Http\Controllers\Operator\LaporIzinController::class);
            Route::resource('/lapor-izin-import', App\Http\Controllers\Operator\LaporIzinImportController::class);
            Route::resource('/rekap-izin', App\Http\Controllers\Operator\RekapIzinController::class);
            Route::post('/lapor-izin-import', [App\Http\Controllers\Operator\LaporIzinImportController::class, 'import'])->name('lapor-izin-import.import');
            Route::resource('/lapor-izin-oss', App\Http\Controllers\Operator\LaporIzinOSSController::class);
        });
        Route::group(['middleware' => ['role:admin']], function () {
            Route::resource('/admin-lapor-izin', App\Http\Controllers\Admin\LaporIzinController::class);
        });
    });

    Route::get('/lapor-izin-import/download_format', [App\Http\Controllers\Operator\LaporIzinImportController::class, 'download_format'])->name('lapor-izin-import.download_format');


    require __DIR__ . '/auth.php';
});
