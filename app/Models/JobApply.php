<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date_of_birth' => 'date',
        'has_field_experience' => 'boolean',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
