<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMCaModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_ca'];
    protected $table = 'dm_ca';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
    public function NhanVien()
    {
        return $this->hasMany(NhanVienModel::class, 'ca_mac_dinh', 'id');
    }
}