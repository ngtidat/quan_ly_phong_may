<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link navbar-info">
        <img src="{!! asset('admin/dist/img/logo_utc.png') !!}"
             alt="Logo UTC"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Quản lý phòng máy</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        @php
            $user = Auth::user();
        @endphp
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ isset($user->hinh_anh) && !empty($user->hinh_anh) ? asset(pare_url_file($user->hinh_anh)) : asset('/admin/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{!! $user->ho_ten !!}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('home') }}" class="nav-link {{ isset($home_active) ? $home_active : '' }}">
                        <i class="nav-icon fas fa fa-home"></i>
                        <p>Bảng điều khiển</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('khuvuc.index') }}" class="nav-link {{ isset($khu_vuc_active) ? $khu_vuc_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-map-marker"></i>
                        <p>Quản lý khu vực</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('phongmay.index') }}" class="nav-link {{ isset($phong_may_active) ? $phong_may_active : '' }}">
                        <i class="nav-icon fa fa-university"></i>
                        <p>Quản lý phòng máy</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cauhinh.index') }}" class="nav-link {{ isset($cau_hinh_active) ? $cau_hinh_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-cog"></i>
                        <p>Quản lý cấu hình</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('khoa.index') }}" class="nav-link {{ isset($khoa_active) ? $khoa_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-cog"></i>
                        <p>Quản lý khoa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('nganh.index') }}" class="nav-link {{ isset($nganh_active) ? $nganh_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-cog"></i>
                        <p>Quản lý ngành</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('mon.hoc.index') }}" class="nav-link {{ isset($mon_hoc_active) ? $mon_hoc_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-cog"></i>
                        <p>Quản lý môn học</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('giao.vien.index') }}" class="nav-link {{ isset($giao_vien_active) ? $giao_vien_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-cog"></i>
                        <p>Quản lý giảng viên</p>
                    </a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a href="{{ route('so_tiet.index') }}" class="nav-link {{ isset($so_tiet_active) ? $so_tiet_active : '' }}">--}}
                        {{--<i class="nav-icon fa fa-fw fa-cog"></i>--}}
                        {{--<p>Số tiết</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a href="{{ route('phan_cong.index') }}" class="nav-link {{ isset($phan_cong_active) ? $phan_cong_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-cog"></i>
                        <p>Phân công giảng dạy</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('thoi_khoa_bieu.index') }}" class="nav-link {{ isset($thoi_khoa_bieu_active) ? $thoi_khoa_bieu_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-cog"></i>
                        <p>Thời khóa biểu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('thoi_gian_su_dung.index') }}" class="nav-link {{ isset($thoi_gian_su_dung_active) ? $thoi_gian_su_dung_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-cog"></i>
                        <p>Thời gian sử dụng</p>
                    </a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a href="{{ route('group.permission.index') }}" class="nav-link {{ isset($group_permission) ? $group_permission : '' }}">--}}
                        {{--<i class="nav-icon fa fa-hourglass" aria-hidden="true"></i>--}}
                        {{--<p>Nhóm quyền</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="{{ route('permission.index') }}" class="nav-link {{ isset($permission_active) ? $permission_active : '' }}">--}}
                        {{--<i class="nav-icon fa fa-balance-scale"></i>--}}
                        {{--<p> Quyền </p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link {{ isset($role_active) ? $role_active : '' }}">
                        <i class="nav-icon fa fa-gavel" aria-hidden="true"></i>
                        <p> Vai trò </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ isset($user_active) ? $user_active : '' }}">
                        <i class="nav-icon fa fa-fw fa-user" aria-hidden="true"></i>
                        <p> Người dùng </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
