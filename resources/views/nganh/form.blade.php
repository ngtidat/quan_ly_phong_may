<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mã ngành <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Mã ngành" name="ma_nganh" value="{{ old('ma_nganh', isset($nganh) ? $nganh->ma_nganh : '') }}" required>
                            @if ($errors->first('ma_nganh'))
                                <span class="text-danger">{{ $errors->first('ma_nganh') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Tên ngành <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Tên ngành" name="ten_nganh" value="{{ old('ten_nganh', isset($nganh) ? $nganh->ten_nganh : '') }}" required>
                            @if ($errors->first('ten_nganh'))
                                <span class="text-danger">{{ $errors->first('ten_nganh') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label> Khoa <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="custom-select" name="khoa_id">
                                    <option value="">Chọn khoa</option>
                                    @foreach($khoa as $key => $item)
                                        <option value="{{ $item->id }}" {{ old('khoa_id', isset($nganh->khoa_id) ? $nganh->khoa_id : '') == $item->id ? "selected='selected'" : "" }}>{{  $item->ten_khoa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->first('khoa_id'))
                                <span class="text-danger">{{ $errors->first('khoa_id') }}</span>
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
