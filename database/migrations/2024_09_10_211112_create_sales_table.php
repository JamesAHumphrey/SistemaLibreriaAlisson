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
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price',10,2);
            $table->integer('amount');

            $table->string('customer_name',50);
            $table->string('customer_phone',20);

            $table->decimal('subtotal',10,2);
            $table->decimal('total',10,2);

            $table->decimal('discount',10,2);

            $table->string('invoice_number',100);
            $table->string('code',16)->unique();

            $table->integer('employee_id')->unsigned();
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
