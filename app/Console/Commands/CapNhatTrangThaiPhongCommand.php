<?php

namespace App\Console\Commands;

use App\Http\Controllers\PhanCongGiangDayController;
use App\Http\Controllers\PhongMayController;
use App\Models\PhanCongGiangDay;
use Illuminate\Console\Command;

class CapNhatTrangThaiPhongCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'capnhattrangthaiphong';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cập nhật trạng thái phòng máy khi thời gian mượn đã hết';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Tạo đối tượng controller hoặc service và gọi hàm capNhatTrangThaiPhong
        
        return 0;
    }
}
