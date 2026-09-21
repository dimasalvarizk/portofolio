@extends('layouts.admin')

@section('title', 'Edit Sertifikat')

@section('nav_certifications', 'active fw-bold border-bottom border-primary border-2 pb-1 d-inline-block')

@section('content')
<div class="row justify-content-center text-white animate__animated animate__fadeIn">
    <div class="col-lg-8">
        
        <div class="d-flex align-items-center gap-3 mb-4">
            <a href="{{ route('admin.certifications.index') }}" class="btn btn-outline-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; cursor: none;">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h2 class="fw-bold mb-1">Edit Sertifikat</h2>
                <p class="text-secondary mb-0" style="color: #cbd5e1 !important;">Perbarui detail data sertifikat kompetensi Anda.</p>
            </div>
        </div>

        <div class="glass-card p-5">
            <form action="{{ route('admin.certifications.update', $certification->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="form-label">Nama Sertifikat</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $certification->name) }}" required placeholder="Contoh: Pengembang Aplikasi Web Back-End dengan Node.js" autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="issuer" class="form-label">Lembaga Penerbit</label>
                    <input type="text" class="form-control" id="issuer" name="issuer" value="{{ old('issuer', $certification->issuer) }}" required placeholder="Contoh: Dicoding Indonesia atau BPPTIK Kominfo" autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="year" class="form-label">Tahun Penerbitan</label>
                    <input type="text" class="form-control" id="year" name="year" value="{{ old('year', $certification->year) }}" required placeholder="Contoh: 2024" autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="link" class="form-label">Link Verifikasi Sertifikat (Opsional)</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $certification->link) }}" placeholder="Contoh: https://dicoding.com/certificates/xxx" autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="icon" class="form-label">Ikon (Font Awesome class - Opsional)</label>
                    <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon', $certification->icon) }}" placeholder="Contoh: fas fa-certificate text-warning" autocomplete="off">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-glow-primary px-5 py-3">
                        <i class="fas fa-save me-2"></i> Perbarui Sertifikat
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
