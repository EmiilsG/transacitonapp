<?php

namespace App\Services;

use App\Models\Internship;
use App\Models\InternshipApplication;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ApplyForInternshipService
{
    public function apply(int $userId, int $internshipId): InternshipApplication
    {
        return DB::transaction(function () use ($userId, $internshipId) {
            $user = User::findOrFail($userId);

            $internship = Internship::findOrFail($internshipId);

            if (!$internship->isValid()) {
                throw new \RuntimeException('Internship is not valid or deadline has passed.');
            }

            if (!$internship->hasCapacity()) {
                throw new \RuntimeException('Internship has reached maximum number of applicants.');
            }

            $alreadyApplied = InternshipApplication::where('user_id', $userId)
                ->where('internship_id', $internshipId)
                ->exists();

            if ($alreadyApplied) {
                throw new \RuntimeException('User has already applied for this internship.');
            }

            return InternshipApplication::create([
                'user_id' => $userId,
                'internship_id' => $internshipId,
                'status' => 'pending',
                'applied_at' => now(),
            ]);
        });
    }
}
