@extends('layouts.admin')

@section('title', 'Tambah Projek - Admin')

@section('nav_projects', 'active fw-bold border-bottom border-primary border-2 pb-1 d-inline-block')

@section('styles')
<style>
    /* --- QUILL WYSIWYG EDITOR GLASSMORPHISM DARK MODE --- */
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
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        padding: 12px !important;
    }
    .ql-container.ql-snow {
        background: rgba(0, 0, 0, 0.3) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-top: none !important;
        border-bottom-left-radius: 12px;
        border-bottom-right-radius: 12px;
        min-height: 250px;
        font-family: 'Outfit', sans-serif;
        font-size: 1rem;
    }
    .ql-editor {
        color: #e2e8f0 !important;
        padding: 15px 20px !important;
        min-height: 250px;
    }
    .ql-editor.ql-blank::before {
        color: rgba(255, 255, 255, 0.3) !important;
        font-style: normal;
        left: 20px !important;
    }
    .ql-snow .ql-stroke {
        stroke: #cbd5e1 !important;
    }
    .ql-snow .ql-fill {
        fill: #cbd5e1 !important;
    }
    .ql-snow .ql-picker {
        color: #cbd5e1 !important;
    }
    .ql-snow.ql-toolbar button:hover .ql-stroke,
    .ql-snow.ql-toolbar button.ql-active .ql-stroke,
    .ql-snow .ql-picker-label:hover .ql-stroke,
    .ql-snow .ql-picker-label.ql-active .ql-stroke {
        stroke: var(--secondary-color) !important;
    }
    .ql-snow.ql-toolbar button:hover .ql-fill,
    .ql-snow.ql-toolbar button.ql-active .ql-fill,
    .ql-snow .ql-picker-label:hover .ql-fill,
    .ql-snow .ql-picker-label.ql-active .ql-fill {
        fill: var(--secondary-color) !important;
    }
    .ql-snow.ql-toolbar button:hover,
    .ql-snow.ql-toolbar button.ql-active,
    .ql-snow .ql-picker-label:hover,
    .ql-snow .ql-picker-label.ql-active {
        color: var(--secondary-color) !important;
    }
    .ql-snow .ql-picker-options {
        background-color: #1e293b !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-radius: 8px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
        padding: 8px !important;
    }
    .ql-snow .ql-picker-item {
        color: #cbd5e1 !important;
        padding: 4px 8px !important;
        border-radius: 4px;
    }
    .ql-snow .ql-picker-item:hover,
    .ql-snow .ql-picker-item.ql-selected {
        background-color: rgba(255, 255, 255, 0.1) !important;
        color: var(--secondary-color) !important;
    }

    .btn-glass-cancel {
        background: transparent; color: #94a3b8; border: 1px solid rgba(255,255,255,0.2);
        padding: 12px 30px; border-radius: 50px; font-weight: 600; transition: 0.3s;
    }
    .btn-glass-cancel:hover { background: rgba(255,255,255,0.1); color: white; border-color: white; }
    
    .form-control[type="file"] { padding: 10px; }
    .form-control[type="file"]::file-selector-button {
        background: rgba(255,255,255,0.1); color: white; border: none; border-radius: 6px; margin-right: 15px;
    }
</style>
@endsection

