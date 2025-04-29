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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Invoice number
            $table->string('invoice_no'); // Invoice number
            $table->date('invoice_date'); // Invoice date
            $table->text('client_details'); // Client details
            $table->decimal('subtotal', 10, 2); // Total before tax
            $table->decimal('sgst', 10, 2); // SGST
            $table->decimal('cgst', 10, 2); // CGST
            $table->decimal('grand_total', 10, 2); // Total after tax
            $table->string('amount_in_words'); // Amount in words
            $table->string('bank_name'); // Bank name
            $table->string('account_no'); // Bank account number
            $table->string('ifsc_code'); // IFSC code
            $table->string('gst_no'); // GST number
            $table->text('bank_address'); // Bank address
            $table->string('generated_by');
            $table->string('status');
            $table->timestamps();
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
