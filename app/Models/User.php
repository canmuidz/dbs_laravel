<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    const ROLE_ADMIN = 'Admin';
    const ROLE_USER = 'User';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'so_dien_thoai',
        'anh_dai_dien',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function binhLuans()
    {
        return $this->hasMany(BinhLuan::class, 'user_id');
    }
    
    public function baiViets()
    {
        return $this->hasMany(BaiViet::class, 'user_id');
    }
    public function userAnhdaidien()
    {
        //  Trả về URL avatar hoặc hình ảnh giữ chỗ mặc định
        return $this->anh_dai_dien ? $this->anh_dai_dien :  asset('assets/client/images/avatar.png');
    }
}
