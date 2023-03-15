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
            $table->unsignedBigInteger('renter_id');//租客編號
            $table->foreign('renter_id')->references('id')->on('renters')->onDelete('set null')->onUpdate('cascade');
			$table->unsignedBigInteger('expense_id'); //租屋費用編號
            $table->foreign('expense_id')->references('id')->on('expenses')->onDelete('set null')->onUpdate('cascade');
            $table->boolean('status'); //狀態(已繳、未繳)
            $table->date('start_date'); //開始日期
            $table->date('deadline'); //繳費期限
            $table->string('method'); //繳納方式(暫定:現金、轉帳)
            $table->date('date'); //繳費日期
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
