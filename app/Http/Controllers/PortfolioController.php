<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Contact; 
use Illuminate\Support\Facades\Http;
use App\Models\Setting;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Certification;
use Illuminate\Support\Facades\Cache;

class PortfolioController extends Controller
{
    /**
     * Menampilkan halaman utama portofolio
     */
    public function index()
    {
        try {
            // Ambil data portofolio dari cache selama 1 hari (86400 detik)
            $portfolioData = Cache::remember('portfolio_data', 86400, function () {
                // Catatan Eager Loading: Saat ini tidak ada relasi Eloquent yang terdefinisi pada model
                // Project, Setting, Experience, Skill, maupun Certification (semuanya berdiri sendiri).
                // Jika di masa depan Anda menambahkan relasi (misalnya relasi 'tags' pada model Project),
                // pastikan menggunakan Eager Loading untuk menghindari masalah N+1 Query:
                // 'projects' => Project::with('tags')->get(),
                
                return [
                    'projects' => Project::orderBy('id', 'desc')->get(),
                    'settings' => Setting::pluck('value', 'key')->all(),
                    'timeline' => Experience::orderBy('id', 'desc')->get(),
                    'skills' => Skill::all()->groupBy('category'),
                    'certifications' => Certification::orderBy('id', 'desc')->get(),
                ];
            });

            $projects = $portfolioData['projects'];
            $settings = $portfolioData['settings'];
            $timeline = $portfolioData['timeline'];
            $skills = $portfolioData['skills'];
            $certifications = $portfolioData['certifications'];
            
        } catch (\Exception $e) {
            $projects = [];
            $settings = [];
            $timeline = collect();
            $skills = collect();
            $certifications = collect();
        }

        return view('welcome', compact(
            'projects',
            'settings',
            'timeline',
            'skills',
            'certifications'
        ));
    }

    /**
     * Menyimpan pesan dari Contact Form
     */
    public function store(Request $request)
    {
        // 1. Validasi Input dengan pesan kustom bahasa Indonesia
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:150',
            'message' => 'required|string|min:3|max:3000',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'name.min' => 'Nama minimal terdiri dari 2 karakter.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'message.required' => 'Pesan tidak boleh kosong.',
            'message.min' => 'Pesan minimal terdiri dari 3 karakter.',
        ]);

        // 2. Simpan ke Database
        Contact::create($validated);

        // 3. Kembali ke halaman dengan pesan sukses
        return redirect('/#contact')->with('success', 'Terima kasih! Pesan Anda telah berhasil dikirim dan tersimpan di sistem.');
    }

    /**
     * Menampilkan halaman detail satu projek
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('project-detail', compact('project'));
    }

    /**
     * Proxy untuk chatbot OpenAI / OpenRouter API dengan System Prompt Injection Dinamis
     */
    public function chatbot(Request $request)
    {
        $request->validate([
            'messages' => 'required|array',
        ]);

        $apiKey = config('services.openrouter.api_key');

        if (!$apiKey) {
            \Illuminate\Support\Facades\Log::error('Chatbot error: OpenRouter API Key is not configured in services config.');
            return response()->json(['error' => 'OpenRouter API Key not configured.'], 500);
        }

        // Ambil context data dinamis dari Cache
        $systemPrompt = Cache::rememberForever('chatbot_system_context', function () {
            $settings = Setting::pluck('value', 'key')->all();
            $bio = $settings['about_bio'] ?? 'Saya adalah mahasiswa Teknik Informatika.';
            $heroName = $settings['hero_name'] ?? 'Dimas Alva Rizki';
            $waNumber = $settings['wa_number'] ?? '6281225692689';

            $skills = Skill::all();
            $skillsText = $skills->map(function ($s) {
                return "- " . $s->name . " (" . $s->category . ")";
            })->implode("\n");

            $projects = Project::orderBy('id', 'desc')->take(5)->get();
            $projectsText = $projects->map(function ($p) {
                return "- " . $p->title . " (" . $p->category . "): " . \Illuminate\Support\Str::limit(strip_tags($p->description), 150);
            })->implode("\n");

            return "Kamu adalah DimasBot, asisten virtual AI untuk portofolio {$heroName}.
Biodata {$heroName}: {$bio}

Daftar Keahlian {$heroName}:
{$skillsText}

5 Projek Terbaru {$heroName}:
{$projectsText}

Jawablah pertanyaan pengunjung dengan profesional, ramah, meyakinkan, dan ringkas (maksimal 2 paragraf). Jawab seolah-olah kamu adalah asisten pribadi Dimas yang sangat memahaminya. Jika ada pertanyaan spesifik tentang ketersediaan kerja sama atau yang tidak tercantum dalam data di atas, arahkan mereka untuk mengisi form kontak atau menghubungi WhatsApp Dimas di {$waNumber}.";
        });

        // Terapkan System Prompt Injection
        $messages = $request->input('messages', []);
        $locale = $request->input('locale', 'id');

        $activeSystemPrompt = $systemPrompt;
        if ($locale === 'en') {
            $activeSystemPrompt .= "\n\nIMPORTANT: The visitor is currently viewing the website in English. You MUST respond, greet, and answer the visitor entirely in English. Keep your replies professional, friendly, and concise.";
        }

        $hasSystem = false;
        foreach ($messages as &$message) {
            if (isset($message['role']) && $message['role'] === 'system') {
                $message['content'] = $activeSystemPrompt;
                $hasSystem = true;
                break;
            }
        }
        unset($message);

        if (!$hasSystem) {
            array_unshift($messages, [
                'role' => 'system',
                'content' => $activeSystemPrompt
            ]);
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => $request->input('model', 'google/gemini-2.5-flash'),
                'messages' => $messages,
                'max_tokens' => 1000,
            ]);

            if ($response->successful()) {
                return response()->json($response->json());
            }

            \Illuminate\Support\Facades\Log::error('Chatbot API failed: ' . $response->status() . ' - ' . $response->body());
            return response()->json(['error' => 'OpenRouter API Error: ' . $response->body()], 500);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('Chatbot exception: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}