<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaVideo extends Model
{
    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Extract the YouTube video ID from any common YouTube URL format.
     */
    public static function extractYoutubeId(string $url): ?string
    {
        $pattern = '/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([A-Za-z0-9_-]{11})/';

        if (preg_match($pattern, $url, $matches)) {
            return $matches[1];
        }

        return null;
    }

    // Thumbnail Image Url
    public function getThumbnailAttribute()
    {
        return 'https://img.youtube.com/vi/' . $this->youtube_id . '/hqdefault.jpg';
    }

    // Embed Url (for iframe playback)
    public function getEmbedUrlAttribute()
    {
        return 'https://www.youtube.com/embed/' . $this->youtube_id;
    }

    // Human readable "2 days ago" / "14 hours ago"
    public function getTimeAgoAttribute()
    {
        return $this->published_at ? $this->published_at->diffForHumans() : null;
    }

    // Human readable view count, e.g. "1.2K views"
    public function getViewsLabelAttribute()
    {
        $count = (int) $this->views;

        if ($count >= 1000000) {
            return round($count / 1000000, 1) . 'M views';
        }

        if ($count >= 1000) {
            return round($count / 1000, 1) . 'K views';
        }

        return $count . ' ' . ($count == 1 ? 'view' : 'views');
    }

    // Call this whenever the video is actually played on the frontend
    public function incrementViews()
    {
        $this->increment('views');
    }
}
