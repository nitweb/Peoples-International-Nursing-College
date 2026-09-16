<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Widen the type enum to add 'academic_faculty' (MySQL requires redefining the enum)
        DB::statement("ALTER TABLE our_teams MODIFY COLUMN type ENUM('founder', 'top_level', 'middle_level', 'student_level', 'academic_faculty') NULL");

        Schema::table('our_teams', function ($table) {
            $table->string('qualification')->nullable()->after('designation'); // e.g. MSc in Nursing, BNMC Registered
            $table->string('subject')->nullable()->after('qualification');     // e.g. Community Health Nursing
        });
    }

    public function down(): void
    {
        Schema::table('our_teams', function ($table) {
            $table->dropColumn(['qualification', 'subject']);
        });

        DB::statement("ALTER TABLE our_teams MODIFY COLUMN type ENUM('founder', 'top_level', 'middle_level', 'student_level') NULL");
    }
};
