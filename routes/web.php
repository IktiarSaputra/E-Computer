<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Location\LocationController;
use App\Http\Controllers\Computer\ComputerController;

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
    return redirect(route('login'));
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard.admin');
    });
});

Route::prefix('user')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard.user');
});


Route::middleware(['auth'])->group(function () {

    Route::resource('location', LocationController::class);
    Route::resource('computer', ComputerController::class);
    Route::get('/location/delete/{id}', [LocationController::class, 'destroy'])->name('delete.location');
    Route::get('/computer/delete/{id}', [ComputerController::class, 'destroy'])->name('delete.computer');
    Route::get('/cetak', [ComputerController::class, 'print'])->name('print.computer');
    Route::get('/export/location',[LocationController::class, 'export'])->name('export.location');
    Route::get('/export/computer',[ComputerController::class, 'export'])->name('export.computer');
    
});