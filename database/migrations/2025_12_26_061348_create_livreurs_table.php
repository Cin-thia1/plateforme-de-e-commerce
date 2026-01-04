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
        Schema::create('livreurs', function (Blueprint $table) {
            // On utilise l'ID de l'utilisateur comme clé primaire de cette table
            $table->foreignId('user_id')->primary()->constrained('users')->onDelete('cascade');
            
            // Attributs spécifiques
            $table->string('photo')->nullable();
            $table->string('tel');
            $table->date('dateNaissance');
            $table->string('typeVehicule');
            $table->string('zoneActivite');
            $table->enum('typeContrat', ['temps plein', 'temps partiel', 'freelance'])->default('freelance');
            $table->string('matricule')->unique();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livreurs');
    }
};
