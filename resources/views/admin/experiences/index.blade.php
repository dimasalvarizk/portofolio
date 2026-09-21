@extends('layouts.admin')

@section('title', 'Manajemen Timeline Riwayat Hidup')

@section('nav_experiences', 'active fw-bold border-bottom border-primary border-2 pb-1 d-inline-block')

@section('content')
<div class="row justify-content-center text-white animate__animated animate__fadeIn">
    <div class="col-lg-12">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 text-white">
            <div class="mb-3 mb-md-0">
                <h2 class="fw-bold mb-1">Manajemen Timeline (Pendidikan & Pengalaman)</h2>
                <p class="text-secondary mb-0" style="color: #cbd5e1 !important;">Kelola data riwayat pendidikan dan pengalaman kerja Anda di sini.</p>
            </div>
            <a href="{{ route('admin.experiences.create') }}" class="btn btn-glow-primary d-flex align-items-center justify-content-center gap-2">
                <i class="fas fa-plus"></i> Tambah Riwayat
            </a>
        </div>

        <div class="glass-card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="12%">Tipe</th>
                            <th width="28%">Judul / Posisi</th>
                            <th width="25%">Perusahaan / Sekolah</th>
                            <th width="20%">Periode</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($experiences as $exp)
                            <tr>
                                <td>
                                    @if($exp->type === 'experience')
                                        <span class="badge bg-primary rounded-pill px-3 py-2">Pekerjaan</span>
                                    @else
                                        <span class="badge bg-success rounded-pill px-3 py-2">Pendidikan</span>
                                    @endif
                                </td>
                                <td class="fw-semibold text-white">{{ $exp->title }}</td>
                                <td>{{ $exp->subtitle }}</td>
                                <td>{{ $exp->period }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.experiences.edit', $exp->id) }}" class="btn-action" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.experiences.destroy', $exp->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus riwayat ini?');" style="display:inline;">
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
                                <td colspan="5" class="text-center text-secondary py-5">
                                    <i class="fas fa-history fa-3x mb-3 opacity-25 text-info"></i>
                                    <p class="mb-0">Belum ada riwayat timeline.</p>
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
