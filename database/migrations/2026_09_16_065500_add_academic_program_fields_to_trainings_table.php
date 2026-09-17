<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            // Distinguishes a full academic program (BSc/Diploma/MSc) from a short course
            $table->enum('category', ['academic_program', 'short_course'])
                ->default('short_course')
                ->after('title');

            // Academic-program-specific fields (all nullable; unused for short courses)
            $table->string('program_level', 100)->nullable()->after('category'); // e.g. Diploma, BSc, Post Basic BSc, MSc
            $table->text('eligibility')->nullable()->after('program_level'); // admission eligibility criteria
            $table->string('affiliation')->nullable()->after('eligibility'); // e.g. BNMC, University of Dhaka
            $table->unsignedInteger('total_seats')->nullable()->after('affiliation');
            $table->string('syllabus_file')->nullable()->after('total_seats'); // downloadable PDF
        });
    }

    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn(['category', 'program_level', 'eligibility', 'affiliation', 'total_seats', 'syllabus_file']);
        });
    }
};
