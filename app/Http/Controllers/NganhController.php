<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nganh;
use App\Http\Requests\NganhRequest;
use App\Models\Khoa;

class NganhController extends Controller
{
    public function __construct(Khoa $khoa)
    {
        view()->share([
            'nganh_active' => 'active',
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
        $nganh = Nganh::with('khoa')->orderBy('khoa_id')->paginate(15);
        return view('nganh.index', compact('nganh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('nganh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NganhRequest $request)
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
        $nganh = Nganh::findOrFail($id);

        if (!$nganh) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('nganh.edit', compact('nganh'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NganhRequest $request, $id)
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
        $nganh = Nganh::findOrFail($id);
        if (!$nganh) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $nganh->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }

    public function createOrUpdate($request , $id ='')
    {
        $nganh = new Nganh();
        if ($id) {
            $nganh = Nganh::findOrFail($id);
        }
        $nganh->ma_nganh = $request->ma_nganh;
        $nganh->ten_nganh = $request->ten_nganh;
        $nganh->khoa_id = $request->khoa_id;
        $nganh->save();
    }
}
