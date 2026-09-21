<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SkillController extends Controller
{
    /**
     * Tampilkan daftar keahlian (skills)
     */
    public function index()
    {
        $skills = Skill::orderBy('category')->orderBy('id', 'asc')->get();
        return view('admin.skills.index', compact('skills'));
    }

    /**
     * Tampilkan form tambah keahlian
     */
    public function create()
    {
        return view('admin.skills.create');
    }

    /**
     * Simpan keahlian baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        Skill::create($validated);

        // Invalidate Cache Real-Time
        Cache::forget('portfolio_data');
        Cache::forget('chatbot_system_context');

        return redirect()->route('admin.skills.index')->with('success', 'Keahlian berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit keahlian
     */
    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    /**
     * Perbarui keahlian
     */
    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $skill->update($validated);

        // Invalidate Cache Real-Time
        Cache::forget('portfolio_data');
        Cache::forget('chatbot_system_context');

        return redirect()->route('admin.skills.index')->with('success', 'Keahlian berhasil diperbarui!');
    }

    /**
     * Hapus keahlian
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();

        // Invalidate Cache Real-Time
        Cache::forget('portfolio_data');
        Cache::forget('chatbot_system_context');

        return redirect()->route('admin.skills.index')->with('success', 'Keahlian berhasil dihapus!');
    }
}
