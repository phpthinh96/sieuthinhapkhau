<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','full_name', 'email', 'password','user_sdt','user_dia_chi','user_anh'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function loainguoidung(){
        return $this->belongsTo("App\LoaiNguoiDung","loainguoidung_id","id");
    }

    public function donhang(){
        return $this->hasMany("App\DonHang","user_id","id");
    }

    public function binhluan(){
        return $this->hasMany("App\BinhLuan","user_id","id");
        
    }
}
