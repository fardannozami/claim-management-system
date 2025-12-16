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
        Schema::create('retails', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // data pembayaran klaim
            $table->string('payment_account'); // contoh: BCA, Mandiri
            $table->string('payment_number');  // nomor rekening / e-wallet

            // user yang merepresentasikan HO
            $table->foreignId('user_id')
                ->constrained()
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('distributor_id')
                ->constrained()
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retails');
    }
};
