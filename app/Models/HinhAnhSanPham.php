<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhAnhSanPham extends Model
{
    use HasFactory;

    protected $table = 'san_pham_anh_bien_thes';
    protected $fillable = [
        'san_pham_id',
        'anh_bien_the',
       

    ];

    public function sanPham(){
        return $this->belongsTo(SanPham::class);
    }
}
