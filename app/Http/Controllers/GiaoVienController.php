<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khoa;
use App\Models\GiaoVien;
use App\Http\Requests\GiaoVienRequest;

class GiaoVienController extends Controller
{
    //
    public function __construct(Khoa $khoa)
    {
        view()->share([
            'giao_vien_active' => 'active',
            'khoa' => $khoa->all(),
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
        $giaovien = GiaoVien::with(['khoa'])->orderBy('ma_giao_vien')->paginate(15);
        return view('giao_vien.index', compact('giaovien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('giao_vien.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiaoVienRequest $request)
    {
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
        $giaovien = GiaoVien::findOrFail($id);

        if (!$giaovien) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('giao_vien.edit', compact('giaovien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GiaoVienRequest $request, $id)
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
        $giaovien = GiaoVien::find($id);
        if (!$giaovien) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $giaovien->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }

    public function createOrUpdate($request , $id ='')
    {
        $giaovien = new GiaoVien();
        if ($id) {
            $giaovien = GiaoVien::findOrFail($id);
        }
        $giaovien->ma_giao_vien = $request->ma_giao_vien;
        $giaovien->ten_giao_vien = $request->ten_giao_vien;
        $giaovien->khoa_id = $request->khoa_id;

        if (isset($request->images) && !empty($request->images)) {
            $image = upload_image('images');
            if ($image['code'] == 1)
                $giaovien->hinh_anh = $image['name'];
        }

        $giaovien->save();
    }
}
