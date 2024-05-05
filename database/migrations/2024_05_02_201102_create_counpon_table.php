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
        Schema::create('counpon_table', function (Blueprint $table) {
            $table->increments('counpon_id');
            $table->string('counpon_name',100);
            $table->integer('counpon_time');
            $table->integer('counpon_condition');
            $table->float('counpon_number');
            $table->string('counpon_code',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counpon_table');
    }
};
