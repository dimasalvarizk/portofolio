@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('nav_contacts', 'active')

@section('styles')
<style>
    .avatar-apple {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background-color: var(--color-studio-mist);
        border: 1px solid var(--color-hairline-silver);
        color: var(--color-ink);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 14px;
        margin-right: 12px;
        flex-shrink: 0;
    }
</style>
@endsection

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
    <div>
        <h1 class="page-header-title">Kotak Masuk Pesan</h1>
        <p class="page-header-subtitle">Pesan dan pertanyaan yang dikirimkan oleh pengunjung portofolio Anda.</p>
    </div>
</div>

<div class="glass-card">
    <div class="table-responsive">
        <table class="table align-middle"> 
            <thead>
                <tr>
                    <th class="ps-4" style="width: 240px;">Pengirim</th>
                    <th>Isi Pesan</th>
                    <th style="width: 160px;">Waktu</th>
                    <th class="text-center pe-4" style="width: 120px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $msg)
                <tr>
                    <td class="ps-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar-apple">
                                {{ strtoupper(substr($msg->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="fw-semibold" style="color: var(--color-ink); font-size: 14px;">{{ $msg->name }}</div>
                                <a href="mailto:{{ $msg->email }}" class="apple-link" style="font-size: 12px;">
                                    {{ $msg->email }}
                                </a>
                            </div>
                        </div>
                    </td>
                    <td style="min-width: 260px;"> 
                        <div style="color: var(--color-ink); font-size: 13px; line-height: 1.5;">
                            {{ $msg->message }}
                        </div>
                    </td>
                    <td>
                        <span style="color: var(--color-slate); font-size: 12px;">
                            <i class="far fa-clock me-1"></i> {{ $msg->created_at->format('d M Y, H:i') }}
                        </span>
                    </td>
                    <td class="text-center pe-4">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="mailto:{{ $msg->email }}?subject=Balasan Portofolio — Dimas Alvarizqi" class="btn-action" title="Balas Email">
                                <i class="fas fa-reply" style="font-size: 11px;"></i>
                            </a>
                            
                            <form action="{{ route('admin.contacts.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan dari {{ $msg->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-delete" title="Hapus Pesan">
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
                                <i class="fas fa-inbox fa-2x" style="color: var(--color-slate);"></i>
                            </div>
                            <h5 class="fw-semibold mb-1" style="color: var(--color-ink); font-size: 16px;">Kotak Masuk Kosong</h5>
                            <p class="text-secondary mb-0" style="font-size: 13px;">Belum ada pesan yang dikirimkan oleh pengunjung.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection