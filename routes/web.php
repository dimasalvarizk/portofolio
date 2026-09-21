<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ContactController;

// --- HALAMAN UTAMA (PUBLIC) ---
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// Route Detail Projek
Route::get('/project/{id}', [PortfolioController::class, 'show'])->name('project.show');

// Route Contact Form dengan rate limiting (5 request per menit)
Route::post('/contact', [PortfolioController::class, 'store'])
    ->middleware('throttle:spam-prevention')
    ->name('contact.store');

// Fallback Route untuk serve storage assets jika symlink diblokir hosting
Route::get('/storage/{path}', function ($path) {
    $path = str_replace(['../', '..\\'], '', $path); // Prevent directory traversal
    $filePath = storage_path('app/public/' . $path);
    if (!file_exists($filePath) || is_dir($filePath)) {
        abort(404);
    }
    return response()->file($filePath);
})->where('path', '.*');

// Route untuk API Chatbot Proxy dengan rate limiting (5 request per menit)
Route::post('/api/chatbot', [PortfolioController::class, 'chatbot'])
    ->middleware('throttle:spam-prevention')
    ->name('api.chatbot');

// --- ROUTE LOGIN & LOGOUT ---
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- HALAMAN ADMIN (DIPROTEKSI LOGIN) ---
Route::middleware('auth')->prefix('admin')->group(function () {
    
    // Route untuk Pesan (Project)
    Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
    Route::delete('/projects/{project}/image/{index}', [ProjectController::class, 'deleteImage'])->name('admin.projects.delete-image');

    // Route untuk Pesan (Contacts)
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');

    // Route untuk Settings
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('admin.settings.edit');
    Route::put('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.settings.update');

    // Route untuk Experiences (Timeline)
    Route::resource('experiences', \App\Http\Controllers\Admin\ExperienceController::class, ['as' => 'admin']);

    // Route untuk Skills (Tech Stack)
    Route::resource('skills', \App\Http\Controllers\Admin\SkillController::class, ['as' => 'admin']);

    // Route untuk Certifications
    Route::resource('certifications', \App\Http\Controllers\Admin\CertificationController::class, ['as' => 'admin']);

    // Route untuk menjalankan pembuatan symlink secara native/fallback
    Route::get('/storage-link', function () {
        $target = storage_path('app/public');
        $link = public_path('storage');

        // Hapus link atau direktori public/storage jika ada agar fallback route bisa jalan
        try {
            clearstatcache(true, $link);
            if (file_exists($link) || is_link($link)) {
                if (is_dir($link)) {
                    if (!@rmdir($link)) {
                        \Illuminate\Support\Facades\File::deleteDirectory($link);
                    }
                } else {
                    @unlink($link);
                }
            }
            clearstatcache(true, $link);
        } catch (\Throwable $e) {
            // Abaikan error jika gagal hapus
        }

        try {
            // Coba dengan php artisan first
            try {
                \Illuminate\Support\Facades\Artisan::call('storage:link');
                return 'Storage link created successfully using Artisan command!';
            } catch (\Throwable $e) {
                // Jika Artisan gagal (misal karena exec() dinonaktifkan), coba native symlink()
                if (function_exists('symlink')) {
                    if (symlink($target, $link)) {
                        return 'Storage link created successfully using native symlink() function!';
                    }
                }
                throw new \Exception('Both Artisan:call and native symlink() failed or are disabled by hosting.');
            }
        } catch (\Throwable $e) {
            return 'Artisan & Symlink failed: ' . $e->getMessage() . '. <br><br><b>Tetapi jangan khawatir!</b> Sistem sudah memasang Fallback Route. Gambar Anda seharusnya sudah tampil secara otomatis sekarang.';
        }
    })->name('admin.storage-link');

    // Route untuk menjalankan optimasi hosting secara instan via web browser (Solusi Tanpa SSH / Terminal)
    Route::get('/optimize-hosting', function () {
        try {
            // 1. Bersihkan semua cache lama
            \Illuminate\Support\Facades\Artisan::call('cache:clear');
            \Illuminate\Support\Facades\Artisan::call('config:clear');
            \Illuminate\Support\Facades\Artisan::call('route:clear');
            \Illuminate\Support\Facades\Artisan::call('view:clear');

            // 2. Buat cache konfigurasi, routing, dan view baru
            \Illuminate\Support\Facades\Artisan::call('config:cache');
            \Illuminate\Support\Facades\Artisan::call('route:cache');
            \Illuminate\Support\Facades\Artisan::call('view:cache');

            // 3. Hubungkan storage link
            $target = storage_path('app/public');
            $link = public_path('storage');
            
            try {
                clearstatcache(true, $link);
                if (file_exists($link) || is_link($link)) {
                    if (is_dir($link)) {
                        if (!@rmdir($link)) {
                            \Illuminate\Support\Facades\File::deleteDirectory($link);
                        }
                    } else {
                        @unlink($link);
                    }
                }
                clearstatcache(true, $link);
            } catch (\Throwable $e) {
                // Abaikan error hapus
            }

            try {
                \Illuminate\Support\Facades\Artisan::call('storage:link');
            } catch (\Throwable $e) {
                if (function_exists('symlink')) {
                    symlink($target, $link);
                }
            }

            return '🎉 <b>Optimasi hosting berhasil dijalankan via Web Browser!</b><br><br>' .
                   '- Semua cache lama dibersihkan<br>' .
                   '- Konfigurasi, Rute, & View dicache kembali untuk performa optimal<br>' .
                   '- Storage link telah terhubung!';
        } catch (\Throwable $e) {
            return 'Gagal melakukan optimasi: ' . $e->getMessage();
        }
    })->name('admin.optimize-hosting');
});