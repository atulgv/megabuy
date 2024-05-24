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
        Schema::create('buyers', function (Blueprint $table) {
            $table->id('buyer_id');
            $table->string('name');
            $table->unsignedBigInteger('alluser');
            $table->foreign('alluser')->references('alluserid')->on('allusers')->cascadeOnDelete();
            $table->enum('gender', ['male', 'female', 'others']);
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->boolean('status')->default(0);
            $table->string('city', 50);
            $table->text('address')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyers');
    }
};
