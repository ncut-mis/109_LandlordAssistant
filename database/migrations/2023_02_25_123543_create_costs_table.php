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
		Schema::create('costs', function (Blueprint $table) {
            $table->id(); //編號
            $table->unsignedBigInteger('house_id'); //房屋編號
            $table->foreign('house_id')->references('id')->on('houses');
            $table->string('type'); //種類(水費、電費、保證金、房租等)
            $table->integer('amount'); //金額(月繳、季繳、年繳、一次性等)
            $table->string('interval'); //繳納區間
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costs');
    }
};
