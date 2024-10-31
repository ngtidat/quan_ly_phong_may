<div class="row">
    <div class="col-md-6 default">
        <p>Mã máy : <b>{{ $computer->ma_may }}</b></p>
        <p>Tên máy :  <b>{{ $computer->ten_may }}</b></p>
    </div>
    <div class="col-md-6 default">
        <p>Số thứ tự : <b>{{ $computer->so_thu_tu }}</b></p>
        <p>Ngày nhập : <b>{{ date('Y-m-d', strtotime($computer->ngay_nhap)) }}</b></p>
    </div>
</div>

<div class="row">
    <div class="col-md-6 default">
        <p>Cấu hình : <b>{{ isset($computer->cauhinh)? $computer->cauhinh->ma_cau_hinh : '' }}</b></p>
        <p>Monitor :  <b>{{ isset($computer->cauhinh)? $computer->cauhinh->monitor : '' }}</b></p>

    </div>
    <div class="col-md-6 default">
        <p>CPU : <b>{{ isset($computer->cauhinh)? $computer->cauhinh->cpu : '' }}</b></p>
        <p>RAM : <b>{{ isset($computer->cauhinh)? $computer->cauhinh->ram : '' }}</b></p>
        <p>VGA : <b>{{ isset($computer->cauhinh)? $computer->cauhinh->vga : '' }}</b></p>
    </div>
    <div class="col-md-12">
        <p>
            {{ isset($computer->cauhinh)? $computer->cauhinh->ghi_chu : '' }}
        </p>
    </div>
</div>