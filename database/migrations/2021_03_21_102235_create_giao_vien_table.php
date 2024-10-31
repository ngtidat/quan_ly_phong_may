<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiaoVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giao_vien', function (Blueprint $table) {
            $table->id();
            $table->string('ma_giao_vien', 50)->nullable();
            $table->string('ten_giao_vien', 50)->nullable();
            $table->string('hinh_anh', 50)->nullable();
            $table->unsignedBigInteger('khoa_id')->nullable();
            $table->foreign('khoa_id')->references('id')->on('khoa')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('giao_vien');
    }
}
