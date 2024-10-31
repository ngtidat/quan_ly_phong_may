<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <!-- form start -->
                    <div class="card-body">

                        <div class="form-group">
                            <label> Giáo viên <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="custom-select" name="giao_vien_id" required>
                                    <option value="">Chọn giáo viên</option>
                                    @foreach($giaovien as $key => $itemGiaoVien)
                                        <option value="{{ $itemGiaoVien->id }}" {{ old('giao_vien_id', isset($phanCong->giao_vien_id) ? $phanCong->giao_vien_id : '') == $itemGiaoVien->id ? "selected='selected'" : "" }}>{{  $itemGiaoVien->ten_giao_vien }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->first('giao_vien_id'))
                                <span class="text-danger">{{ $errors->first('giao_vien_id') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label> Môn học <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="custom-select" name="mon_hoc_id" required>
                                    <option value="">Chọn môn học</option>
                                    @foreach($monhoc as $key => $itemMonHoc)
                                        <option value="{{ $itemMonHoc->id }}" {{ old('mon_hoc_id', isset($phanCong->mon_hoc_id) ? $phanCong->mon_hoc_id : '') == $itemMonHoc->id ? "selected='selected'" : "" }}>{{  $itemMonHoc->ten_mon_hoc }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->first('giao_vien_id'))
                                <span class="text-danger">{{ $errors->first('mon_hoc_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label> Phòng máy <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select class="custom-select" name="phong_may_id" required>
                                    <option value="">Chọn phòng máy</option>
                                    @foreach($phongmay as $key => $itemPhongMay)
                                        <option value="{{ $itemPhongMay->id }}" {{ old('phong_may_id', isset($phanCong->phong_may_id) ? $phanCong->phong_may_id : '') == $itemPhongMay->id ? "selected='selected'" : "" }}>{{  $itemPhongMay->ten_phong }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->first('phong_may_id'))
                                <span class="text-danger">{{ $errors->first('phong_may_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label> Ca </label>
                            <div class="form-group">
                                <select class="custom-select" name="z" required>
                                    @foreach($casudung as $key => $itemThoiGian)
                                        <option value="{{ $key }}" {{ old('ca_su_dung', isset($phanCong->ca_su_dung) ? $phanCong->ca_su_dung : '') == $key ? "selected='selected'" : "" }}>{{  $itemThoiGian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->first('ca_su_dung'))
                                <span class="text-danger">{{ $errors->first('ca_su_dung') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Số tiết</label>
                            <input type="number"  class="form-control" placeholder="Số tiết" name="so_tiet" value="{{ old('so_tiet', isset($phanCong) ? $phanCong->so_tiet : '') }}" max="5">
                            @if ($errors->first('so_tiet'))
                                <span class="text-danger">{{ $errors->first('so_tiet') }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    {{--<!-- /.card-body -->--}}
                    {{--<div class="card-header">--}}
                        {{--<h3 class="card-title"> Chọn ngày trong tuần</h3>--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="row teacher_mobile">--}}
                            {{--@foreach($dayWeeks as $key => $day)--}}
                                {{--<div class="col-md-12 role-item">--}}
                                    {{--<div class="icheck-primary d-inline">--}}
                                        {{--<input type="radio" class="" value="{{ $key }}" name="thu" id="day_weeks_{{ $key }}" {{ old('thu', isset($phanCong)? $phanCong->thu : '') == $key ? "checked" : '' }}>--}}
                                        {{--<label for="day_weeks_{{ $key }}" >--}}
                                            {{--{{ $day }}--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="card-header">
                        <h3 class="card-title">Ngày phân công</h3>

                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="date" name="ngay_thang" class="form-control" value="{{ old('ngay_thang', isset($phanCong) ? date('Y-m-d', strtotime($phanCong->ngay_thang)) : '') }}" required>
                        </div>
                        @if ($errors->first('ngay_thang'))
                            <span class="text-danger">{{ $errors->first('ngay_thang') }}</span>
                        @endif
                    </div>

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
                </div>
            </div>
        </div>
    </form>
</div>
