@extends('layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('phan_cong.index') }}">Phân Công Giảng Dạy</a></li>
                        <li class="breadcrumb-item active">Danh sách</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">TÌM KIẾM</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <form action="">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="phong_may_id" class="form-control mg-r-15" placeholder="Mã phòng">
                                    </div>
                                </div>
                                <!-- <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="ten_phong" class="form-control mg-r-15" placeholder="Tên phòng">
                                    </div>
                                </div> -->
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <select class="custom-select" name="khu_vuc_id">
                                            <option value="">Khu vực</option>
                                            @foreach($khu_vuc as $key => $kv)
                                            <option value="{{ $kv->id }}">{{ $kv->ten_khu_vuc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <select class="custom-select" name="thoi_gian_buoi">
                                            <option value="">Chọn ca mượn</option>   
                                            <option value="1">Ca 1</option>
                                            <option value="2">Ca 2</option>
                                            <option value="3">Ca 3</option>
                                            <option value="4">Ca 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input class="form-control mg-r-15" type="date" name="ngay_thang">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success " style="margin-right: 10px"><i class="fas fa-search"></i> Tìm kiếm </button>
                                        <!-- <a href="{{ route('phongmay.index') }}">
                                            <button type="button" name="reset" value="reset" class="btn btn-danger">
                                                <i class="fa fa-undo"></i> Reset
                                            </button>
                                        </a> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('phan_cong.select') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th width="4%" class=" text-center">STT</th>
                                        <th class=" text-center">Giảng viên</th>
                                        <th class=" text-center">Môn học</th>
                                        <th class=" text-center">Phòng máy</th>
                                        <th class=" text-center">Thứ</th>
                                        <th class=" text-center">Ca sử dụng</th>
                                        <th class=" text-center">Ngày</th>
                                        <th class=" text-center">Số tiết</th>
                                        <th class=" text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$phanCong->isEmpty())
                                        @php $i = $phanCong->firstItem(); @endphp
                                        @foreach($phanCong as $item)
                                            <tr>
                                                <td class=" text-center" style="vertical-align:middle;">{{ $i }}</td>
                                                <td class=" text-center" style="vertical-align:middle;">{{ isset($item->giao_vien) ? $item->giao_vien->ten_giao_vien : '' }}</td>
                                                <td class=" text-center" style="vertical-align:middle;">{{ isset($item->mon_hoc) ? $item->mon_hoc->ten_mon_hoc : '' }}</td>
                                                <td class=" text-center" style="vertical-align:middle;">{{ isset($item->phong_may) ? $item->phong_may->ten_phong : '' }}</td>
                                                <td class=" text-center" style="vertical-align:middle;">
                                                    @if ($item->ngay_thang)
                                                        <button type="button" class="btn btn-block btn-success btn-xs">{{ getDateTime('vn', 1, 1, 0, '', strtotime($item->ngay_thang)) }}</button>
                                                    @endif
                                                </td>
                                                <td class=" text-center" style="vertical-align:middle;">{{ !empty($item->ca_su_dung)  ? $casudung[$item->ca_su_dung] : '' }}</td>
                                                <td class=" text-center" style="vertical-align:middle;">{{ date('Y-m-d', strtotime($item->ngay_thang)) }}</td>
                                                <td class=" text-center" style="vertical-align:middle;">{{ $item->so_tiet }}</td>
                                                <td class="text-center" style="vertical-align:middle;">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('phan_cong.update', $item->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('phan_cong.delete', $item->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if($phanCong->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $phanCong->appends($query = '')->links() }}
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@stop
