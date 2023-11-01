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
            $table->uuid();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->float('price');
            $table->string('size')->nullable();
            $table->integer('quantity');
            $table->boolean('is_in_stock');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->boolean('status')->default(true);
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('collection_id')->constrained()->cascadeOnDelete();



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
