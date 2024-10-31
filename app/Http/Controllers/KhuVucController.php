<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KhuVucRequest;
use App\Models\KhuVuc;

class KhuVucController extends Controller
{
    public function __construct()
    {
        view()->share([
            'khu_vuc_active' => 'active',
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
        $khuvuc = KhuVuc::orderByDesc('id')->paginate(15);
        return view('khu_vuc.index', compact('khuvuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('khu_vuc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KhuVucRequest $request)
    {
        //
        \DB::beginTransaction();
        try {
            $khuvuc = new KhuVuc();
            $khuvuc->ten_khu_vuc = $request->ten_khu_vuc;
            $khuvuc->save();
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
        $khuvuc = KhuVuc::find($id);
        if (!$khuvuc) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('khu_vuc.edit', compact('khuvuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KhuVucRequest $request, $id)
    {
        //
        \DB::beginTransaction();
        try {
            $khuvuc = KhuVuc::find($id);
            $khuvuc->ten_khu_vuc = $request->ten_khu_vuc;
            $khuvuc->save();
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
        $khuvuc = KhuVuc::find($id);
        if (!$khuvuc) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $khuvuc->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }
}
