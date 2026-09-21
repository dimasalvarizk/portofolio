@extends('layouts.admin')

@section('title', 'Manajemen Sertifikasi')

@section('nav_certifications', 'active fw-bold border-bottom border-primary border-2 pb-1 d-inline-block')

@section('content')
<div class="row justify-content-center text-white animate__animated animate__fadeIn">
    <div class="col-lg-12">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 text-white">
            <div class="mb-3 mb-md-0">
                <h2 class="fw-bold mb-1">Manajemen Sertifikasi Profesional</h2>
                <p class="text-secondary mb-0" style="color: #cbd5e1 !important;">Kelola daftar sertifikat kompetensi portofolio Anda.</p>
            </div>
            <a href="{{ route('admin.certifications.create') }}" class="btn btn-glow-primary d-flex align-items-center justify-content-center gap-2">
                <i class="fas fa-plus"></i> Tambah Sertifikat
            </a>
        </div>

        <div class="glass-card">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="40%">Nama Sertifikat</th>
                            <th width="25%">Penerbit</th>
                            <th width="15%">Tahun</th>
                            <th width="20%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($certifications as $cert)
                            <tr>
                                <td class="fw-semibold text-white">
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="{{ $cert->icon ?: 'fas fa-certificate text-warning' }} me-1"></i>
                                        <span>{{ $cert->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $cert->issuer }}</td>
                                <td>{{ $cert->year }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('admin.certifications.edit', $cert->id) }}" class="btn-action" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.certifications.destroy', $cert->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sertifikat ini?');" style="display:inline;">
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
                                    <i class="fas fa-certificate fa-3x mb-3 opacity-25 text-info"></i>
                                    <p class="mb-0">Belum ada data sertifikasi.</p>
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
