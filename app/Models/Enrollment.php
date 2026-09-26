<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date_of_birth' => 'date',
        'applicant_date' => 'date',
        'declaration_accepted' => 'boolean',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id', 'id');
    }
}
