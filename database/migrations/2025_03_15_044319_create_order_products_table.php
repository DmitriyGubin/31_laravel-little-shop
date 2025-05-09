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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->bigInteger('order_id') -> nullable() -> unsigned();
            $table->foreign('order_id')->references('id')->on('orders') -> nullOnDelete();

            $table->bigInteger('product_id') -> nullable() -> unsigned();
            $table->foreign('product_id')->references('id')->on('products') -> nullOnDelete();
        
            $table->bigInteger('quant');//количество товара
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
