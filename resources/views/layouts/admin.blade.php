<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    <link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png">

    <!-- Preconnect CDN Hosts to speed up handshake in production -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Core Layout CSS (Critical) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Deferred / Non-blocking CSS (Non-critical) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" media="print" onload="this.media='all'">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">

    <style>
        /* --- 1. SETUP UTAMA (Dark Theme) --- */
        :root {
            --primary-color: #8b5cf6; /* Violet */
            --secondary-color: #06b6d4; /* Cyan */
            --bg-color: #0b0f19; /* Deeper Sleek Dark Navy */
            --glass-bg: #111827; /* Solid dark slate for dashboard cards */
            --glass-border: rgba(255, 255, 255, 0.05);
            --text-muted: #94a3b8;
        }
        body {
            background-color: var(--bg-color);
            font-family: 'Outfit', sans-serif;
            color: #f8fafc;
            padding-top: 100px;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--bg-color); }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--primary-color); }

        /* Grid Overlay Background */
        .grid-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.007) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.007) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: -1;
            pointer-events: none;
        }

        /* --- 2. BACKGROUND ANIMATION --- */
        .ambient-light { position: fixed; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: -1; pointer-events: none; }
        .blob { 
            position: absolute; 
            border-radius: 50%; 
            opacity: 0.35; 
            will-change: transform;
            backface-visibility: hidden;
            transform: translate3d(0, 0, 0);
        }
        .blob-1 { width: 500px; height: 500px; background: radial-gradient(circle, var(--primary-color) 0%, transparent 70%); top: -10%; left: -10%; }
        .blob-2 { width: 400px; height: 400px; background: radial-gradient(circle, var(--secondary-color) 0%, transparent 70%); bottom: -10%; right: -10%; }

        /* --- 3. NAVBAR GLASS --- */
        .navbar {
            background: rgba(11, 15, 25, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            padding: 20px 0;
            transition: background-color 0.2s ease, padding 0.2s ease;
            will-change: transform;
            transform: translate3d(0, 0, 0);
        }
        .navbar-brand { font-weight: 700; letter-spacing: 1px; color: white !important; }
        .nav-link { color: rgba(255,255,255,0.7) !important; transition: color 0.2s ease; font-weight: 500; }
        .nav-link:hover, .nav-link.active { color: #fff !important; text-shadow: 0 0 10px var(--secondary-color); }
        
        /* --- 4. CARD & TABLE GLASSMORPHISM --- */
        .glass-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            overflow: hidden;
            animation: fadeInUp 0.8s cubic-bezier(0.2, 1, 0.3, 1) forwards;
            opacity: 0; 
            transform: translate3d(0, 30px, 0);
            will-change: transform, opacity;
            backface-visibility: hidden;
            transition: border-color 0.2s ease;
        }
        .glass-card:hover {
            border-color: rgba(6, 182, 212, 0.15);
        }

        @keyframes fadeInUp { 
            to { 
                opacity: 1; 
                transform: translate3d(0, 0, 0); 
            } 
        }

        /* Table Overrides */
        .table { --bs-table-bg: transparent; --bs-table-color: #e2e8f0; margin-bottom: 0; }
        .table thead th {
            background-color: rgba(0, 0, 0, 0.3);
            color: #94a3b8;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            padding: 20px;
            border-bottom: 1px solid var(--glass-border);
        }
        .table tbody td {
            padding: 20px;
            vertical-align: middle;
            border-bottom: 1px solid var(--glass-border);
            color: white;
        }
        .table-responsive { border-radius: 24px; }

        /* Form Controls */
        .form-label { font-weight: 600; font-size: 0.9rem; color: #e2e8f0; }
        .form-control, .form-select {
            background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06);
            color: white !important; padding: 12px; border-radius: 12px; transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }
        .form-control:focus, .form-select:focus {
            background: rgba(255, 255, 255, 0.04); border-color: var(--secondary-color);
            box-shadow: 0 0 10px rgba(6, 182, 212, 0.15); outline: none;
        }
        .form-control::placeholder { color: rgba(255, 255, 255, 0.25); }
        
        /* Buttons */
        .btn-glow-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white; border: none; padding: 10px 25px; border-radius: 50px;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.25);
            transition: transform 0.2s ease, box-shadow 0.2s ease; font-weight: 600;
        }
        .btn-glow-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(6, 182, 212, 0.35); color: white; }

        .btn-action {
            width: 40px; height: 40px; border-radius: 12px;
            display: inline-flex; align-items: center; justify-content: center;
            border: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.05); color: white;
            transition: transform 0.2s ease, background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease; cursor: none;
        }
        .btn-action:hover { transform: scale(1.05); background: white; color: var(--bg-color); }
        .btn-delete:hover { background: #ef4444; color: white; border-color: #ef4444; }


        /* Restore native browser cursor and override any hidden cursors */
        * {
            cursor: auto !important;
        }
        a, button, [role="button"], input[type="submit"], input[type="button"], select, label, .ql-toolbar button, .ql-toolbar .ql-picker-label {
            cursor: pointer !important;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Grid overlay removed for rendering performance -->
    <div class="ambient-light">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
    </div>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.projects.index') }}">
                <i class="fas fa-layer-group text-primary me-2"></i> 
                <span>Admin<span class="text-primary">Panel</span></span>
            </a>
            
            <button class="navbar-toggler border-0 shadow-none text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarNav">
                <ul class="navbar-nav me-auto ms-lg-4 mb-3 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link @yield('nav_settings')" href="{{ route('admin.settings.edit') }}">Pengaturan Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('nav_projects')" href="{{ route('admin.projects.index') }}">Projek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('nav_experiences')" href="{{ route('admin.experiences.index') }}">Timeline</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('nav_skills')" href="{{ route('admin.skills.index') }}">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('nav_certifications')" href="{{ route('admin.certifications.index') }}">Sertifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @yield('nav_contacts')" href="{{ route('admin.contacts.index') }}">Pesan Masuk</a>
                    </li>
                </ul>
                
                <div class="d-flex flex-column flex-lg-row gap-2">
                    <a href="/" target="_blank" class="btn btn-outline-light btn-sm px-3 d-flex align-items-center justify-content-center" style="border-radius: 50px; opacity: 0.8; cursor: none;">
                        <i class="fas fa-external-link-alt me-2"></i> Web Utama
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-grid d-lg-block">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3 d-flex align-items-center justify-content-center w-100" style="cursor: none;">
                            Logout <i class="fas fa-sign-out-alt ms-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mb-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-lg text-white mb-4 animate__animated animate__fadeIn" role="alert" style="background: rgba(6, 182, 212, 0.2); border: 1px solid rgba(6, 182, 212, 0.4); backdrop-filter: blur(5px); border-radius: 16px;">
                <i class="fas fa-check-circle me-2 text-info"></i> {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" style="cursor: none;"></button>
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
