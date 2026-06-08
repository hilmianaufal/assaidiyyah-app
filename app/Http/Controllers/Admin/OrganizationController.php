<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::orderBy('sort_order')
            ->paginate(12);

        return view(
            'admin.organizations.index',
            compact('organizations')
        );
    }

    public function create()
    {
        return view(
            'admin.organizations.create'
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo' => 'nullable|image|max:2048',
            'bio' => 'nullable',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ]);

        if ($request->hasFile('photo')) {

            $validated['photo'] =
                $request->file('photo')
                ->store(
                    'organizations',
                    'public'
                );
        }

        Organization::create($validated);

        return redirect()
            ->route('admin.organizations.index')
            ->with(
                'success',
                'Data struktur berhasil ditambahkan'
            );
    }

    public function show(
        Organization $organization
    ) {
        return view(
            'admin.organizations.show',
            compact('organization')
        );
    }

    public function edit(
        Organization $organization
    ) {
        return view(
            'admin.organizations.edit',
            compact('organization')
        );
    }

    public function update(
        Request $request,
        Organization $organization
    ) {
        $validated = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'photo' => 'nullable|image|max:2048',
            'bio' => 'nullable',
            'sort_order' => 'nullable|integer',
            'status' => 'required',
        ]);

        if ($request->hasFile('photo')) {

            if ($organization->photo) {
                Storage::disk('public')
                    ->delete(
                        $organization->photo
                    );
            }

            $validated['photo'] =
                $request->file('photo')
                ->store(
                    'organizations',
                    'public'
                );
        }

        $organization->update(
            $validated
        );

        return redirect()
            ->route('admin.organizations.index')
            ->with(
                'success',
                'Data berhasil diperbarui'
            );
    }

    public function destroy(
        Organization $organization
    ) {
        if ($organization->photo) {

            Storage::disk('public')
                ->delete(
                    $organization->photo
                );
        }

        $organization->delete();

        return redirect()
            ->route('admin.organizations.index')
            ->with(
                'success',
                'Data berhasil dihapus'
            );
    }
}