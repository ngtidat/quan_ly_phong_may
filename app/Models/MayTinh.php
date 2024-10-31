<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MayTinh extends Model
{
    use HasFactory;
    protected $table = 'may_tinh';

    const TRANG_THAI = [
        1 => "Đang sử dụng",
        2 => "Đã hỏng"
    ];

    public function cauhinh()
    {
        return $this->hasOne(CauHinh::class, 'id', 'cau_hinh_id');
    }

    public function phongmay()
    {
        return $this->belongsTo(PhongMay::class, 'phong_may_id', 'id');
    }
}
