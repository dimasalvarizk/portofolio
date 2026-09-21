@extends('layouts.admin')

@section('title', 'Edit Projek')

@section('nav_projects', 'active')

@section('styles')
<style>
    /* --- QUILL WYSIWYG EDITOR APPLE LIGHT THEME --- */
    .quill-wrapper {
        width: 100% !important;
        display: block;
    }
    .ql-toolbar.ql-snow, 
    .ql-container.ql-snow {
        width: 100% !important;
        box-sizing: border-box;
    }
    .ql-toolbar.ql-snow {
        background: var(--color-studio-mist) !important;
        border: 1px solid var(--color-hairline-silver) !important;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
        padding: 10px 14px !important;
    }
    .ql-container.ql-snow {
        background: var(--color-gallery-white) !important;
        border: 1px solid var(--color-hairline-silver) !important;
        border-top: none !important;
        border-bottom-left-radius: 16px;
        border-bottom-right-radius: 16px;
        min-height: 220px;
        font-family: var(--font-sf-pro);
        font-size: 14px;
    }
    .ql-editor {
        color: var(--color-ink) !important;
        padding: 16px 20px !important;
        min-height: 220px;
        line-height: 1.6;
    }
    .ql-editor.ql-blank::before {
        color: var(--color-steel) !important;
        font-style: normal;
        left: 20px !important;
    }
    .ql-snow .ql-stroke {
        stroke: var(--color-ink) !important;
    }
    .ql-snow .ql-fill {
        fill: var(--color-ink) !important;
    }
    .ql-snow .ql-picker {
        color: var(--color-ink) !important;
    }
    .ql-snow.ql-toolbar button:hover .ql-stroke,
    .ql-snow.ql-toolbar button.ql-active .ql-stroke,
    .ql-snow .ql-picker-label:hover .ql-stroke,
    .ql-snow .ql-picker-label.ql-active .ql-stroke {
        stroke: var(--color-pricing-blue) !important;
    }
    .ql-snow.ql-toolbar button:hover .ql-fill,
    .ql-snow.ql-toolbar button.ql-active .ql-fill,
    .ql-snow .ql-picker-label:hover .ql-fill,
    .ql-snow .ql-picker-label.ql-active .ql-fill {
        fill: var(--color-pricing-blue) !important;
    }
    .ql-snow.ql-toolbar button:hover,
    .ql-snow.ql-toolbar button.ql-active,
    .ql-snow .ql-picker-label:hover,
    .ql-snow .ql-picker-label.ql-active {
        color: var(--color-pricing-blue) !important;
    }
    .ql-snow .ql-picker-options {
        background-color: var(--color-gallery-white) !important;
        border: 1px solid var(--color-hairline-silver) !important;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        padding: 6px !important;
    }
    .ql-snow .ql-picker-item {
        color: var(--color-ink) !important;
        padding: 4px 8px !important;
        border-radius: 6px;
    }
    .ql-snow .ql-picker-item:hover,
    .ql-snow .ql-picker-item.ql-selected {
        background-color: var(--color-studio-mist) !important;
        color: var(--color-pricing-blue) !important;
    }

    /* --- IMAGE PREVIEW CUSTOM STYLES --- */
    .img-preview-box {
        position: relative;
        max-width: 260px;
        width: 100%;
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid var(--color-hairline-silver);
        background: var(--color-studio-mist);
    }
    .img-current {
        width: 100%;
        height: 140px;
        object-fit: cover;
        display: block;
    }
    .badge-img {
        position: absolute;
        top: 8px;
        left: 8px;
        background: rgba(29, 29, 31, 0.85);
        color: #fff;
        padding: 3px 8px;
        font-size: 11px;
        font-weight: 500;
        border-radius: 6px;
        z-index: 5;
        letter-spacing: -0.12px;
    }

    .img-edit-container {
        background-color: var(--color-studio-mist);
        border: 1px solid var(--color-hairline-silver);
        border-radius: 18px;
    }
