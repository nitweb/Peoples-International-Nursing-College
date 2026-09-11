<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_applies', function (Blueprint $table) {
            $table->foreignId('career_id')->nullable()->after('id')
                ->constrained('careers')->nullOnDelete();

            $table->string('nid_number')->nullable()->after('phone');
            $table->date('date_of_birth')->nullable()->after('nid_number');
            $table->enum('gender', ['male', 'female', 'other'])->nullable()->after('date_of_birth');

            $table->string('address')->nullable()->after('gender');
            $table->string('district')->nullable()->after('address');
            $table->string('thana')->nullable()->after('district');

            $table->string('education')->nullable()->after('thana');
            $table->boolean('has_field_experience')->default(false)->after('education');

            $table->enum('status', ['pending', 'shortlisted', 'rejected', 'hired'])
                ->default('pending')->after('message');
        });
    }

    public function down(): void
    {
        Schema::table('job_applies', function (Blueprint $table) {
            $table->dropConstrainedForeignId('career_id');
            $table->dropColumn([
                'nid_number', 'date_of_birth', 'gender',
                'address', 'district', 'thana',
                'education', 'has_field_experience', 'status',
            ]);
        });
    }
};
