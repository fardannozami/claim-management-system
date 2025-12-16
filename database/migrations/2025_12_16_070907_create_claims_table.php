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
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();

            $table->foreignId('retail_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('distributor_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('promo_program_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('status');
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamp('ho_reviewed_at')->nullable();

            $table->unsignedBigInteger('approved_amount')->default(0);
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claims');
    }
};
