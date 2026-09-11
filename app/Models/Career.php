<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'deadline' => 'date',
    ];

    public function applications()
    {
        return $this->hasMany(JobApply::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function getIsDeadlinePassedAttribute(): bool
    {
        return $this->deadline ? $this->deadline->isPast() : false;
    }
}
