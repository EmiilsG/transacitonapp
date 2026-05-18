<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'application_deadline',
        'max_applicants',
    ];

    public function applications()
    {
        return $this->hasMany(InternshipApplication::class);
    }

    public function isValid(): bool
    {
        return $this->status === 'active'
            && now()->lessThanOrEqualTo($this->application_deadline);
    }

    public function hasCapacity(): bool
    {
        return $this->applications()->where('status', 'approved')->count() < $this->max_applicants;
    }
}
