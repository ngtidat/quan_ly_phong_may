@extends('layouts.main')
@section('title', 'Tìm kiếm phòng trống')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">
                            <i class="nav-icon fas fa fa-home"></i> Trang chủ
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('phan_cong.index') }}">Phân Công Giảng Dạy</a>
                    </li>
                    <li class="breadcrumb-item active">Danh sách phòng trống</li>
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
                <!-- Card Tìm kiếm -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">TÌM KIẾM PHÒNG TRỐNG</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('phan_cong.select') }}" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="custom-select" name="ca_su_dung" required>
                                            <option value="">Chọn ca mượn</option>
                                            <option value="1">Ca 1</option>
                                            <option value="2">Ca 2</option>
                                            <option value="3">Ca 3</option>
                                            <option value="4">Ca 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control" type="date" name="ngay_thang" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-search"></i> Tìm kiếm
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách phòng trống</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <form action="{{ route('phan_cong.create') }}" method="POST">
                            @csrf
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">STT</th>
                                        <th class="text-center">Phòng máy</th>
                                        <th class="text-center">Khu vực</th>
                                        <th class="text-center">Ca sử dụng</th>
                                        <th class="text-center">Thứ</th>
                                        <th class="text-center">Ngày trống</th>
                                        <th class="text-center">Chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    use Carbon\Carbon;
                                    $dayOfWeek = Carbon::parse($ngayThang ?? now())->locale('vi')->dayName;
                                    @endphp
                                    @if (!$phongTrong->isEmpty())
                                    @foreach($phongTrong as $i => $item)
                                    <tr>
                                        <td class="text-center">{{ $i + 1 }}</td>
                                        <td class="text-center">{{ $item->ma_phong }}</td>
                                        <td class="text-center">{{ $item->khuvuc->ten_khu_vuc ?? '' }}</td>
                                        <td class="text-center">{{ $caSuDung }}</td>
                                        <td class="text-center">{{ ucwords($dayOfWeek) }}</td>
                                        <td class="text-center">{{ $ngayThang }}</td>
                                        <td class="text-center">
                                            <input type="radio" name="phong_may_id" value="{{ $item->id }}" required>
                                            <input type="hidden" name="ca_su_dung" value="{{ $caSuDung }}">
                                            <input type="hidden" name="ngay_thang" value="{{ $ngayThang }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">Không có phòng trống</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>

                            <div class="card-body">

                                <div class="form-group">
                                    <label> Giáo viên <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="custom-select" name="giao_vien_id" required>
                                            <option value="">Chọn giáo viên</option>
                                            @foreach($giaovien as $key => $itemGiaoVien)
                                            <option value="{{ $itemGiaoVien->id }}" {{ old('giao_vien_id', isset($phanCong->giao_vien_id) ? $phanCong->giao_vien_id : '') == $itemGiaoVien->id ? "selected='selected'" : "" }}>{{ $itemGiaoVien->ten_giao_vien }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->first('giao_vien_id'))
                                    <span class="text-danger">{{ $errors->first('giao_vien_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label> Môn học <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select class="custom-select" name="mon_hoc_id" required>
                                            <option value="">Chọn môn học</option>
                                            @foreach($monhoc as $key => $itemMonHoc)
                                            <option value="{{ $itemMonHoc->id }}" {{ old('mon_hoc_id', isset($phanCong->mon_hoc_id) ? $phanCong->mon_hoc_id : '') == $itemMonHoc->id ? "selected='selected'" : "" }}>{{ $itemMonHoc->ten_mon_hoc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->first('giao_vien_id'))
                                    <span class="text-danger">{{ $errors->first('mon_hoc_id') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label>Số tiết</label>
                                    <input type="number" class="form-control" placeholder="Số tiết" name="so_tiet" value="{{ old('so_tiet', isset($phanCong) ? $phanCong->so_tiet : '') }}" max="5">
                                    @if ($errors->first('so_tiet'))
                                    <span class="text-danger">{{ $errors->first('so_tiet') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="card-body">
                                <button type="submit" class="btn btn-block btn-info">
                                    <i class="fa fa-plus"></i> Đăng ký
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@stop