<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CauHinhRequest;
use App\Models\CauHinh;

class CauHinhController extends Controller
{
    public function __construct()
    {
        view()->share([
            'cau_hinh_active' => 'active',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cauhinh = CauHinh::orderByDesc('id')->paginate(15);
        return view('cau_hinh.index', compact('cauhinh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cau_hinh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CauHinhRequest $request)
    {
        //
        \DB::beginTransaction();
        try {
            $cauhinh = new CauHinh();
            $cauhinh->ma_cau_hinh = $request->ma_cau_hinh;
            $cauhinh->main_board = $request->main_board;
            $cauhinh->cpu = $request->cpu;
            $cauhinh->ram  = $request->ram;
            $cauhinh->vga  = $request->vga;
            $cauhinh->monitor  = $request->monitor;
            $cauhinh->ngay_nhap  = $request->ngay_nhap;
            $cauhinh->save();
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
        $cauhinh = CauHinh::find($id);
        if (!$cauhinh) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('cau_hinh.edit', compact('cauhinh'));
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
            $cauhinh = CauHinh::find($id);
            $cauhinh->ma_cau_hinh = $request->ma_cau_hinh;
            $cauhinh->main_board = $request->main_board;
            $cauhinh->cpu = $request->cpu;
            $cauhinh->ram  = $request->ram;
            $cauhinh->vga  = $request->vga;
            $cauhinh->monitor  = $request->monitor;
            $cauhinh->ngay_nhap  = $request->ngay_nhap;
            $cauhinh->save();
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
        $cauhinh = CauHinh::find($id);
        if (!$cauhinh) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $cauhinh->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }
}
