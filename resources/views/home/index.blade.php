@extends('layouts.main')
@section('title', 'Quản lý phòng máy')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách phòng máy</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Thống kê dữ liệu</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
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
                    <!-- /.card-body -->
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">PHÒNG MÁY </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            @if (!$phongmay->isEmpty())
                            @php $i = $phongmay->firstItem(); @endphp
                            @foreach($phongmay as $item)
                            <!-- ./col -->
                            <div class="col-lg-2 col-6">
                                <!-- small box -->
                                <div class="small-box 
                                    {{ $item->trang_thai == 1 ? 'bg-danger' : 'bg-success' }} 
                                        text-center">
                                    <span class="info-box-icon"><i class="fa fa-fw fa-desktop" style="font-size: 40px; margin: 10px"></i></span>
                                    <p class="name-room">{{ $item->ten_phong }}</p>
                                    <div class="action-room text-center">
                                        <a href="{{ route('phongmay.update', $item->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                        <a href="{{ route('phongmay.delete', $item->id) }}" class="btn-delete btn-confirm-delete">
                                            <i class="fas fa-trash "></i>
                                        </a>
                                        {{-- <a href="{{ route('maytinh.create', $item->id) }}"><i class="fa fa-fw fa-plus"></i></a> --}}
                                    </div>
                                    <a href="{{ route('danhsach.maytinh', $item->id) }}" class="small-box-footer">
                                        Danh sách <i class="fas fa-arrow-circle-right" style="margin-left: 10px"></i>
                                    </a>
                                </div>

                            </div>
                            @php $i++ @endphp
                            @endforeach
                            @endif
                            <!-- ./col -->
                        </div>
                        <div class="row">
                            @if($phongmay->hasPages())
                            <div class="pagination float-right margin-20">
                                {{ $phongmay->appends($query = '')->links() }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@stop