</style>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 text-center text-md-start">
            <div class="mb-3 mb-md-0">
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('admin.projects.index') }}" class="btn-action" title="Kembali">
                        <i class="fas fa-arrow-left" style="font-size: 11px;"></i>
                    </a>
                    <div>
                        <h1 class="page-header-title mb-0">Edit Projek</h1>
                        <p class="page-header-subtitle">Perbarui informasi dan rincian teknis projek portofolio Anda.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-card">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="form-label">Judul Projek <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                            <input type="text" name="category" class="form-control" value="{{ old('category', $project->category) }}" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Link Demo (Opsional)</label>
                            <input type="url" name="link_demo" class="form-control" value="{{ old('link_demo', $project->link_demo) }}" placeholder="https://domain-kamu.com">
                            <small class="text-secondary d-block mt-1" style="font-size: 12px;">Biarkan kosong jika projek privat.</small>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Teknologi (Tech Stack) <span class="text-danger">*</span></label>
                        <input type="text" name="tech_stack" class="form-control" value="{{ old('tech_stack', is_array($project->tech_stack) ? implode(',', $project->tech_stack) : $project->tech_stack) }}" required>
                        <small class="text-secondary d-block mt-1" style="font-size: 12px;"><i class="fas fa-circle-info text-primary me-1"></i> Pisahkan setiap teknologi dengan tanda koma (,)</small>
                    </div>

                    <div class="mb-4 p-4 img-edit-container">
                        <label class="form-label d-block mb-3">Gambar Cover Utama</label>
                        <div class="d-flex flex-column flex-md-row gap-4 align-items-start">
                            <div class="img-preview-box flex-shrink-0">
                                <span class="badge-img">Sampul Aktif</span>
                                <img src="{{ asset('storage/'.$project->image_url) }}" class="img-current" alt="Current Cover">
                            </div>
                            <div class="flex-grow-1 w-100">
                                <label class="form-label text-secondary small">Ganti Gambar Sampul (Opsional)</label>
                                <input type="file" name="image_url" class="form-control" accept="image/*">
                                <small class="text-secondary d-block mt-1" style="font-size: 12px;">Biarkan kosong jika tetap menggunakan gambar saat ini. Format: JPG, PNG, JPEG. Max: 2MB.</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4 p-4 img-edit-container">
                        <label class="form-label d-block mb-3">Gambar Tambahan / Galeri Mockup (Opsional)</label>
                        @if($project->additional_images && is_array($project->additional_images) && count($project->additional_images) > 0)
                            <div class="d-flex flex-wrap gap-3 mb-3">
                                @foreach($project->additional_images as $index => $img)
                                    <div class="position-relative" id="additional-image-{{ $index }}" style="width: 120px; height: 80px; overflow: hidden; border-radius: 12px; border: 1px solid var(--color-hairline-silver); background: var(--color-gallery-white);">
                                        <img src="{{ asset('storage/'.$img) }}" style="width: 100%; height: 100%; object-fit: cover;" alt="Additional Mockup">
                                        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 m-1 d-flex align-items-center justify-content-center" style="width: 22px; height: 22px; border-radius: 50%; padding: 0; font-size: 12px; line-height: 1; border: none; background: rgba(215, 0, 21, 0.9);" onclick="deleteAdditionalImage({{ $index }})" title="Hapus gambar ini">
                                            &times;
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <div class="w-100">
                            <label class="form-label text-secondary small">Unggah Gambar Galeri Baru (Opsional)</label>
                            <input type="file" name="additional_images[]" class="form-control" accept="image/*" multiple>
                            <small class="text-secondary d-block mt-1" style="font-size: 12px;">Mengunggah berkas baru akan ditambahkan ke galeri projek. Format: JPG, PNG, JPEG. Max: 5MB per file.</small>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="form-label">Deskripsi Lengkap</label>
                        <div class="quill-wrapper">
                            <div id="quill-editor"></div>
                            <input type="hidden" name="description" id="description-input" value="{{ old('description', $project->description) }}">
                        </div>
                    </div>

                    <div class="d-flex gap-3 justify-content-end align-items-center">
                        <a href="{{ route('admin.projects.index') }}" class="btn-glass-cancel">Batal</a>
                        <button type="submit" class="btn-pricing-blue">
                            <i class="fas fa-arrows-rotate me-1"></i> Perbarui Projek
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
    (function() {
        function loadQuill(callback) {
            if (window.Quill) {
                callback();
                return;
            }

            if (!document.getElementById('quill-css')) {
                var link = document.createElement('link');
                link.id = 'quill-css';
                link.rel = 'stylesheet';
                link.href = 'https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css';
                document.head.appendChild(link);
            }

            var script = document.getElementById('quill-js');
            if (!script) {
                script = document.createElement('script');
                script.id = 'quill-js';
                script.src = 'https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js';
                script.onload = callback;
                document.head.appendChild(script);
            } else {
                var interval = setInterval(function() {
                    if (window.Quill) {
                        clearInterval(interval);
                        callback();
                    }
                }, 50);
            }
        }

        function initQuill() {
            var editorEl = document.getElementById('quill-editor');
            var inputEl = document.getElementById('description-input');
            
            if (!editorEl || !inputEl) return;
            
            if (editorEl.classList.contains('ql-container') || editorEl.dataset.quillLoading === 'true') return;
            editorEl.dataset.quillLoading = 'true';

            loadQuill(function() {
                delete editorEl.dataset.quillLoading;
                if (editorEl.classList.contains('ql-container')) return;

                var wrapper = editorEl.closest('.quill-wrapper');
                if (wrapper) {
                    var existingToolbars = wrapper.querySelectorAll('.ql-toolbar');
                    existingToolbars.forEach(function(tb) {
                        tb.remove();
                    });
                }
                
                editorEl.className = '';
                editorEl.innerHTML = '';

                var quill = new Quill(editorEl, {
                    theme: 'snow',
                    placeholder: 'Tulis detail dan arsitektur projek di sini...',
                    modules: {
                        toolbar: [
                            [{ 'header': [1, 2, 3, false] }],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            ['link', 'clean']
                        ]
                    }
                });

                if (inputEl.value) {
                    quill.root.innerHTML = inputEl.value;
                }

                quill.on('text-change', function() {
                    inputEl.value = quill.root.innerHTML === '<p><br></p>' ? '' : quill.root.innerHTML;
                });
            });
        }

        document.addEventListener('DOMContentLoaded', initQuill);
        initQuill();
    })();

    function deleteAdditionalImage(index) {
        if (!confirm('Apakah Anda yakin ingin menghapus gambar galeri ini?')) return;

        const url = `{{ route('admin.projects.delete-image', ['project' => $project->id, 'index' => ':index']) }}`.replace(':index', index);
        const token = document.querySelector('input[name="_token"]')?.value || '';

        fetch(url, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': token,
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const el = document.getElementById(`additional-image-${index}`);
                if (el) {
                    el.remove();
                }
            } else {
                alert('Gagal menghapus gambar: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghubungi server.');
        });
    }
</script>
@endsection