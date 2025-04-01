<?php

namespace App\Console\Commands;

use App\Models\DMTrangThaiHopDongModel;
use App\Models\HopDongModel;
use App\Models\NhanVienModel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckHopDongStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-hop-dong-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kiểm tra trạng thái hợp đồng';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $hop_dongs = HopDongModel::all();
        $hom_nay = Carbon::parse(date('Y-m-d'));
        foreach($hop_dongs as $hop_dong){
            if($hop_dong->TrangThai->ten_trang_thai!='Vô thời hạn'){
                $den_ngay = Carbon::parse($hop_dong->den_ngay);
                $tu_ngay = Carbon::parse($hop_dong->tu_ngay);
                if($hom_nay->greaterThan($den_ngay) && $hop_dong->TrangThai->ten_trang_thai!='Hết hiệu lực'){
                    $hop_dong->id_trang_thai=DMTrangThaiHopDongModel::where('ten_trang_thai','Hết hiệu lực')->first()->id;
                    $hop_dong->NhanVien->ngay_nghi_viec = date('Y-m-d');
                    $this->info('Hết hiệu lực');
                }
                if($hom_nay->lessThan($tu_ngay) && $hop_dong->TrangThai->ten_trang_thai!='Chưa có hiệu lực'){
                    $hop_dong->id_trang_thai=DMTrangThaiHopDongModel::where('ten_trang_thai','Chưa có hiệu lực')->first()->id;
                    $hop_dong->NhanVien->ngay_vao_lam = date('Y-m-d');
                    $this->info('Chưa có hiệu lực');
                }
                if($hom_nay->betweenIncluded($tu_ngay, $den_ngay) && $hop_dong->TrangThai->ten_trang_thai!='Đang có hiệu lực'){
                    $hop_dong->id_trang_thai=DMTrangThaiHopDongModel::where('ten_trang_thai','Đang có hiệu lực')->first()->id;
                    $this->info('Đang có hiệu lực');
                }
            }
            $hop_dong->save();
        }
        $nhan_viens = NhanVienModel::where('ngay_nghi_viec'!=null);
        foreach($nhan_viens as $nhan_vien){
            $hop_dong_moi_nhat = HopDongModel::where('id_nhan_vien',$nhan_vien->id)->orderBy('den_ngay','DESC')->first();
            $ngay_bat_dau = Carbon::parse($hop_dong_moi_nhat->tu_ngay);
            $ngay_ket_thuc = Carbon::parse($hop_dong_moi_nhat->den_ngay);
            if($hom_nay->betweenIncluded($ngay_bat_dau, $ngay_ket_thuc)){
                $nhan_vien->ngay_nghi_viec=null;
            }
            $nhan_vien->save();
        } 
        $this->info('Cập nhật thành công');
    }
}
