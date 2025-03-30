<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVienModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_chuc_vu',
    ];
    protected $table = 'ql_nhanvien';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function ChucVu()
    {
        return $this->belongsTo(DMChucVuModel::class);
    }
    public function TaiKhoan()
    {
        return $this->hasOne(TaiKhoanModel::class, 'id', 'id_nhan_vien');
    }
    public function HopDong()
    {
        return $this->hasMany(HopDongModel::class, 'id', 'id_nhan_vien');
    }
}
