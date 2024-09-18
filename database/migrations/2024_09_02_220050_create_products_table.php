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
            $table->increments('id');
            $table->string('name', 100);
            $table->string('description', 1000)->nullable();
            $table->decimal('retail_price',10,2);
            $table->decimal('wholesale_price',10,2);

            $table->integer('current_stock');
            $table->decimal('current_total',10,2);
            $table->decimal('current_unit_price',10,2);

            $table->integer('minimum_stocks');

            $table->string('code', 50)->unique();


            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('unit_id')->unsigned();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade')->onUpdate('cascade');
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
