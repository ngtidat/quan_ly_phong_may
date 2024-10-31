<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanCongGiangDay extends Model
{
    use HasFactory;
    protected $table = 'phan_cong_giang_day';

    public function giao_vien()
    {
        return $this->belongsTo(GiaoVien::class, 'giao_vien_id', 'id');
    }

    public function mon_hoc()
    {
        return $this->belongsTo(MonHoc::class, 'mon_hoc_id', 'id');
    }

    public function phong_may()
    {
        return $this->belongsTo(PhongMay::class, 'phong_may_id', 'id');
    }

    public function khu_vuc()
    {
        return $this->belongsTo(KhuVuc::class, 'khu_vuc_id', 'id');
    }

    const DAY_WEEKS = [
        2 => 'Thứ 2',
        3 => 'Thứ 3',
        4 => 'Thứ 4',
        5 => 'Thứ 5',
        6 => 'Thứ 6',
        7 => 'Thứ 7',
        8 => 'Chủ nhật',
    ];

    const CA_SU_DUNG = [
        1 => 'Ca 1',
        2 => 'Ca 2',
        3 => 'Ca 3',
        4 => 'Ca 4',
    ];
}
