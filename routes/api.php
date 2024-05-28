<?php

use App\Http\Controllers\Api\MenuLayananController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Menu Layanan
Route::prefix('menu-layanan')->group(function () {
    Route::post('/', [MenuLayananController::class, 'index']);
    Route::get('/kategori', [MenuLayananController::class, 'kategori']);
    Route::post('/menu', [MenuLayananController::class, 'menu']);
    Route::post('/menu/terbanyak', [MenuLayananController::class, 'menuTerbanyak']);
});

Route::prefix('cctv')->group(function () {
    Route::get('/', [App\Http\Controllers\Api\CctvController::class, 'index']);
    Route::get('/{id}', [App\Http\Controllers\Api\CctvController::class, 'show']);
});
