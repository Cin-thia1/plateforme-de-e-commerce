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
        Schema::create('livraison_preuves', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('livraison_id')->constrained('livraisons')->onDelete('cascade');
            $table->enum('type', ['PHOTO', 'SIGNATURE', 'QR']);
            $table->string('file_url')->nullable();
            $table->string('qr_value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons_preuves');
    }
};
