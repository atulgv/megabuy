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
        Schema::create('mobiles', function (Blueprint $table) {
            $table->increments('mobile_id');
            $table->string('name')->unique();
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->unsignedBigInteger('allitem');
            $table->foreign('allitem')->references('allitem_id')->on('allitems');
            $table->unsignedBigInteger('seller');
            $table->foreign('seller')->references('seller_id')->on('sellers');
            $table->string('brand');
            $table->string('model');
            $table->string('rating');
            $table->integer('ram');
            $table->integer('storage');
            $table->integer('battery');
            $table->float('screen');
            $table->string('processor');
            $table->integer('rearcamera');
            $table->integer('frontcamera');
            $table->integer('quantity')->default(0);
            $table->string('imageOne');
            $table->string('imageTwo');
            $table->string('imageThree');
            $table->text('description')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobiles');
    }
};
