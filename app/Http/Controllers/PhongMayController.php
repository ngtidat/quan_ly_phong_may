<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhongMay;
use App\Models\KhuVuc;
use App\Models\MayTinh;
use App\Http\Requests\PhongMayRequest;

class PhongMayController extends Controller
{
    public function __construct(PhongMay $phongMay, KhuVuc $khuVuc, MayTinh $mayTinh)
    {
        view()->share([
            'phong_may_active' => 'active',
            'khuvuc' => $khuVuc->all(),
            'loaiphong' => $phongMay::LOAI_PHONG,
            'trangthai' => $phongMay::TRANG_THAI,
            'trangthaimay' => $mayTinh::TRANG_THAI,
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
        $phongmay = $phongmay->orderByDesc('id')->paginate(15);

        foreach ($phongmay as $item) {
            $item->so_may_hoat_dong = $item->maytinh()->where('trang_thai', 1)->count();
            $item->tong_so_may = $item->maytinh()->count();
        }
        
        return view('phong_may.index', compact('phongmay'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('phong_may.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhongMayRequest $request)
    {
        //
        \DB::beginTransaction();
        try {
            $phongmay = new PhongMay();
            $phongmay->ma_phong = $request->ma_phong;
            $phongmay->ten_phong = $request->ten_phong;
            $phongmay->loai_phong = $request->loai_phong;
            $phongmay->khu_vuc_id  = $request->khu_vuc_id;
            $phongmay->trang_thai  = $request->trang_thai;
            $phongmay->save();
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
        $phongmay = PhongMay::find($id);
        if (!$phongmay) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('phong_may.edit', compact('phongmay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhongMayRequest $request, $id)
    {
        //
        \DB::beginTransaction();
        try {
            $phongmay = PhongMay::find($id);
            $phongmay->ma_phong = $request->ma_phong;
            $phongmay->ten_phong = $request->ten_phong;
            $phongmay->loai_phong = $request->loai_phong;
            $phongmay->khu_vuc_id  = $request->khu_vuc_id;
            $phongmay->trang_thai  = $request->trang_thai;
            $phongmay->save();
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
        $phongmay = PhongMay::find($id);
        if (!$phongmay) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $phongmay->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }
    public function listComputer($id)
    {
        $phongmay = PhongMay::with(['maytinh' => function ($query) {
            $query->with('cauhinh')->orderByDesc('so_thu_tu');
        }, 'khuvuc'])->find($id);
        return view('may_tinh.index', compact('phongmay'));
    }
}
