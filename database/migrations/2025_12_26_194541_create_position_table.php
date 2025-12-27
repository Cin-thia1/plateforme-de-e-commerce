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
        Schema::create('positions', function (Blueprint $table) {
            // On enlève le DB::raw pour MySQL
            $table->uuid('id')->primary(); 
            
            $table->foreignUuid('livraison_id')->constrained('livraisons')->onDelete('cascade');
            $table->double('lat');
            $table->double('lng');
            $table->double('accuracy')->nullable();
            $table->timestamp('captured_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position');
    }
};
