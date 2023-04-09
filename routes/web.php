<?php

use App\Http\Controllers\TiketController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [TiketController::class, 'index'])->name('home');
Route::get('/tiket',[TiketController::class,'index'])->name('tiket.index');
Route::get('/tiket',[TiketController::class,'index']);
Route::get('/tiket',[TiketController::class,'index']);
Route::get('/Tiket/create',[TiketController::class,'create']);
Route::post('/Tiket/create',[TiketController::class,'store'])->name('create_tiket');
Route::get('/edit/{id}',[TiketController::class,'update']);
Route::post('/update_tiket/{id}',[TiketController::class,'save_update']);
Route::get('/tiket-laptop/{id}',[TiketController::class,'delete'])->name('tiket.delete');

Route::get('/tiket/cetak_pdf', [TiketController::class,'export_pdf'])->name('exportPdf');
Route::get('/tiket/export_excel', [TiketController::class,'export_excel'])->name('downloadExcel');