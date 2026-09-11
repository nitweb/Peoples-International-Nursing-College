<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('media_videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('youtube_url');
            $table->string('youtube_id');
            $table->unsignedBigInteger('views')->default(0); // auto-incremented each time the video is played
            $table->dateTime('published_at')->nullable(); // auto-set to upload time, shows "2 days ago" / "14 hours ago"
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_videos');
    }
};
