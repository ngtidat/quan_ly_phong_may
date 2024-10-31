<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mã phòng <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Mã phòng" name="ma_phong" value="{{ old('ma_phong', isset($phongmay) ? $phongmay->ma_phong : '') }}" required>
                            @if ($errors->first('ma_phong'))
                                <span class="text-danger">{{ $errors->first('ma_phong') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Tên phòng <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Tên phòng" name="ten_phong" value="{{ old('ten_phong', isset($phongmay) ? $phongmay->ten_phong : '') }}" required>
                            @if ($errors->first('ten_phong'))
                                <span class="text-danger">{{ $errors->first('ten_phong') }}</span>
                            @endif
                        </div>

                         <div class="form-group">
                            <label>Loại phòng <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="custom-select" name="loai_phong">
                                    <option value="">Chọn loại phòng</option>
                                    @foreach($loaiphong as $key => $lp)
                                        <option value="{{ $key }}" {{ old('loai_phong', isset($phongmay->loai_phong) ? $phongmay->loai_phong : '') == $key ? "selected='selected'" : "" }}>{{  $lp }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->first('loai_phong'))
                                <span class="text-danger">{{ $errors->first('loai_phong') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Khu vực <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="custom-select" name="khu_vuc_id">
                                    <option value="">Chọn khu vực</option>
                                    @foreach($khuvuc as $key => $kv)
                                        <option value="{{ $kv->id }}" {{ old('khu_vuc_id', isset($phongmay->khu_vuc_id) ? $phongmay->khu_vuc_id : '') == $kv->id ? "selected='selected'" : "" }}>{{  $kv->ten_khu_vuc }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->first('loai_phong'))
                                <span class="text-danger">{{ $errors->first('loai_phong') }}</span>
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
                                    <option value="{{ $key }}" {{ old('trang_thai',isset($phongmay) ? $phongmay->trang_thai : '') == $key ? "selected='selected'" : "" }}>{{  $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </form>
</div>
