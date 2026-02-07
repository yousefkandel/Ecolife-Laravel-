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
            $table->string('name');
            $table->text('desc')->nullable();
            $table->decimal('old_price', 10, 2)->nullable();
            $table->decimal('price', 10, 2);
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_on_sale')->default(false);
            $table->boolean('is_bestseller')->default(false);
            $table->unsignedInteger('sales_count')->default(0);

            $table->timestamps();

    $table->index('category_id');
    $table->index('is_featured');
    $table->index('is_on_sale');
    $table->index('is_bestseller');
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
