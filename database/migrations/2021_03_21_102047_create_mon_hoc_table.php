<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonHocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mon_hoc', function (Blueprint $table) {
            $table->id();
            $table->string('ma_mon_hoc', 50)->nullable();
            $table->string('ten_mon_hoc')->nullable();
            $table->unsignedBigInteger('khoa_id')->nullable();
            $table->foreign('khoa_id')->references('id')->on('khoa')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('nganh_id')->nullable();
            $table->foreign('nganh_id')->references('id')->on('nganh')
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
        Schema::dropIfExists('mon_hoc');
    }
}
