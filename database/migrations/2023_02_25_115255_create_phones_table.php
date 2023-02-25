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
		Schema::create('phones', function (Blueprint $table) {
            $table->id(); //編號
            $table->unsignedBigInteger('user_id'); //會員編號
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('phone'); //電話
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phones');
    }
};
