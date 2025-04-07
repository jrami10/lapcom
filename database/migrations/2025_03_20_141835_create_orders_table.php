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
            $table->integer('num_order')->unique();
            $table->float('sub_total');
            $table->float('total');
            $table->string('coupon')->nullable();
            $table->integer('quantity');
            $table->float('delivery')->nullable();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->text('address');
            $table->enum('statut_order', ['inprogress', 'delivred', 'concelled']);
            $table->foreignId('idUser')->constrained('users')->onDelete('cascade');
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
