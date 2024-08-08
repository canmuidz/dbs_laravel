<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;
    protected $table = 'san_phams';
    protected $fillable =[
        'anh_san_pham',
        'tieu_de_san_pham',
        'mo_ta_san_pham',
        'so_luong_phong',
        'gia',
        'dien_tich',
        'dia_chi',
        'danh_muc_id',   
        'user_id',
        'is_type',

    ];


    protected $casts =[
        'is_type'=>'boolean',
    ];

    public function danhMuc(){
        return $this->belongsTo(DanhMuc::class);
    }

    public function hinhAnhSanPham(){
        return $this->hasMany(HinhAnhSanPham::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class, 'san_pham_id');
    }
    public function sdt_user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
