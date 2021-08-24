<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\TuntutanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengurusanpenggunaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaklumanController;
use App\Http\Controllers\AuditController;

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
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::resource('aduans',AduanController::class)->middleware(['auth']);
Route::resource('maklumans',MaklumanController::class)->middleware(['auth']);

Route::resource('faqs',FaqController::class)->middleware(['auth']);
Route::resource('permohonans',PermohonanController::class)->middleware(['auth']);
Route::resource('tuntutans',TuntutanController::class)->middleware(['auth']);
Route::resource('laporans',LaporanController::class)->middleware(['auth']);
Route::resource('profiles',ProfileController::class)->middleware(['auth']);
Route::resource('users',UserController::class)->middleware(['auth']);

Route::resource('/log_pengguna', AuditController::class);
Route::get('/log_pemohon', [AuditController::class, 'log_pemohon']);
Route::get('/log_pemohon/{id}', [AuditController::class, 'lihat_log_pemohon']);


require __DIR__.'/auth.php';
 

