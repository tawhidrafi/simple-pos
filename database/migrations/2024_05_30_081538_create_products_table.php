<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignId('group_id')->constrained('groups')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->foreignId('variant_attribute_id')->constrained('variant_attributes')->onDelete('cascade');
            $table->string('name');
            $table->string('image');
            $table->string('sku')->unique();
            $table->text('description');
            $table->string('product_type');
            $table->integer('initial_quantity');
            $table->string('supplier');
            $table->decimal('sell_price', 8, 2);
            $table->decimal('purchase_price', 8, 2);
            $table->integer('tax');
            $table->string('category');
            $table->string('brand');
            $table->string('group');
            $table->string('unit');
            $table->string('variant_attribute');
            $table->integer('barcode');
            $table->integer('re_order');
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
