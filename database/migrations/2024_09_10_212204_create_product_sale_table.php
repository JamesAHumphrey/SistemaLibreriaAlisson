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
        Schema::create('product_sale', function (Blueprint $table) {
            
            $table->increments('id');
            $table->decimal('purchase_price',10,2);
            $table->integer('amount');
            $table->decimal('total',10,2);

            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('sale_id')->unsigned();
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sale');
    }
};
