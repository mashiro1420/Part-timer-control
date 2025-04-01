<?php

namespace App\Http\Controllers;

use App\Models\DMCaModel;
use App\Models\DMChucVuModel;
use App\Models\DMQuyenModel;
use App\Models\NhanVienModel;
use App\Models\TaiKhoanModel;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data=[];
        $query = NhanVienModel::query()->select ('*');
        if ($request->has('ho_ten_tk') && !empty($request->ho_ten_tk)){
            $query->where('ho_ten','like','%'.$request->ho_ten_tk.'%');
            $data['ho_ten_tk'] = $request->ho_ten_tk;
        }
        if ($request->has('chuc_vu_tk')&& !empty($request->chuc_vu_tk)){
            $query->where('id_chuc_vu',$request->chuc_vu_tk);
            $data['chuc_vu_tk'] = $request->chuc_vu_tk;
        }
        if ($request->has('ca_tk')&& !empty($request->ca_tk)){
            $query->where('ca_mac_dinh',$request->ca_tk);
            $data['ca_tk'] = $request->ca_tk;
        }
        if ($request->has('tk_gioi_tinh')&& !empty($request->tk_gioi_tinh)){
            $query->where('gioi_tinh',$request->tk_gioi_tinh);
            $data['tk_gioi_tinh'] = $request->tk_gioi_tinh;
        }
        if ($request->has('ngay_vao_lam_tk')&& !empty($request->ngay_vao_lam_tk)){
            $query->where('ngay_vao_lam',$request->ngay_vao_lam_tk);
            $data['ngay_vao_lam_tk'] = $request->ngay_vao_lam_tk;
        }
        if ($request->has('ngay_nghi_viec_tk')&& !empty($request->ngay_nghi_viec_tk)){
            $query->where('ngay_nghi_viec',$request->ngay_nghi_viec_tk);
            $data['ngay_nghi_viec_tk'] = $request->ngay_nghi_viec_tk;
        }
        if ($request->has('cmnd_tk') && !empty($request->cmnd_tk)){
            $query->where('cmnd','like','%'.$request->cmnd_tk.'%');
            $data['cmnd_tk'] = $request->cmnd_tk;
        }
        if ($request->has('trang_thai_tk')&& !empty($request->trang_thai_tk)){
            if($request->trang_thai_tk == 'active'){
                $query->whereNull('ngay_nghi_viec');
            }
            else if($request->trang_thai_tk == 'inactive'){
                $query->whereNotNull('ngay_nghi_viec');
            }
            $data['trang_thai_tk'] = $request->trang_thai_tk;
        }
        $data['nhan_viens'] = $query->orderBy('id')->get();
        $data['chuc_vus'] = DMChucVuModel::all();
        $data['cas'] = DMCaModel::all();
        return view('Quan_ly_nhan_vien.quan_ly_nhan_vien',$data);
    }
    public function viewThem()
    {
        $data=[];
        $data['quyens'] = DMQuyenModel::all();
        $data['chuc_vus'] = DMChucVuModel::all();
        $data['cas'] = DMCaModel::all();
        return view('Quan_ly_nhan_vien.them_nv',$data);
    }
    public function viewSua(Request $request)
    {
        $data=[];
        $data['chuc_vus'] = DMChucVuModel::all();
        $data['nhan_vien'] = NhanVienModel::find($request->id);
        $data['cas'] = DMCaModel::all();
        return view('Quan_ly_nhan_vien.sua_nv',$data);
    }
    public function xlThem(Request $request){
        $nhan_vien = new NhanVienModel();
        $nhan_vien->ho_ten = $request->ho_ten;
        $nhan_vien->ca_mac_dinh = $request->ca_mac_dinh;
        $nhan_vien->gioi_tinh = $request->gioi_tinh;
        $nhan_vien->noi_sinh = $request->noi_sinh;
        $nhan_vien->ngay_sinh = $request->ngay_sinh;
        $nhan_vien->ngay_vao_lam = $request->ngay_vao_lam;
        $nhan_vien->cmnd = $request->cmnd;
        $nhan_vien->ngay_cap = $request->ngay_cap;
        $nhan_vien->noi_cap = $request->noi_cap;
        $nhan_vien->quoc_tich = $request->quoc_tich;
        $nhan_vien->dan_toc = $request->dan_toc;
        $nhan_vien->ton_giao = $request->ton_giao;
        $nhan_vien->id_chuc_vu = $request->chuc_vu;
        $nhan_vien->save();
        $last_nhan_vien = NhanVienModel::orderBy('id','DESC')->first();
        $ma_nv = str_pad($last_nhan_vien->id,5,'0',STR_PAD_LEFT);
        $tai_khoan = new TaiKhoanModel();
        $tai_khoan->tai_khoan = $ma_nv;
        $tai_khoan->id_nhan_vien = $last_nhan_vien->id;
        $tai_khoan->id_quyen = $request->quyen;
        $tai_khoan->save();
        return redirect()->route('ql_nv');
    }
    public function xlSua(Request $request){
        $nhan_vien = NhanVienModel::find($request->id);
        $nhan_vien->ho_ten = $request->ho_ten;
        $nhan_vien->gioi_tinh = $request->gioi_tinh;
        $nhan_vien->ca_mac_dinh = $request->ca_mac_dinh;
        $nhan_vien->noi_sinh = $request->noi_sinh;
        $nhan_vien->ngay_sinh = $request->ngay_sinh;
        $nhan_vien->ngay_vao_lam = $request->ngay_vao_lam;
        $nhan_vien->ngay_nghi_viec = $request->ngay_nghi_viec;
        $nhan_vien->cmnd = $request->cmnd;
        $nhan_vien->ngay_cap = $request->ngay_cap;
        $nhan_vien->noi_cap = $request->noi_cap;
        $nhan_vien->quoc_tich = $request->quoc_tich;
        $nhan_vien->dan_toc = $request->dan_toc;
        $nhan_vien->ton_giao = $request->ton_giao;
        $nhan_vien->id_chuc_vu = $request->chuc_vu;
        $nhan_vien->save();
        return redirect()->route('ql_nv')->with('thanh_cong','Lưu thành công');
    }
}
