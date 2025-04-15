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
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('resume')->nullable();
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->float('price');
            $table->float('promo')->nullable();
            $table->enum('state', ['disponible', 'outofstock', 'soon']);
            $table->enum('statut_taxe', ['yes', 'no']);
            $table->foreignId('idCategory')->constrained('categories')->onDelete('cascade');
            $table->foreignId('idUser')->constrained('users')->onDelete('cascade');
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
