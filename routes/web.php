<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [HomeController::class, 'index']);

// Login - register
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

// Editable Pages
Route::get('/portfolio', [PortfolioController::class, 'index']);
Route::post('/portfolio', [PortfolioController::class, 'store']);
Route::get('/portfolio/{id}', [PortfolioController::class, 'detail']);
Route::get('/portfolio/show/{id}', [PortfolioController::class, 'show']);
Route::post('/portfolio/update/{id}', [PortfolioController::class, 'update'])->name('update');
Route::get('/portfolio/delete/{id}', [PortfolioController::class, 'delete'])->name('delete');


Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/{id}', [ArtikelController::class, 'detail']);
Route::get('/artikel/show/{id}', [ArtikelController::class, 'show']);
Route::post('/artikel/edit/{id}', [ArtikelController::class, 'edit']);
Route::get('/artikel/delete/{id}', [ArtikelController::class, 'delete']);

Route::get('/pengajar', [PengajarController::class, 'index']);
Route::get('/pengajar/show/{id}', [PengajarController::class, 'show']);
Route::post('/pengajar/edit/{id}', [PengajarController::class, 'edit']);
Route::get('/pengajar/delete/{id}', [PengajarController::class, 'delete']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/artikeldash', [ArtikelController::class, 'dashboard']);
Route::post('/artikeldash', [ArtikelController::class, 'store']);
Route::get('/pengajardash', [PengajarController::class, 'base'])->middleware('auth');
Route::post('/pengajardash', [PengajarController::class, 'store'])->middleware('auth');
