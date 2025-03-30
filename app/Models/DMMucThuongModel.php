<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMMucThuongModel extends Model
{
    use HasFactory;
    protected $fillable = ['ten_muc_thuong'];
    protected $table = 'dm_mucthuong';
    protected $primaryKey = 'id';
    protected $keytype = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
