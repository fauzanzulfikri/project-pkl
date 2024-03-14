<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanKerusakanControllers;
use App\Http\Controllers\KomputerControllers;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

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

Route::get('/dashboard',[DashboardController::class,'index']);

Route::get('/',[LoginController::class,'index']);
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/PostLogin',[LoginController::class,'login']);
Route::get('/logout',[LoginController::class,'logout']);

Route::get('/user',[UserController::class,'index']);
Route::get('/user/tambah',[UserController::class,'create']);
Route::post('/user/simpan',[UserController::class,'store']);
Route::get('/user/{id}/edit',[UserController::class,'show']);
Route::post('/user/{id}/update',[UserController::class,'update']);
Route::get('/user/{id}/hapus',[UserController::class,'destroy']);

Route::get('/laporank',[LaporanKerusakanControllers::class,'index']);
Route::get('/laporank/{id}/tambah',[LaporanKerusakanControllers::class,'create']);
Route::post('/laporank/simpan',[LaporanKerusakanControllers::class,'store']);
Route::get('/laporank/{id}/edit',[LaporanKerusakanControllers::class,'show']);
Route::post('/laporank/{id}/update',[LaporanKerusakanControllers::class,'update']);
Route::get('/laporank/{id}/hapus',[LaporanKerusakanControllers::class,'destroy']);

Route::get('komputer',[KomputerControllers::class,'index']);
Route::get('komputer/tambah',[KomputerControllers::class,'create']);
Route::post('komputer/simpan',[KomputerControllers::class,'store']);
Route::get('komputer/{id}/edit',[KomputerControllers::class,'show']);
Route::post('komputer/{id}/update',[KomputerControllers::class,'update']);
Route::get('komputer/{id}/hapus',[KomputerControllers::class,'destroy']);