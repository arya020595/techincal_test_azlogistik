<?php

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
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/karyawans', KaryawanController::class);
Route::get('/slip-gaji', [KaryawanController::class, 'gajiForm'])->name('slip_gaji.form');
Route::get('/slip-gaji/show/{karyawanId}', [KaryawanController::class, 'showSlipGaji'])->name('slip_gaji.show');