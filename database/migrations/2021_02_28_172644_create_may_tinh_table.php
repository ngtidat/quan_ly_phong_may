<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMayTinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('may_tinh', function (Blueprint $table) {
            $table->id();
            $table->string('ma_may', 50)->nullable();
            $table->string('ten_may', 250)->nullable();
            $table->integer('so_thu_tu')->nullable();
            $table->tinyInteger('trang_thai')->nullable();
            $table->dateTime('ngay_nhap')->nullable();
            $table->unsignedBigInteger('phong_may_id')->nullable();
            $table->foreign('phong_may_id')->references('id')->on('phong_may')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('cau_hinh_id')->nullable();
            $table->foreign('cau_hinh_id')->references('id')->on('cau_hinh')
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
        Schema::dropIfExists('may_tinh');
    }
}
