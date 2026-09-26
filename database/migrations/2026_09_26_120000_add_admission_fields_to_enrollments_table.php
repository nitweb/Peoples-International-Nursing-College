<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            // Photo
            $table->string('photo')->nullable()->after('training_id');

            // Personal Info
            $table->string('father_name', 150)->nullable()->after('name');
            $table->string('mother_name', 150)->nullable()->after('father_name');
            $table->unsignedTinyInteger('age')->nullable()->after('mother_name');
            $table->date('date_of_birth')->nullable()->after('age');
            $table->string('place_of_birth', 150)->nullable()->after('date_of_birth');
            $table->string('nationality', 100)->nullable()->after('place_of_birth');
            $table->string('religion', 100)->nullable()->after('nationality');
            $table->string('permanent_address', 255)->nullable()->after('religion');
            $table->string('present_address', 255)->nullable()->after('permanent_address');
            $table->string('father_mother_mobile', 30)->nullable()->after('phone');

            // Local Guardian
            $table->string('guardian_name', 150)->nullable()->after('present_address');
            $table->string('guardian_mobile', 30)->nullable()->after('guardian_name');
            $table->string('guardian_address', 255)->nullable()->after('guardian_mobile');
            $table->string('guardian_relation', 100)->nullable()->after('guardian_address');
            $table->string('guardian_occupation', 150)->nullable()->after('guardian_relation');
            $table->string('guardian_tel', 30)->nullable()->after('guardian_occupation');
            $table->string('blood_group', 5)->nullable()->after('guardian_tel');

            // Academic Profile - SSC
            $table->string('ssc_group', 100)->nullable()->after('blood_group');
            $table->string('ssc_gpa', 20)->nullable()->after('ssc_group');
            $table->string('ssc_year', 10)->nullable()->after('ssc_gpa');
            $table->string('ssc_institute', 191)->nullable()->after('ssc_year');
            $table->string('ssc_board', 100)->nullable()->after('ssc_institute');

            // Academic Profile - HSC
            $table->string('hsc_group', 100)->nullable()->after('ssc_board');
            $table->string('hsc_gpa', 20)->nullable()->after('hsc_group');
            $table->string('hsc_year', 10)->nullable()->after('hsc_gpa');
            $table->string('hsc_institute', 191)->nullable()->after('hsc_year');
            $table->string('hsc_board', 100)->nullable()->after('hsc_institute');

            // Academic Profile - Diploma in Nursing Science and Midwifery/Orthopaedics
            $table->string('diploma_group', 100)->nullable()->after('hsc_board');
            $table->string('diploma_gpa', 20)->nullable()->after('diploma_group');
            $table->string('diploma_year', 10)->nullable()->after('diploma_gpa');
            $table->string('diploma_institute', 191)->nullable()->after('diploma_year');
            $table->string('diploma_board', 100)->nullable()->after('diploma_institute');

            // Admission Test
            $table->string('admit_roll', 50)->nullable()->after('diploma_board');
            $table->string('test_score', 30)->nullable()->after('admit_roll');
            $table->string('merit_position', 30)->nullable()->after('test_score');

            // Document Uploads
            $table->string('ssc_certificate')->nullable()->after('merit_position');
            $table->string('ssc_marksheet')->nullable()->after('ssc_certificate');
            $table->string('hsc_certificate')->nullable()->after('ssc_marksheet');
            $table->string('hsc_marksheet')->nullable()->after('hsc_certificate');
            $table->string('admission_test_admit_card')->nullable()->after('hsc_marksheet');
            $table->string('diploma_certificate')->nullable()->after('admission_test_admit_card');
            $table->string('diploma_registration_card')->nullable()->after('diploma_certificate');
            $table->string('nid_or_birth_certificate')->nullable()->after('diploma_registration_card');

            // bKash Payment Reference
            $table->string('bkash_trx_id', 100)->nullable()->after('nid_or_birth_certificate');
            $table->string('bkash_trx_ref', 100)->nullable()->after('bkash_trx_id');

            // Declaration / Applicant Signature Block
            $table->boolean('declaration_accepted')->default(false)->after('bkash_trx_ref');
            $table->string('applicant_name', 150)->nullable()->after('declaration_accepted');
            $table->string('applicant_address', 255)->nullable()->after('applicant_name');
            $table->date('applicant_date')->nullable()->after('applicant_address');
        });
    }

    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropColumn([
                'photo',
                'father_name',
                'mother_name',
                'age',
                'date_of_birth',
                'place_of_birth',
                'nationality',
                'religion',
                'permanent_address',
                'present_address',
                'father_mother_mobile',
                'guardian_name',
                'guardian_mobile',
                'guardian_address',
                'guardian_relation',
                'guardian_occupation',
                'guardian_tel',
                'blood_group',
                'ssc_group',
                'ssc_gpa',
                'ssc_year',
                'ssc_institute',
                'ssc_board',
                'hsc_group',
                'hsc_gpa',
                'hsc_year',
                'hsc_institute',
                'hsc_board',
                'diploma_group',
                'diploma_gpa',
                'diploma_year',
                'diploma_institute',
                'diploma_board',
                'admit_roll',
                'test_score',
                'merit_position',
                'ssc_certificate',
                'ssc_marksheet',
                'hsc_certificate',
                'hsc_marksheet',
                'admission_test_admit_card',
                'diploma_certificate',
                'diploma_registration_card',
                'nid_or_birth_certificate',
                'bkash_trx_id',
                'bkash_trx_ref',
                'declaration_accepted',
                'applicant_name',
                'applicant_address',
                'applicant_date',
            ]);
        });
    }
};
