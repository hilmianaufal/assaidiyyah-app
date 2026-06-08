<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::latest()->paginate(12);

        return view('admin.registrations.index', compact('registrations'));
    }

    public function show(Registration $registration)
    {
        return view('admin.registrations.show', compact('registration'));
    }

    public function edit(Registration $registration)
    {
        return view('admin.registrations.edit', compact('registration'));
    }

    public function update(Request $request, Registration $registration)
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
            'status' => ['required', 'in:pending,verified,accepted,rejected'],
        ]);

        $registration->update($validated);

        return redirect()
            ->route('admin.registrations.index')
            ->with('success', 'Data pendaftar berhasil diperbarui.');
    }

    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()
            ->route('admin.registrations.index')
            ->with('success', 'Data pendaftar berhasil dihapus.');
    }
}