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
		Schema::create('payments', function (Blueprint $table) {
            $table->id(); //編號
			$table->unsignedBigInteger('cost_id'); //租屋費用編號
            $table->foreign('cost_id')->references('id')->on('costs');
            $table->integer('name'); //費用名稱
            $table->integer('amount'); //金額
            $table->string('payment_status'); //狀態
            $table->date('start_date'); //開始日期
            $table->date('payment_deadline'); //繳費期限
            $table->string('payment_way'); //繳納方式(暫定:現金、轉帳)
            $table->date('payment_date'); //繳費日期
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
