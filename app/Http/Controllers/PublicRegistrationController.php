<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class PublicRegistrationController extends Controller
{
    public function create()
    {
        return view('public.ppdb.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_name' => ['required', 'max:255'],
            'gender' => ['required', 'in:male,female'],
            'birth_place' => ['nullable', 'max:255'],
            'birth_date' => ['nullable', 'date'],
            'address' => ['nullable'],
            'guardian_name' => ['required', 'max:255'],
            'guardian_phone' => ['required', 'max:50'],
            'school_origin' => ['nullable', 'max:255'],
            'program_choice' => ['nullable', 'max:255'],
            'notes' => ['nullable'],
        ]);

        $validated['registration_number'] = 'PPDB-' . date('Y') . '-' . str_pad(Registration::count() + 1, 4, '0', STR_PAD_LEFT);
        $validated['status'] = 'pending';

        $registration = Registration::create($validated);

        return redirect()->route('ppdb.success', $registration);
    }

    public function success(Registration $registration)
    {
        return view('public.ppdb.success', compact('registration'));
    }
}