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
        Schema::create('ledgers', function (Blueprint $table) {
            $table->id();
            $table->string('party_name');
            $table->enum('account_type', ['Credit', 'Debit']);
            $table->date('transaction_date');
            $table->string('reference_no');
            $table->decimal('opening_balance', 15, 2);
            $table->decimal('transaction_amount', 15, 2);
            $table->decimal('closing_balance', 15, 2);
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ledgers');
    }
};
