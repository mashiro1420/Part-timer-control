<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoanModel extends Model
{
    use HasFactory;
    protected $fillable = ['tai_khoan'];
    protected $table = 'ql_taikhoan';
    protected $primaryKey = 'tai_khoan';
    protected $keytype = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function NhanVien()
    {
        return $this->belongsTo(NhanVienModel::class,'id_nhan_vien');
    }
    public function Quyen()
    {
        return $this->belongsTo(DMQuyenModel::class,'id_quyen');
    }

}
