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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('SKU');
            $table->string('TSI');
            $table->integer('VENDOR');
            $table->string('BRAND');
            $table->string('SHIPPING_TEMPLATE');
            $table->integer('TEMPLATE_CODE');
            $table->string('INSTOCK_LEADTIME');
            $table->string('NOSTOCK_LEADTIME');
            $table->integer('QUANTITY');
            $table->string('OBSOLETE');
            $table->integer('IS_UPDATED');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
