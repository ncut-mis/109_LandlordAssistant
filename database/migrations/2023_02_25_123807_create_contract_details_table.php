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
		Schema::create('contract_details', function (Blueprint $table) {
            $table->id(); //編號
            $table->unsignedBigInteger('renter_id'); //租客編號
            $table->foreign('renter_id')->references('id')->on('renters');
            $table->unsignedBigInteger('house_id'); //房屋編號
            $table->foreign('house_id')->references('id')->on('houses');
            $table->unsignedBigInteger('contract_id'); //目前合約編號
            $table->foreign('contract_id')->references('id')->on('contracts');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_details');
    }
};
