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
        Schema::create('promo_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promo_program_id')
                ->constrained()
                ->cascadeOnDelete();

            // WAJIB produk
            $table->foreignId('product_id')
                ->constrained()
                ->restrictOnDelete();

            $table->unsignedBigInteger('amount_per_item');

            $table->timestamps();

            $table->unique([
                'promo_program_id',
                'product_id',
            ], 'promo_rate_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_rates');
    }
};
