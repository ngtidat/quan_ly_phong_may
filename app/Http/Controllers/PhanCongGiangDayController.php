<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhanCongGiangDay;
use App\Models\GiaoVien;
use App\Models\KhuVuc;
use App\Models\MonHoc;
use App\Models\PhongMay;
use Carbon\Carbon;

class PhanCongGiangDayController extends Controller
{
    public function __construct(KhuVuc $khuVuc)
    {
        view()->share([
            'phan_cong_active' => 'active',
            'giaovien' =>  GiaoVien::all(),
            'monhoc' =>  MonHoc::all(),
            'phongmay' =>  PhongMay::all(),
            'khu_vuc' => $khuVuc->all(),
            'dayWeeks' => PhanCongGiangDay::DAY_WEEKS,
            'casudung' => PhanCongGiangDay::CA_SU_DUNG,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $phanCong = PhanCongGiangDay::with(['giao_vien', 'mon_hoc', 'khu_vuc']);

        if ($request->phong_may_id) {
            $phanCong->where('phong_may_id', $request->phong_may_id);
        }
        // Ca muon
        if ($request->ca_su_dung) {
            $phanCong->where('ca_su_dung', $request->ca_su_dung);
        }

        if ($request->khu_vuc_id) {
            $phanCong->join('phong_may', 'phong_may.id', '=', 'phong_may_id')
                ->where('khu_vuc_id', $request->khu_vuc_id);
        }

        // Ngay muon
        if ($request->ngay_thang) {
            $phanCong->where('ngay_thang', $request->ngay_thang);
            //$phanCong ->rightJoin('phong_may', 'phong_may.id', '=', 'phong_may_id');
        };

        //

        $phanCong = $phanCong->orderByDesc('ngay_thang')->paginate(15);
        return view('phan_cong_giang_day.index', compact('phanCong'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $phongMay = $request->input('ma_phong');

        $caSuDung = $request->input('ca_su_dung');
        $ngayThang = $request->input('ngay_thang');

        return view('phan_cong_giang_day.create', compact('phongMay', 'caSuDung', 'ngayThang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function select(Request $request)
    {
        // Lấy thông tin ngày mượn và ca sử dụng từ request
        //$ngayThang = '2024-09-12';
        $ngayThang = $request->ngay_thang ?: now()->format('Y-m-d');
        $caSuDung = $request->ca_su_dung ?: 1;

        $phongDaMuon = PhanCongGiangDay::where('ngay_thang', $ngayThang)
        ->where('ca_su_dung', $caSuDung)
        ->pluck('phong_may_id')->toArray();

        $phongTrong = PhongMay::with('khuvuc')->whereNotIn('id', $phongDaMuon)->get();

        return view('phan_cong_giang_day.select', compact('phongTrong' , 'caSuDung', 'ngayThang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check1 = PhanCongGiangDay::where(['phong_may_id' => $request->phong_may_id, 'ngay_thang' => $request->ngay_thang,
                                    'ca_su_dung' => $request->ca_su_dung])->first();

        if ($check1) {
            return redirect()->back()->with('error', 'Phòng học đã được xếp lịch mời bạn chọn phòng khác');
        }
        $check2 = PhanCongGiangDay::where(['giao_vien_id' => $request->giao_vien_id, 'ca_su_dung' => $request->ca_su_dung, 'ngay_thang' => $request->ngay_thang])->first();

        if ($check2) {
            return redirect()->back()->with('error', 'Giáo viên đã được xếp lịch, mời bạn chọn giáo viên khác');
        }

        if ($check2) {
            return redirect()->back()->with('error', 'Giáo viên đã được xếp lịch, mời bạn chọn giáo viên khác');
        }
        //
        \DB::beginTransaction();
        try {
            $this->createOrUpdate($request);
            \DB::commit();
            return redirect()->back()->with('success', 'Thêm mới thành công');
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $phanCong = PhanCongGiangDay::findOrFail($id);

        if (!$phanCong) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('phan_cong_giang_day.edit', compact('phanCong'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        \DB::beginTransaction();
        try {
            $this->createOrUpdate($request, $id);
            \DB::commit();
            return redirect()->back()->with('success', 'Chỉnh sửa thành công');
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $phanCong = PhanCongGiangDay::findOrFail($id);
        if (!$phanCong) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $phanCong->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }

    public function createOrUpdate($request, $id = '')
    {
        $phanCong = new PhanCongGiangDay();
        if ($id) {
            $phanCong = PhanCongGiangDay::findOrFail($id);
        }
        $phanCong->giao_vien_id = $request->giao_vien_id;
        $phanCong->mon_hoc_id  = $request->mon_hoc_id;
        $phanCong->phong_may_id  = $request->phong_may_id;
        $phanCong->ngay_thang  = $request->ngay_thang;
        $phanCong->ca_su_dung  = $request->ca_su_dung;
        $phanCong->thu  = $request->thu;
        $phanCong->so_tiet  = $request->so_tiet;
        $phanCong->save();
    }
}
