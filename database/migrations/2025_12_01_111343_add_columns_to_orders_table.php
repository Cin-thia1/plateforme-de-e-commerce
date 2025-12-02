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
            $table->string('address')->after('client_id');
            $table->string('country')->after('address');
            $table->string('region')->after('country');
            $table->string('city')->after('region');
            $table->string('zip')->nullable()->after('city');
            $table->string('payment_method')->after('zip');
            $table->text('notes')->nullable()->after('payment_method');
            $table->decimal('total', 10, 2)->after('notes');
        });
    }

    /**
     * Reverse the migrations.
    */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'address',
                'country',
                'region',
                'city',
                'zip',
                'payment_method',
                'notes',
                'total',
            ]);
        });
    }

};
