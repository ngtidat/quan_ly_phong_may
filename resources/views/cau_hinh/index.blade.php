@extends('layouts.main')
@section('title', '')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cauhinh.index') }}">Cấu hình</a></li>
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
                                    <a href="{{ route('cauhinh.create') }}"><button type="button" class="btn btn-block btn-info"><i class="fa fa-plus"></i> Tạo mới</button></a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr>
                                        <th width="4%" class=" text-center">STT</th>
                                        <th class=" text-center">Mã cấu hình</th>
                                        <th class=" text-center">Loại máy</th>
                                        <th class=" text-center">CPU</th>
                                        <th class=" text-center">RAM</th>
                                        <th class=" text-center">VGA</th>
                                        <th class=" text-center">Monitor</th>
                                        <th class=" text-center">Ngày nhập</th>
                                        <th class=" text-center">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!$cauhinh->isEmpty())
                                        @php $i = $cauhinh->firstItem(); @endphp
                                        @foreach($cauhinh as $item)
                                            <tr>
                                                <td class=" text-center">{{ $i }}</td>
                                                <td class=" text-center">{{ $item->ma_cau_hinh }}</td>
                                                <td class=" text-center">{{ $item->main_board }}</td>
                                                <td class=" text-center">{{ $item->cpu }}</td>
                                                <td class=" text-center">{{ $item->ram }}</td>
                                                <td class=" text-center">{{ $item->vga }}</td>
                                                <td class=" text-center">{{ $item->monitor }}</td>
                                                <td class=" text-center">{{ date('Y-m-d', strtotime($item->ngay_nhap)) }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-primary btn-sm" href="{{ route('cauhinh.update', $item->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm btn-delete btn-confirm-delete" href="{{ route('cauhinh.delete', $item->id) }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @php $i++ @endphp
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            @if($cauhinh->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $cauhinh->appends($query = '')->links() }}
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
