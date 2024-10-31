<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SoTiet;

class SoTietController extends Controller
{
    public function __construct()
    {
        view()->share([
            'so_tiet_active' => 'active',
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
        $soTiet = SoTiet::orderByDesc('id')->paginate(15);
        return view('so_tiet.index', compact('soTiet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('so_tiet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $soTiet = SoTiet::findOrFail($id);

        if (!$soTiet) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('so_tiet.edit', compact('soTiet'));
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
        $soTiet = SoTiet::findOrFail($id);
        if (!$soTiet) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $soTiet->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }

    public function createOrUpdate($request , $id ='')
    {
        $soTiet = new SoTiet();
        if ($id) {
            $soTiet = SoTiet::findOrFail($id);
        }
        $soTiet->ten_so_tiet = $request->ten_so_tiet;
        $soTiet->so_phut = $request->so_phut;
        $soTiet->save();
    }
}
