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
        Schema::create('donation_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('short_description', 500)->nullable();
            $table->longText('description')->nullable();
            $table->decimal('target_amount', 15, 2)->nullable();
            $table->decimal('raised_amount', 15, 2)->default(0);
            $table->unsignedInteger('donor_count')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('serial')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation_categories');
    }
};
