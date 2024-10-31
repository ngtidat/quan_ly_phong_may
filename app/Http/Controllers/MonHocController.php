<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonHoc;
use App\Http\Requests\MonHocRequest;
use App\Models\Khoa;
use App\Models\Nganh;

class MonHocController extends Controller
{
    //
    public function __construct(Khoa $khoa, Nganh $nganh)
    {
        view()->share([
            'mon_hoc_active' => 'active',
            'khoa' => $khoa->all(),
            'nganh' => $nganh->all(),
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
        $monhoc = MonHoc::with(['khoa', 'nganh'])->orderByDesc('id')->paginate(15);
        return view('mon_hoc.index', compact('monhoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mon_hoc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MonHocRequest $request)
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
        $monhoc = MonHoc::findOrFail($id);

        if (!$monhoc) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('mon_hoc.edit', compact('monhoc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MonHocRequest $request, $id)
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
        $monhoc = MonHoc::find($id);
        if (!$monhoc) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $monhoc->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }

    public function createOrUpdate($request , $id ='')
    {
        $monhoc = new MonHoc();
        if ($id) {
            $monhoc = MonHoc::findOrFail($id);
        }
        $monhoc->ma_mon_hoc = $request->ma_mon_hoc;
        $monhoc->ten_mon_hoc = $request->ten_mon_hoc;
        $monhoc->so_tiet_thuc_hanh = $request->so_tiet_thuc_hanh;
        $monhoc->khoa_id = $request->khoa_id;
        $monhoc->nganh_id = $request->nganh_id;
        $monhoc->save();
    }

    public function branch(Request $request)
    {
        if ($request->ajax()) {
            $nganh = Nganh::where('khoa_id', $request->id)->get();
            $html =  view('mon_hoc.item_branch', compact('nganh'))->render();
            return response([
                'html' => $html
            ]);
        }
    }
}
