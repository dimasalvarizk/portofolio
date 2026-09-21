<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User jika belum ada
        if (!User::where('email', 'dimas@gmail.com')->exists()) {
            User::create([
                'name' => 'Dimas Alva Rizki',
                'email' => 'dimas@gmail.com',
                'password' => 'password',
            ]);
        }

        // 2. Seed Settings
        $settings = [
            'hero_name' => 'Dimas Alva Rizki',
            'hero_title' => 'Full Stack Web Developer',
            'hero_description' => 'Bachelor of Informatics Engineering student at Universitas Muhammadiyah Purwokerto with expertise in full-stack web development. Proficient in JavaScript, Node.js, Next.js, PHP, Laravel, REST API development, and database integration. Experienced in building responsive web applications, integrating Artificial Intelligence (AI) systems, optimizing backend performance, and applying clean code practices.',
            'about_bio' => 'Saya adalah mahasiswa Teknik Informatika di Universitas Muhammadiyah Purwokerto dengan fokus dan keahlian di bidang pengembangan web full-stack. Berbekal pemahaman mendalam tentang arsitektur perangkat lunak, database relasional dan non-relasional, integrasi API, serta penerapan teknologi AI, saya memiliki rekam jejak dalam membangun platform digital yang responsif, andal, dan berkinerja tinggi.',
            'about_gpa' => '3.76',
            'cv_link' => '#',
            'wa_number' => '6281225692689',
            'email_address' => 'alvarizkidimas@gmail.com',
            'github_link' => 'https://github.com/',
            'linkedin_link' => 'https://www.linkedin.com/in/',
        ];

        foreach ($settings as $key => $value) {
            \App\Models\Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 3. Seed Experiences & Education
        $experiences = [
            [
                'type' => 'experience',
                'title' => 'Sales and Content Creator',
                'subtitle' => 'Out of the Boox By Mizan',
                'period' => 'Jun 2025 - Jul 2025',
                'description' => 'Bertanggung jawab atas pemasaran buku di pameran Out of the Boox, mencatat penjualan harian, serta merancang konten promosi digital yang inovatif untuk meningkatkan interaksi konsumen.',
            ],
            [
                'type' => 'experience',
                'title' => 'Full Stack Web Developer Intern',
                'subtitle' => 'MSIB Batch 7 - Dicoding Indonesia',
                'period' => 'Sep 2024 - Des 2024',
                'description' => 'Mengembangkan aplikasi web responsif dan RESTful API. Memimpin tim dalam proyek akhir pembuatan aplikasi "Haid Tracker", sebuah pelacak siklus menstruasi interaktif.',
            ],
            [
                'type' => 'experience',
                'title' => 'Media Division Coordinator',
                'subtitle' => 'Universitas Muhammadiyah Purwokerto',
                'period' => 'Mei 2024 - Sep 2024',
                'description' => 'Memimpin tim media dalam perencanaan, produksi, dan publikasi konten digital untuk kegiatan kampus, serta memperkuat branding universitas.',
            ],
            [
                'type' => 'experience',
                'title' => 'Social Media Intern',
                'subtitle' => 'PT Bukhori Grup Indonesia',
                'period' => 'Apr 2024 - Jul 2024',
                'description' => 'Merancang konsep visual, menyunting konten video kreatif, dan mengelola media sosial perusahaan guna memperluas jangkauan pemirsa.',
            ],
            [
                'type' => 'education',
                'title' => 'Teknik Informatika (S1)',
                'subtitle' => 'Universitas Muhammadiyah Purwokerto',
                'period' => '2022 - 2026',
                'description' => 'Lulusan jalur non-skripsi dengan mempublikasikan artikel riset ilmiah nasional terakreditasi SINTA. Indeks Prestasi Kumulatif (IPK): 3.76/4.00.',
            ],
        ];

        foreach ($experiences as $exp) {
            \App\Models\Experience::updateOrCreate(
                ['title' => $exp['title'], 'subtitle' => $exp['subtitle']],
                $exp
            );
        }

        // 4. Seed Skills
        \App\Models\Skill::truncate();
        $skills = [
            // Programming Languages
            ['category' => 'Programming Languages', 'name' => 'PHP', 'icon' => 'fab fa-php text-primary'],
            ['category' => 'Programming Languages', 'name' => 'JavaScript', 'icon' => 'fab fa-js text-warning'],
            ['category' => 'Programming Languages', 'name' => 'HTML', 'icon' => 'fab fa-html5 text-danger'],
            ['category' => 'Programming Languages', 'name' => 'CSS', 'icon' => 'fab fa-css3-alt text-info'],
            
            // Frameworks & Libraries
            ['category' => 'Frameworks & Libraries', 'name' => 'Laravel', 'icon' => 'fab fa-laravel text-danger'],
            ['category' => 'Frameworks & Libraries', 'name' => 'Node.js', 'icon' => 'fab fa-node-js text-success'],
            ['category' => 'Frameworks & Libraries', 'name' => 'Next.js', 'icon' => 'fab fa-react text-info'],
            ['category' => 'Frameworks & Libraries', 'name' => 'Tailwind CSS', 'icon' => 'fab fa-css3-alt text-primary'],
            ['category' => 'Frameworks & Libraries', 'name' => 'TensorFlow.js (Face-API.js)', 'icon' => 'fas fa-brain text-warning'],
            ['category' => 'Frameworks & Libraries', 'name' => 'Bootstrap', 'icon' => 'fab fa-bootstrap text-purple'],

            // Database & API
            ['category' => 'Database & API', 'name' => 'MySQL', 'icon' => 'fas fa-database text-info'],
            ['category' => 'Database & API', 'name' => 'RESTful API', 'icon' => 'fas fa-network-wired text-success'],
            ['category' => 'Database & API', 'name' => 'OpenRouter API', 'icon' => 'fas fa-robot text-primary'],

            // Tools & Platforms
            ['category' => 'Tools & Platforms', 'name' => 'Git/GitHub', 'icon' => 'fab fa-github text-light'],
            ['category' => 'Tools & Platforms', 'name' => 'Canva', 'icon' => 'fas fa-paint-brush text-info'],
            ['category' => 'Tools & Platforms', 'name' => 'CapCut', 'icon' => 'fas fa-video text-danger'],
            ['category' => 'Tools & Platforms', 'name' => 'Adobe Photoshop', 'icon' => 'fas fa-image text-primary'],
            ['category' => 'Tools & Platforms', 'name' => 'AI Tools (Gemini, Copilot)', 'icon' => 'fas fa-magic text-warning'],

            // Soft Skills
            ['category' => 'Soft Skills', 'name' => 'Analytical Thinking', 'icon' => 'fas fa-lightbulb text-warning'],
            ['category' => 'Soft Skills', 'name' => 'Problem Solving', 'icon' => 'fas fa-puzzle-piece text-info'],
            ['category' => 'Soft Skills', 'name' => 'Discipline', 'icon' => 'fas fa-user-check text-success'],
            ['category' => 'Soft Skills', 'name' => 'Responsibility', 'icon' => 'fas fa-shield-alt text-primary'],
            ['category' => 'Soft Skills', 'name' => 'Teamwork', 'icon' => 'fas fa-users text-info'],
            ['category' => 'Soft Skills', 'name' => 'Creative Innovation', 'icon' => 'fas fa-brain text-danger'],
        ];

        foreach ($skills as $skill) {
            \App\Models\Skill::create($skill);
        }

        // 5. Seed Certifications
        $certifications = [
            [
                'name' => 'Pengembang Aplikasi Web Back-End dengan Node.js',
                'issuer' => 'Dicoding Indonesia',
                'year' => '2024',
                'link' => '#',
                'icon' => 'fas fa-certificate text-warning',
            ],
            [
                'name' => 'Belajar Membuat Aplikasi Web dengan React',
                'issuer' => 'Dicoding Indonesia',
                'year' => '2024',
                'link' => '#',
                'icon' => 'fas fa-certificate text-warning',
            ],
            [
                'name' => 'Belajar Dasar Pemrograman JavaScript',
                'issuer' => 'Dicoding Indonesia',
                'year' => '2024',
                'link' => '#',
                'icon' => 'fas fa-certificate text-warning',
            ],
            [
                'name' => 'Belajar Dasar Pemrograman Web',
                'issuer' => 'Dicoding Indonesia',
                'year' => '2024',
                'link' => '#',
                'icon' => 'fas fa-certificate text-warning',
            ],
            [
                'name' => 'Belajar Membuat Front-End Web untuk Pemula',
                'issuer' => 'Dicoding Indonesia',
                'year' => '2024',
                'link' => '#',
                'icon' => 'fas fa-certificate text-warning',
            ],
            [
                'name' => 'Junior Web Developer',
                'issuer' => 'BPPTIK Kominfo',
                'year' => '2024',
                'link' => '#',
                'icon' => 'fas fa-certificate text-warning',
            ],
        ];

        foreach ($certifications as $cert) {
            \App\Models\Certification::updateOrCreate(
                ['name' => $cert['name'], 'issuer' => $cert['issuer']],
                $cert
            );
        }
    }
}
