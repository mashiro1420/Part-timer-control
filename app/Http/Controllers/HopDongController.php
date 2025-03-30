<?php

namespace App\Http\Controllers;

use App\Models\DMTrangThaiHopDongModel;
use App\Models\HopDongModel;
use App\Models\NhanVienModel;
use Illuminate\Http\Request;

class HopDongController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data=[];
        $query = HopDongModel::query()->select ('*');
        // if ($request->has('tk_ho_ten') && !empty($request->tk_ho_ten)){
        //     $query->where('ho_ten','like','%'.$request->tk_ho_ten.'%');
        //     $data['tk_ho_ten'] = $request->tk_ho_ten;
        // }
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
        $data['hop_dongs'] = $query->orderBy('id')->get();
        $data['trang_thais'] = DMTrangThaiHopDongModel::all();
        return view('Quan_ly_hop_dong.quan_ly_hop_dong',$data);
    }
    public function viewThem()
    {
        $data=[];
        $data['trang_thais'] = DMTrangThaiHopDongModel::all();
        $data['nhan_viens'] = NhanVienModel::all();
        return view('Quan_ly_hop_dong.them_hop_dong',$data);
    }
    public function viewSua(Request $request)
    {
        $data=[];
        $data['trang_thais'] = DMTrangThaiHopDongModel::all();
        $data['hop_dong'] = HopDongModel::find($request->id);
        return view('Quan_ly_hop_dong.sua_hop_dong',$data);
    }
    public function xlThem(Request $request){
        $hop_dong = new HopDongModel();
        $hop_dong_moi_nhat = HopDongModel::where('id_nhan_vien',$request->nhan_vien)->orderBy('id','DESC')->first();
        if($hop_dong_moi_nhat->den_ngay<$request->tu_ngay) return session()->flash('bao_loi','Ngày bắt đầu không hợp lệ');
        $hop_dong->id_nhan_vien = $request->nhan_vien;
        $hop_dong->tu_ngay = $request->tu_ngay;
        $hop_dong->den_ngay = $request->den_ngay;
        $hop_dong->id_trang_thai = $request->trang_thai;
        $hop_dong->link_hop_dong = $request->link_hop_dong;
        $hop_dong->save();
        return redirect()->route('ql_hd')->with('thanh_cong','Lưu thành công');
    }
    public function xlSua(Request $request){
        $hop_dong = HopDongModel::find($request->id);
        $hop_dong_truoc = HopDongModel::where('id_nhan_vien',$request->nhan_vien)->where('id','<',$request->id)->orderBy('id','DESC')->first();
        if($hop_dong_truoc->den_ngay<$request->tu_ngay) return session()->flash('bao_loi','Ngày bắt đầu không hợp lệ');
        $hop_dong->tu_ngay = $request->tu_ngay;
        $hop_dong->den_ngay = $request->den_ngay;
        $hop_dong->id_trang_thai = $request->trang_thai;
        $hop_dong->link_hop_dong = $request->link_hop_dong;
        $hop_dong->save();
        return redirect()->route('ql_hd')->with('thanh_cong','Lưu thành công');
    }
}
