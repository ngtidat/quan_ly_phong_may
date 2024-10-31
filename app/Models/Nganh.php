<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganh extends Model
{
    use HasFactory;
    protected $table = 'nganh';

    public function khoa()
    {
        return $this->belongsTo(Khoa::class, 'khoa_id', 'id');
    }
}
