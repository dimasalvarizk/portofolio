@extends('layouts.admin')

@section('title', 'Timeline')

@section('nav_experiences', 'active')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
    <div>
        <h1 class="page-header-title">Timeline & Riwayat</h1>
        <p class="page-header-subtitle">Kelola riwayat pendidikan dan perjalanan pengalaman kerja Anda.</p>
    </div>
    <a href="{{ route('admin.experiences.create') }}" class="btn-pricing-blue flex-shrink-0">
        <i class="fas fa-plus" style="font-size: 12px;"></i>
        <span>Tambah Riwayat</span>
    </a>
</div>

<div class="glass-card">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th class="ps-4" style="width: 140px;">Kategori</th>
                    <th style="width: 32%;">Posisi / Jenjang</th>
                    <th style="width: 32%;">Institusi / Perusahaan</th>
                    <th style="width: 20%;">Periode</th>
                    <th class="text-center pe-4" style="width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($experiences as $exp)
                    <tr>
                        <td class="ps-4">
                            @if($exp->type === 'experience')
                                <span class="badge-apple-blue">Pekerjaan</span>
                            @else
                                <span class="badge-apple-green">Pendidikan</span>
                            @endif
                        </td>
                        <td class="fw-semibold" style="color: var(--color-ink); font-size: 14px;">{{ $exp->title }}</td>
                        <td style="color: var(--color-slate); font-size: 14px;">{{ $exp->subtitle }}</td>
                        <td style="color: var(--color-slate); font-size: 13px;">{{ $exp->period }}</td>
                        <td class="text-center pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.experiences.edit', $exp->id) }}" class="btn-action" title="Edit Riwayat">
                                    <i class="fas fa-pen" style="font-size: 11px;"></i>
                                </a>
                                <form action="{{ route('admin.experiences.destroy', $exp->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Hapus Riwayat">
                                        <i class="fas fa-trash-can" style="font-size: 11px;"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3 rounded-circle mb-3" style="background: var(--color-studio-mist); width: 64px; height: 64px; display: flex; align-items: center; justify-content: center; border: 1px solid var(--color-hairline-silver);">
                                    <i class="fas fa-clock-rotate-left fa-2x" style="color: var(--color-slate);"></i>
                                </div>
                                <h5 class="fw-semibold mb-1" style="color: var(--color-ink); font-size: 16px;">Belum Ada Riwayat</h5>
                                <p class="text-secondary mb-3" style="font-size: 13px;">Tambahkan riwayat pendidikan atau pengalaman kerja pertama Anda.</p>
                                <a href="{{ route('admin.experiences.create') }}" class="btn-pricing-blue">
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
