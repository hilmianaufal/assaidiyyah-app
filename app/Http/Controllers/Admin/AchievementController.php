<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::latest()->paginate(12);

        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'student_name' => ['nullable', 'max:255'],
            'level' => ['nullable', 'max:255'],
            'category' => ['nullable', 'max:255'],
            'achievement_date' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
            'description' => ['nullable'],
            'status' => ['required', 'in:draft,published'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('achievements', 'public');
        }

        Achievement::create($validated);

        return redirect()
            ->route('admin.achievements.index')
            ->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function show(Achievement $achievement)
    {
        return view('admin.achievements.show', compact('achievement'));
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'student_name' => ['nullable', 'max:255'],
            'level' => ['nullable', 'max:255'],
            'category' => ['nullable', 'max:255'],
            'achievement_date' => ['nullable', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
            'description' => ['nullable'],
            'status' => ['required', 'in:draft,published'],
        ]);

        if ($request->hasFile('image')) {
            if ($achievement->image) {
                Storage::disk('public')->delete($achievement->image);
            }

            $validated['image'] = $request->file('image')->store('achievements', 'public');
        }

        $achievement->update($validated);

        return redirect()
            ->route('admin.achievements.index')
            ->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Achievement $achievement)
    {
        if ($achievement->image) {
            Storage::disk('public')->delete($achievement->image);
        }

        $achievement->delete();

        return redirect()
            ->route('admin.achievements.index')
            ->with('success', 'Prestasi berhasil dihapus.');
    }
}