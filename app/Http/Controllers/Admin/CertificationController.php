<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    /**
     * Tampilkan daftar sertifikasi
     */
    public function index()
    {
        $certifications = Certification::orderBy('id', 'desc')->get();
        return view('admin.certifications.index', compact('certifications'));
    }

    /**
     * Tampilkan form tambah sertifikasi
     */
    public function create()
    {
        return view('admin.certifications.create');
    }

    /**
     * Simpan sertifikasi baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'link' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        Certification::create($validated);

        return redirect()->route('admin.certifications.index')->with('success', 'Sertifikasi berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit sertifikasi
     */
    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    /**
     * Perbarui sertifikasi
     */
    public function update(Request $request, Certification $certification)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'link' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $certification->update($validated);

        return redirect()->route('admin.certifications.index')->with('success', 'Sertifikasi berhasil diperbarui!');
    }

    /**
     * Hapus sertifikasi
     */
    public function destroy(Certification $certification)
    {
        $certification->delete();
        return redirect()->route('admin.certifications.index')->with('success', 'Sertifikasi berhasil dihapus!');
    }
}
