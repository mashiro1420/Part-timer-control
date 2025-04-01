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

Route::get('ql_tk',[TaiKhoanController::class,'viewQuanLy'])->name('ql_tk')->middleware(['login.check']);
Route::get('sua_tk',[TaiKhoanController::class,'viewSua'])->name('sua_tk')->middleware(['login.check']);
Route::post('xl_phan_quyen',[TaiKhoanController::class, 'xlPhanQuyen'])->middleware(['login.check']);
Route::get('doi_mk',[TaiKhoanController::class,'viewDoiMK'])->name('doi_mk')->middleware(['login.check']);
Route::post('xl_doi_mk',[TaiKhoanController::class, 'xlDoiMK'])->middleware(['login.check']);

Route::get('ql_hd', [HopDongController::class, 'viewQuanLy'])->name('ql_hd')->middleware(['login.check']);
Route::get('them_hd', [HopDongController::class, 'viewThem'])->name('them_hd')->middleware(['login.check']);
Route::post('xl_them_hd',[HopDongController::class, 'xlThem'])->middleware(['login.check']);
Route::get('sua_hd', [HopDongController::class, 'viewSua'])->name('sua_hd')->middleware(['login.check']);
Route::post('xl_sua_hd',[HopDongController::class, 'xlSua'])->middleware(['login.check']);
Route::get('xl_xoa_hd',[HopDongController::class, 'xlXoa'])->name('xoa_hd')->middleware(['login.check']);

Route::get('ql_nv', [NhanVienController::class, 'viewQuanLy'])->name('ql_nv')->middleware(['login.check']);
Route::get('them_nv',[NhanVienController::class,'viewThem'])->name('them_nv')->middleware(['login.check']);
Route::post('xl_them_nv',[NhanVienController::class, 'xlThem'])->middleware(['login.check']);
Route::get('sua_nv',[NhanVienController::class,'viewSua'])->name('sua_nv')->middleware(['login.check']);
Route::post('xl_sua_nv',[NhanVienController::class, 'xlSua'])->middleware(['login.check']);
