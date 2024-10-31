<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhanCongGiangDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phan_cong_giang_day', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('giao_vien_id')->nullable();
            $table->foreign('giao_vien_id')->references('id')->on('giao_vien')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('mon_hoc_id')->nullable();
            $table->foreign('mon_hoc_id')->references('id')->on('mon_hoc')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('phong_may_id')->nullable();
            $table->foreign('phong_may_id')->references('id')->on('phong_may')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('thu')->nullable();
            $table->dateTime('ngay_thang')->nullable();
            $table->tinyInteger('thoi_gian_buoi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phan_cong_giang_day');
    }
}
