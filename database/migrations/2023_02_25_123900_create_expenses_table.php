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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id(); //編號
            $table->unsignedBigInteger('house_id'); //房屋編號
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('type'); //種類(水費、電費、保證金、房租等) *用下拉式選單
            $table->integer('amount'); //金額(月繳、季繳、年繳、一次性等)
            $table->integer('interval')->nullable(); //繳納區間 以月為單位
            $table->string('start_date')->nullable(); //費用開始日期
            $table->string('end_date')->nullable(); //費用結束日期
            $table->string('remark',100)->nullable(); //備註
            $table->boolean('renter_status')->default(0); //狀態(1:已繳、0:未繳)
            $table->boolean('owner_status')->default(0); //狀態(1:已送出費用、0:未送出費用)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
