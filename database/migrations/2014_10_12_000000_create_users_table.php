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
		Schema::create('users', function (Blueprint $table) {
            $table->id(); //編號
            $table->string('password'); //密碼
            $table->string('name'); //姓名
            $table->string('sex')->nullable(); //性別
            $table->string('phone');//電話
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();//email
            $table->string('account_name')->nullable(); //銀行名稱
            $table->string('account')->nullable(); //銀行帳戶
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
