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
		Schema::create('repairs', function (Blueprint $table) {
            $table->id(); //編號
            $table->unsignedBigInteger('renter_id');//租客編號
            $table->foreign('renter_id')->references('id')->on('renters')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('house_id'); //房屋編號
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status'); //狀態(未維修、已維修、維修中)
            $table->string('content'); //內容
            $table->date('date'); //日期
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repairs');
    }
};
