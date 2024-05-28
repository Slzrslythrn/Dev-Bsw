<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\CctvController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AppController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('layanan')->group(function () {
        Route::get('/', [LayananController::class, 'index'])->name('layanan');
        Route::get('/tambah', [LayananController::class, 'create'])->name('layanan.add');
        Route::post('/tambah', [LayananController::class, 'store'])->name('layanan.store');
        Route::get('/{id}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
        Route::put('/{id}/edit', [LayananController::class, 'update'])->name('layanan.update');
        Route::delete('{id}/hapus', [LayananController::class, 'destroy'])->name('layanan.destroy');
    });

    Route::prefix('menu')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menu');
        Route::get('/tambah', [MenuController::class, 'create'])->name('menu.add');
        Route::post('/tambah', [MenuController::class, 'store'])->name('menu.store');
        Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/{id}/edit', [MenuController::class, 'update'])->name('menu.update');
        Route::delete('{id}/hapus', [MenuController::class, 'destroy'])->name('menu.destroy');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.profile');
        Route::put('/password', [UserController::class, 'update'])->name('user.profile.update.password');
        Route::patch('/profile', [UserController::class, 'updateProfile'])->name('user.profile.update');
    });

    Route::prefix('cctv')->group(function () {
        Route::get('/', [CctvController::class, 'index'])->name('cctv');
        Route::get('/tambah', [CctvController::class, 'create'])->name('cctv.add');
        Route::post('/tambah', [CctvController::class, 'store'])->name('cctv.store');
        Route::get('/detail/{id}/cctv', [CctvController::class, 'detailCctv'])->name('cctv.detail');
        Route::delete('/{id}/delete', [CctvController::class, 'destroy'])->name('cctv.destroy');
    });

    Route::prefix('pengumuman')->group(function () {
        Route::get('/', [PengumumanController::class, 'index'])->name('pengumuman');
        Route::get('/tambah', [PengumumanController::class, 'create'])->name('pengumuman.add');
        Route::post('/tambah', [PengumumanController::class, 'store'])->name('pengumuman.store');
        Route::get('/{id}/edit', [PengumumanController::class, 'edit'])->name('pengumuman.edit');
        Route::put('/{id}/update', [PengumumanController::class, 'update'])->name('pengumuman.update');
        Route::delete('/{id}/delete', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
    });
    
    Route::prefix('slider')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name('slider');
        Route::get('/tambah', [SliderController::class, 'create'])->name('slider.add');
        Route::post('/tambah', [SliderController::class, 'store'])->name('slider.store');
        Route::get('/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
        Route::put('/{id}/update', [SliderController::class, 'update'])->name('slider.update');
        Route::delete('/{id}/delete', [SliderController::class, 'destroy'])->name('slider.destroy');
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
