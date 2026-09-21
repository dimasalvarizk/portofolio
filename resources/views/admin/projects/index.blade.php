@extends('layouts.admin')

@section('title', 'Projek')

@section('nav_projects', 'active')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
    <div>
        <h1 class="page-header-title">Manajemen Projek</h1>
        <p class="page-header-subtitle">Kelola portofolio karya coding dan galeri screenshot aplikasi Anda.</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn-pricing-blue flex-shrink-0">
        <i class="fas fa-plus" style="font-size: 12px;"></i>
        <span>Tambah Projek</span>
    </a>
</div>

<div class="glass-card">
    <div class="table-responsive">
        <table class="table align-middle"> 
            <thead>
                <tr>
                    <th class="ps-4" style="width: 130px;">Preview</th>
                    <th style="width: 38%;">Info Projek</th>
                    <th style="width: 42%;">Teknologi (Tech Stack)</th>
                    <th class="text-center pe-4" style="width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td class="ps-4">
                        <div style="width: 100px; height: 65px; border-radius: 12px; overflow: hidden; border: 1px solid var(--color-hairline-silver); background-color: var(--color-studio-mist);">
                            <img src="{{ asset('storage/'.$project->image_url) }}" 
                                 alt="{{ $project->title }}" 
                                 style="width: 100%; height: 100%; object-fit: cover; display: block;">
                        </div>
                    </td>
                    <td>
                        <div class="fw-semibold mb-1" style="color: var(--color-ink); font-size: 14px; line-height: 1.4;">{{ $project->title }}</div>
                        <div class="d-flex align-items-center gap-2 mt-1">
                            <span class="badge-apple-blue">{{ $project->category }}</span>
                            @if($project->link_demo)
                                <a href="{{ $project->link_demo }}" target="_blank" class="apple-link" style="font-size: 12px;">
                                    <i class="fas fa-arrow-up-right-from-square" style="font-size: 10px;"></i> Demo
                                </a>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-wrap gap-1">
                            @foreach($project->tech_stack as $tech)
                                <span class="badge-apple-soft text-nowrap">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td class="text-center pe-4">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn-action" title="Edit Projek">
                                <i class="fas fa-pen" style="font-size: 11px;"></i>
                            </a>
                            
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus projek ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete" title="Hapus Projek">
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
                                <i class="fas fa-folder-open fa-2x" style="color: var(--color-slate);"></i>
                            </div>
                            <h5 class="fw-semibold mb-1" style="color: var(--color-ink); font-size: 16px;">Belum Ada Projek</h5>
                            <p class="text-secondary mb-3" style="font-size: 13px;">Tambahkan projek pertama Anda untuk ditampilkan di galeri utama.</p>
                            <a href="{{ route('admin.projects.create') }}" class="btn-pricing-blue">
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