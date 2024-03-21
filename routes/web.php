<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanKerusakanControllers;
use App\Http\Controllers\KomputerControllers;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');

Route::get('/',[LoginController::class,'index']);
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/PostLogin',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/r',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'register']);

Route::get('/user',[UserController::class,'index'])->middleware('admin');
Route::get('/user/tambah',[UserController::class,'create'])->middleware('admin');
Route::post('/user/simpan',[UserController::class,'store'])->middleware('admin');
Route::get('/user/{id}/edit',[UserController::class,'show'])->middleware('admin');
Route::post('/user/{id}/update',[UserController::class,'update'])->middleware('admin');
Route::get('/user/{id}/hapus',[UserController::class,'destroy'])->middleware('admin');
Route::get('/user/profile',[UserController::class,'profile'])->middleware('auth');
Route::get('/user/{id}/editp',[UserController::class,'editp'])->middleware('auth');
Route::post('/user/{id}/update1',[UserController::class,'editprofile'])->middleware('auth');


Route::get('/laporank',[LaporanKerusakanControllers::class,'index'])->middleware('auth');
Route::get('/laporank/{id}/tambah',[LaporanKerusakanControllers::class,'create'])->middleware('auth');
Route::post('/laporank/simpan',[LaporanKerusakanControllers::class,'store'])->middleware('auth');
Route::get('/laporank/{id}/edit',[LaporanKerusakanControllers::class,'show'])->middleware('auth');
Route::post('/laporank/{id}/update',[LaporanKerusakanControllers::class,'update'])->middleware('auth');
Route::get('/laporank/{id}/hapus',[LaporanKerusakanControllers::class,'destroy'])->middleware('auth');

Route::get('/komputer',[KomputerControllers::class,'index'])->middleware('auth');
Route::get('/komputer/tambah',[KomputerControllers::class,'create'])->middleware('teknisi');
Route::post('/komputer/simpan',[KomputerControllers::class,'store'])->middleware('teknisi');
Route::get('/komputer/{id}/edit',[KomputerControllers::class,'show'])->middleware('teknisi');
Route::put('/komputer/update', [KomputerControllers::class, 'update'])->middleware('teknisi');
Route::get('/komputer/{id}/hapus',[KomputerControllers::class,'destroy'])->middleware('teknisi');