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
        Schema::create('order_details', function (Blueprint $table) {
            $table->foreignId('idOrder')->constrained('orders')->onDelete('cascade');
            $table->foreignId('idProduct')->constrained('products')->onDelete('cascade');
            $table->integer('quantity');
            $table->primary(['idOrder', 'idProduct']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
