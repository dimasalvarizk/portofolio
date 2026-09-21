@extends('layouts.admin')

@section('title', 'Edit Riwayat')

@section('nav_experiences', 'active')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="d-flex align-items-center gap-2 mb-4">
            <a href="{{ route('admin.experiences.index') }}" class="btn-action" title="Kembali">
                <i class="fas fa-arrow-left" style="font-size: 11px;"></i>
            </a>
            <div>
                <h1 class="page-header-title mb-0">Edit Riwayat</h1>
                <p class="page-header-subtitle">Perbarui data pendidikan atau riwayat pengalaman kerja Anda.</p>
            </div>
        </div>

        <div class="glass-card">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.experiences.update', $experience->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="type" class="form-label">Tipe Riwayat <span class="text-danger">*</span></label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="experience" {{ old('type', $experience->type) == 'experience' ? 'selected' : '' }}>Pengalaman Kerja</option>
                            <option value="education" {{ old('type', $experience->type) == 'education' ? 'selected' : '' }}>Pendidikan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="title" class="form-label">Posisi / Jurusan / Gelar <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $experience->title) }}" required placeholder="Contoh: Full Stack Web Developer atau Teknik Informatika (S1)" autocomplete="off">
                    </div>

                    <div class="mb-4">
                        <label for="subtitle" class="form-label">Perusahaan / Institusi / Kampus <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $experience->subtitle) }}" required placeholder="Contoh: PT Telkom Indonesia atau Universitas Muhammadiyah Purwokerto" autocomplete="off">
                    </div>

                    <div class="mb-4">
                        <label for="period" class="form-label">Periode Waktu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="period" name="period" value="{{ old('period', $experience->period) }}" required placeholder="Contoh: Sep 2024 - Des 2024 atau 2022 - Sekarang" autocomplete="off">
                    </div>

                    <div class="mb-5">
                        <label for="description" class="form-label">Deskripsi / Ringkasan Tanggung Jawab (Opsional)</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Jelaskan capaian, tugas harian, dan teknologi yang digunakan selama periode ini...">{{ old('description', $experience->description) }}</textarea>
                    </div>

                    <div class="d-flex gap-3 justify-content-end align-items-center">
                        <a href="{{ route('admin.experiences.index') }}" class="btn-glass-cancel">Batal</a>
                        <button type="submit" class="btn-pricing-blue">
                            <i class="fas fa-arrows-rotate me-1"></i> Perbarui Riwayat
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
