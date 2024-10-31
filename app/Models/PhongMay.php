<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongMay extends Model
{
    use HasFactory;
    protected $table = 'phong_may';
    const LOAI_PHONG = [
        1 => "Phòng cấu hình cao",
        2 => "Phòng cấu hình thường"
    ];

    const TRANG_THAI = [
        1 => "Bảo trì",
        2 => "Đang hoạt động",
    ];

    public function khuvuc()
    {
        return $this->belongsTo(KhuVuc::class, 'khu_vuc_id', 'id');
    }
    public function maytinh()
    {
        return $this->hasMany(MayTinh::class, 'phong_may_id', 'id');
    }

    public function phancong()
    {
        return $this->hasMany(PhanCongGiangDay::class, 'phong_may_id', 'id');
    }
}
