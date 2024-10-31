@extends('layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('giao.vien.index') }}">Giảng viên</a></li>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a href="{{ route('giao.vien.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th width="4%" class=" text-center">STT</th>
                                        <th class=" text-center">Hình ảnh</th>
                                        <th class=" text-center">Mã giáo viên</th>
                                        <th class=" text-center">Tên giáo viên</th>
                                        <th class=" text-center">Tên khoa</th>
                                        <th class=" text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$giaovien->isEmpty())
                                        @php $i = $giaovien->firstItem(); @endphp
                                        @foreach($giaovien as $item)
                                            <tr>
                                                <td class=" text-center" style="vertical-align:middle;">{{ $i }}</td>
                                                <td class=" text-center" style="vertical-align:middle;">
                                                    <img src="{{ isset($item->hinh_anh) && !empty($item->hinh_anh) ? asset(pare_url_file($item->hinh_anh)) : asset('/admin/dist/img/avatar5.png') }}" class="user-image img-circle elevation-2" alt="User Image" style="height: 50px; width:50px;">
                                                </td>
                                                <td class=" text-center" style="vertical-align:middle;">{{ $item->ma_giao_vien }}</td>
                                                <td class=" text-center" style="vertical-align:middle;">{{ $item->ten_giao_vien }}</td>
                                                <td class=" text-center"style="vertical-align:middle;" >{{ isset($item->khoa) ? $item->khoa->ten_khoa : '' }}</td>
                                                <td class="text-center" style="vertical-align:middle;">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('giao.vien.update', $item->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('giao.vien.delete', $item->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if($giaovien->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $giaovien->appends($query = '')->links() }}
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
