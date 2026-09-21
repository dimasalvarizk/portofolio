@extends('layouts.admin')

@section('title', 'Kotak Masuk Pesan')

@section('nav_contacts', 'active fw-bold border-bottom border-primary border-2 pb-1 d-inline-block')

@section('styles')
<style>
    .avatar-circle {
        width: 40px; height: 40px; border-radius: 50%;
        background: rgba(139, 92, 246, 0.2); border: 1px solid rgba(139, 92, 246, 0.4);
        color: #a5b4fc; display: flex; align-items: center; justify-content: center;
        font-weight: 700; margin-right: 12px; font-size: 1.1rem;
    }
    .badge-time {
        font-size: 0.8rem; color: #94a3b8;
    }
    .btn-reply:hover {
        background: var(--secondary-color); color: white; border-color: var(--secondary-color);
    }
</style>
@endsection

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 text-white">
    <div>
        <h2 class="fw-bold mb-1">Kotak Masuk</h2>
        <p class="text-secondary mb-0" style="color: #cbd5e1 !important;">Pesan dari pengunjung portofolio Anda.</p>
    </div>
</div>

<div class="glass-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle text-nowrap"> 
                <thead>
                    <tr>
                        <th class="ps-4">Pengirim</th>
                        <th>Pesan</th>
                        <th>Waktu</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $msg)
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="avatar-circle flex-shrink-0">
                                    {{ strtoupper(substr($msg->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div class="fw-bold text-white">{{ $msg->name }}</div>
                                    <a href="mailto:{{ $msg->email }}" class="small text-decoration-none text-secondary" style="opacity: 0.8; cursor: none;">
                                        {{ $msg->email }}
                                    </a>
                                </div>
                            </div>
                        </td>
                        <td style="min-width: 250px; white-space: normal;"> 
                            <div class="message-preview text-white-50">
                                {{ $msg->message }}
                            </div>
                        </td>
                        <td>
                            <span class="badge-time text-nowrap">
                                <i class="far fa-clock me-1"></i> {{ $msg->created_at->format('d M, H:i') }}
                            </span>
                        </td>
                        <td class="text-center" style="min-width: 120px;">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="mailto:{{ $msg->email }}" class="btn-action btn-reply" title="Balas Email">
                                    <i class="fas fa-reply small"></i>
                                </a>
                                
                                <form action="{{ route('admin.contacts.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Hapus pesan dari {{ $msg->name }}?')">
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
                                    <i class="fas fa-envelope-open fa-3x text-secondary"></i>
                                </div>
                                <h5 class="text-secondary fw-normal">Belum ada pesan masuk.</h5>
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