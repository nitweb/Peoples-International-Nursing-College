<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Widen the type enum to add 'alumni' (MySQL requires redefining the enum)
        DB::statement("ALTER TABLE our_teams MODIFY COLUMN type ENUM('founder', 'top_level', 'middle_level', 'student_level', 'academic_faculty', 'alumni') NULL");

        Schema::table('our_teams', function ($table) {
            $table->string('batch_year')->nullable()->after('subject');        // e.g. "2022", "Batch 2019-2022"
            $table->string('current_position')->nullable()->after('batch_year'); // e.g. "Staff Nurse, Dhaka Medical College Hospital"
        });
    }

    public function down(): void
    {
        Schema::table('our_teams', function ($table) {
            $table->dropColumn(['batch_year', 'current_position']);
        });

        DB::statement("ALTER TABLE our_teams MODIFY COLUMN type ENUM('founder', 'top_level', 'middle_level', 'student_level', 'academic_faculty') NULL");
    }
};
