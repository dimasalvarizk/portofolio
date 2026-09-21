@extends('layouts.admin')

@section('title', 'Dashboard Admin - Projects')

@section('nav_projects', 'active fw-bold border-bottom border-primary border-2 pb-1 d-inline-block')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 text-white">
    <div class="mb-3 mb-md-0">
        <h2 class="fw-bold mb-1">Manajemen Projek</h2>
        <p class="text-secondary mb-0" style="color: #cbd5e1 !important;">Kelola portofolio karya codingmu di sini.</p>
    </div>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-glow-primary d-flex align-items-center justify-content-center gap-2">
        <i class="fas fa-plus"></i> Tambah Projek
    </a>
</div>

<div class="glass-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle text-nowrap"> 
                <thead>
                    <tr>
                        <th class="ps-4">Preview</th>
                        <th>Info Projek</th>
                        <th>Teknologi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td class="ps-4" style="width: 120px;">
                            <!-- Membatasi ukuran gambar dengan style width, height, dan object-fit -->
                            <img src="{{ asset('storage/'.$project->image_url) }}" 
                                 class="img-preview rounded" 
                                 alt="Project Image" 
                                 style="width: 100px; height: 70px; object-fit: cover;">
                        </td>
                        <td>
                            <h6 class="fw-bold text-white mb-1">{{ $project->title }}</h6>
                            <span class="badge badge-soft badge-cat">
                                {{ $project->category }}
                            </span>
                        </td>
                        <td style="width: 30%;">
                            <div class="d-flex flex-wrap gap-1">
                                @foreach($project->tech_stack as $tech)
                                    <span class="badge badge-soft badge-tech">{{ $tech }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td class="text-center" style="width: 150px;">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn-action" title="Edit">
                                    <i class="fas fa-pen small"></i>
                                </a>
                                
                                <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus projek ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Hapus">
                                        <i class="fas fa-trash small"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="rounded-circle p-4 mb-3" style="background: rgba(255,255,255,0.05);">
                                    <i class="fas fa-folder-open fa-3x text-secondary"></i>
                                </div>
                                <h5 class="text-secondary fw-normal">Belum ada projek yang ditambahkan.</h5>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection