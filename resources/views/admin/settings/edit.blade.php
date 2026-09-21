@extends('layouts.admin')

@section('title', 'Pengaturan Utama Portofolio')

@section('nav_settings', 'active fw-bold border-bottom border-primary border-2 pb-1 d-inline-block')

@section('content')
<div class="row justify-content-center text-white animate__animated animate__fadeIn">
    <div class="col-lg-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Pengaturan Utama</h2>
                <p class="text-secondary mb-0" style="color: #cbd5e1 !important;">Kelola info hero, biografi about, kontak, dan link sosial media Anda.</p>
            </div>
        </div>

        <div class="glass-card p-5">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h4 class="mb-4 text-info fw-bold"><i class="fas fa-rocket me-2"></i> Bagian Hero / Beranda</h4>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="hero_name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="hero_name" name="hero_name" value="{{ old('hero_name', $settings['hero_name'] ?? '') }}" required autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="hero_title" class="form-label">Sub-Judul / Role</label>
                        <input type="text" class="form-control" id="hero_title" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}" required autocomplete="off">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="hero_description" class="form-label">Deskripsi Hero</label>
                        <textarea class="form-control" id="hero_description" name="hero_description" rows="3" required>{{ old('hero_description', $settings['hero_description'] ?? '') }}</textarea>
                    </div>
                </div>

                <hr class="border-secondary opacity-25 my-4">

                <h4 class="mb-4 text-info fw-bold"><i class="fas fa-user-tag me-2"></i> Bagian Tentang Saya (About)</h4>
                <div class="row mb-4">
                    <div class="col-12 mb-3">
                        <label for="about_bio" class="form-label">Biografi / Teks About</label>
                        <textarea class="form-control" id="about_bio" name="about_bio" rows="4" required>{{ old('about_bio', $settings['about_bio'] ?? '') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="about_gpa" class="form-label">IPK / GPA</label>
                        <input type="text" class="form-control" id="about_gpa" name="about_gpa" value="{{ old('about_gpa', $settings['about_gpa'] ?? '') }}" required autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">File CV (PDF) - 
                            @if(isset($settings['cv_link']) && $settings['cv_link'] !== '#')
                                <a href="{{ asset('storage/' . $settings['cv_link']) }}" target="_blank" class="text-info text-decoration-none ms-1">
                                    <i class="fas fa-download me-1"></i> Unduh CV Saat Ini
                                </a>
                            @else
                                <span class="text-secondary ms-1">Belum diunggah</span>
                            @endif
                        </label>
                        <input type="file" class="form-control" id="cv_file" name="cv_file" accept=".pdf">
                        <div class="form-text text-secondary mt-1">Format PDF, Maksimal 10MB</div>
                    </div>
                </div>

                <hr class="border-secondary opacity-25 my-4">

                <h4 class="mb-4 text-info fw-bold"><i class="fas fa-id-card me-2"></i> Kontak & Media Sosial</h4>
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <label for="wa_number" class="form-label">Nomor WhatsApp (Format: 628xxx)</label>
                        <input type="text" class="form-control" id="wa_number" name="wa_number" value="{{ old('wa_number', $settings['wa_number'] ?? '') }}" required autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email_address" class="form-label">Email Kontak</label>
                        <input type="email" class="form-control" id="email_address" name="email_address" value="{{ old('email_address', $settings['email_address'] ?? '') }}" required autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="github_link" class="form-label">Tautan GitHub</label>
                        <input type="url" class="form-control" id="github_link" name="github_link" value="{{ old('github_link', $settings['github_link'] ?? '') }}" autocomplete="off">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="linkedin_link" class="form-label">Tautan LinkedIn</label>
                        <input type="url" class="form-control" id="linkedin_link" name="linkedin_link" value="{{ old('linkedin_link', $settings['linkedin_link'] ?? '') }}" autocomplete="off">
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-glow-primary px-5 py-3">
                        <i class="fas fa-save me-2"></i> Simpan Pengaturan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
