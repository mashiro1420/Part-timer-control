<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopDongModel extends Model
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
    public function TrangThai()
    {
        return $this->belongsTo(DMTrangThaiHopDongModel::class);
    }
    public function NhanVien()
    {
        return $this->belongsTo(TaiKhoanModel::class);
    }
}
