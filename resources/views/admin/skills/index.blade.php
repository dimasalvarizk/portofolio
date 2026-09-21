@extends('layouts.admin')

@section('title', 'Manajemen Skills')

@section('nav_skills', 'active fw-bold border-bottom border-primary border-2 pb-1 d-inline-block')

@section('content')
<div class="row justify-content-center text-white animate__animated animate__fadeIn">
    <div class="col-lg-12">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 text-white">
            <div class="mb-3 mb-md-0">
                <h2 class="fw-bold mb-1">Manajemen Tech Stack / Skills</h2>
                <p class="text-secondary mb-0" style="color: #cbd5e1 !important;">Kelola daftar bahasa pemrograman, framework, database, dan tools portofolio Anda.</p>
            </div>
            <a href="{{ route('admin.skills.create') }}" class="btn btn-glow-primary d-flex align-items-center justify-content-center gap-2">
                <i class="fas fa-plus"></i> Tambah Skill
            </a>
        </div>

        <div class="glass-card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="15%" class="text-center">Ikon</th>
                            <th width="30%">Kategori</th>
                            <th width="35%">Nama Skill</th>
                            <th width="20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($skills as $skill)
                            <tr>
                                <td class="text-center">
                                    <div class="fs-4 d-inline-block text-center" style="width: 40px;">
                                        <i class="{{ $skill->icon ?: 'fas fa-code text-secondary' }}"></i>
                                    </div>
                                </td>
                                <td><span class="badge bg-secondary rounded-pill px-3 py-2">{{ $skill->category }}</span></td>
                                <td class="fw-semibold text-white">{{ $skill->name }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn-action" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus skill ini?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-delete" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-secondary py-5">
                                    <i class="fas fa-code fa-3x mb-3 opacity-25 text-info"></i>
                                    <p class="mb-0">Belum ada data skill.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
