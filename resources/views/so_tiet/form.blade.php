<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Số tiết <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Số tiết " name="ten_so_tiet" value="{{ old('ten_so_tiet', isset($soTiet) ? $soTiet->ten_so_tiet : '') }}" required>
                            @if ($errors->first('ten_so_tiet'))
                                <span class="text-danger">{{ $errors->first('ten_so_tiet') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Số phút học <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" placeholder="Ví dụ (120 phút) " name="so_phut" value="{{ old('so_phut', isset($soTiet) ? $soTiet->so_phut : '') }}" required>
                            @if ($errors->first('so_phut'))
                                <span class="text-danger">{{ $errors->first('so_phut') }}</span>
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
