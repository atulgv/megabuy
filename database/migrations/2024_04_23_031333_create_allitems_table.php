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
        Schema::create('allitems', function (Blueprint $table) {
            $table->id('allitem_id');
            $table->string('name')->unique();
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('category_id')->on('categories')->cascadeOnDelete();
            $table->unsignedBigInteger('subcategory');
            $table->foreign('subcategory')->references('subcategory_id')->on('subcategories')->cascadeOnDelete();
            $table->unsignedBigInteger('seller');
            $table->foreign('seller')->references('seller_id')->on('sellers')->cascadeOnDelete();
            $table->unsignedBigInteger('quantity')->default(0);
            $table->string('imageone');
            $table->string('imagetwo');
            $table->string('imagethree');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allitems');
    }
};
