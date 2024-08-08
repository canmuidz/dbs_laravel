<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiViet extends Model
{
    use HasFactory;

    protected $table = 'bai_viets';
    protected $fillable = [
        'tieu_de_bai_viet',
        'anh_bai_viet',
        'noi_dung',
        'ngay_dang',
        'mo_ta_ngan',
        'user_id',
        'created_at',
        'updated_at	',
    ];

    public function baiviet_user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    // hơi thừa nma để phân biệt cũng được 
    public function sdt_user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
