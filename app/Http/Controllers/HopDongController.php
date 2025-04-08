<?php

namespace App\Http\Controllers;

use App\Models\DMTrangThaiHopDongModel;
use App\Models\HopDongModel;
use App\Models\NhanVienModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HopDongController extends Controller
{
    public function viewQuanLy(Request $request)
    {
        $data=[];
        $query = HopDongModel::query()->select ('*','ql_hopdong.id as id_hop_dong')
        ->leftJoin('ql_nhanvien','ql_hopdong.id_nhan_vien','=','ql_nhanvien.id')
        ->leftJoin('dm_trangthaihopdong','ql_hopdong.id_trang_thai','=','dm_trangthaihopdong.id');
        if ($request->has('id_nhan_vien_tk') && !empty($request->id_nhan_vien_tk)){
            $query->where('id_nhan_vien','like','%'.$request->id_nhan_vien_tk.'%');
            $data['id_nhan_vien_tk'] = $request->id_nhan_vien_tk;
        }
        if ($request->has('tu_ngay_tk')&& !empty($request->tu_ngay_tk)){
            $query->where('tu_ngay',$request->tu_ngay_tk);
            $data['tu_ngay_tk'] = $request->tu_ngay_tk;
        }
        if ($request->has('den_ngay_tk')&& !empty($request->den_ngay_tk)){
            $query->where('den_ngay',$request->den_ngay_tk);
            $data['den_ngay_tk'] = $request->den_ngay_tk;
        }
        if ($request->has('trang_thai_tk')&& !empty($request->trang_thai_tk)){
            $query->where('id_trang_thai',$request->trang_thai_tk);
            $data['trang_thai_tk'] = $request->trang_thai_tk;
        }
        $data['hop_dongs'] = $query->orderBy('ql_hopdong.id')->paginate(5);
        $data['trang_thais'] = DMTrangThaiHopDongModel::all();
        return view('Quan_ly_hop_dong.quan_ly_hop_dong',$data);
    }
    public function viewThem()
    {
        $data=[];
        $data['trang_thais'] = DMTrangThaiHopDongModel::all();
        $data['hop_dongs'] = HopDongModel::all();
        $data['nhan_viens'] = NhanVienModel::whereNull('ngay_nghi_viec')->whereNot('ho_ten','Admin')->get();
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
        if(!empty($hop_dong_moi_nhat)){
            if($hop_dong_moi_nhat->den_ngay>$request->tu_ngay) {
                return session()->flash('bao_loi','Ngày bắt đầu không hợp lệ');
            }
        }
        $hop_dong->id_nhan_vien = $request->nhan_vien;
        $hop_dong->tu_ngay = $request->tu_ngay;
        $hop_dong->den_ngay = $request->den_ngay;
        if ($request->hasFile('file_hd')) {
            $file = $request->file_hd;
            //Lấy thời gian upload nối với tên file xong mã hóa md5 rồi nối đuôi file
            $filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $file->move('Hop_dong_data', $filename);
            $hop_dong->link_hop_dong = $filename;
        }
        $hop_dong->save();
        return redirect()->route('ql_hd')->with('thanh_cong','Lưu thành công');
    }
    public function xlSua(Request $request){
        $hop_dong = HopDongModel::find($request->id);
        $hop_dong_truoc = HopDongModel::where('id_nhan_vien',$request->nhan_vien)->where('id','<',$request->id)->orderBy('id','DESC')->first();
        if(!empty($hop_dong_truoc)){
            if($hop_dong_truoc->den_ngay<$request->tu_ngay) 
            return session()->flash('bao_loi','Ngày bắt đầu không hợp lệ');
        }
        $hop_dong->tu_ngay = $request->tu_ngay;
        $hop_dong->den_ngay = $request->den_ngay;
        if ($request->hasFile('file_hd')) {
            if(File::exists('Hop_dong_data/' . $hop_dong->link_hop_dong)){
                File::delete('Hop_dong_data/' . $hop_dong->link_hop_dong);
            }
            $file = $request->file_hd;
            $filename = md5(time() . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $file->move('Hop_dong_data', $filename);
            $hop_dong->link_hop_dong = $filename;
        }
        $hop_dong->save();
        return redirect()->route('ql_hd')->with('thanh_cong','Lưu thành công');
    }
    public function xlXoa(Request $request){
        $hop_dong = HopDongModel::find($request->id);
        $hop_dong->delete();    
        return redirect()->route('ql_hd')->with('thanh_cong','Lưu thành công');
    }
}
