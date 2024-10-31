<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhanCongGiangDay;
use App\Models\PhongMay;
use Carbon\Carbon;
use App\Exports\PhongMayExport;

class ThoiGianSuDungController extends Controller
{
    public function __construct(PhongMay $phongMay)
    {
        view()->share([
            'thoi_gian_su_dung_active' => 'active',
            'trangthai' => $phongMay::TRANG_THAI,
            'loaiphong' => $phongMay::LOAI_PHONG,
        ]);
    }
    //
    public function index(Request $request)
    {
        $phongmay = PhongMay::with(['phancong' => function($query) use ($request) {
            if (isset($request->months) && !empty($request->months) && empty($request->years)) {
                $query->whereMonth('ngay_thang', $request->months);
            }
            if (isset($request->years) && !empty($request->years) && empty($request->months)) {
                $query->whereYear('ngay_thang', $request->years);
            }

            if (!empty($request->months) && !empty($request->years)) {
                $query->whereMonth('ngay_thang', $request->months)->whereYear('ngay_thang', $request->years);
            }
            $yearCurrent = date('Y');
            if ($request->quarterly) {

                if ($request->quarterly == 1) {
                    $start_date = '01-01-'.$yearCurrent;
                    $end_date = '30-03-'.$yearCurrent;
                    $start_date =  date('Y-m-d',strtotime($start_date));
                    $end_date = date('Y-m-d',strtotime($end_date));
                    $time_form = Carbon::createFromFormat('Y-m-d', $start_date)->setTime(00,00,00);
                    $time_to   = Carbon::createFromFormat('Y-m-d', $end_date)->setTime(23,59,59);

                    $query->where('ngay_thang', '>=', $time_form)->whereYear('ngay_thang', '<=', $time_to);
                }

                if ($request->quarterly == 1 && !empty($request->years)) {

                    $start_date = '01-01-'.$request->years;
                    $end_date = '30-03-'.$request->years;
                    $start_date =  date('Y-m-d',strtotime($start_date));
                    $end_date = date('Y-m-d',strtotime($end_date));
                    $time_form = Carbon::createFromFormat('Y-m-d', $start_date)->setTime(00,00,00);
                    $time_to   = Carbon::createFromFormat('Y-m-d', $end_date)->setTime(23,59,59);

                    $query->where('ngay_thang', '>=', $time_form)->whereYear('ngay_thang', '<=', $time_to);
                }

                if ($request->quarterly == 2) {
                    $start_date = '01-04-'.$yearCurrent;
                    $end_date = '30-06-'.$yearCurrent;
                    $start_date =  date('Y-m-d',strtotime($start_date));
                    $end_date = date('Y-m-d',strtotime($end_date));
                    $time_form = Carbon::createFromFormat('Y-m-d', $start_date)->setTime(00,00,00);
                    $time_to   = Carbon::createFromFormat('Y-m-d', $end_date)->setTime(23,59,59);

                    $query->where('ngay_thang', '>=', $time_form)->whereYear('ngay_thang', '<=', $time_to);
                }

                if ($request->quarterly == 2 && !empty($request->years)) {
                    $start_date = '01-04-'.$request->years;
                    $end_date = '30-06-'.$request->years;
                    $start_date =  date('Y-m-d',strtotime($start_date));
                    $end_date = date('Y-m-d',strtotime($end_date));
                    $time_form = Carbon::createFromFormat('Y-m-d', $start_date)->setTime(00,00,00);
                    $time_to   = Carbon::createFromFormat('Y-m-d', $end_date)->setTime(23,59,59);
                    $query->where('ngay_thang', '>=', $time_form)->whereYear('ngay_thang', '<=', $time_to);
                }

                if ($request->quarterly == 3) {
                    $start_date = '01-07-'.$yearCurrent;
                    $end_date = '30-09-'.$yearCurrent;
                    $start_date =  date('Y-m-d',strtotime($start_date));
                    $end_date = date('Y-m-d',strtotime($end_date));
                    $time_form = Carbon::createFromFormat('Y-m-d', $start_date)->setTime(00,00,00);
                    $time_to   = Carbon::createFromFormat('Y-m-d', $end_date)->setTime(23,59,59);

                    $query->where('ngay_thang', '>=', $time_form)->whereYear('ngay_thang', '<=', $time_to);
                }

                if ($request->quarterly == 3 && !empty($request->years)) {
                    $start_date = '01-07-'.$request->years;
                    $end_date = '30-09-'.$yearCurrent;
                    $start_date =  date('Y-m-d',strtotime($start_date));
                    $end_date = date('Y-m-d',strtotime($end_date));
                    $time_form = Carbon::createFromFormat('Y-m-d', $start_date)->setTime(00,00,00);
                    $time_to   = Carbon::createFromFormat('Y-m-d', $end_date)->setTime(23,59,59);

                    $query->where('ngay_thang', '>=', $time_form)->whereYear('ngay_thang', '<=', $time_to);
                }

                if ($request->quarterly == 4) {
                    $start_date = '01-10-'.$yearCurrent;
                    $end_date = '30-12-'.$yearCurrent;
                    $start_date =  date('Y-m-d',strtotime($start_date));
                    $end_date = date('Y-m-d',strtotime($end_date));
                    $time_form = Carbon::createFromFormat('Y-m-d', $start_date)->setTime(00,00,00);
                    $time_to   = Carbon::createFromFormat('Y-m-d', $end_date)->setTime(23,59,59);

                    $query->where('ngay_thang', '>=', $time_form)->whereYear('ngay_thang', '<=', $time_to);
                }

                if ($request->quarterly == 4 && !empty($request->years)) {
                    $start_date = '01-10-'.$request->years;
                    $end_date = '30-12-'.$request->years;
                    $start_date =  date('Y-m-d',strtotime($start_date));
                    $end_date = date('Y-m-d',strtotime($end_date));
                    $time_form = Carbon::createFromFormat('Y-m-d', $start_date)->setTime(00,00,00);
                    $time_to   = Carbon::createFromFormat('Y-m-d', $end_date)->setTime(23,59,59);

                    $query->where('ngay_thang', '>=', $time_form)->whereYear('ngay_thang', '<=', $time_to);
                }
            }
        }])->orderByDesc('id');

        if ($request->export) {
            $name = 'danh-sach-thong-ke-';
            return \Excel::download(new PhongMayExport($phongmay->get()), $name . Carbon::now() .'.xlsx');
        }

        $phongmay = $phongmay->paginate(15);

        return view('thong_ke.index', compact('phongmay'));
    }
}