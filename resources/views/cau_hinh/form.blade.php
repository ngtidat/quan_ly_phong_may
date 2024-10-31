<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mã cấu hình <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Mã cấu hình" name="ma_cau_hinh" value="{{ old('ma_cau_hinh', isset($cauhinh) ? $cauhinh->ma_cau_hinh : '') }}" required>
                            @if ($errors->first('ma_cau_hinh'))
                                <span class="text-danger">{{ $errors->first('ma_cau_hinh') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Loại máy <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Loại máy" name="main_board" value="{{ old('main_board', isset($cauhinh) ? $cauhinh->main_board : '') }}" required>
                            @if ($errors->first('main_board'))
                                <span class="text-danger">{{ $errors->first('main_board') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>VGA <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="VGA" name="vga" value="{{ old('vga', isset($cauhinh) ? $cauhinh->vga : '') }}" required>
                            @if ($errors->first('vga'))
                                <span class="text-danger">{{ $errors->first('vga') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Monitor <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Monitor" name="monitor" value="{{ old('monitor', isset($cauhinh) ? $cauhinh->monitor : '') }}" required>
                            @if ($errors->first('monitor'))
                                <span class="text-danger">{{ $errors->first('monitor') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>RAM <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="RAM" name="ram" value="{{ old('ram', isset($cauhinh) ? $cauhinh->ram : '') }}" required>
                            @if ($errors->first('ram'))
                                <span class="text-danger">{{ $errors->first('ram') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Xuất bản</h3>
                    </div>
                    <div class="card-body">
                        <div class="btn-set">
                            <button type="submit" name="submit" class="btn btn-info">
                                <i class="fa fa-save"></i> Lưu dữ liệu
                            </button>
                            <button type="reset" name="reset" value="reset" class="btn btn-danger">
                                <i class="fa fa-undo"></i> Reset
                            </button>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>CPU <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="CPU" name="cpu" value="{{ old('cpu', isset($cauhinh) ? $cauhinh->cpu : '') }}" required>
                            @if ($errors->first('cpu'))
                                <span class="text-danger">{{ $errors->first('cpu') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Ngày nhập </label>
                            <input type="date" value="{{ old('cpu', isset($cauhinh) ? date('Y-m-d', strtotime($cauhinh->ngay_nhap)) : '') }}" name="ngay_nhap" class="form-control">
                            @if ($errors->first('ngay_nhap'))
                                <span class="text-danger">{{ $errors->first('ngay_nhap') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </form>
</div>
