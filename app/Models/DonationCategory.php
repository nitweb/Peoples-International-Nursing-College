<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'is_featured' => 'boolean',
        'target_amount' => 'decimal:2',
        'raised_amount' => 'decimal:2',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class, 'donation_category_id', 'id');
    }

    public function completedDonations()
    {
        return $this->donations()->where('status', 'completed');
    }

    // Progress percentage for progress bar (0-100), capped at 100
    public function getProgressPercentAttribute()
    {
        if (! $this->target_amount || $this->target_amount <= 0) {
            return 0;
        }

        $percent = ($this->raised_amount / $this->target_amount) * 100;

        return (int) min(100, round($percent));
    }
}
