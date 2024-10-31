@extends('layouts.main')
@section('title', '')
@section('style-css')
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/fullcalendar/main.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/plugins/fullcalendar-daygrid/main.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/plugins/fullcalendar-timegrid/main.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('admin/plugins/fullcalendar-bootstrap/main.min.css') !!}">
@stop
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"> <i class="nav-icon fas fa fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('thoi_khoa_bieu.index') }}">Thời khóa biểu</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">From tìm kiếm</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="ma_giao_vien" class="form-control mg-r-15" placeholder="Mã giáo viên" value="{{ Request::get('ma_giao_vien') }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="ma_mon_hoc" class="form-control mg-r-15" placeholder="Mã môn học" value="{{ Request::get('ma_mon_hoc') }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <div class="form-group">
                                    <input type="text" name="ma_phong_may" class="form-control mg-r-15" placeholder="Mã phòng máy" value="{{ Request::get('ma_phong_may') }}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-success " style="margin-right: 10px"><i class="fas fa-search"></i> Tìm kiếm </button>
                                    <a href="{{ route('thoi_khoa_bieu.index') }}">
                                        <button type="button" name="reset" value="reset" class="btn btn-danger">
                                            <i class="fa fa-undo"></i> Reset
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                <tr>
                                    <th width="4%" class=" text-center">STT</th>
                                    <th class=" text-center">Giáo viên</th>
                                    <th class=" text-center">Môn học</th>
                                    <th class=" text-center">Phòng máy</th>
                                    <th class=" text-center">Ca sử dụng</th>
                                    <th class=" text-center">Thứ</th>
                                    <th class=" text-center">Ngày</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (!$phanCong->isEmpty())
                                    @php $i = $phanCong->firstItem(); @endphp
                                    @foreach($phanCong as $item)
                                        <tr>
                                            <td class=" text-center" style="vertical-align:middle;">{{ $i }}</td>
                                            <td class=" text-center" style="vertical-align:middle;">{{ isset($item->giao_vien) ? $item->giao_vien->ten_giao_vien : '' }}</td>
                                            <td class=" text-center" style="vertical-align:middle;">{{ isset($item->mon_hoc) ? $item->mon_hoc->ten_mon_hoc : '' }}</td>
                                            <td class=" text-center" style="vertical-align:middle;">{{ isset($item->phong_may) ? $item->phong_may->ten_phong : '' }}</td>
                                            <td class=" text-center" style="vertical-align:middle;">{{ !empty($item->ca_su_dung)  ? $casudung[$item->ca_su_dung] : '' }}</td>
                                            <td class=" text-center" style="vertical-align:middle;">
                                                @if ($item->ngay_thang)
                                                    <button type="button" class="btn btn-block btn-success btn-xs">{{ getDateTime('vn', 1, 1, 0, '', strtotime($item->ngay_thang)) }}</button>
                                                @endif
                                            </td>
                                            <td class=" text-center" style="vertical-align:middle;">{{ date('Y-m-d', strtotime($item->ngay_thang)) }}</td>
                                        </tr>
                                        @php $i++ @endphp
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            @if($phanCong->hasPages())
                                <div class="pagination float-right margin-20">
                                    {{ $phanCong->appends($query = '')->links() }}
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            {{--<div class="row">--}}
                {{--<!-- /.col -->--}}
                {{--<div class="col-md-12">--}}
                    {{--<div class="card card-primary">--}}
                        {{--<div class="card-body p-0">--}}
                            {{--<!-- THE CALENDAR -->--}}
                            {{--<div id="calendar"></div>--}}
                        {{--</div>--}}
                        {{--<!-- /.card-body -->--}}
                    {{--</div>--}}
                    {{--<!-- /.card -->--}}
                {{--</div>--}}
                {{--<!-- /.col -->--}}
            {{--</div>--}}
        </div>
    </section>
@stop
@section('script')
    <script src="{!! asset('admin/plugins/jquery-ui/jquery-ui.min.js') !!}"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="{!! asset('admin/plugins/moment/moment.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/fullcalendar/main.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/fullcalendar-daygrid/main.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/fullcalendar-timegrid/main.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/fullcalendar-interaction/main.min.js') !!}"></script>
    <script src="{!! asset('admin/plugins/fullcalendar-bootstrap/main.min.js') !!}"></script>
    <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            //ini_events($('#external-events div.external-event'))
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d    = date.getDate(),
                m    = date.getMonth(),
                y    = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendarInteraction.Draggable;

            var containerEl = document.getElementById('external-events');
            var checkbox = document.getElementById('drop-remove');
            var calendarEl = document.getElementById('calendar');

            // initialize the external events
                    {{--// -------------------------------------------------------------------}}


            var calendar = new Calendar(calendarEl, {
                    plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
                    header    : {
                        left  : 'prev,next',
                        center: 'title',
                        right  : 'prev,next',
                    },
                    views: {
                        dayGridMonth: { // name of view
                            titleFormat: { year: 'numeric', month: '2-digit', day: '2-digit' }
                            // other view-specific options here
                        }
                    },
                    eventDidMount: function(info) {
                        var tooltip = new Tooltip(info.el, {
                            title: info.event.extendedProps.description,
                            placement: 'top',
                            trigger: 'hover',
                            container: 'body'
                        });
                    },
                    'themeSystem': 'bootstrap',
                    //Random default events

                    events    : [
                        {
                            title          : 'All Day Event',
                            start          : new Date(y, m, 1),
                            backgroundColor: '#f56954', //red
                            borderColor    : '#f56954', //red
                            allDay         : true
                        },
                        {
                            title          : 'Long Event',
                            start          : new Date(y, m, d - 5),
                            end            : new Date(y, m, d - 2),
                            backgroundColor: '#f39c12', //yellow
                            borderColor    : '#f39c12' //yellow
                        },
                        {
                            title          : 'Meeting',
                            start          : new Date(y, m, d, 10, 30),
                            allDay         : false,
                            backgroundColor: '#0073b7', //Blue
                            borderColor    : '#0073b7' //Blue
                        },
                        {
                            title          : 'Lunch',
                            start          : new Date(y, m, d, 12, 0),
                            end            : new Date(y, m, d, 14, 0),
                            allDay         : false,
                            backgroundColor: '#00c0ef', //Info (aqua)
                            borderColor    : '#00c0ef' //Info (aqua)
                        },
                        {
                            title          : 'Birthday Party',
                            start          : new Date(y, m, d + 1, 19, 0),
                            end            : new Date(y, m, d + 1, 22, 30),
                            allDay         : false,
                            backgroundColor: '#00a65a', //Success (green)
                            borderColor    : '#00a65a' //Success (green)
                        },
                        {
                            title          : 'Click for Google',
                            start          : new Date(y, m, 28),
                            end            : new Date(y, m, 29),
                            url            : 'http://google.com/',
                            backgroundColor: '#3c8dbc', //Primary (light-blue)
                            borderColor    : '#3c8dbc' //Primary (light-blue)
                        }
                    ],
                    editable  : true,
                    droppable : true, // this allows things to be dropped onto the calendar !!!
                    drop      : function(info) {
                        // is the "remove after drop" checkbox checked?
                        if (checkbox.checked) {
                            // if so, remove the element from the "Draggable Events" list
                            info.draggedEl.parentNode.removeChild(info.draggedEl);
                        }
                    }
                });
            calendar.render();
        })
    </script>
@stop
