<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InternshipSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Internship::create([
            'title' => 'Software Developer Internship',
            'description' => 'Work on real-world projects with our engineering team. Learn modern development practices.',
            'status' => 'active',
            'application_deadline' => now()->addMonth(),
            'max_applicants' => 5,
        ]);

        \App\Models\Internship::create([
            'title' => 'Data Science Internship',
            'description' => 'Analyze data, build models, and derive insights from large datasets.',
            'status' => 'active',
            'application_deadline' => now()->addWeeks(3),
            'max_applicants' => 3,
        ]);

        \App\Models\Internship::create([
            'title' => 'DevOps Internship',
            'description' => 'Learn CI/CD, cloud infrastructure, and automation tools.',
            'status' => 'active',
            'application_deadline' => now()->addDays(45),
            'max_applicants' => 2,
        ]);

        \App\Models\Internship::create([
            'title' => 'Expired Design Internship',
            'description' => 'This internship has already passed its deadline.',
            'status' => 'active',
            'application_deadline' => now()->subDays(10),
            'max_applicants' => 10,
        ]);

        \App\Models\Internship::create([
            'title' => 'Cancelled Marketing Internship',
            'description' => 'This internship was cancelled.',
            'status' => 'cancelled',
            'application_deadline' => now()->addMonth(),
            'max_applicants' => 5,
        ]);
    }
}
