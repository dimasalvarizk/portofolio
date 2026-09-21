@extends('layouts.admin')

@section('title', 'Tambah Riwayat Timeline')

@section('nav_experiences', 'active fw-bold border-bottom border-primary border-2 pb-1 d-inline-block')

@section('content')
<div class="row justify-content-center text-white animate__animated animate__fadeIn">
    <div class="col-lg-8">
        
        <div class="d-flex align-items-center gap-3 mb-4">
            <a href="{{ route('admin.experiences.index') }}" class="btn btn-outline-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; cursor: none;">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h2 class="fw-bold mb-1">Tambah Riwayat Timeline</h2>
                <p class="text-secondary mb-0" style="color: #cbd5e1 !important;">Tambahkan entitas pendidikan atau pengalaman kerja baru.</p>
            </div>
        </div>

        <div class="glass-card p-5">
            <form action="{{ route('admin.experiences.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="type" class="form-label">Tipe Riwayat</label>
                    <select class="form-select" id="type" name="type" required>
                        <option value="experience" {{ old('type') == 'experience' ? 'selected' : '' }}>Pengalaman Kerja</option>
                        <option value="education" {{ old('type') == 'education' ? 'selected' : '' }}>Pendidikan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="title" class="form-label">Posisi / Gelar / Judul</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required placeholder="Contoh: Full Stack Web Developer atau Teknik Informatika (S1)" autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="subtitle" class="form-label">Perusahaan / Institusi / Sekolah</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle') }}" required placeholder="Contoh: PT Tokopedia atau Universitas Muhammadiyah Purwokerto" autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="period" class="form-label">Periode Waktu</label>
                    <input type="text" class="form-control" id="period" name="period" value="{{ old('period') }}" required placeholder="Contoh: Sep 2024 - Des 2024 atau 2022 - 2026" autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">Deskripsi / Detail Kegiatan (Opsional)</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Jelaskan kontribusi, tugas, atau capaian Anda selama periode ini...">{{ old('description') }}</textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-glow-primary px-5 py-3">
                        <i class="fas fa-save me-2"></i> Tambah Riwayat
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
