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
        Schema::create('marques', function (Blueprint $table) {
            $table->id(); // ID de la marque
            $table->string('name'); // Nom de la marque
            $table->string('slug')->unique(); // Slug unique pour la marque
            $table->string('logo')->nullable();  // Logo de la marque (peut être nul)
            $table->text('description')->nullable(); // Description de la marque (peut être nulle)
            $table->timestamps(); // Les timestamps (created_at et updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('marques'); // Suppression de la table marques
    }
};

