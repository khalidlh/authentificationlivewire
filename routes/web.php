<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Livewire\UserGestion;
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
    return view('autentification.form');
});
Route::get('/inscription', function () {
    return view('autentification.form');
});
Route::get('/Gestionusers', function () {
    return view('admin.users');
})->name('getionusers');
Route::get('/page', function () {
    return view('page');
})->name('page');
Route::get('/formchangepassword/{id}',[ChangePasswordController::class,'index'])->name('formchange');
Route::post('/actionchange{id}',[ChangePasswordController::class,'changePassword'])->name('actionchange');
