use Carbon\Carbon;
use App\Models\PhongMay;
use App\Models\PhanCongGiangDay;

public function capNhatTrangThaiPhong()
{
    // Lấy thời gian hiện tại
    $now = Carbon::now();

    // Lấy tất cả các bản ghi phân công giảng dạy
    $phanCongList = PhanCongGiangDay::all();

    // Duyệt qua từng bản ghi để kiểm tra thời gian mượn
    foreach ($phanCongList as $phanCong) {
        // Tính thời gian kết thúc mượn phòng
        $thoiGianKetThuc = Carbon::parse($phanCong->thoi_gian_bat_dau)->addHours($phanCong->so_gio_muon);

        // Kiểm tra nếu thời gian kết thúc đã vượt qua thời gian hiện tại
        if ($thoiGianKetThuc->lessThan($now)) {
            // Tìm phòng máy tương ứng
            $phongMay = PhongMay::find($phanCong->phong_may_id);

            if ($phongMay) {
                // Cập nhật trạng thái của phòng máy
                // Ví dụ: cập nhật trạng thái thành '0' nếu đã hết thời gian mượn
                $phongMay->trang_thai = 0; // Giả sử '0' là trạng thái "phòng trống"
                $phongMay->save();
            }
        }
    }

    // Có thể trả về phản hồi hoặc điều hướng sau khi cập nhật
    return response()->json(['message' => 'Trạng thái phòng đã được cập nhật.']);
}
