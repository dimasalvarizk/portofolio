@extends('layouts.admin')

@section('title', 'Tambah Skill')

@section('nav_skills', 'active')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        
        <div class="d-flex align-items-center gap-2 mb-4">
            <a href="{{ route('admin.skills.index') }}" class="btn-action" title="Kembali">
                <i class="fas fa-arrow-left" style="font-size: 11px;"></i>
            </a>
            <div>
                <h1 class="page-header-title mb-0">Tambah Skill Baru</h1>
                <p class="page-header-subtitle">Tambahkan bahasa, framework, basis data, atau tools ke portofolio Anda.</p>
            </div>
        </div>

        <div class="glass-card">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.skills.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select class="form-select" id="categorySelect" onchange="toggleCustomCategory(this.value)">
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ old('category', 'Programming Languages') == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                            <option value="__NEW__" {{ (!in_array(old('category'), $categories) && old('category') != '') ? 'selected' : '' }}>
                                + Tambah Kategori Baru (Ketik Manual)...
                            </option>
                        </select>
                        <input type="text" class="form-control mt-2" id="customCategoryInput" name="category" 
                               value="{{ old('category', $categories[0] ?? 'Programming Languages') }}" 
                               placeholder="Ketik nama kategori baru..." 
                               style="{{ (!in_array(old('category'), $categories) && old('category') != '') ? '' : 'display: none;' }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="name" class="form-label">Nama Skill / Teknologi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required placeholder="Contoh: Python, React.js, Docker, SDLC, REST API" autocomplete="off">
                    </div>

                    <div class="mb-5">
                        <label for="icon" class="form-label">Ikon (Font Awesome class)</label>
                        <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon') }}" placeholder="Contoh: fab fa-python text-primary atau fas fa-database" autocomplete="off">
                        <small class="text-secondary d-block mt-1" style="font-size: 12px;">Gunakan nama kelas dari Font Awesome (opsional). Ikon akan ditampilkan di kartu spesifikasi.</small>
                    </div>

                    <div class="d-flex gap-3 justify-content-end align-items-center">
                        <a href="{{ route('admin.skills.index') }}" class="btn-glass-cancel">Batal</a>
                        <button type="submit" class="btn-pricing-blue">
                            <i class="fas fa-floppy-disk me-1"></i> Simpan Skill
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
    function toggleCustomCategory(val) {
        const input = document.getElementById('customCategoryInput');
        if (val === '__NEW__') {
            input.style.display = 'block';
            input.value = '';
            input.focus();
        } else {
            input.style.display = 'none';
            input.value = val;
        }
    }
</script>
