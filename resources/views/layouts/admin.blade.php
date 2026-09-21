<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <link rel="icon" href="{{ asset('assets/favicon.svg') }}" type="image/svg+xml">
    <link rel="alternate icon" href="{{ asset('assets/favicon.png') }}" type="image/png">

    <!-- Preconnect CDN Hosts -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Core Layout CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* --- APPLE STYLE REFERENCE TOKENS --- */
        :root {
            --color-gallery-white: #ffffff;
            --color-studio-mist: #f5f5f7;
            --color-paper-frost: #fafafc;
            --color-hairline-silver: #d6d6d6;
            --color-control-gray: #e6e6e8;
            --color-ink: #1d1d1f;
            --color-slate: #707070;
            --color-steel: #86868b;
            --color-apple-blue: #0066cc;
            --color-pricing-blue: #0071e3;
            --color-launch-orange: #b64400;

            --font-sf-pro: -apple-system, BlinkMacSystemFont, "SF Pro Display", "SF Pro Text", "Inter", "Helvetica Neue", sans-serif;
            
            --radius-cards: 28px;
            --radius-navigation: 20px;
            --radius-inputs: 980px;
            --radius-inputs-box: 18px;
            --radius-buttons: 9999px;
            --radius-pills: 36px;
        }

        * {
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
            cursor: auto;
        }

        a, button, [role="button"], input[type="submit"], select, label, .btn {
            cursor: pointer !important;
        }

        body {
            background-color: var(--color-studio-mist);
            font-family: var(--font-sf-pro);
            color: var(--color-ink);
            padding-top: 100px;
            min-height: 100vh;
            overflow-x: hidden;
            letter-spacing: -0.015em;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: var(--color-studio-mist); }
        ::-webkit-scrollbar-thumb { background: var(--color-hairline-silver); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--color-steel); }

        /* --- APPLE NAVIGATION BAR --- */
        .apple-navbar {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--color-hairline-silver);
            padding: 12px 0;
            transition: all 0.2s ease;
            z-index: 1040;
        }

        .navbar-brand-apple {
            font-size: 16px;
            font-weight: 600;
            color: var(--color-ink) !important;
            letter-spacing: -0.224px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-brand-apple .apple-logo-badge {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: var(--color-studio-mist);
            border: 1px solid var(--color-hairline-silver);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            color: var(--color-ink);
        }

        .nav-link-apple {
            color: var(--color-slate) !important;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: -0.12px;
            padding: 6px 14px !important;
            border-radius: var(--radius-buttons);
            transition: all 0.15s ease;
            text-decoration: none;
        }

        .nav-link-apple:hover {
            color: var(--color-ink) !important;
            background-color: var(--color-control-gray);
        }

        .nav-link-apple.active {
            color: var(--color-ink) !important;
            background-color: var(--color-control-gray);
            font-weight: 600;
        }

        /* --- BUTTONS --- */
        .btn-pricing-blue, .btn-glow-primary, .btn-glow-edit {
            background-color: var(--color-pricing-blue) !important;
            color: var(--color-gallery-white) !important;
            border: none !important;
            border-radius: var(--radius-buttons) !important;
            padding: 8px 18px !important;
            font-size: 13px !important;
            font-weight: 500 !important;
            letter-spacing: -0.12px !important;
            box-shadow: none !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            text-decoration: none;
            transition: background-color 0.15s ease, transform 0.1s ease;
        }

        .btn-pricing-blue:hover, .btn-glow-primary:hover, .btn-glow-edit:hover {
            background-color: #0077ed !important;
            color: var(--color-gallery-white) !important;
        }

        .btn-pricing-blue:active, .btn-glow-primary:active, .btn-glow-edit:active {
            transform: scale(0.98);
        }

        .btn-outline-explore {
            background: transparent !important;
            color: var(--color-ink) !important;
            border: 1px solid var(--color-steel) !important;
            border-radius: var(--radius-buttons) !important;
            font-size: 12px !important;
            font-weight: 400 !important;
            letter-spacing: -0.12px !important;
            padding: 6px 14px !important;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            transition: all 0.15s ease;
        }

        .btn-outline-explore:hover {
            border-color: var(--color-ink) !important;
            background-color: var(--color-paper-frost) !important;
            color: var(--color-ink) !important;
        }

        .btn-glass-cancel {
            background: transparent !important;
            color: var(--color-slate) !important;
            border: 1px solid var(--color-hairline-silver) !important;
            border-radius: var(--radius-buttons) !important;
            font-size: 13px !important;
            font-weight: 500 !important;
            letter-spacing: -0.12px !important;
            padding: 8px 20px !important;
            text-decoration: none;
            transition: all 0.15s ease;
        }

        .btn-glass-cancel:hover {
            background: var(--color-control-gray) !important;
            color: var(--color-ink) !important;
            border-color: var(--color-steel) !important;
        }

        .btn-logout-pill {
            background: transparent !important;
            color: #d70015 !important;
            border: 1px solid rgba(215, 0, 21, 0.3) !important;
            border-radius: var(--radius-buttons) !important;
            font-size: 12px !important;
            font-weight: 500 !important;
            padding: 6px 14px !important;
            transition: all 0.15s ease;
        }

        .btn-logout-pill:hover {
            background: rgba(215, 0, 21, 0.08) !important;
            border-color: #d70015 !important;
        }

        .btn-action {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--color-hairline-silver);
            background: var(--color-gallery-white);
            color: var(--color-ink);
            text-decoration: none;
            transition: all 0.15s ease;
            font-size: 13px;
        }

        .btn-action:hover {
            border-color: var(--color-pricing-blue);
            color: var(--color-pricing-blue);
            background: var(--color-studio-mist);
        }

        .btn-action.btn-delete:hover {
            border-color: #d70015;
            color: #d70015;
            background: rgba(215, 0, 21, 0.06);
        }

        /* --- APPLE CARDS & SURFACES --- */
        .glass-card, .apple-card {
            background: var(--color-gallery-white) !important;
            border: 1px solid var(--color-hairline-silver) !important;
            border-radius: var(--radius-cards) !important;
            box-shadow: none !important;
            overflow: hidden;
            margin-bottom: 24px;
        }

        /* Section Header */
        .page-header-title {
            font-size: 28px;
            font-weight: 600;
            letter-spacing: -0.5px;
            color: var(--color-ink);
            margin-bottom: 4px;
        }

        .page-header-subtitle {
            font-size: 14px;
            color: var(--color-slate);
            letter-spacing: -0.224px;
            margin-bottom: 0;
        }

        /* --- TABLE STYLING --- */
        .table {
            --bs-table-bg: transparent;
            --bs-table-color: var(--color-ink);
            margin-bottom: 0;
            width: 100%;
        }

        .table thead th {
            background-color: var(--color-studio-mist) !important;
            color: var(--color-slate) !important;
            font-size: 11px !important;
            font-weight: 600 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.04em !important;
            padding: 14px 20px !important;
            border-bottom: 1px solid var(--color-hairline-silver) !important;
            border-top: none !important;
        }

        .table tbody td {
            background-color: var(--color-gallery-white) !important;
            color: var(--color-ink) !important;
            padding: 16px 20px !important;
            font-size: 14px !important;
            letter-spacing: -0.224px !important;
            border-bottom: 1px solid var(--color-studio-mist) !important;
            vertical-align: middle;
        }

        .table tbody tr:hover td {
            background-color: var(--color-paper-frost) !important;
        }

        .table tbody tr:last-child td {
            border-bottom: none !important;
        }

        /* --- FORM CONTROLS --- */
        .form-label {
            font-weight: 600;
            font-size: 13px;
            letter-spacing: -0.12px;
            color: var(--color-ink);
            margin-bottom: 6px;
        }

        .form-control, .form-select {
            background-color: var(--color-gallery-white) !important;
            border: 1px solid var(--color-hairline-silver) !important;
            color: var(--color-ink) !important;
            padding: 10px 16px;
            border-radius: var(--radius-inputs);
            font-size: 14px;
            letter-spacing: -0.224px;
            font-family: var(--font-sf-pro);
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        textarea.form-control {
            border-radius: var(--radius-inputs-box) !important;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--color-pricing-blue) !important;
            box-shadow: 0 0 0 3px rgba(0, 113, 227, 0.15) !important;
            outline: none;
        }

        .form-control::placeholder {
            color: var(--color-steel);
        }

        .form-control[type="file"] {
            border-radius: var(--radius-inputs-box);
            padding: 8px 12px;
        }

        .form-control[type="file"]::file-selector-button {
            background: var(--color-studio-mist);
            color: var(--color-ink);
            border: 1px solid var(--color-hairline-silver);
            border-radius: 9999px;
            padding: 4px 12px;
            font-size: 12px;
            font-weight: 500;
            margin-right: 12px;
            cursor: pointer;
        }

        /* --- BADGES --- */
        .badge-apple-soft {
            background-color: var(--color-studio-mist);
            color: var(--color-ink);
            border: 1px solid var(--color-hairline-silver);
            font-size: 11px;
            font-weight: 500;
            letter-spacing: -0.12px;
            padding: 4px 10px;
            border-radius: 9999px;
            display: inline-block;
        }

        .badge-apple-blue {
            background-color: rgba(0, 113, 227, 0.08);
            color: var(--color-pricing-blue);
            border: 1px solid rgba(0, 113, 227, 0.2);
            font-size: 11px;
            font-weight: 500;
            letter-spacing: -0.12px;
            padding: 4px 10px;
            border-radius: 9999px;
            display: inline-block;
        }

        .badge-apple-green {
            background-color: rgba(52, 199, 89, 0.1);
            color: #248a3d;
            border: 1px solid rgba(52, 199, 89, 0.25);
            font-size: 11px;
            font-weight: 500;
            letter-spacing: -0.12px;
            padding: 4px 10px;
            border-radius: 9999px;
            display: inline-block;
        }

        /* --- ALERTS --- */
        .apple-alert {
            background-color: var(--color-gallery-white);
            border: 1px solid var(--color-hairline-silver);
            border-left: 4px solid var(--color-pricing-blue);
            border-radius: 16px;
            padding: 14px 18px;
            color: var(--color-ink);
            font-size: 14px;
            letter-spacing: -0.224px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .apple-alert-success {
            border-left-color: #34c759;
        }

        /* --- LINK STYLING --- */
        .apple-link {
            color: var(--color-apple-blue);
            text-decoration: none;
            transition: color 0.15s ease;
        }

        .apple-link:hover {
            color: #0055b3;
            text-decoration: underline;
        }

        /* --- RESPONSIVE OPTIMIZATIONS --- */
        @media (max-width: 991px) {
            .navbar-collapse {
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: saturate(180%) blur(20px);
                -webkit-backdrop-filter: saturate(180%) blur(20px);
                border: 1px solid var(--color-hairline-silver);
                border-radius: 18px;
                padding: 16px;
                box-shadow: 0 12px 32px rgba(0, 0, 0, 0.08);
            }
            .nav-link-apple {
                padding: 10px 14px !important;
                border-radius: 10px;
            }
        }

        @media (max-width: 768px) {
            .page-header-title {
                font-size: 22px;
            }
            .glass-card, .apple-card {
                border-radius: 20px !important;
            }
            .table tbody td, .table thead th {
                padding: 12px 14px !important;
                font-size: 13px !important;
            }
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Apple Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg apple-navbar fixed-top">
        <div class="container">
            <a class="navbar-brand-apple" href="{{ route('admin.projects.index') }}">
                <span class="apple-logo-badge">
                    <i class="fas fa-sliders"></i>
                </span>
                <span>Dimas <strong>Console</strong></span>
            </a>
            
            <button class="navbar-toggler border-0 shadow-none p-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-bars" style="color: var(--color-ink);"></i>
            </button>

            <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarNav">
                <ul class="navbar-nav me-auto ms-lg-4 mb-3 mb-lg-0 gap-1">
                    <li class="nav-item">
                        <a class="nav-link-apple @yield('nav_settings')" href="{{ route('admin.settings.edit') }}">Pengaturan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-apple @yield('nav_projects')" href="{{ route('admin.projects.index') }}">Projek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-apple @yield('nav_experiences')" href="{{ route('admin.experiences.index') }}">Timeline</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-apple @yield('nav_skills')" href="{{ route('admin.skills.index') }}">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-apple @yield('nav_certifications')" href="{{ route('admin.certifications.index') }}">Sertifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-apple @yield('nav_contacts')" href="{{ route('admin.contacts.index') }}">Pesan Masuk</a>
                    </li>
                </ul>
                
                <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-2">
                    <a href="/" target="_blank" class="btn-outline-explore">
                        <i class="fas fa-arrow-up-right-from-square" style="font-size: 11px;"></i> Web Utama
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-grid d-lg-block m-0">
                        @csrf
                        <button type="submit" class="btn-logout-pill w-100">
                            Keluar <i class="fas fa-arrow-right-from-bracket ms-1" style="font-size: 11px;"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Workspace Container -->
    <div class="container mb-5">
        @if(session('success'))
            <div class="apple-alert apple-alert-success alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center gap-2">
                    <i class="fas fa-check-circle text-success fs-5"></i>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script>
        window.refreshInteractives = function() {};
    </script>
    @yield('scripts')
</body>
</html>
