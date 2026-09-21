@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('nav_settings', 'active')

@section('styles')
<style>
    .settings-section-card {
        background-color: var(--color-gallery-white);
        border: 1px solid var(--color-hairline-silver);
        border-radius: 20px;
        padding: 28px;
        margin-bottom: 24px;
    }
    .settings-section-header {
        padding-bottom: 16px;
        margin-bottom: 20px;
        border-bottom: 1px solid var(--color-studio-mist);
    }
    .settings-section-title {
        font-size: 17px;
        font-weight: 600;
        letter-spacing: -0.02em;
        color: var(--color-ink);
        margin: 0;
    }
    .settings-section-desc {
        font-size: 13px;
        color: var(--color-slate);
        margin-top: 2px;
        margin-bottom: 0;
    }
    .settings-input {
        border-radius: 12px !important;
        padding: 10px 16px !important;
        font-size: 14px !important;
        border: 1px solid var(--color-hairline-silver) !important;
        background-color: var(--color-gallery-white) !important;
        color: var(--color-ink) !important;
    }
    .settings-input:focus {
        border-color: var(--color-pricing-blue) !important;
        box-shadow: 0 0 0 3px rgba(0, 113, 227, 0.15) !important;
    }
    .settings-textarea {
        border-radius: 14px !important;
        padding: 12px 16px !important;
        font-size: 14px !important;
        line-height: 1.5 !important;
        border: 1px solid var(--color-hairline-silver) !important;
        background-color: var(--color-gallery-white) !important;
        color: var(--color-ink) !important;
    }
    .settings-textarea:focus {
        border-color: var(--color-pricing-blue) !important;
        box-shadow: 0 0 0 3px rgba(0, 113, 227, 0.15) !important;
    }
</style>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <h1 class="page-header-title">Pengaturan Utama</h1>
                <p class="page-header-subtitle">Kelola informasi hero, bio developer, IPK, berkas CV, dan link kontak sosial secara real time.</p>
            </div>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Section 1: Hero & Beranda -->
            <div class="settings-section-card">
                <div class="settings-section-header">
                    <h2 class="settings-section-title">Bagian Hero & Beranda</h2>
                    <p class="settings-section-desc">Informasi utama yang tampil pada panggung visual beranda portofolio.</p>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="hero_name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control settings-input" id="hero_name" name="hero_name" value="{{ old('hero_name', $settings['hero_name'] ?? '') }}" required autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="hero_title" class="form-label">Sub-Judul / Role Profesi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control settings-input" id="hero_title" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}" required autocomplete="off">
                    </div>
                    <div class="col-12">
                        <label for="hero_description" class="form-label">Deskripsi Singkat Hero <span class="text-danger">*</span></label>
                        <textarea class="form-control settings-textarea" id="hero_description" name="hero_description" rows="3" required>{{ old('hero_description', $settings['hero_description'] ?? '') }}</textarea>
                        <small class="text-secondary d-block mt-1" style="font-size: 12px;">Teks pengantar di bawah judul hero yang menjelaskan spesialisasi Anda.</small>
                    </div>
                </div>
            </div>

            <!-- Section 2: Tentang Developer (About) -->
            <div class="settings-section-card">
                <div class="settings-section-header">
                    <h2 class="settings-section-title">Tentang Developer (About Spec)</h2>
                    <p class="settings-section-desc">Biografi profesional, pencapaian akademik, dan dokumen Curriculum Vitae.</p>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="about_bio" class="form-label">Biografi / Teks Tentang Saya <span class="text-danger">*</span></label>
                        <textarea class="form-control settings-textarea" id="about_bio" name="about_bio" rows="4" required>{{ old('about_bio', $settings['about_bio'] ?? '') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="about_gpa" class="form-label">Indeks Prestasi Kumulatif (IPK) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control settings-input" id="about_gpa" name="about_gpa" value="{{ old('about_gpa', $settings['about_gpa'] ?? '') }}" required autocomplete="off" placeholder="Contoh: 3.76">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label d-flex justify-content-between align-items-center">
                            <span>Berkas Curriculum Vitae (PDF)</span>
                            @if(isset($settings['cv_link']) && $settings['cv_link'] !== '#')
                                <a href="{{ asset('storage/' . $settings['cv_link']) }}" target="_blank" class="apple-link" style="font-size: 12px;">
                                    <i class="fas fa-file-pdf me-1"></i> Unduh CV Saat Ini
                                </a>
                            @endif
                        </label>
                        <input type="file" class="form-control settings-input" id="cv_file" name="cv_file" accept=".pdf">
                        <small class="text-secondary d-block mt-1" style="font-size: 12px;">Format berkas: PDF, Maksimum 10MB.</small>
                    </div>
                </div>
            </div>

            <!-- Section 3: Kontak & Media Sosial -->
            <div class="settings-section-card">
                <div class="settings-section-header">
                    <h2 class="settings-section-title">Kontak & Tautan Sosial</h2>
                    <p class="settings-section-desc">Konektivitas langsung WhatsApp, surel kontak, dan tautan profil developer.</p>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="wa_number" class="form-label">Nomor WhatsApp (Format: 628xxx) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control settings-input" id="wa_number" name="wa_number" value="{{ old('wa_number', $settings['wa_number'] ?? '') }}" required autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email_address" class="form-label">Email Kontak Utama <span class="text-danger">*</span></label>
                        <input type="email" class="form-control settings-input" id="email_address" name="email_address" value="{{ old('email_address', $settings['email_address'] ?? '') }}" required autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="github_link" class="form-label">Tautan GitHub</label>
                        <input type="url" class="form-control settings-input" id="github_link" name="github_link" value="{{ old('github_link', $settings['github_link'] ?? '') }}" placeholder="https://github.com/username" autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="linkedin_link" class="form-label">Tautan LinkedIn</label>
                        <input type="url" class="form-control settings-input" id="linkedin_link" name="linkedin_link" value="{{ old('linkedin_link', $settings['linkedin_link'] ?? '') }}" placeholder="https://linkedin.com/in/username" autocomplete="off">
                    </div>
                </div>
            </div>

            <!-- Submit Action -->
            <div class="d-flex justify-content-end align-items-center mb-5">
                <button type="submit" class="btn-pricing-blue px-4 py-2" style="font-size: 14px;">
                    <i class="fas fa-floppy-disk me-1"></i> Simpan Seluruh Pengaturan
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
