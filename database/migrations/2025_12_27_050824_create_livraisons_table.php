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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('livreur_id')->references('user_id')->on('livreurs')->onDelete('restrict');
            
            $table->enum('status', ['en cours', 'terminé', 'echec'])->default('en cours');
            $table->string('raison_echec')->nullable();
            $table->text('commentaire_echec')->nullable();
            $table->timestamp('date_livraison')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
