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
        Schema::create('disbursements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('claim_id')->constrained()->cascadeOnDelete();

            $table->unsignedBigInteger('amount');
            $table->string('method')->default('BANK_TRANSFER');
            $table->string('provider_ref')->nullable();
            $table->string('status'); // PENDING | PAID | FAILED
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();

            $table->unique('claim_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disbursements');
    }
};
