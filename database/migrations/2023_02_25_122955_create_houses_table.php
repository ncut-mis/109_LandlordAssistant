<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
		Schema::create('houses', function (Blueprint $table) {
            $table->id(); //編號
            $table->string('address'); //地址
            $table->string('name'); //房屋名稱
            $table->string('introduce'); //介紹
            $table->string('lease_status'); //租賃狀態
            $table->string('people'); //可住人數
            $table->string('min_period'); //最短租期
            $table->string('pattern'); //格局(房間數量)
            $table->integer('square_meters'); //坪數
            $table->string('type'); //類型(雅房、分租套房、獨立套房、整層住家)
            $table->integer('floor'); //樓層
            $table->unsignedBigInteger('location_id'); //地點編號
            $table->foreign('location_id')->references('id')->on('locations');
            $table->unsignedBigInteger('owner_id'); //房東編號
            $table->foreign('owner_id')->references('id')->on('owners');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
