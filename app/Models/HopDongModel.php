<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopDongModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_nhan_vien',
        'id_trang_thai'
    ];
    protected $table = 'ql_hopdong';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function TrangThai()
    {
        return $this->belongsTo(DMTrangThaiHopDongModel::class,'id_trang_thai');
    }
    public function NhanVien()
    {
        return $this->belongsTo(NhanVienModel::class,'id_nhan_vien');
    }
}
