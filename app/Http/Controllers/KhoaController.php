<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Khoa;
use App\Http\Requests\KhoaRequest;

class KhoaController extends Controller
{
    public function __construct()
    {
        view()->share([
            'khoa_active' => 'active',
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
        $khoa = Khoa::orderBy('ma_khoa')->paginate(15);
        return view('khoa.index', compact('khoa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('khoa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KhoaRequest $request)
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
        $khoa = Khoa::findOrFail($id);

        if (!$khoa) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('khoa.edit', compact('khoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KhoaRequest $request, $id)
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
        $khoa = Khoa::find($id);
        if (!$khoa) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $khoa->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }

    public function createOrUpdate($request , $id ='')
    {
        $khoa = new Khoa();
        if ($id) {
            $khoa = Khoa::findOrFail($id);
        }
        $khoa->ma_khoa = $request->ma_khoa;
        $khoa->ten_khoa = $request->ten_khoa;
        $khoa->save();
    }
}
