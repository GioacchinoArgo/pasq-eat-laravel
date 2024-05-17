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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id')->required();
            $table->decimal('total', 10, 2)->required();
            $table->boolean('status')->default(false);
            $table->string('name')->required();
            $table->string('lastname')->required();
            $table->string('email')->required();
            $table->string('address')->required();
            $table->string('phone')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
