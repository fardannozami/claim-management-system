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
        Schema::create('claim_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('claim_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained()->restrictOnDelete();

            $table->unsignedInteger('qty_submitted');
            $table->unsignedInteger('qty_approved')->nullable();

            // freeze rate saat submit
            $table->unsignedBigInteger('unit_amount');
            $table->unsignedBigInteger('subtotal_amount')->default(0);

            $table->string('rejection_reason')->nullable();
            $table->timestamps();

            $table->index(['claim_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claim_items');
    }
};
