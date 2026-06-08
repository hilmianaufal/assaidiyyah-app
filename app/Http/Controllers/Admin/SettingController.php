<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrCreate([
            'id' => 1,
        ], [
            'site_name' => 'Pondok Pesantren Assaidiyyah',
            'tagline' => 'Membentuk Generasi Qurani, Berakhlak Mulia dan Berprestasi',
        ]);

        return view('admin.settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::firstOrCreate([
            'id' => 1,
        ]);

        $validated = $request->validate([
            'site_name' => ['required', 'max:255'],
            'tagline' => ['nullable', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'max:50'],
            'address' => ['nullable'],
            'description' => ['nullable'],
            'vision' => ['nullable'],
            'mission' => ['nullable'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'hero_image' => ['nullable', 'image', 'max:4096'],
            'meta_title' => ['nullable', 'max:255'],
            'meta_description' => ['nullable', 'max:500'],
            'meta_keywords' => ['nullable', 'max:255'],
            'og_image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('og_image')) {
            if ($setting->og_image) {
                Storage::disk('public')->delete($setting->og_image);
            }

            $validated['og_image'] = $request->file('og_image')->store('settings', 'public');
        }

        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
            }

            $validated['logo'] = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('hero_image')) {
            if ($setting->hero_image) {
                Storage::disk('public')->delete($setting->hero_image);
            }

            $validated['hero_image'] = $request->file('hero_image')->store('settings', 'public');
        }

        $setting->update($validated);

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'Pengaturan website berhasil diperbarui.');
    }
}