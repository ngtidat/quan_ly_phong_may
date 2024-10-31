<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mã máy <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Mã máy" name="ma_may" value="{{ old('ma_may', isset($maytinh) ? $maytinh->ma_may : '') }}" required>
                            @if ($errors->first('ma_may'))
                                <span class="text-danger">{{ $errors->first('ma_may') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Tên máy <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Tên máy" name="ten_may" value="{{ old('ten_may', isset($maytinh) ? $maytinh->ten_may : '') }}" required>
                            @if ($errors->first('ten_may'))
                                <span class="text-danger">{{ $errors->first('ten_may') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Số thứ tự <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Số thứ tự" name="so_thu_tu" value="{{ old('so_thu_tu', isset($maytinh) ? $maytinh->so_thu_tu : '') }}" required>
                            @if ($errors->first('so_thu_tu'))
                                <span class="text-danger">{{ $errors->first('so_thu_tu') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Cấu hình <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="custom-select" name="cau_hinh_id">
                                    <option value="">Chọn cấu hình</option>
                                    @foreach($cauhinh as $key => $ch)
                                        <option value="{{ $ch->id }}" {{ old('cau_hinh_id', isset($maytinh->cau_hinh_id) ? $maytinh->cau_hinh_id : '') == $ch->id ? "selected='selected'" : "" }}>{{  $ch->ma_cau_hinh }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->first('cau_hinh_id'))
                                <span class="text-danger">{{ $errors->first('cau_hinh_id') }}</span>
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
                    <div class="card-header">
                        <h3 class="card-title"> Trạng thái </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <select class="custom-select" name="trang_thai">
                                @foreach($trangthai as $key => $item)
                                    <option value="{{ $key }}" {{ old('trang_thai',isset($maytinh) ? $maytinh->trang_thai : '') == $key ? "selected='selected'" : "" }}>{{  $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-body -->
                    <div class="card-header">
                        <h3 class="card-title"> Ngày nhập <span class="text-danger">*</span></h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="date" name="ngay_nhap" class="form-control" value="{{ old('ngay_nhap', isset($maytinh) ? date('Y-m-d', strtotime($maytinh->ngay_nhap)) : '') }}" required>
                        </div>
                        @if ($errors->first('ngay_nhap'))
                            <span class="text-danger">{{ $errors->first('ngay_nhap') }}</span>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </form>
</div>
