<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MembroController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthController::class, 'index']);

Route::get('/dashboard', [AuthController::class, 'dashboard']);

Route::get('/signout', [AuthController::class, 'signOut'])->name('signout');

Route::get('/cadastro', [MembroController::class, 'index'])->name('cadastro');




Route::post('/customlogin', [AuthController::class, 'customLogin'])->name('auth.login');
