@extends('layouts.admin')

@section('title', 'Edit Skill')

@section('nav_skills', 'active fw-bold border-bottom border-primary border-2 pb-1 d-inline-block')

@section('content')
<div class="row justify-content-center text-white animate__animated animate__fadeIn">
    <div class="col-lg-8">
        
        <div class="d-flex align-items-center gap-3 mb-4">
            <a href="{{ route('admin.skills.index') }}" class="btn btn-outline-light rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; cursor: none;">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h2 class="fw-bold mb-1">Edit Skill</h2>
                <p class="text-secondary mb-0" style="color: #cbd5e1 !important;">Perbarui detail item teknologi portofolio Anda.</p>
            </div>
        </div>

        <div class="glass-card p-5">
            <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="category" class="form-label">Kategori</label>
                    <select class="form-select" id="category" name="category" required>
                        <option value="Programming Languages" {{ old('category', $skill->category) == 'Programming Languages' ? 'selected' : '' }}>Programming Languages</option>
                        <option value="Frameworks & Libraries" {{ old('category', $skill->category) == 'Frameworks & Libraries' ? 'selected' : '' }}>Frameworks & Libraries</option>
                        <option value="Databases & APIs" {{ old('category', $skill->category) == 'Databases & APIs' ? 'selected' : '' }}>Databases & APIs</option>
                        <option value="Tools & Platforms" {{ old('category', $skill->category) == 'Tools & Platforms' ? 'selected' : '' }}>Tools & Platforms</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="name" class="form-label">Nama Skill / Teknologi</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $skill->name) }}" required placeholder="Contoh: Python, React, Docker" autocomplete="off">
                </div>

                <div class="mb-4">
                    <label for="icon" class="form-label">Ikon (Font Awesome class)</label>
                    <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon', $skill->icon) }}" placeholder="Contoh: fab fa-python text-success atau fas fa-leaf text-success" autocomplete="off">
                    <div class="form-text text-secondary mt-1">Gunakan kelas ikon dari <a href="https://fontawesome.com/v6/search?m=free" target="_blank" class="text-info text-decoration-none">Font Awesome v6 (Free)</a> beserta warna bootstrap jika ada.</div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-glow-primary px-5 py-3">
                        <i class="fas fa-save me-2"></i> Perbarui Skill
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection
