<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhongMayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong_may', function (Blueprint $table) {
            $table->id();
            $table->string('ma_phong', 50)->nullable();
            $table->string('ten_phong', 255)->nullable();
            $table->tinyInteger('loai_phong')->nullable();
            $table->unsignedBigInteger('khu_vuc_id')->nullable();
            $table->foreign('khu_vuc_id')->references('id')->on('khu_vuc')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('trang_thai')->nullable();
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
        Schema::dropIfExists('phong_may');
    }
}
