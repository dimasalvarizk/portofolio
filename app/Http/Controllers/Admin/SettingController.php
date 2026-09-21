<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Tampilkan form edit settings
     */
    public function edit()
    {
        $settings = Setting::pluck('value', 'key')->all();
        return view('admin.settings.edit', compact('settings'));
    }

    /**
     * Simpan pembaruan settings
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'hero_name' => 'required|string|max:255',
            'hero_title' => 'required|string|max:255',
            'hero_description' => 'required|string',
            'about_bio' => 'required|string',
            'about_gpa' => 'required|string|max:255',
            'wa_number' => 'required|string|max:255',
            'email_address' => 'required|email|max:255',
            'github_link' => 'nullable|url|max:255',
            'linkedin_link' => 'nullable|url|max:255',
            'cv_file' => 'nullable|file|mimes:pdf|max:10240', // Maksimal 10MB
        ]);

        foreach ($validated as $key => $value) {
            if ($key === 'cv_file') {
                continue;
            }
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Handle upload file CV
        if ($request->hasFile('cv_file')) {
            $path = $request->file('cv_file')->store('cv', 'public');
            Setting::updateOrCreate(['key' => 'cv_link'], ['value' => $path]);
        }

        return back()->with('success', 'Pengaturan portofolio berhasil diperbarui!');
    }
}
