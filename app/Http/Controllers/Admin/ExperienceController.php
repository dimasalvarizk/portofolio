<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ExperienceController extends Controller
{
    /**
     * Tampilkan daftar riwayat (timeline)
     */
    public function index()
    {
        $experiences = Experience::orderBy('id', 'desc')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * Tampilkan form tambah riwayat
     */
    public function create()
    {
        return view('admin.experiences.create');
    }

    /**
     * Simpan riwayat baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:experience,education',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Experience::create($validated);

        // Invalidate Cache Real-Time
        Cache::forget('portfolio_data');

        return redirect()->route('admin.experiences.index')->with('success', 'Riwayat timeline berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit riwayat
     */
    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    /**
     * Perbarui riwayat
     */
    public function update(Request $request, Experience $experience)
    {
        $validated = $request->validate([
            'type' => 'required|in:experience,education',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $experience->update($validated);

        // Invalidate Cache Real-Time
        Cache::forget('portfolio_data');

        return redirect()->route('admin.experiences.index')->with('success', 'Riwayat timeline berhasil diperbarui!');
    }

    /**
     * Hapus riwayat
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        // Invalidate Cache Real-Time
        Cache::forget('portfolio_data');

        return redirect()->route('admin.experiences.index')->with('success', 'Riwayat timeline berhasil dihapus!');
    }
}
