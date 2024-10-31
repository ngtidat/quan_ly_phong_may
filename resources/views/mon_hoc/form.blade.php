<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data" class="form_nganh" url ="{{ route('change.branch') }}">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mã môn học <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Mã môn học" name="ma_mon_hoc" value="{{ old('ma_mon_hoc', isset($monhoc) ? $monhoc->ma_mon_hoc : '') }}" required>
                            @if ($errors->first('ma_mon_hoc'))
                                <span class="text-danger">{{ $errors->first('ma_mon_hoc') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Tên môn học <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Tên môn học" name="ten_mon_hoc" value="{{ old('ten_mon_hoc', isset($monhoc) ? $monhoc->ten_mon_hoc : '') }}" required>
                            @if ($errors->first('ten_mon_hoc'))
                                <span class="text-danger">{{ $errors->first('ten_mon_hoc') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Số tiết thực hành <span class="text-danger">*</span></label>
                            <input type="number"  class="form-control" placeholder="Số tiết thực hành" name="so_tiet_thuc_hanh" value="{{ old('so_tiet_thuc_hanh', isset($monhoc) ? $monhoc->so_tiet_thuc_hanh : '') }}" required>
                            @if ($errors->first('so_tiet_thuc_hanh'))
                                <span class="text-danger">{{ $errors->first('so_tiet_thuc_hanh') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label> Khoa <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="custom-select khoa_id" name="khoa_id">
                                    <option value="">Chọn khoa</option>
                                    @foreach($khoa as $key => $item)
                                        <option value="{{ $item->id }}" {{ old('khoa_id', isset($monhoc->khoa_id) ? $monhoc->khoa_id : '') == $item->id ? "selected='selected'" : "" }}>{{  $item->ten_khoa }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->first('khoa_id'))
                                <span class="text-danger">{{ $errors->first('khoa_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label> Ngành <span class="text-danger">*</span></label>
                            <select class="custom-select nganh_id" name="nganh_id">
                                <option value="">Chọn ngành</option>
                                @foreach($nganh as $key => $item)
                                    <option value="{{ $item->id }}" {{ old('nganh_id', isset($monhoc->nganh_id) ? $monhoc->nganh_id : '') == $item->id ? "selected='selected'" : "" }}>{{  $item->ten_nganh }}</option>
                                @endforeach
                            </select>
                            @if ($errors->first('nganh_id'))
                                <span class="text-danger">{{ $errors->first('nganh_id') }}</span>
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
