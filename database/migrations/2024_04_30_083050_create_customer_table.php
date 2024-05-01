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
        Schema::create('customer_table', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('customer_name', 100);
            $table->string('customer_email', 200);
            $table->char('customer_phone', 10);
            $table->string('customer_password', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_table');
    }
};
