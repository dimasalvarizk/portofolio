<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class OptimizeHostingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:optimize-hosting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Optimasi performa aplikasi Laravel untuk deployment hosting / cPanel (cache clear, config/route/view cache, storage:link)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('⚡ Memulai proses optimasi hosting...');

        // 1. Membersihkan Cache Lama
        $this->line('1/5 Membersihkan cache aplikasi...');
        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('view:clear');

        // 2. Cache Config
        $this->line('2/5 Membuat cache konfigurasi (.env)...');
        $this->call('config:cache');

        // 3. Cache Rute
        $this->line('3/5 Membuat cache rute URL...');
        $this->call('route:cache');

        // 4. Cache Tampilan (Blade Views)
        $this->line('4/5 Mengompilasi dan mencache semua blade views...');
        $this->call('view:cache');

        // 5. Storage Link
        $this->line('5/5 Menghubungkan direktori penyimpanan (storage link)...');
        try {
            $link = public_path('storage');
            clearstatcache(true, $link);
            
            if (file_exists($link) || is_link($link)) {
                if (is_dir($link)) {
                    // Coba hapus sebagai directory link / junction dahulu
                    if (@rmdir($link)) {
                        $this->comment('-> Symlink/Junction storage lama dihapus.');
                    } else {
                        // Jika gagal rmdir, kemungkinan itu direktori fisik biasa
                        File::deleteDirectory($link);
                        $this->comment('-> Direktori storage fisik lama dihapus.');
                    }
                } else {
                    @unlink($link);
                    $this->comment('-> Berkas storage link lama dihapus.');
                }
            }

            clearstatcache(true, $link);
            $this->call('storage:link');
        } catch (\Throwable $e) {
            $this->warn('-> Peringatan: storage:link gagal (' . $e->getMessage() . '). Sistem fallback aset gambar tetap aktif.');
        }

        $this->info('🎉 Proses optimasi hosting selesai dengan sukses!');
        
        return Command::SUCCESS;
    }
}
