@extends('layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="">{{ $phongmay->ten_phong }}</a></li>
                        <li class="breadcrumb-item active">Danh sách máy</li>
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
                    <h3 class="card-title" style="text-transform: uppercase">Thông tin phòng máy {{ $phongmay->ten_phong }}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p>Tên phòng : {{ $phongmay->ten_phong }}</p>
                            <p>Mã phòng : {{ $phongmay->ma_phong }}</p>
                            <p>Loại phòng : {{ $loaiphong[$phongmay->loai_phong] }}</p>
                            <p>Số máy khả dụng : {{ $phongmay->maytinh->where('trang_thai', 1)->count() }} / {{ $phongmay->maytinh->count() }}</p>
                        </div>
                        <div class="col-6">
                            <p>Khu vực : {{ isset($phongmay->khuvuc) ? $phongmay->khuvuc->ten_khu_vuc : '' }}</p>
                            <p>Trạng thái : {{ $trangthai[$phongmay->trang_thai] }}</p>
                            <p>Ngày tạo : {{ date('Y-m-d', strtotime($phongmay->created_at)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('maytinh.create', $phongmay->id) }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="col-12">
                            <div class="row">
                                @if (!$phongmay->maytinh->isEmpty())
                                    @foreach($phongmay->maytinh as $item)
                                    <!-- ./col -->
                                        <div class="col-lg-2 col-6 mg-top-10" >
                                            <!-- small box -->
                                            <div class="small-box {{ $item->trang_thai == 1 ? 'bg-success' :  'bg-danger' }} text-center">
                                                <span class="info-box-icon"><i class="fa fa-fw fa-desktop" style="font-size: 40px; margin: 10px"></i></span>
                                                <p class="name-room">{{ $item->ten_may }}</p>
                                                <div class="action-room text-center">
                                                    <a href="{{ route('maytinh.update', $item->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                                                    <a href="{{ route('maytinh.delete', $item->id) }}" class="btn-delete btn-confirm-delete"><i class="fas fa-trash "></i></a>
                                                    <a href="{{ route('information', $item->id) }}" class="btn-preview"><i class="fa fa-fw fa-eye"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <div class="modal preview fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 500px !important;">
                <div class="modal-header">
                    <div class="row" style="margin: auto;">
                        <div class="col-md-12 text-center">
                            <h4 class="modal-title" style="text-transform: uppercase; font-weight: bold; ">Thông tin máy</h4>
                        </div>
                    </div>

                </div>
                <div class="modal-body" id="preview">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Đóng</button>
                    {{--                    <button type="button" class="btn bg-green pull-right mg-r-5" data-dismiss="modal" onclick="js:window.print()"><i class="fa fa-fw fa-print"></i> Print</button>--}}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.mod -->
    </div>
@stop
