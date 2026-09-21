@extends('layouts.admin')

@section('title', 'Tambah Sertifikat')

@section('nav_certifications', 'active')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="d-flex align-items-center gap-2 mb-4">
            <a href="{{ route('admin.certifications.index') }}" class="btn-action" title="Kembali">
                <i class="fas fa-arrow-left" style="font-size: 11px;"></i>
            </a>
            <div>
                <h1 class="page-header-title mb-0">Tambah Sertifikat</h1>
                <p class="page-header-subtitle">Tambahkan data sertifikat kompetensi profesional baru.</p>
            </div>
        </div>

        <div class="glass-card">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.certifications.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="form-label">Nama Sertifikat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder="Contoh: Pengembang Aplikasi Web Back-End dengan Node.js" autocomplete="off">
                    </div>

                    <div class="mb-4">
                        <label for="issuer" class="form-label">Lembaga / Platform Penerbit <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="issuer" name="issuer" value="{{ old('issuer') }}" required placeholder="Contoh: Dicoding Indonesia, Coursera, atau BPPTIK Kominfo" autocomplete="off">
                    </div>

                    <div class="mb-4">
                        <label for="year" class="form-label">Tahun Penerbitan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="year" name="year" value="{{ old('year') }}" required placeholder="Contoh: 2024" autocomplete="off">
                    </div>

                    <div class="mb-4">
                        <label for="link" class="form-label">Tautan / Link Verifikasi Sertifikat (Opsional)</label>
                        <input type="url" class="form-control" id="link" name="link" value="{{ old('link') }}" placeholder="https://dicoding.com/certificates/xxx" autocomplete="off">
                    </div>

                    <div class="mb-5">
                        <label for="icon" class="form-label">Ikon (Font Awesome class - Opsional)</label>
                        <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon', 'fas fa-certificate text-primary') }}" placeholder="Contoh: fas fa-certificate" autocomplete="off">
                        <small class="text-secondary d-block mt-1" style="font-size: 12px;">Kelas Font Awesome untuk ikon lencana sertifikat.</small>
                    </div>

                    <div class="d-flex gap-3 justify-content-end align-items-center">
                        <a href="{{ route('admin.certifications.index') }}" class="btn-glass-cancel">Batal</a>
                        <button type="submit" class="btn-pricing-blue">
                            <i class="fas fa-floppy-disk me-1"></i> Simpan Sertifikat
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
