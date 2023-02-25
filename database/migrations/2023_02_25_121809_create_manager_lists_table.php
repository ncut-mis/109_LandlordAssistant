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
		Schema::create('manager_lists', function (Blueprint $table) {
            $table->id(); //編號
            $table->unsignedBigInteger('user_id'); //會員編號
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('location_id'); //地點編號
            $table->foreign('location_id')->references('id')->on('locations');
            $table->unsignedBigInteger('manager_id'); //管理員編號
            $table->foreign('manager_id')->references('id')->on('managers');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manager_lists');
    }
};
