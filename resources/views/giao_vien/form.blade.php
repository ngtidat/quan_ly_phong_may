<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">
                        <div class="form-group">
                            <label>Mã giáo viên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Mã giáo viên" name="ma_giao_vien" value="{{ old('ma_giao_vien', isset($giaovien) ? $giaovien->ma_giao_vien : '') }}" required>
                            @if ($errors->first('ma_giao_vien'))
                                <span class="text-danger">{{ $errors->first('ma_giao_vien') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Tên giáo viên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Tên giáo viên" name="ten_giao_vien" value="{{ old('ten_giao_vien', isset($giaovien) ? $giaovien->ten_giao_vien : '') }}" required>
                            @if ($errors->first('ten_giao_vien'))
                                <span class="text-danger">{{ $errors->first('ten_giao_vien') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label> Khoa <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="custom-select" name="khoa_id">
                                    <option value="">Chọn khoa</option>
                                    @foreach($khoa as $key => $item)
                                        <option value="{{ $item->id }}" {{ old('khoa_id', isset($giaovien->khoa_id) ? $giaovien->khoa_id : '') == $item->id ? "selected='selected'" : "" }}>{{  $item->ten_khoa }}</option>
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
                    <div class="card-header">
                        <h3 class="card-title"> Hình ảnh </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="text-center">
                                @if(isset($giaovien) && !empty($giaovien->hinh_anh))
                                    <img src="{{ asset(pare_url_file($giaovien->hinh_anh)) }}" alt="" class=" margin-auto-div img-rounded profile-user-img img-fluid img-circle"  id="image_render" style="height: 100px; width:100px;">
                                @else
                                    <img alt="" class="margin-auto-div img-rounded profile-user-img img-fluid img-circle" src="{{ asset('/admin/dist/img/avatar5.png') }}" id="image_render" style="height: 100px; width:100px;">
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group input-file" name="images">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-choose" type="button">Chọn tệp</button>
                                    </span>
                                    <input type="text" class="form-control" placeholder='Không có tệp nào ...'/>
                                    <span class="input-group-btn"></span>
                                </div>
                                <span class="text-danger "><p class="mg-t-5">{{ $errors->first('images') }}</p></span>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </form>
</div>
