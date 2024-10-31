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
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <select name="months" id="" class="custom-select">
                                        <option value="">Chọn tháng</option>
                                        @for($i = 1; $i < 13; $i++)
                                            <option value="{{ $i }}">Tháng {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <?php $quarterly = Request::get('quarterly') ? Request::get('quarterly') : '' ?>
                                    <select name="quarterly" id="" class="custom-select">
                                        <option value="">Chọn quý</option>
                                        @for($i = 1; $i < 5; $i++)
                                            <option value="{{ $i }}" {{ $quarterly == $i ? "selected='selected'" : '' }}>Quý {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <?php
                                        $yearCurrent = date('Y');
                                        $yearSelected = Request::get('years') ? Request::get('years') :  date('Y');
                                    ?>
                                    <select name="years" id="" class="custom-select">
                                        <option value="">Chọn năm</option>
                                        @for($i = intval($yearCurrent - 10); $i < intval($yearCurrent + 10); $i++)
                                            <option value="{{ $i }}" {{ $yearSelected == $i ? "selected='selected'" : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-success " style="margin-right: 10px"><i class="fas fa-search"></i> Tìm kiếm </button>
                                    <button type="submit" name="export" value="true" class="btn btn-info"> <i class="fas fa-file-excel"></i> Export excel </button>
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
                                {{--<div class="btn-group">--}}
                                    {{--<a href="{{ route('phongmay.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>--}}
                                {{--</div>--}}
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
                                    <th class=" text-center">Số tiết</th>
                                    <th class=" text-center">Thời gian sử dụng (h)</th>
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
                                            <td class=" text-center">
                                                <?php
                                                    $sotiet = 0;
                                                    if ($item->phancong) {
                                                        $sotiet = $item->phancong->sum('so_tiet');
                                                    }
                                                ?>
                                                {{ $sotiet }}
                                            </td>
                                            <td class=" text-center">
                                                {{ calculateTime($sotiet) }}
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
