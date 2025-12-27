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
        Schema::create('notifications', function (Blueprint $table) {
            // Supprimez DB::raw('gen_random_uuid()')
            $table->uuid('id')->primary(); 
            
            $table->unsignedBigInteger('id_destinataire');
            $table->string('user_type');
            $table->enum('lu', ['oui', 'non'])->default('non');
            $table->text('commentaire')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification');
    }
};
