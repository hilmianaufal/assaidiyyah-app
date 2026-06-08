<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::latest()->paginate(12);

        return view('admin.authors.index', compact('authors'));
    }

    public function create()
    {
        return view('admin.authors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'class_name' => ['nullable', 'max:255'],
            'role' => ['nullable', 'max:255'],
            'bio' => ['nullable'],
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('authors', 'public');
        }

        Author::create($validated);

        return redirect()
            ->route('admin.authors.index')
            ->with('success', 'Penulis berhasil ditambahkan.');
    }

    public function show(Author $author)
    {
        return view('admin.authors.show', compact('author'));
    }

    public function edit(Author $author)
    {
        return view('admin.authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'class_name' => ['nullable', 'max:255'],
            'role' => ['nullable', 'max:255'],
            'bio' => ['nullable'],
        ]);

        if ($request->hasFile('photo')) {
            if ($author->photo) {
                Storage::disk('public')->delete($author->photo);
            }

            $validated['photo'] = $request->file('photo')->store('authors', 'public');
        }

        $author->update($validated);

        return redirect()
            ->route('admin.authors.index')
            ->with('success', 'Penulis berhasil diperbarui.');
    }

    public function destroy(Author $author)
    {
        if ($author->photo) {
            Storage::disk('public')->delete($author->photo);
        }

        $author->delete();

        return redirect()
            ->route('admin.authors.index')
            ->with('success', 'Penulis berhasil dihapus.');
    }
}