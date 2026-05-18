<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternshipApplication extends Model
{
    protected $fillable = [
        'user_id',
        'internship_id',
        'status',
        'applied_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function internship()
    {
        return $this->belongsTo(Internship::class);
    }
}
