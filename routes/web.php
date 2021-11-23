<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\TruyenController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', [IndexController::class, 'home'])->name('home');
Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc']);
Route::get('/xem-truyen/{slug}', [IndexController::class, 'xemtruyen']);
Route::get('/xem-chapter/{slug}', [IndexController::class, 'xemchapter']);
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('danhmuc', DanhMucController::class);
Route::resource('truyen', TruyenController::class);
Route::resource('chapter', ChapterController::class);
Route::resource('theloai', TheLoaiController::class);
