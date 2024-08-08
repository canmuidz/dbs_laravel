<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected  $table ='binh_luans';

    protected $fillable = [
        'ngay_binh_luan',
        'noi_dung',
        'san_pham_id',
        'user_id',
        'danh_gia'
    ];
    
   //Một sản phẩm (san_phams) có thể có nhiều bình luận 
   //Một người dùng (users) có thể viết nhiều bình luận 
   public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }
    public function user()
    {
       return $this->belongsTo(User::class, 'user_id');
    }
    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class, 'san_pham_id');
    }

}  
