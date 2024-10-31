@extends('layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('mon.hoc.index') }}">Môn học</a></li>
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
                                    <a href="{{ route('mon.hoc.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th width="4%" class=" text-center">STT</th>
                                        <th class=" text-center">Mã môn học</th>
                                        <th class=" text-center">Tên môn học</th>
                                        <th class=" text-center">Số tiết thực hành</th>
                                        <th class=" text-center">Ngành</th>
                                        <th class=" text-center">Khoa</th>
                                        <th class=" text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$monhoc->isEmpty())
                                        @php $i = $monhoc->firstItem(); @endphp
                                        @foreach($monhoc as $item)
                                            <tr>
                                                <td class=" text-center">{{ $i }}</td>
                                                <td class=" text-center">{{ $item->ma_mon_hoc }}</td>
                                                <td class=" text-center">{{ $item->ten_mon_hoc }}</td>
                                                <td class=" text-center">{{ $item->so_tiet_thuc_hanh }}</td>
                                                <td class=" text-center">{{ isset($item->khoa) ? $item->khoa->ten_khoa : '' }}</td>
                                                <td class=" text-center">{{ isset($item->nganh) ? $item->nganh->ten_nganh : '' }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('mon.hoc.update', $item->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('mon.hoc.delete', $item->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if($monhoc->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $monhoc->appends($query = '')->links() }}
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
