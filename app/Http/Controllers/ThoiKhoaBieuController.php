<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhanCongGiangDay;
use App\Models\GiaoVien;
use App\Models\MonHoc;
use App\Models\SoTiet;
use App\Models\PhongMay;

class ThoiKhoaBieuController extends Controller
{
    public function __construct()
    {
        view()->share([
            'thoi_khoa_bieu_active' => 'active',
            'dayWeeks' => PhanCongGiangDay::DAY_WEEKS,
            'casudung' => PhanCongGiangDay::CA_SU_DUNG,
        ]);
    }
    //
    public function index(Request $request)
    {
        $phanCong = PhanCongGiangDay::with(['giao_vien', 'mon_hoc', 'phong_may']);

        if ($request->ma_giao_vien) {
            $giaovien = GiaoVien::where('ma_giao_vien', $request->ma_giao_vien)->first();
            if ($giaovien) {
                $phanCong = $phanCong->where('giao_vien_id', $giaovien->id);
            }
        }

        if ($request->ma_mon_hoc) {
            $monhoc = MonHoc::where('ma_mon_hoc', $request->ma_mon_hoc)->first();
            if ($monhoc) {
                $phanCong = $phanCong->where('mon_hoc_id', $monhoc->id);
            }

        }
        if ($request->ma_phong_may) {
            $phongmay = PhongMay::where('ma_phong', $request->ma_phong_may)->first();
            if ($phongmay) {
                $phanCong = $phanCong->where('phong_may_id', $phongmay->id);
            }
        }

        $phanCong =   $phanCong->orderByDesc('id')->paginate(15);
        return view('thoi_khoa_bieu.index', compact('phanCong'));
    }
}
