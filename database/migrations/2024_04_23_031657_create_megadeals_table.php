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
        Schema::create('megadeals', function (Blueprint $table) {
            $table->id('deal_id');
            $table->unsignedBigInteger('allitem');
            $table->foreign('allitem')->references('allitem_id')->on('allitems')->cascadeOnDelete();
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('discount');
            $table->double('megadealdiscount')->default(0);
            $table->timeTz('dealtime')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('megadeals');
    }
};
