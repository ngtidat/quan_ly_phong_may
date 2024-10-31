<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    use HasFactory;
    protected $table = 'mon_hoc';

    public function khoa()
    {
        return $this->belongsTo(Khoa::class, 'khoa_id', 'id');
    }

    public function nganh()
    {
        return $this->belongsTo(Nganh::class, 'nganh_id', 'id');
    }
}
