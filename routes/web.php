<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth','verified', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});

Route::middleware('auth','verified')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [AssetController::class, 'list'])->name('dashboard.list');
    Route::get('/dashboard/show/{id}', [AssetController::class, 'show'])->name('dashboard.show');

    Route::get('/request', [AssetController::class, 'createRequest'])->name('request');
    Route::post('/request', [AssetController::class, 'store_request'])->name('request.submit');

    Route::post('/admin', [AssetController::class, 'store'])->name('admin.insert.asset');
    Route::get('/admin', [AssetController::class, 'request_list'])->name('admin.request');

    Route::get('/admin/request/edit/{id}', [AssetController::class, 'request_update'])->name('admin.request.edit');

});

require __DIR__ . '/auth.php';
