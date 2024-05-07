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
        Schema::create('comment_table', function (Blueprint $table) {
            $table->increments('cm_id');
            $table->integer('product_id');
            $table->integer('customer_id');
            $table->float('cm_star');
            $table->string('cm_cmt',200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_table');
    }
};
