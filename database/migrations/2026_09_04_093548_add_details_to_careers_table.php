<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->string('location')->nullable()->after('title');
            $table->enum('job_type', ['full-time', 'part-time', 'internship', 'contract'])
                ->default('full-time')->after('location');
            $table->unsignedInteger('vacancy')->default(1)->after('job_type');
            $table->string('salary_range')->nullable()->after('vacancy');
            $table->text('requirements')->nullable()->after('description');
            $table->date('deadline')->nullable()->after('requirements');
        });
    }

    public function down(): void
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->dropColumn(['location', 'job_type', 'vacancy', 'salary_range', 'requirements', 'deadline']);
        });
    }
};
