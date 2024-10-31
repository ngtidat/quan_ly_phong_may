<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\PhongMay;
use App\Models\KhuVuc;
use App\Models\PhanCongGiangDay;

class HomeController extends AdminBaseController
{
    //;
    public function __construct(PhongMay $phongMay, KhuVuc $khuVuc)
    {
        view()->share([
            'home_active' => 'active',
            'khuvuc' => $khuVuc->all(),
            'loaiphong' => $phongMay::LOAI_PHONG,
            'trangthai' => $phongMay::TRANG_THAI,
        ]);
    }

    public function index(Request $request)
    {
        $phongmay = PhongMay::with(['khuvuc']);
        if ($request->ma_phong) {
            $phongmay->where('ma_phong', $request->ma_phong);
        }

        if ($request->ten_phong) {
            $phongmay->where('ten_phong', 'like', '%'. $request->ten_phong .'%');
        }
        if ($request->loai_phong) {
            $phongmay->where('loai_phong', $request->loai_phong);
        }
        if ($request->trang_thai) {
            $phongmay->where('trang_thai', $request->trang_thai);
        }
        if ($request->khu_vuc_id) {
            $phongmay->where('khu_vuc_id', $request->khu_vuc_id);
        }
        $phongmay = $phongmay->orderByDesc('id')->paginate(20);
        return view('home.index', compact('phongmay'));
    }
}
