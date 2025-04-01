<?php

namespace App\Http\Controllers;

use App\Models\DauViecModel;
use App\Models\DMLoaiCongViecModel;
use App\Models\DMTrangThaiCongViecModel;
use App\Models\NhanVienModel;
use Illuminate\Http\Request;

class DauViecController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data=[];
        $query = DauViecModel::query()->select ('*')
        ->leftJoin('dm_loaicongviec','ql_dauviec.id_loai_viec','=','dm_loaicongviec.id')
        ->leftJoin('dm_trangthaicongviec','ql_dauviec.id_trang_thai','=','dm_trangthaicongviec.id')
        ->leftJoin('ql_nhanvien','ql_dauviec.id_nhan_vien','=','ql_nhanvien.id');
        if ($request->has('id_nhan_vien') && !empty($request->id_nhan_vien)){
            $query->where('id_nhan_vien',$request->id_nhan_vien)->where('id_trang_thai','');
        }
        // if ($request->has('tk_chuc_vu')&& !empty($request->tk_chuc_vu)){
        //     $query->where('id_chuc_vu',$request->tk_chuc_vu);
        //     $data['tk_chuc_vu'] = $request->tk_chuc_vu;
        // }
        // if ($request->has('tk_gioi_tinh')&& !empty($request->tk_gioi_tinh)){
        //     $query->where('gioi_tinh',$request->tk_gioi_tinh);
        //     $data['tk_gioi_tinh'] = $request->tk_gioi_tinh;
        // }
        // if ($request->has('tk_noi_sinh')&& !empty($request->tk_noi_sinh)){
        //     $query->where('noi_sinh','like','%'.$request->tk_noi_sinh.'%');
        //     $data['tk_noi_sinh'] = $request->tk_noi_sinh;
        // }
        // if ($request->has('tk_trang_thai')&& !empty($request->tk_trang_thai)){
        //     if($request->tk_trang_thai == 'active'){
        //         $query->whereNull('ngay_nghi_viec');
        //     }
        //     else if($request->tk_trang_thai == 'inactive'){
        //         $query->whereNotNull('ngay_nghi_viec');
        //     }
        //     $data['tk_trang_thai'] = $request->tk_trang_thai;
        // }
        $data['dau_viecs'] = $query->orderBy('id')->get();
        $data['trang_thais'] = DMTrangThaiCongViecModel::all();
        $data['nhan_viens'] = NhanVienModel::all();
        $data['loai_viec'] = DMLoaiCongViecModel::all();

        return view('Quan_ly_dau_viec.quan_ly_dau_viec',$data);
    }
    public function viewThem()
    {
        $data=[];
        $data['trang_thais'] = DMTrangThaiCongViecModel::all();
        $data['nhan_viens'] = NhanVienModel::all();
        $data['loai_viec'] = DMLoaiCongViecModel::all();
        return view('Quan_ly_dau_viec.them_dau_viec',$data);
    }
    public function viewSua(Request $request)
    {
        $data=[];        
        $data['trang_thais'] = DMTrangThaiCongViecModel::all();
        $data['nhan_viens'] = NhanVienModel::all();
        $data['loai_viec'] = DMLoaiCongViecModel::all();
        $data['dau_viec'] = DauViecModel::find($request->id);
        return view('Quan_ly_dau_viec.sua_dau_viec',$data);
    }
    public function xlThem(Request $request){
        $dau_viec = new DauViecModel();
        $dau_viec->id_nhan_vien = $request->nhan_vien;
        $dau_viec->id_loai_viec	 = $request->loai_viec;
        $dau_viec->noi_dung = $request->noi_dung;
        if($request->thoi_gian_giao<date('Y-m-d')) return session()->flash('bao_loi','Ngày giao không hợp lệ');
        $dau_viec->thoi_gian_giao = $request->thoi_gian_giao;
        $dau_viec->save();
        return redirect()->route('ql_dv')->with('thanh_cong','Lưu thành công');
    }
    public function xlSua(Request $request){
        $dau_viec = DauViecModel::find($request->id);
        $dau_viec->id_loai_viec	 = $request->loai_viec;
        $dau_viec->noi_dung = $request->noi_dung;
        $dau_viec->id_trang_thai = $request->trang_thai;
        if($request->thoi_gian_giao<date('Y-m-d')) return session()->flash('bao_loi','Ngày giao không hợp lệ');
        $dau_viec->thoi_gian_giao = $request->thoi_gian_giao;
        $dau_viec->id_danh_gia = $request->danh_gia;
        $dau_viec->save();
        return redirect()->route('ql_dv')->with('thanh_cong','Lưu thành công');
    }
    public function xlXongViec(Request $request){
        $dau_viec = DauViecModel::find($request->id);
        $dau_viec->id_trang_thai = DMTrangThaiCongViecModel::where('ten_trang_thai','Chờ xác nhận')->first()->id;
        $dau_viec->save();
        return redirect()->route('ql_dv')->with('thanh_cong','Lưu thành công');
    }
    public function xlDanhGia(Request $request){
        $dau_viec = DauViecModel::find($request->id);
        $dau_viec->id_trang_thai = $request->trang_thai;
    if($request->trang_thai==DMTrangThaiCongViecModel::where('ten_trang_thai','Đã hoàn thành')->first()->id){
        $dau_viec->id_danh_gia = $request->danh_gia;
    }
    elseif($request->trang_thai==DMTrangThaiCongViecModel::where('ten_trang_thai','Không hoàn thành')->first()->id){
        $dau_viec->id_danh_gia = 0;
    }
        $dau_viec->save();
        return redirect()->route('ql_dv')->with('thanh_cong','Lưu thành công');
    }
}
