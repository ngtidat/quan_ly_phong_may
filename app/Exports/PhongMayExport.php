<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\PhongMay;


class PhongMayExport implements FromCollection, WithHeadings
{
    private $phongmay;
    public function __construct($phongmay)
    {
        $this->phongmay = $phongmay;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $phongmay = $this->phongmay;
        $formatPhongmay = [];
        $loaiphong = PhongMay::LOAI_PHONG;

        foreach ($phongmay as $key => $item) {
            $sotiet = 0;
            if ($item->phancong) {
                $sotiet = $item->phancong->sum('so_tiet');
            }

            $formatPhongmay[] = [
                "stt" => $key + 1,
                "ma_phong" => $item->ma_phong,
                "ten_phong" => $item->ten_phong,
                "loai_phong" => !empty($item->loai_phong) ? $loaiphong[$item->loai_phong] : '',
                "so_tiet" => $sotiet,
                "thoi_gian" => calculateTime($sotiet),
            ];
        }

        return collect($formatPhongmay);
    }

    public function headings(): array
    {
        return [
            "STT",
            "Mã phòng",
            "Tên phòng",
            "Loại phòng",
            "Số tiết",
            "Thời gian",
        ];
    }
}