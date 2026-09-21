@extends('layouts.admin')

@section('title', 'Sertifikasi')

@section('nav_certifications', 'active')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
    <div>
        <h1 class="page-header-title">Sertifikasi & Kredensial</h1>
        <p class="page-header-subtitle">Kelola sertifikat kompetensi profesional dan lisensi keahlian Anda.</p>
    </div>
    <a href="{{ route('admin.certifications.create') }}" class="btn-pricing-blue flex-shrink-0">
        <i class="fas fa-plus" style="font-size: 12px;"></i>
        <span>Tambah Sertifikat</span>
    </a>
</div>

<div class="glass-card">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th class="ps-4" style="width: 45%;">Nama Sertifikat</th>
                    <th style="width: 30%;">Penerbit</th>
                    <th style="width: 15%;">Tahun</th>
                    <th class="text-center pe-4" style="width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($certifications as $cert)
                    <tr>
                        <td class="ps-4">
                            <span class="fw-semibold" style="color: var(--color-ink); font-size: 14px;">{{ $cert->name }}</span>
                        </td>
                        <td style="color: var(--color-slate); font-size: 14px;">{{ $cert->issuer }}</td>
                        <td style="color: var(--color-slate); font-size: 13px;">{{ $cert->year }}</td>
                        <td class="text-center pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                @if($cert->link)
                                    <a href="{{ $cert->link }}" target="_blank" class="btn-action" title="Lihat Sertifikat">
                                        <i class="fas fa-arrow-up-right-from-square" style="font-size: 11px;"></i>
                                    </a>
                                @endif
                                <a href="{{ route('admin.certifications.edit', $cert->id) }}" class="btn-action" title="Edit Sertifikat">
                                    <i class="fas fa-pen" style="font-size: 11px;"></i>
                                </a>
                                <form action="{{ route('admin.certifications.destroy', $cert->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sertifikat ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Hapus Sertifikat">
                                        <i class="fas fa-trash-can" style="font-size: 11px;"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3 rounded-circle mb-3" style="background: var(--color-studio-mist); width: 64px; height: 64px; display: flex; align-items: center; justify-content: center; border: 1px solid var(--color-hairline-silver);">
                                    <i class="fas fa-certificate fa-2x" style="color: var(--color-slate);"></i>
                                </div>
                                <h5 class="fw-semibold mb-1" style="color: var(--color-ink); font-size: 16px;">Belum Ada Sertifikat</h5>
                                <p class="text-secondary mb-3" style="font-size: 13px;">Tambahkan sertifikasi keahlian pertama Anda.</p>
                                <a href="{{ route('admin.certifications.create') }}" class="btn-pricing-blue">
                                    <i class="fas fa-plus" style="font-size: 12px;"></i> Tambah Sekarang
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
