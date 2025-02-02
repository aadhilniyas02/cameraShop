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
            $table->string('product_name'); // Product name
            $table->text('product_detail'); // Detailed description of the product
            $table->decimal('product_price', 8 , 2); // Price of the product
            $table->string('product_image'); // Image path to URL
            $table->integer('product_quantity')->default(0); // Available quantity
            $table->json('meta_data')->nullable();
            $table->timestamps(); // created at and updated at
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
