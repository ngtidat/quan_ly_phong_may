<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mã khoa <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Mã khoa" name="ma_khoa" value="{{ old('ma_khoa', isset($khoa) ? $khoa->ma_khoa : '') }}" required>
                            @if ($errors->first('ma_khoa'))
                                <span class="text-danger">{{ $errors->first('ma_khoa') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Tên khoa <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Tên khoa" name="ten_khoa" value="{{ old('ten_khoa', isset($khoa) ? $khoa->ten_khoa : '') }}" required>
                            @if ($errors->first('ten_khoa'))
                                <span class="text-danger">{{ $errors->first('ten_khoa') }}</span>
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
                </div>
            </div>
        </div>
    </form>
</div>
