<?php

namespace App\Http\Controllers;

use App\Models\DMQuyenModel;
use App\Models\TaiKhoanModel;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data=[];
        $data['quyen'] = 
        $query = TaiKhoanModel::query()->select('*');
        // if($request->has('tk_tai_khoan')&& !empty($request->tk_tai_khoan)){
        //     $query = $query->where('tai_khoan', 'like', '%'.$request->tk_tai_khoan.'%');
        //     $data['tk_tai_khoan'] = $request->tk_tai_khoan;
        // }
        // if($request->has('tk_quyen')&& !empty($request->tk_quyen)){
        //     $query = $query->where('id_quyen', '=', $request->tk_quyen);
        //     $data['tk_quyen'] = $request->tk_quyen;
        // }
        // if($request->has('tk_ma_hoc_sinh')&& !empty($request->tk_ma_hoc_sinh)){
        //     $query = $query->where('id_hoc_sinh', 'like', '%'.$request->tk_ma_hoc_sinh.'%');
        //     $data['tk_ma_hoc_sinh'] = $request->tk_ma_hoc_sinh;
        // }
        // if($request->has('tk_nhan_vien')&& !empty($request->tk_nhan_vien)){
        //     $query = $query->where('id_nhan_vien', 'like', '%'.$request->tk_nhan_vien.'%');
        //     $data['tk_nhan_vien'] = $request->tk_nhan_vien;
        // }
        $data['tai_khoans'] = $query->get();
        $data['quyens'] = DMQuyenModel::all();
        return view('Quan_ly_tai_khoan.quan_ly_tai_khoan',$data);
    }
    public function xlDoiMK(Request $request){
        $tai_khoan = TaiKhoanModel::find($request->tai_khoan);
        if($tai_khoan->mat_khau != md5($request->mat_khau_cu)){
            session()->flash('bao_loi', 'Mật khẩu không đúng');
            return redirect()->route('cai_dat_tk');
        }
        if($request->mat_khau_moi != $request->xac_nhan){
            session()->flash('bao_loi', 'Mật khẩu xác nhận không giống với mật khẩu mới');
            return redirect()->route('cai_dat_tk');
        }
        $tai_khoan->mat_khau = md5($request->mat_khau_moi);
        $tai_khoan->save();
        session()->flash('bao_loi', 'Cập nhật mật khẩu thành công');
        return redirect()->route('cai_dat_tk')->with('thanh_cong','Lưu thành công');
        
    }
    public function xlPhanQuyen(Request $request){
        $tai_khoan = TaiKhoanModel::find($request->tai_khoan);
        $tai_khoan->id_quyen = $request->quyen;
        $tai_khoan->save();
        session()->flash('bao_loi', 'Cập nhật quyền thành công');
        return redirect()->route('ql_tk')->with('thanh_cong','Lưu thành công');
    }
}
