<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->unique();
            $table->unsignedBigInteger('donation_category_id')->nullable();

            // Donor info
            $table->string('donor_name');
            $table->string('donor_email')->nullable();
            $table->string('donor_phone');
            $table->text('message')->nullable();
            $table->boolean('is_anonymous')->default(false);

            // Amount
            $table->decimal('amount', 15, 2);
            $table->string('currency', 5)->default('BDT');

            // Payment
            $table->string('payment_method')->default('bkash');
            $table->string('bkash_payment_id')->nullable();     // paymentID from bKash create payment
            $table->string('bkash_trx_id')->nullable();         // trxID from bKash execute payment
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending');
            $table->json('payment_response')->nullable();       // raw gateway response (audit/debug)
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();

            $table->foreign('donation_category_id')->references('id')->on('donation_categories')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
