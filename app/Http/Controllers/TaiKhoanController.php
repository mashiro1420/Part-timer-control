<?php

namespace App\Http\Controllers;

use App\Models\DMQuyenModel;
use App\Models\TaiKhoanModel;
use App\Models\NhanVienModel;
use Illuminate\Http\Request;

class TaiKhoanController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data=[];
        $data['quyen'] = 
        $query = TaiKhoanModel::query()->select('*');
        if($request->has('tai_khoan')&& !empty($request->tai_khoan)){
            $query = $query->where('tai_khoan', 'like', '%'.$request->tai_khoan.'%');
            $data['tai_khoan'] = $request->tai_khoan;
        }
        if($request->has('id_quyen')&& !empty($request->id_quyen)){
            $query = $query->where('id_quyen', '=', $request->id_quyen);
            $data['id_quyen'] = $request->id_quyen;
        }
        if($request->has('ho_ten')&& !empty($request->ho_ten)){
            $query = $query->where('id_hoc_sinh', 'like', '%'.$request->ho_ten.'%');
            $data['ho_ten'] = $request->ho_ten;
        }
        $data['tai_khoans'] = $query->get();
        $data['quyens'] = DMQuyenModel::all();
        $data['count']=0;
        return view('Quan_ly_tai_khoan.quan_ly_tai_khoan',$data);
    }
    public function xlDoiMK(Request $request){
        $tai_khoan = TaiKhoanModel::find($request->tai_khoan);
        if($tai_khoan->mat_khau != md5($request->mk_cu)){
            session()->flash('bao_loi', 'Mật khẩu không đúng');
            return redirect()->route('doi_mk',['id' => $tai_khoan->tai_khoan]);
        }
        if($request->mk_moi != $request->mk_lai){
            session()->flash('bao_loi', 'Mật khẩu xác nhận không giống với mật khẩu mới');
            return redirect()->route('doi_mk',['id' => $tai_khoan->tai_khoan]);
        }
        $tai_khoan->mat_khau = md5($request->mk_moi);
        $tai_khoan->save();
        session()->flash('bao_loi', 'Cập nhật mật khẩu thành công');
        return redirect()->route('doi_mk',['id' => $tai_khoan->tai_khoan]);
        
    }
    public function xlPhanQuyen(Request $request){
        $tai_khoan = TaiKhoanModel::find($request->tai_khoan);
        $tai_khoan->id_quyen = $request->quyen;
        $tai_khoan->save();
        session()->flash('bao_loi', 'Cập nhật quyền thành công');
        return redirect()->route('ql_tk');
    }

    public function viewSua(Request $request)
    {
        $data = [];
        $data['tai_khoan'] = TaiKhoanModel::find($request->id);
        $data['quyens'] = DMQuyenModel::all();
        return view('Quan_ly_tai_khoan.sua_tk', $data);
    }
    public function viewDoiMK(Request $request)
    {
        $data = [];
        $data['tai_khoan'] = TaiKhoanModel::find($request->id);
        return view('Quan_ly_tai_khoan.doi_mk', $data);
    }
}
