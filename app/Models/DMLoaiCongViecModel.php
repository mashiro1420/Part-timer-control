<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMLoaiCongViecModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_loai_cong_viec'];
    protected $table = 'dm_loaicongviec';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
