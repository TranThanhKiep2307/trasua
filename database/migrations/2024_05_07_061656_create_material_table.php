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
        Schema::create('material_table', function (Blueprint $table) {
            $table->increments('material_id');
            $table->integer('supplier_id');
            $table->string('material_name',100);
            $table->string('material_img');
            $table->float('material_number');
            $table->integer('material_stt');
            $table->text('material_decs');
            $table->float('material_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_table');
    }
};
