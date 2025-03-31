<?php

use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\HopDongController;
use App\Http\Controllers\NhanVienController;
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

Route::get('ql_tk',[TaiKhoanController::class,'viewQuanLy'])->name('ql_tk');
Route::get('ql_hd', [HopDongController::class, 'viewQuanLy'])->name('ql_hd');
Route::get('ql_nv', [NhanVienController::class, 'viewQuanLy'])->name('ql_nv');

Route::get('them_tk',[TaiKhoanController::class,'viewThem'])->name('them_tk');
Route::get('them_hd', [HopDongController::class, 'viewThem'])->name('them_hd');
Route::get('them_nv',[NhanVienController::class,'viewThem'])->name('them_nv');
Route::get('sua_tk',[TaiKhoanController::class,'viewSua'])->name('sua_tk');
Route::get('sua_hd', [HopDongController::class, 'viewSua'])->name('sua_hd');
Route::get('sua_nv',[NhanVienController::class,'viewSua'])->name('sua_nv');
