<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/kirimemail', [EmailController::class, 'index'])->name('index');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // dd(Auth::user());
    if (Auth::user()->role == 2) {
        return view('admin.dashboard');
    }
    else {
        return view('petugas.dashboard');
    }

})->middleware(['auth'])->name('dashboard');

Route::get('/petugas/document', function () {
    return view('petugas.document');
});

Route::get('/admin/document', function () {
    return view('admin.document');
});

require __DIR__.'/auth.php';

Route::prefix('aduan')->name('aduan.')->group(function () {
    Route::get('/', [AduanController::class, 'index'])->name('index');
    Route::post('/create', [AduanController::class, 'create'])->name('create');
    Route::patch('/edit/{id}', [AduanController::class, 'edit'])->name('edit');
    Route::get('/delete/{id}', [AduanController::class, 'delete'])->name('delete');
});


Route::get('/acceptAduan/{id}', [AduanController::class, 'acceptAduan'])->name('acceptAduan');
Route::get('/declineAduan/{id}', [AduanController::class, 'declineAduan'])->name('declineAduan');
