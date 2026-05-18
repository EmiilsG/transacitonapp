<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\User;
use App\Services\ApplyForInternshipService;
use Illuminate\Http\Request;

class InternshipApplicationController extends Controller
{
    public function __construct(
        private readonly ApplyForInternshipService $applyForInternshipService
    ) {}

    public function create()
    {
        $users = User::all();
        $internships = Internship::all();

        return view('apply', compact('users', 'internships'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'internship_id' => 'required|integer|exists:internships,id',
        ]);

        try {
            $application = $this->applyForInternshipService->apply(
                $validated['user_id'],
                $validated['internship_id']
            );

            return response()->json([
                'message' => 'Successfully applied for internship.',
                'application' => $application,
            ], 201);
        } catch (\RuntimeException $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 422);
        }
    }
}
