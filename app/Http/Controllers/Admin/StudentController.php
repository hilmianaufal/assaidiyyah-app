<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::latest()->paginate(12);

        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => ['required', 'unique:students,nis'],
            'name' => ['required', 'max:255'],
            'gender' => ['required'],
            'birth_date' => ['nullable', 'date'],
            'birth_place' => ['nullable', 'max:255'],
            'address' => ['nullable'],
            'class_name' => ['nullable', 'max:255'],
            'dormitory' => ['nullable', 'max:255'],
            'guardian_name' => ['nullable', 'max:255'],
            'guardian_phone' => ['nullable', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'status' => ['required'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')
                ->store('students', 'public');
        }

        Student::create($validated);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Data santri berhasil ditambahkan.');
    }

    public function show(Student $student)
    {
        return view('admin.students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'nis' => ['required', 'unique:students,nis,' . $student->id],
            'name' => ['required', 'max:255'],
            'gender' => ['required'],
            'birth_date' => ['nullable', 'date'],
            'birth_place' => ['nullable', 'max:255'],
            'address' => ['nullable'],
            'class_name' => ['nullable', 'max:255'],
            'dormitory' => ['nullable', 'max:255'],
            'guardian_name' => ['nullable', 'max:255'],
            'guardian_phone' => ['nullable', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'status' => ['required'],
        ]);

        if ($request->hasFile('photo')) {

            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }

            $validated['photo'] = $request->file('photo')
                ->store('students', 'public');
        }

        $student->update($validated);

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Data santri berhasil diperbarui.');
    }

    public function destroy(Student $student)
    {
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()
            ->route('admin.students.index')
            ->with('success', 'Data santri berhasil dihapus.');
    }
}