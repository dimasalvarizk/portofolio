@extends('layouts.admin')

@section('title', 'Tambah Projek')

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
                        <h1 class="page-header-title mb-0">Buat Projek Baru</h1>
                        <p class="page-header-subtitle">Tampilkan karya dan inovasi terbaik Anda di galeri portofolio.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-card">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label">Judul Projek <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="Misal: Sistem Informasi Sekolah" required autofocus value="{{ old('title') }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                            <input type="text" name="category" class="form-control" placeholder="Contoh: Web Development" required value="{{ old('category') }}">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Link Demo (Opsional)</label>
                            <input type="url" name="link_demo" class="form-control" placeholder="https://domain-kamu.com" value="{{ old('link_demo') }}">
                            <small class="text-secondary d-block mt-1" style="font-size: 12px;">Biarkan kosong jika projek bersifat internal / privat.</small>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Teknologi (Tech Stack) <span class="text-danger">*</span></label>
                        <input type="text" name="tech_stack" class="form-control" placeholder="Contoh: Laravel, MySQL, Bootstrap, Vue.js" required value="{{ old('tech_stack') }}">
                        <small class="text-secondary d-block mt-1" style="font-size: 12px;"><i class="fas fa-circle-info text-primary me-1"></i> Pisahkan setiap teknologi dengan tanda koma (,)</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Upload Gambar Cover Utama <span class="text-danger">*</span></label>
                        <input type="file" name="image_url" class="form-control" accept="image/*" required>
                        <small class="text-secondary d-block mt-1" style="font-size: 12px;">Format yang didukung: JPG, PNG, JPEG, WebP. Maksimum ukuran: 2MB.</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Upload Gambar Tambahan / Galeri (Opsional)</label>
                        <input type="file" name="additional_images[]" class="form-control" accept="image/*" multiple>
                        <small class="text-secondary d-block mt-1" style="font-size: 12px;">Pilih satu atau beberapa gambar sekaligus untuk galeri mockup. Maksimum: 5MB per berkas.</small>
                    </div>

                    <div class="mb-5">
                        <label class="form-label">Deskripsi Lengkap & Cerita Projek</label>
                        <div class="quill-wrapper">
                            <div id="quill-editor"></div>
                            <input type="hidden" name="description" id="description-input" value="{{ old('description') }}">
                        </div>
                    </div>

                    <div class="d-flex gap-3 justify-content-end align-items-center">
                        <a href="{{ route('admin.projects.index') }}" class="btn-glass-cancel">Batal</a>
                        <button type="submit" class="btn-pricing-blue">
                            <i class="fas fa-floppy-disk me-1"></i> Simpan Projek
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
                }, 100);
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
                    placeholder: 'Ceritakan detail projek, fitur unggulan, dan arsitektur teknis...',
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
</script>
@endsection