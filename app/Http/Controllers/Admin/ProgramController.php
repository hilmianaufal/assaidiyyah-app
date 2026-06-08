<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('sort_order')->latest()->paginate(10);

        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'icon' => ['nullable', 'max:10'],
            'image' => ['nullable', 'image', 'max:2048'],
            'description' => ['nullable'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('programs', 'public');
        }

        Program::create($validated);

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program berhasil ditambahkan.');
    }

    public function show(Program $program)
    {
        return view('admin.programs.show', compact('program'));
    }

    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'icon' => ['nullable', 'max:10'],
            'image' => ['nullable', 'image', 'max:2048'],
            'description' => ['nullable'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', 'in:draft,published'],
        ]);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            if ($program->image) {
                Storage::disk('public')->delete($program->image);
            }

            $validated['image'] = $request->file('image')->store('programs', 'public');
        }

        $program->update($validated);

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program)
    {
        if ($program->image) {
            Storage::disk('public')->delete($program->image);
        }

        $program->delete();

        return redirect()
            ->route('admin.programs.index')
            ->with('success', 'Program berhasil dihapus.');
    }
}