<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('sort_order')->latest()->paginate(12);

        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'position' => ['nullable', 'max:255'],
            'education' => ['nullable', 'max:255'],
            'phone' => ['nullable', 'max:50'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'bio' => ['nullable'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        Teacher::create($validated);

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Data ustadz berhasil ditambahkan.');
    }

    public function show(Teacher $teacher)
    {
        return view('admin.teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'position' => ['nullable', 'max:255'],
            'education' => ['nullable', 'max:255'],
            'phone' => ['nullable', 'max:50'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'bio' => ['nullable'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('photo')) {
            if ($teacher->photo) {
                Storage::disk('public')->delete($teacher->photo);
            }

            $validated['photo'] = $request->file('photo')->store('teachers', 'public');
        }

        $teacher->update($validated);

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Data ustadz berhasil diperbarui.');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo) {
            Storage::disk('public')->delete($teacher->photo);
        }

        $teacher->delete();

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Data ustadz berhasil dihapus.');
    }
}