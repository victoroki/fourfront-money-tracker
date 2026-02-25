<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Create the transactions table.
     * Each transaction is an income or expense entry linked to a wallet.
     * The 'type' enum drives balance calculations: income adds, expense subtracts.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')
                  ->constrained()
                  ->onDelete('cascade'); // Deleting a wallet removes its transactions
            $table->enum('type', ['income', 'expense']); // Only two valid transaction types
            $table->decimal('amount', 15, 2);             // Supports up to 15 digits, 2 decimal places
            $table->text('description')->nullable();       // Optional notes for the transaction
            $table->timestamps();
        });
    }

    /**
     * Reverse the migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
