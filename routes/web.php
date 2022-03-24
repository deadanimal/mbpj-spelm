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
use App\Http\Controllers\ManualController;
use App\Http\Controllers\UserPermohonanController;
use App\Http\Controllers\PermohonanTuntutanController;
use App\Http\Controllers\ChangePasswordController;





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
Route::resource('user_permohonans',UserPermohonanController::class)->middleware(['auth']);

Route::resource('tuntutans',TuntutanController::class)->middleware(['auth']);
Route::resource('permohonan_tuntutans',PermohonanTuntutanController::class)->middleware(['auth']);


Route::resource('laporans',LaporanController::class)->middleware(['auth']);
Route::resource('profiles',ProfileController::class)->middleware(['auth']);
Route::resource('users',UserController::class)->middleware(['auth']);

Route::resource('manuals',ManualController::class)->middleware(['auth']);
Route::get('/upload-file', [ManualController::class, 'createForm']);
Route::post('/upload-file', [ManualController::class, 'fileUpload'])->name('fileUpload');

// custom kemaskini pengesah
Route::put('/kemaskinipegawaipengesah/{id}',[PermohonanController::class,'kemaskinipegawaipengesah']);

// custom kemaskini tuntutan
Route::put('/kemaskinipegawaituntutan/{id}',[TuntutanController::class,'kemaskinipegawaituntutan']);

//sokong sebelum
Route::get('/sokong_sebelum/{id}',[PermohonanController::class,'sokong_sebelum']);
Route::post('/tolak_sokong_sebelum',[PermohonanController::class,'tolak_sokong_sebelum']);

//Lulus_sebelum
Route::get('/lulus_sebelum/{id}',[PermohonanController::class,'lulus_sebelum']);
Route::post('/tolak_lulus_sebelum',[PermohonanController::class,'tolak_lulus_sebelum']);

//hantar time permohonan
Route::get('/sebenar_mula_akhir_kerja/{id}',[PermohonanController::class,'sebenar_mula_akhir_kerja']);
Route::post('/sebenar_mula_akhir_kerja/{id}',[PermohonanController::class,'sebenar_mula_akhir_kerja']);

//sokong selepas
Route::get('/sokong_selepas/{id}',[PermohonanController::class,'sokong_selepas']);
Route::post('/tolak_sokong_selepas',[PermohonanController::class,'tolak_sokong_selepas']);

//lulus selepas
Route::get('/lulus_selepas/{id}',[PermohonanController::class,'lulus_selepas']);
Route::post('/tolak_lulus_selepas',[PermohonanController::class,'tolak_lulus_selepas']);

//hantar time tuntutan
Route::get('/sebenar_mula_akhir_tuntutan/{id}',[PermohonanController::class,'sebenar_mula_akhir_tuntutan']);
Route::post('/sebenar_mula_akhir_tuntutan/{id}',[PermohonanController::class,'sebenar_mula_akhir_tuntutan']);

//sokong tuntutan
Route::get('/sokong_tuntutan/{id}',[TuntutanController::class,'sokong_tuntutan']);
Route::post('/tolak_sokong_tuntutan',[TuntutanController::class,'tolak_sokong_tuntutan']);

//lulus tuntutan
Route::get('/lulus_tuntutan/{id}',[TuntutanController::class,'lulus_tuntutan']);
Route::post('/tolak_lulus_tuntutan',[TuntutanController::class,'tolak_lulus_tuntutan']);

//Semak tuntutan
Route::get('/semak_tuntutan/{id}',[TuntutanController::class,'semak_tuntutan']);
Route::post('/tolak_semak_tuntutan',[TuntutanController::class,'tolak_semak_tuntutan']);

//Periksa tuntutan
Route::get('/periksa_tuntutan/{id}',[TuntutanController::class,'periksa_tuntutan']);
Route::post('/tolak_eriksa_tuntutan',[TuntutanController::class,'tolak_eriksa_tuntutan']);

Route::post('/permohonans-ubah-masa_mula_saya/{permohonan}', [PermohonanController::class, 'kemaskini_masa_mula_saya']);
Route::post('/permohonans-ubah-masa_akhir_saya/{permohonan}', [PermohonanController::class, 'kemaskini_masa_akhir_saya']);

// permohonan custom ubah masa
Route::post('/permohonans-ubah-masa_mula/{permohonan}', [PermohonanController::class, 'kemaskini_masa_mula']);
Route::post('/permohonans-ubah-masa_akhir/{permohonan}', [PermohonanController::class, 'kemaskini_masa_akhir']);

// Generate tuntutan bulk
Route::get('/bulktuntutan', [PermohonanController::class, 'jana_tuntutan']);

//custom action tuntutan
Route::post('/kemaskini_status2/{permohonan}', [PermohonanController::class, 'kemaskini_status2']);
Route::post('/kemaskini_total_tuntutan/{permohonan}', [PermohonanController::class, 'kemaskini_total_tuntutan']);
Route::post('/kemaskini_jam_tuntutan/{permohonan}', [PermohonanController::class, 'kemaskini_jam_tuntutan']);

Route::get('/getmajlisuser', [UserController::class,'getmajlisuser']);

//Forgot Password
Route::post('change-password', [ChangePasswordController::class,'store'])->name('change.password');


//Filter Report
Route::get('/filter_laporan/{id}',[LaporanController::class,'filter_laporan']);
Route::get('/laporan_tuntutan/{id}',[TuntutanController::class,'laporan_tuntutan']);

//mohon kemaskini
Route::post('/mohon_kemaskini/{id}',[TuntutanController::class,'mohon_kemaskini']);
Route::post('/mohon_kemaskini2/{id}',[TuntutanController::class,'mohon_kemaskini2']);

//onchange tindakan periksa
Route::post('/kemaskinitindakanperiksa/{permohonan}', [TuntutanController::class, 'kemaskinitindakanperiksa']);
Route::post('/kemaskinitindakansemakan/{permohonan}', [TuntutanController::class, 'kemaskinitindakansemakan']);

//semak 1/3
Route::get('/semaksatupertiga/{id}',[TuntutanController::class,'semaksatupertiga']);
Route::get('/semaksebulan/{id}',[TuntutanController::class,'semaksebulan']);



// permohonan custom tukar masa
// Route::post('/permohonans-tukar-masa_mula/{permohonan}', [PermohonanController::class, 'kemaskini_masa_mula_tukar']);
// Route::post('/permohonans-tukar-masa_akhir/{permohonan}', [PermohonanController::class, 'kemaskini_masa_akhir_tukar']);



// Route::resource('/log_pengguna', AuditController::class);
// Route::get('/log_pemohon', [AuditController::class, 'log_pemohon']);
// Route::get('/log_pemohon/{id}', [AuditController::class, 'lihat_log_pemohon']);
Route::get('PermohonanSokongAll', 'PermohonanController@SokongAll');


require __DIR__.'/auth.php';
 

