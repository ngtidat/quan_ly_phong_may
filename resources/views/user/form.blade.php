<div class="container-fluid">
    <form role="form" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if(isset($user) && !empty($user->hinh_anh))
                            <img src="{{ asset(pare_url_file($user->hinh_anh)) }}" alt="" class=" margin-auto-div img-rounded profile-user-img img-fluid img-circle" id="image_render" style="height: 150px; width:150px;">
                            @else
                            <img alt="" class="margin-auto-div img-rounded profile-user-img img-fluid img-circle" src="{{ asset('admin/dist/img/avatar5.png') }}" id="image_render" style="height: 150px; width:150px;">
                            @endif
                        </div>
                        @if (isset($user->ho_ten))
                        <h3 class="profile-username text-center">{{ $user->ho_ten }}</h3>
                        @endif
                        @if (isset($user->email))
                        <p class="text-muted text-center">{{ $user->email }}</p>
                        @endif
                        @if (isset($user->phone))
                        <p class="text-muted text-center">{{ $user->phone }}</p>
                        @endif
                        @if (isset($user->userRole))
                        <p class="text-muted text-center">{{ isset($user->userRole[0]) ? $user->userRole[0]->display_name : '' }}</p>
                        @endif
                        <div class="form-group">
                            <div class="input-group input-file" name="images">
                                <span class="input-group-btn">
                                    <button class="btn btn-default btn-choose" type="button">Chọn tệp</button>
                                </span>
                                <input type="text" class="form-control" placeholder='Không có tệp nào ...' />
                                <span class="input-group-btn"></span>
                            </div>
                            <span class="text-danger ">
                                <p class="mg-t-5">{{ $errors->first('images') }}</p>
                            </span>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <?php //dd($errors) 
            ?>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Họ và tên <sup class="title-sup">(*)</sup></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Họ và tên" name="ho_ten" value="{{old('ho_ten', isset($user->ho_ten) ? $user->ho_ten : '')}}">
                                        <span class="text-danger ">
                                            <p class="mg-t-5">{{ $errors->first('ho_ten') }}</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email <sup class="title-sup">(*)</sup></label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{old('email', isset($user->email) ? $user->email : '')}}">
                                        <span class="text-danger ">
                                            <p class="mg-t-5">{{ $errors->first('email') }}</p>
                                        </span>
                                    </div>
                                </div>
                                @if( !isset($user->password) && empty($user->password))
                                <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Mật khẩu <sup class="title-sup">(*)</sup></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="password" class="form-control" value="" id="exampleInputEmail1" placeholder="Mật khẩu">
                                    </div>
                                    <span class="text-danger">
                                        <p class="mg-t-5">{{ $errors->first('password') }}</p>
                                    </span>
                                </div>
                                @endif
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Phone <sup class="title-sup">(*)</sup></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" placeholder="Phone" name="phone" value="{{old('phone', isset($user->phone) ? $user->phone : '')}}">
                                        <span class="text-danger ">
                                            <p class="mg-t-5">{{ $errors->first('phone') }}</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Vai trò <sup class="title-sup">(*)</sup></label>
                                    <div class="col-sm-10">
                                        <select name="role" class="form-control">
                                            <option value="">Chọn vai trò</option>
                                            @if($roles)
                                            @foreach($roles as $role)
                                            <option {{old('role', isset($listRoleUser->role_id) ? $listRoleUser->role_id : '') == $role->id ? 'selected=selected' : '' }} value="{{$role->id}}">{{$role->display_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        <span class="text-danger">
                                            <p class="mg-t-5">{{ $errors->first('role') }}</p>
                                        </span>
                                    </div>
                                </div>

                                @if( isset($user->password) )
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Mật khẩu mới <sup class="title-sup"></sup></label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Nhập mật khẩu mới" name="mat_khau">
                                        <span class="text-danger">
                                            <p class="mg-t-5">{{ $errors->first('mat_khau') }}</p>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputConfirmPassword" class="col-sm-2 col-form-label">Xác nhận mật khẩu <sup class="title-sup"></sup></label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Xác nhận mật khẩu" name="mat_khau_xac_nhan">
                                        <span class="text-danger">
                                            <p class="mg-t-5">{{ $errors->first('mat_khau_xac_nhan') }}</p>
                                        </span>
                                    </div>
                                </div>
                                @endif

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" name="submit" class="btn btn-info" value="{{ isset($user) ? 'update' : 'create' }}">
                                            <i class="fa fa-save"></i> Lưu dữ liệu
                                        </button>
                                        <button type="reset" name="reset" value="reset" class="btn btn-danger">
                                            <i class="fa fa-undo"></i> Reset
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
    </form>
</div>