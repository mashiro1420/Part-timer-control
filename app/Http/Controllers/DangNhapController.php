<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoanModel;
use Illuminate\Http\Request;

class DangNhapController extends Controller
{
	public function viewDangNhap()
	{
			$data=[];
			$data['bao_loi'] = session('bao_loi');
			session()->put('bao_loi', '');
			return view('Dang_nhap.dang_nhap',$data);//
	}
//-----------------------------------------
	public function login(Request $request)
	{
			$tai_khoan = $request->tai_khoan;
			$mat_khau = md5($request->mat_khau);
			$nguoi_dung = TaiKhoanModel::find($tai_khoan);
			session()->put('bao_loi', '');
			if (empty($nguoi_dung)) {
					$request->session()->put('bao_loi', 'Tài khoản không tồn tại');
			} else {
					if ($nguoi_dung->mat_khau != $mat_khau) {
							$request->session()->put('bao_loi', 'Sai mật khẩu');
					} else {
							$request->session()->put('bao_loi', '');
							$request->session()->put('tai_khoan', $tai_khoan);
							$request->session()->put('quyen', $nguoi_dung->Quyen->ten_quyen);
					}
			}
		if (session('bao_loi') == '') {
			if(session('quyen') == 'Admin') return redirect()->route('ql_tk');
				
			elseif(session('quyen') == 'Quản lý')return redirect()->route('ql_nv');
			// else return redirect()->route('ql_nv');
			
		} else {
				return redirect()->route('dang_nhap');
		}
	}
	public function logout(){
			session()->flush();
			return redirect()->route('dang_nhap');
	}
}
