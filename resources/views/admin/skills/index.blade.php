@extends('layouts.admin')

@section('title', 'Skills')

@section('nav_skills', 'active')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
    <div>
        <h1 class="page-header-title">Tech Stack & Keahlian</h1>
        <p class="page-header-subtitle">Kelola daftar bahasa pemrograman, framework, basis data, dan tools.</p>
    </div>
    <a href="{{ route('admin.skills.create') }}" class="btn-pricing-blue flex-shrink-0">
        <i class="fas fa-plus" style="font-size: 12px;"></i>
        <span>Tambah Skill</span>
    </a>
</div>

<div class="glass-card">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th class="ps-4" style="width: 35%;">Kategori</th>
                    <th style="width: 50%;">Nama Skill / Teknologi</th>
                    <th class="text-center pe-4" style="width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skills as $skill)
                    <tr>
                        <td class="ps-4">
                            <span class="badge-apple-soft">{{ $skill->category }}</span>
                        </td>
                        <td class="fw-semibold" style="color: var(--color-ink); font-size: 14px;">{{ $skill->name }}</td>
                        <td class="text-center pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn-action" title="Edit Skill">
                                    <i class="fas fa-pen" style="font-size: 11px;"></i>
                                </a>
                                <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus skill ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Hapus Skill">
                                        <i class="fas fa-trash-can" style="font-size: 11px;"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3 rounded-circle mb-3" style="background: var(--color-studio-mist); width: 64px; height: 64px; display: flex; align-items: center; justify-content: center; border: 1px solid var(--color-hairline-silver);">
                                    <i class="fas fa-code fa-2x" style="color: var(--color-slate);"></i>
                                </div>
                                <h5 class="fw-semibold mb-1" style="color: var(--color-ink); font-size: 16px;">Belum Ada Skill</h5>
                                <p class="text-secondary mb-3" style="font-size: 13px;">Tambahkan teknologi dan keahlian Anda ke dalam daftar.</p>
                                <a href="{{ route('admin.skills.create') }}" class="btn-pricing-blue">
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
