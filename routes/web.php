<?php

use App\Http\Controllers\DangNhapController;
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
    return view('Dang_nhap.dang_nhap');
});
Route::get('dang_nhap',[DangNhapController::class, 'viewDangNhap'])->name('dang_nhap');
Route::post('xl_dang_nhap',[DangNhapController::class, 'login']);
Route::get('xl_dang_xuat',[DangNhapController::class, 'logout']);
