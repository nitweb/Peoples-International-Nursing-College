<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_anonymous' => 'boolean',
        'amount' => 'decimal:2',
        'payment_response' => 'array',
        'paid_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(DonationCategory::class, 'donation_category_id', 'id');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
