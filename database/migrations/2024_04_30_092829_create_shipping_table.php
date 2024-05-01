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
        Schema::create('shipping_table', function (Blueprint $table) {
            $table->increments('shipping_id');
            $table->integer('customer_id');
            $table->string('shipping_name',100);
            $table->string('shipping_email',100);
            $table->string('shipping_address');
            $table->integer('shipping_ynnote');
            $table->string('shipping_infnote',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_table');
    }
};
