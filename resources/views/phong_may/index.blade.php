@extends('layouts.main')
@section('title', '')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('phongmay.index') }}">Phòng máy</a></li>
                    <li class="breadcrumb-item active">Danh sách</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">From tìm kiếm</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <input type="text" name="ma_phong" class="form-control mg-r-15" placeholder="Mã phòng">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <input type="text" name="ten_phong" class="form-control mg-r-15" placeholder="Tên phòng">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <select class="custom-select" name="loai_phong">
                                    <option value="">Chọn loại phòng</option>
                                    @foreach($loaiphong as $key => $lp)
                                    <option value="{{ $key }}">{{ $lp }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <select class="custom-select" name="khu_vuc_id">
                                    <option value="">Chọn khu vực</option>
                                    @foreach($khuvuc as $key => $kv)
                                    <option value="{{ $kv->id }}">{{ $kv->ten_khu_vuc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <div class="form-group">
                                    <select class="custom-select" name="trang_thai">
                                        <option value="">Trạng thái</option>
                                        @foreach($trangthai as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success " style="margin-right: 10px"><i class="fas fa-search"></i> Tìm kiếm </button>
                                <a href="{{ route('phongmay.index') }}">
                                    <button type="button" name="reset" value="reset" class="btn btn-danger">
                                        <i class="fa fa-undo"></i> Reset
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="btn-group">
                                <a href="{{ route('phongmay.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            <thead>
                                <tr>
                                    <th width="4%" class=" text-center">STT</th>
                                    <th class=" text-center">Mã phòng</th>
                                    <th class=" text-center">Tên phòng</th>
                                    <th class=" text-center">Loại phòng</th>
                                    <th class=" text-center">Khu vực</th>
                                    <th class=" text-center">Trạng thái</th>
                                    <th class=" text-center">Số máy khả dụng</th>
                                    <th class=" text-center">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$phongmay->isEmpty())
                                @php $i = $phongmay->firstItem(); @endphp
                                @foreach($phongmay as $item)
                                <tr>
                                    <td class=" text-center">{{ $i }}</td>
                                    <td class=" text-center">{{ $item->ma_phong }}</td>
                                    <td class=" text-center">{{ $item->ten_phong }}</td>
                                    <td class=" text-center">{{ $loaiphong[$item->loai_phong] }}</td>
                                    <td class=" text-center">{{ isset($item->khuvuc) ? $item->khuvuc->ten_khu_vuc : '' }}</td>
                                    <td class=" text-center">
                                        @if ($item->trang_thai == 1)
                                        <button type="button" class="btn btn-block btn-danger btn-xs">{{ $trangthai[$item->trang_thai] }}</button>
                                        @else
                                        <button type="button" class="btn btn-block btn-success btn-xs">{{ $trangthai[$item->trang_thai] }}</button>
                                        @endif

                                    </td>
                                    <td class="text-center">{{ $item->so_may_hoat_dong }} / {{ $item->tong_so_may }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm" href="{{ route('phongmay.update', $item->id) }}" title="Chỉnh sửa">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('phongmay.delete', $item->id) }}" title="Xóa">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="{{ route('danhsach.maytinh', $item->id) }}" class="btn btn-info btn-sm " title="Danh sách máy"><i class="fa fa-fw fa-tv"></i></a>
                                        {{--<a class="btn btn-success btn-sm " href="{{ route('maytinh.create', $item->id) }}" title="Thêm máy">--}}
                                        {{--<i class="fa fa-fw fa-plus"></i>--}}
                                        {{--</a>--}}
                                    </td>
                                </tr>
                                @php $i++ @endphp
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        @if($phongmay->hasPages())
                        <div class="pagination float-right margin-20">
                            {{ $phongmay->appends($query = '')->links() }}
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