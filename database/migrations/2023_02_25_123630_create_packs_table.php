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
		Schema::create('packs', function (Blueprint $table) {
            $table->id(); //編號
            $table->unsignedBigInteger('house_id'); //房屋編號
            $table->foreign('house_id')->references('id')->on('houses');
            $table->date('arrival_date'); //抵達日期
            $table->string('type'); //郵件類別
            $table->string('status'); //狀態
            $table->date('receive_date'); //領取時間
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packs');
    }
};
