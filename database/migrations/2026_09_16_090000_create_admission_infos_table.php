<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admission_infos', function (Blueprint $table) {
            $table->id();
            $table->longText('long_description')->nullable();   // general admission info / process
            $table->longText('eligibility_notes')->nullable();   // general (non-program-specific) eligibility
            $table->longText('required_documents')->nullable();  // checklist of documents needed
            $table->longText('key_dates')->nullable();           // admission timeline / important dates
            $table->string('prospectus_file')->nullable();       // downloadable PDF
            $table->string('admission_form_file')->nullable();   // downloadable PDF
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admission_infos');
    }
};
