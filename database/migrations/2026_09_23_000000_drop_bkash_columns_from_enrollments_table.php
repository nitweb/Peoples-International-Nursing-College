<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('enrollments')) {
            Schema::table('enrollments', function (Blueprint $table) {
                if (Schema::hasColumn('enrollments', 'bkash_number')) {
                    $table->dropColumn('bkash_number');
                }
                if (Schema::hasColumn('enrollments', 'bkash_trx_id')) {
                    $table->dropColumn('bkash_trx_id');
                }
            });
        }

        Schema::dropIfExists('donations');
        Schema::dropIfExists('donation_categories');
    }

    public function down(): void
    {
        if (Schema::hasTable('enrollments')) {
            Schema::table('enrollments', function (Blueprint $table) {
                $table->string('bkash_number', 30)->nullable();
                $table->string('bkash_trx_id', 100)->nullable();
            });
        }
    }
};
