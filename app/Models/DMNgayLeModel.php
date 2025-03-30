<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMNgayLeModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_ngay_le'];
    protected $table = 'dm_ngayle';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
