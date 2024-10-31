<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MayTinh;
use App\Models\CauHinh;
use App\Models\PhongMay;
use App\Http\Requests\MayTinhRequest;

class MayTinhController extends Controller
{

    public function __construct(MayTinh $mayTinh, CauHinh $cauHinh)
    {
        view()->share([
            'home_active' => 'active',
            'trangthai' => $mayTinh::TRANG_THAI,
            'cauhinh' => $cauHinh->all(),
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        //
        $phongmays = PhongMay::withCount([
            'maytinh' => function ($query) {
                $query->where('trang_thai', 1); // Đếm số máy đang hoạt động
            }
        ])->get();
        
        return view('may_tinh.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $phongmay = PhongMay::find($id);
        if (!$phongmay) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('may_tinh.create', compact('phongmay'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MayTinhRequest $request, $id)
    {
        //
        \DB::beginTransaction();
        try {
            $maytinh = new MayTinh();
            $maytinh->ma_may = $request->ma_may;
            $maytinh->ten_may = $request->ten_may;
            $maytinh->so_thu_tu = $request->so_thu_tu;
            $maytinh->trang_thai = $request->trang_thai;
            $maytinh->ngay_nhap = $request->ngay_nhap;
            $maytinh->cau_hinh_id  = $request->cau_hinh_id;
            $maytinh->phong_may_id   = $id;
            $maytinh->save();
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
        $maytinh = MayTinh::with('phongmay')->find($id);
        if (!$maytinh) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('may_tinh.edit', compact('maytinh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MayTinhRequest $request, $id)
    {
        //
        \DB::beginTransaction();
        try {
            $maytinh = MayTinh::find($id);
            $maytinh->ma_may = $request->ma_may;
            $maytinh->ten_may = $request->ten_may;
            $maytinh->so_thu_tu = $request->so_thu_tu;
            $maytinh->trang_thai = $request->trang_thai;
            $maytinh->ngay_nhap = $request->ngay_nhap;
            $maytinh->cau_hinh_id  = $request->cau_hinh_id;
            $maytinh->save();
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
        $maytinh = MayTinh::find($id);
        if (!$maytinh) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $maytinh->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }

    public function information(Request $request, $id)
    {
        if ($request->ajax()) {
            $computer = MayTinh::with('cauhinh')->find($id);
            $html =  view('common.preview_information', compact('computer'))->render();
            return response([
                'html' => $html
            ]);
        }
    }
}
