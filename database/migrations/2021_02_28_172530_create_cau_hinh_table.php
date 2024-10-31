<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCauHinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cau_hinh', function (Blueprint $table) {
            $table->id();
            $table->string('ma_cau_hinh', 50)->nullable();
            $table->string('loai_may', 250)->nullable();
            $table->string('cpu', 250)->nullable();
            $table->string('ram', 250)->nullable();
            $table->string('vga', 250)->nullable();
            $table->string('monitor', 250)->nullable();
            $table->text('ghi_chu')->nullable();
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
        Schema::dropIfExists('cau_hinh');
    }
}
