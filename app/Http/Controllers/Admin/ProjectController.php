<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProjectController extends Controller
{
    // 1. TAMPILAN DASHBOARD (DAFTAR PROJEK)
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    // 2. HALAMAN TAMBAH PROJEK
    public function create()
    {
        return view('admin.projects.create');
    }

    // 3. PROSES SIMPAN DATA BARU
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image_url' => 'required|image',
            'tech_stack' => 'required', // Pisahkan koma (Laravel,Vue)
            'link_demo' => 'nullable|url',
            'additional_images' => 'nullable|array',
            'additional_images.*' => 'image|max:5120' // Maksimal 5MB per file
        ]);

        if ($request->hasFile('image_url')) {
            $validated['image_url'] = $this->optimizeAndStoreImage($request->file('image_url'));
        }

        // Handle additional images
        if ($request->hasFile('additional_images')) {
            $additionalImagesPaths = [];
            foreach ($request->file('additional_images') as $file) {
                $additionalImagesPaths[] = $this->optimizeAndStoreImage($file);
            }
            $validated['additional_images'] = $additionalImagesPaths;
        }

        // Ubah string "Laravel,Vue" jadi Array ["Laravel", "Vue"]
        $validated['tech_stack'] = explode(',', $request->tech_stack);

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projek berhasil dibuat!');
    }

    // 4. HALAMAN EDIT PROJEK
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    // 5. PROSES UPDATE DATA
    public function update(Request $request, Project $project)
    {
        // 1. Validasi
        $validated = $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            // PENTING: image_url harus 'nullable' (boleh kosong saat edit)
            'image_url' => 'nullable|image|max:2048', 
            'tech_stack' => 'required',
            'link_demo' => 'nullable|url',
            'additional_images' => 'nullable|array',
            'additional_images.*' => 'image|max:5120'
        ]);

        // 2. Cek apakah user upload gambar baru?
        if ($request->hasFile('image_url')) {
            // Hapus gambar lama dari penyimpanan agar tidak menumpuk
            if ($project->image_url && Storage::disk('public')->exists($project->image_url)) {
                Storage::disk('public')->delete($project->image_url);
            }
            // Simpan gambar baru yang telah dioptimasi
            $validated['image_url'] = $this->optimizeAndStoreImage($request->file('image_url'));
        } else {
            // JIKA TIDAK UPLOAD GAMBAR BARU:
            unset($validated['image_url']);
        }

        // 3. Cek apakah user upload gambar tambahan baru?
        if ($request->hasFile('additional_images')) {
            $existingImages = $project->additional_images ?? [];
            if (!is_array($existingImages)) {
                $existingImages = [];
            }
            
            // Simpan gambar tambahan baru dan tambahkan ke array
            foreach ($request->file('additional_images') as $file) {
                $existingImages[] = $this->optimizeAndStoreImage($file);
            }
            $validated['additional_images'] = $existingImages;
        }

        // 4. Format Tech Stack (String ke Array)
        $validated['tech_stack'] = explode(',', $request->tech_stack);

        // 5. Simpan ke Database
        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projek berhasil diperbarui!');
    }

    // 6. PROSES HAPUS PROJEK
    public function destroy(Project $project)
    {
        if ($project->image_url) {
            Storage::disk('public')->delete($project->image_url);
        }
        // Hapus juga gambar tambahan dari storage
        if ($project->additional_images && is_array($project->additional_images)) {
            foreach ($project->additional_images as $imagePath) {
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
            }
        }
        $project->delete();
        return back()->with('success', 'Projek dihapus');
    }

    /**
     * HAPUS SATU GAMBAR TAMBAHAN (GALERI) VIA AJAX
     */
    public function deleteImage(Project $project, $index)
    {
        $images = $project->additional_images;
        if (is_array($images) && isset($images[$index])) {
            $imagePath = $images[$index];

            // Hapus file fisik dari storage
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            // Buang dari array dan re-index
            unset($images[$index]);
            $images = array_values($images);

            // Simpan kembali ke database
            $project->update([
                'additional_images' => count($images) > 0 ? $images : null
            ]);

            return response()->json(['success' => true, 'message' => 'Gambar berhasil dihapus!']);
        }

        return response()->json(['success' => false, 'message' => 'Gambar tidak ditemukan.'], 404);
    }

    /**
     * Optimasi, resize, kompres, dan simpan gambar sebagai format WebP
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @return string  Path file yang disimpan
     */
    private function optimizeAndStoreImage($file)
    {
        // 1. Inisialisasi ImageManager dengan driver GD (v3)
        $manager = new ImageManager(new Driver());

        // 2. Baca file gambar dari real path
        $image = $manager->read($file->getRealPath());

        // 3. Resize jika lebar lebih dari 1920px (menjaga aspect ratio)
        if ($image->width() > 1920) {
            $image->scale(width: 1920);
        }

        // 4. Encode gambar ke format WebP dengan kualitas 80%
        $encoded = $image->toWebp(80);

        // 5. Generate nama file acak unik dengan ekstensi .webp
        $filename = Str::random(40) . '.webp';
        $path = 'projects/' . $filename;

        // 6. Simpan konten ter-encode ke disk public
        Storage::disk('public')->put($path, (string) $encoded);

        return $path;
    }
}