<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMTrangThaiHopDongModel extends Model
{
    use HasFactory;
    protected $table = 'dm_trangthaihopdong';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = false;
    public $timestamps = false;
    public function HopDong()
    {
        return $this->hasMany(HopDongModel::class, 'id', 'id_trang_thai');
    }
}