@section('content')
<div class="row justify-content-center animate__animated animate__fadeIn">
    <div class="col-lg-10">
        
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 text-center text-md-start">
            <div class="mb-3 mb-md-0">
                <h2 class="fw-bold mb-1 text-white">Buat Projek Baru</h2>
                <p class="text-secondary mb-0" style="color: #cbd5e1 !important;">Tunjukkan karya terbaikmu kepada dunia.</p>
            </div>
        </div>

        <div class="glass-card">
            <div class="card-body p-4 p-md-5">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label">Judul Projek <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control" placeholder="Misal: Sistem Informasi Sekolah" required autofocus>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                            <input type="text" name="category" class="form-control" placeholder="Contoh: Web Development" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Link Demo (Opsional)</label>
                            <input type="url" name="link_demo" class="form-control" placeholder="https://domain-kamu.com">
                            <small class="text-secondary" style="font-size: 0.8rem; opacity: 0.7;">Biarkan kosong jika projek privat.</small>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Teknologi (Tech Stack) <span class="text-danger">*</span></label>
                        <input type="text" name="tech_stack" class="form-control" placeholder="Contoh: Laravel, MySQL, Bootstrap, Vue.js" required>
                        <small class="text-info opacity-75"><i class="fas fa-info-circle"></i> Pisahkan dengan tanda koma (,)</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Upload Gambar Cover <span class="text-danger">*</span></label>
                        <input type="file" name="image_url" class="form-control" accept="image/*" required>
                        <small class="text-secondary" style="opacity: 0.7;">Format: JPG, PNG, JPEG. Max: 2MB.</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Upload Gambar Tambahan (Opsional)</label>
                        <input type="file" name="additional_images[]" class="form-control" accept="image/*" multiple>
                        <small class="text-secondary" style="opacity: 0.7;">Pilih satu atau beberapa gambar sekaligus. Format: JPG, PNG, JPEG. Max: 5MB per file.</small>
                    </div>

                    <div class="mb-5">
                        <label class="form-label">Deskripsi Lengkap</label>
                        <div class="quill-wrapper">
                            <div id="quill-editor"></div>
                            <input type="hidden" name="description" id="description-input" value="{{ old('description') }}">
                        </div>
                    </div>

                    <div class="d-flex gap-3 justify-content-end">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-glass-cancel">Batal</a>
                        <button type="submit" class="btn btn-glow-primary">
                            <i class="fas fa-save me-2"></i> Simpan Projek
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
        // Function to load Quill resources dynamically if not already loaded
        function loadQuill(callback) {
            if (window.Quill) {
                callback();
                return;
            }

            // Load CSS
            if (!document.getElementById('quill-css')) {
                var link = document.createElement('link');
                link.id = 'quill-css';
                link.rel = 'stylesheet';
                link.href = 'https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css';
                document.head.appendChild(link);
            }

            // Load JS
            var script = document.getElementById('quill-js');
            if (!script) {
                script = document.createElement('script');
                script.id = 'quill-js';
                script.src = 'https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js';
                script.onload = callback;
                document.head.appendChild(script);
            } else {
                // If script is already loading by another page instance, poll until ready
                var interval = setInterval(function() {
                    if (window.Quill) {
                        clearInterval(interval);
                        callback();
                    }
                }, 100);
            }
        }

        // Initialize Quill editor instance
        function initQuill() {
            var editorEl = document.getElementById('quill-editor');
            var inputEl = document.getElementById('description-input');
            if (!editorEl || !inputEl) return;
            
            // Prevent duplicate initialization
            if (editorEl.classList.contains('ql-container') || editorEl.dataset.quillLoading === 'true') return;
            editorEl.dataset.quillLoading = 'true';

            loadQuill(function() {
                delete editorEl.dataset.quillLoading;
                
                // Double check to prevent concurrent initialization race condition
                if (editorEl.classList.contains('ql-container')) return;

                // Clean up any existing toolbars in the wrapper to avoid duplication
                var wrapper = editorEl.closest('.quill-wrapper');
                if (wrapper) {
                    var existingToolbars = wrapper.querySelectorAll('.ql-toolbar');
                    existingToolbars.forEach(function(tb) {
                        tb.remove();
                    });
                }
                
                // Reset the editor element to a clean state
                editorEl.className = '';
                editorEl.innerHTML = '';

                var quill = new Quill(editorEl, {
                    theme: 'snow',
                    placeholder: 'Ceritakan detail projek, fitur, dan tantangan yang dihadapi...',
                    modules: {
                        toolbar: [
                            [{ 'header': [1, 2, 3, false] }],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                            ['link', 'clean']
                        ]
                    }
                });

                // Load initial content (if any, e.g. from Laravel old input)
                if (inputEl.value) {
                    quill.root.innerHTML = inputEl.value;
                }

                // Sync data with hidden input on change
                quill.on('text-change', function() {
                    inputEl.value = quill.root.innerHTML === '<p><br></p>' ? '' : quill.root.innerHTML;
                });
            });
        }

        // Setup event listeners for standard load and SPA transitions (Livewire, Turbo, etc.)
        document.addEventListener('DOMContentLoaded', initQuill);
        document.addEventListener('livewire:navigated', initQuill);
        document.addEventListener('turbo:load', initQuill);
        document.addEventListener('turbolinks:load', initQuill);
        
        // Execute immediately (handles case where SPA swaps content and script runs instantly)
        initQuill();
    })();
</script>
@endsection