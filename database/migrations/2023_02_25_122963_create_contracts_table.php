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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();//編號
            $table->unsignedBigInteger('renter_id');//租客編號
            $table->foreign('renter_id')->references('id')->on('renters')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('house_id');//房屋編號
            $table->foreign('house_id')->references('id')->on('houses')->onUpdate('cascade')->onDelete('cascade');
            $table->string('path');//合約檔案路徑
            $table->date('start_date');//起始日
            $table->date('end_date');//到期日
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
