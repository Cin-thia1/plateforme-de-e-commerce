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
        Schema::table('orders', function (Blueprint $table) {
            // On ajoute la colonne après 'client_id' ou une autre colonne existante
            //$table->string('delivery_status')->default('en attente')->after('client_id');
            
            // Si vous préférez un ENUM pour plus de sécurité :
            $table->enum('delivery_status', ['en attente', 'en cours', 'livré', 'annulé'])->default('en attente')->after('client_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
