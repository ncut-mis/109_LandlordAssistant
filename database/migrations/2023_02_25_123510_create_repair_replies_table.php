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
        Schema::create('repair_replies', function (Blueprint $table) {
            $table->id();//編號
            $table->unsignedBigInteger('repair_id');//報修編號
            $table->foreign('repair_id')->references('id')->on('repairs')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title');//標題
            $table->string('status');//狀態
            $table->string('content')->nullable();//內容
            $table->date('date')->nullable();//日期
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_replies');
    }
};
