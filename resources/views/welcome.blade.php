<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }} — Full Stack Developer</title>
    <meta name="description" content="{{ $settings['about_bio'] ?? 'Portofolio Full Stack Developer Dimas Alva Rizki. Rekayasa perangkat lunak modern, arsitektur handal, dan desain interaktif berkelas dunia.' }}">
    <meta name="keywords" content="Dimas Alva Rizki, Apple Portfolio, Web Developer, Full Stack Developer, Laravel, Tailwind CSS, Software Engineer, Purwokerto">
    <meta name="author" content="{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }}">

    <!-- Open Graph & Twitter Cards -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }} — Full Stack Developer">
    <meta property="og:description" content="{{ $settings['about_bio'] ?? 'Portofolio Full Stack Developer Dimas Alva Rizki. Rekayasa perangkat lunak modern, arsitektur handal, dan desain interaktif berkelas dunia.' }}">
    <meta property="og:image" content="{{ asset('assets/dimas.png') }}">
    <meta property="og:site_name" content="{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }} Portfolio">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }} — Full Stack Developer">
    <meta name="twitter:description" content="{{ $settings['about_bio'] ?? 'Portofolio Full Stack Developer Dimas Alva Rizki. Rekayasa perangkat lunak modern, arsitektur handal, dan desain interaktif berkelas dunia.' }}">
    <meta name="twitter:image" content="{{ asset('assets/dimas.png') }}">

    <link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png">

    <!-- Fonts & Icons (Apple Typography Standard: Inter / SF Pro) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap 5 Grid System -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* ==========================================================================
           APPLE STYLE REFERENCE — FLOATING CAPSULE NAVBAR & DESIGN SYSTEM
           ========================================================================== */
        :root {
            /* Colors */
            --color-gallery-white: #ffffff;
            --color-studio-mist: #f5f5f7;
            --color-paper-frost: #fafafc;
            --color-hairline-silver: #d6d6d6;
            --color-border-card: #e5e5e7;
            --color-control-gray: #e6e6e8;
            --color-ink: #1d1d1f;
            --color-slate: #6e6e73;
            --color-steel: #86868b;
            --color-apple-blue: #0066cc;
            --color-pricing-blue: #0071e3;
            --color-launch-orange: #b64400;

            /* Typography */
            --font-family-apple: 'Inter', -apple-system, BlinkMacSystemFont, 'SF Pro Display', 'SF Pro Text', 'Helvetica Neue', Arial, sans-serif;
            
            /* Border Radii */
            --radius-cards: 28px;
            --radius-media: 20px;
            --radius-pills: 9999px;
            --radius-inputs: 980px;
            --radius-navigation: 20px;
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html {
            font-family: var(--font-family-apple);
            background-color: var(--color-gallery-white);
            color: var(--color-ink);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            scroll-behavior: smooth;
            text-rendering: optimizeLegibility;
        }

        body {
            background-color: var(--color-gallery-white);
            color: var(--color-ink);
            font-family: var(--font-family-apple);
            font-size: 17px;
            line-height: 1.5;
            letter-spacing: -0.022em;
            overflow-x: hidden;
        }

        /* --------------------------------------------------------------------------
           EXACT FLOATING APPLE PRODUCT LOCAL NAVIGATION BAR (20px radius)
           -------------------------------------------------------------------------- */
        .apple-floating-nav-wrapper {
            position: fixed;
            top: 16px;
            left: 0;
            right: 0;
            z-index: 1050;
            display: flex;
            justify-content: center;
            padding: 0 16px;
            pointer-events: none;
        }

        .apple-floating-nav {
            width: 100%;
            max-width: 980px;
            height: 52px;
            background-color: rgba(255, 255, 255, 0.88);
            backdrop-filter: saturate(180%) blur(20px);
            -webkit-backdrop-filter: saturate(180%) blur(20px);
            border: 1px solid var(--color-hairline-silver);
            border-radius: var(--radius-navigation);
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            pointer-events: auto;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .apple-floating-nav-title {
            font-size: 19px;
            font-weight: 600;
            line-height: 1.21;
            letter-spacing: 0.228px;
            color: var(--color-ink);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .apple-floating-nav-links {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .apple-floating-nav-link {
            font-size: 12px;
            font-weight: 400;
            line-height: 1.33;
            letter-spacing: -0.12px;
            color: var(--color-slate);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .apple-floating-nav-link:hover, .apple-floating-nav-link.active {
            color: var(--color-ink);
        }

        /* Outlined Explore Pill */
        .btn-explore-pill {
            background-color: transparent;
            color: var(--color-ink) !important;
            font-size: 12px;
            font-weight: 400;
            line-height: 16px;
            letter-spacing: -0.12px;
            border: 1px solid var(--color-steel);
            border-radius: 9999px;
            padding: 6px 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-explore-pill:hover {
            background-color: var(--color-studio-mist);
            border-color: var(--color-ink);
        }

        /* Pricing Blue Pill */
        .btn-pricing-blue-pill {
            background-color: var(--color-pricing-blue);
            color: #ffffff !important;
            font-size: 12px;
            font-weight: 400;
            line-height: 16px;
            letter-spacing: -0.12px;
            border-radius: 9999px;
            padding: 6px 16px;
            border: 1px solid transparent;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.15s ease;
            white-space: nowrap;
        }

        .btn-pricing-blue-pill:hover {
            background-color: #0077ed;
            transform: scale(1.02);
            color: #ffffff !important;
        }

        /* --------------------------------------------------------------------------
           TYPOGRAPHY & HERO
           -------------------------------------------------------------------------- */
        .apple-kicker {
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--color-launch-orange);
            display: inline-block;
            margin-bottom: 12px;
        }

        .apple-hero-headline {
            font-size: clamp(38px, 6vw, 76px);
            font-weight: 700;
            line-height: 1.06;
            letter-spacing: -0.035em;
            color: var(--color-ink);
            margin-bottom: 20px;
        }

        .apple-section-headline {
            font-size: clamp(30px, 4.5vw, 48px);
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -0.03em;
            color: var(--color-ink);
            margin-bottom: 12px;
        }

        .apple-lead-text {
            font-size: clamp(16px, 1.8vw, 20px);
            line-height: 1.5;
            letter-spacing: -0.015em;
            color: var(--color-slate);
            font-weight: 400;
        }

        .apple-body-muted {
            font-size: 15px;
            line-height: 1.5;
            color: var(--color-slate);
        }

        .apple-link-blue {
            color: var(--color-apple-blue);
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: -0.015em;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: opacity 0.2s ease;
        }

        .apple-link-blue:hover {
            text-decoration: underline;
            color: var(--color-apple-blue);
            opacity: 0.85;
        }

        .apple-link-blue .chevron {
            font-size: 16px;
            line-height: 1;
            transition: transform 0.2s ease;
        }

        .apple-link-blue:hover .chevron {
            transform: translateX(3px);
        }

        .btn-apple-primary {
            background-color: var(--color-pricing-blue);
            color: #ffffff !important;
            font-size: 14px;
            font-weight: 500;
            line-height: 1;
            letter-spacing: -0.01em;
            padding: 12px 24px;
            border-radius: var(--radius-pills);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            border: 1px solid transparent;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.15s ease;
            white-space: nowrap;
        }

        .btn-apple-primary:hover {
            background-color: #0077ed;
            transform: scale(1.02);
            color: #ffffff !important;
        }

        .btn-apple-secondary {
            background-color: var(--color-studio-mist);
            color: var(--color-ink) !important;
            font-size: 14px;
            font-weight: 500;
            line-height: 1;
            letter-spacing: -0.01em;
            padding: 12px 24px;
            border-radius: var(--radius-pills);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            border: 1px solid var(--color-border-card);
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .btn-apple-secondary:hover {
            background-color: #e8e8ed;
            border-color: #d2d2d7;
        }

        /* Hero Stage */
        .apple-hero-section {
            padding-top: 110px;
            padding-bottom: 0 !important;
            background-color: var(--color-gallery-white);
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        .apple-hero-container {
            max-width: 980px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .apple-hero-stage-visual {
            position: relative;
            max-width: 440px;
            margin: 40px auto 0;
            display: flex;
            justify-content: center;
            align-items: flex-end;
        }

        .apple-hero-edgefree-img {
            width: 100%;
            height: auto;
            max-height: 520px;
            display: block;
            object-fit: contain;
            border: none !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            background: transparent !important;
            margin-bottom: -1px;
        }

        .apple-hero-floating-callout {
            position: absolute;
            bottom: 24px;
            right: -60px;
            background-color: rgba(255, 255, 255, 0.92);
            backdrop-filter: saturate(180%) blur(20px);
            -webkit-backdrop-filter: saturate(180%) blur(20px);
            border: 1px solid var(--color-hairline-silver);
            border-radius: var(--radius-cards);
            padding: 12px 18px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.08);
            z-index: 10;
            text-align: left;
        }

        @media (max-width: 991px) {
            .apple-hero-floating-callout {
                position: static;
                margin: 20px auto 0;
                max-width: 320px;
                right: auto;
                bottom: auto;
            }
            .apple-floating-nav-links { display: none; }
        }

        /* --------------------------------------------------------------------------
           STATS, SECTIONS & CARDS
           -------------------------------------------------------------------------- */
        .apple-stats-bar {
            background-color: var(--color-studio-mist);
            border-top: 1px solid var(--color-border-card);
            border-bottom: 1px solid var(--color-border-card);
            padding: 36px 0;
        }

        .stat-number {
            font-size: clamp(28px, 3.5vw, 40px);
            font-weight: 700;
            letter-spacing: -0.03em;
            color: var(--color-ink);
            line-height: 1.1;
        }

        .stat-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--color-slate);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-top: 4px;
        }

        .apple-section-white {
            padding: 100px 0;
            background-color: var(--color-gallery-white);
        }

        .apple-section-mist {
            padding: 100px 0;
            background-color: var(--color-studio-mist);
        }

        .apple-card-white {
            background-color: var(--color-gallery-white);
            border: 1px solid var(--color-border-card);
            border-radius: var(--radius-cards);
            padding: 36px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .apple-card-white:hover {
            border-color: #d2d2d7;
            box-shadow: 0 16px 32px -8px rgba(0, 0, 0, 0.04);
        }

        .apple-pill-tag {
            background-color: var(--color-studio-mist);
            color: var(--color-ink);
            font-size: 12px;
            font-weight: 500;
            padding: 6px 14px;
            border-radius: var(--radius-pills);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid transparent;
            transition: all 0.2s ease;
        }

        .apple-pill-tag:hover {
            background-color: #e8e8ed;
            border-color: #d2d2d7;
        }

        .apple-media-frame {
            border-radius: var(--radius-media);
            overflow: hidden;
            background-color: var(--color-studio-mist);
            border: 1px solid var(--color-border-card);
            height: 220px;
            margin-bottom: 24px;
            position: relative;
        }

        .apple-media-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .apple-card-white:hover .apple-media-frame img {
            transform: scale(1.04);
        }

        .apple-filter-btn {
            background-color: transparent;
            color: var(--color-slate);
            border: 1px solid var(--color-border-card);
            border-radius: var(--radius-pills);
            padding: 8px 20px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .apple-filter-btn:hover {
            color: var(--color-ink);
            border-color: var(--color-hairline-silver);
            background-color: var(--color-gallery-white);
        }

        .apple-filter-btn.active {
            background-color: var(--color-ink);
            color: #ffffff;
            border-color: var(--color-ink);
        }

        .apple-timeline-box {
            background-color: var(--color-gallery-white);
            border: 1px solid var(--color-border-card);
            border-radius: 20px;
            padding: 24px;
            margin-bottom: 20px;
            transition: border-color 0.2s ease;
        }

        .apple-timeline-box:hover {
            border-color: #d2d2d7;
        }

        .apple-input-field {
            width: 100%;
            height: 50px;
            background-color: var(--color-gallery-white);
            border: 1px solid var(--color-border-card);
            border-radius: var(--radius-inputs);
            padding: 0 24px;
            font-family: var(--font-family-apple);
            font-size: 14px;
            color: var(--color-ink);
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .apple-input-field:focus {
            border-color: var(--color-pricing-blue);
            box-shadow: 0 0 0 3px rgba(0, 113, 227, 0.15);
        }

        .apple-textarea-field {
            width: 100%;
            background-color: var(--color-gallery-white);
            border: 1px solid var(--color-border-card);
            border-radius: 20px;
            padding: 16px 24px;
            font-family: var(--font-family-apple);
            font-size: 14px;
            color: var(--color-ink);
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            resize: vertical;
        }

        .apple-textarea-field:focus {
            border-color: var(--color-pricing-blue);
            box-shadow: 0 0 0 3px rgba(0, 113, 227, 0.15);
        }

        /* --------------------------------------------------------------------------
           APPLE INTELLIGENCE CHATBOT WIDGET
           -------------------------------------------------------------------------- */
        .apple-ai-trigger {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 52px;
            height: 52px;
            background-color: var(--color-gallery-white);
            border: 1px solid var(--color-border-card);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            z-index: 1050;
            color: var(--color-pricing-blue);
            font-size: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .apple-ai-trigger:hover {
            transform: scale(1.08);
            box-shadow: 0 14px 36px rgba(0, 0, 0, 0.12);
        }

        .apple-ai-window {
            position: fixed;
            bottom: 95px;
            right: 30px;
            width: 380px;
            height: 520px;
            background-color: var(--color-gallery-white);
            border: 1px solid var(--color-border-card);
            border-radius: var(--radius-cards);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 0 24px 48px rgba(0, 0, 0, 0.12);
            z-index: 1040;
            opacity: 0;
            transform: translateY(20px) scale(0.95);
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .apple-ai-window.active {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        .apple-ai-header {
            padding: 16px 20px;
            background-color: var(--color-paper-frost);
            border-bottom: 1px solid var(--color-border-card);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .apple-ai-body {
            flex-grow: 1;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            background-color: var(--color-gallery-white);
        }

        .chat-bubble-ai {
            background-color: var(--color-studio-mist);
            color: var(--color-ink);
            padding: 12px 16px;
            border-radius: 18px;
            border-bottom-left-radius: 4px;
            max-width: 85%;
            font-size: 14px;
            line-height: 1.45;
            align-self: flex-start;
        }

        .chat-bubble-user {
            background-color: var(--color-pricing-blue);
            color: #ffffff;
            padding: 12px 16px;
            border-radius: 18px;
            border-bottom-right-radius: 4px;
            max-width: 85%;
            font-size: 14px;
            line-height: 1.45;
            align-self: flex-end;
        }

        .typing-dots {
            display: none;
            padding: 10px 14px;
            background-color: var(--color-studio-mist);
            border-radius: 18px;
            align-self: flex-start;
        }

        .typing-dots span {
            display: inline-block;
            width: 6px;
            height: 6px;
            background-color: var(--color-slate);
            border-radius: 50%;
            margin: 0 2px;
            animation: bounce 1.4s infinite ease-in-out both;
        }

        .typing-dots span:nth-child(1) { animation-delay: -0.32s; }
        .typing-dots span:nth-child(2) { animation-delay: -0.16s; }

        @keyframes bounce {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }

        .apple-wa-pill {
            position: fixed;
            bottom: 30px;
            left: 30px;
            background-color: #25d366;
            color: #ffffff !important;
            padding: 10px 20px;
            border-radius: var(--radius-pills);
            font-size: 13px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            z-index: 1050;
            box-shadow: 0 8px 24px rgba(37, 211, 102, 0.25);
            transition: transform 0.2s ease;
        }

        .apple-wa-pill:hover {
            transform: scale(1.04);
            color: #ffffff !important;
        }

        .apple-footer-wrap {
            background-color: var(--color-studio-mist);
            border-top: 1px solid var(--color-border-card);
            padding: 50px 0 70px;
            font-size: 12px;
            color: var(--color-slate);
            line-height: 1.4;
        }
    </style>
</head>
<body>

    <!-- 1. FLOATING APPLE LOCAL NAVBAR (20px radius) -->
    <div class="apple-floating-nav-wrapper">
        <header class="apple-floating-nav">
            <a href="#home" class="apple-floating-nav-title">
                <span>{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }}</span>
            </a>

            <nav class="apple-floating-nav-links d-none d-md-flex">
                <a href="#about" class="apple-floating-nav-link">Tentang</a>
                <a href="#skills" class="apple-floating-nav-link">Keahlian</a>
                <a href="#experience" class="apple-floating-nav-link">Pengalaman</a>
                <a href="#certifications" class="apple-floating-nav-link">Sertifikasi</a>
                <a href="#projects" class="apple-floating-nav-link">Karya</a>
                <a href="#contact" class="apple-floating-nav-link">Kontak</a>
            </nav>

            <div class="d-flex align-items-center gap-2">
                @if(isset($settings['cv_link']) && $settings['cv_link'] !== '#')
                    <a href="{{ asset('storage/' . $settings['cv_link']) }}" download class="btn-explore-pill">
                        Explore
                    </a>
                @else
                    <a href="#about" class="btn-explore-pill">
                        Explore
                    </a>
                @endif

                <a href="#contact" class="btn-pricing-blue-pill">
                    View pricing
                </a>
            </div>
        </header>
    </div>

    <main id="home">
        <!-- 2. HERO SHOWCASE STAGE -->
        <section class="apple-hero-section" data-aos="fade-up">
            <div class="apple-hero-container">
                <div class="apple-kicker">
                    {{ $settings['hero_kicker'] ?? 'Baru • Full-Stack Developer & Software Engineer' }}
                </div>

                <h1 class="apple-hero-headline">
                    {{ $settings['hero_title'] ?? 'Membangun Solusi Web Berkelas Dunia.' }}
                </h1>

                <p class="apple-lead-text mx-auto mb-4" style="max-width: 680px;">
                    {{ $settings['hero_description'] ?? 'Mengubah ide dan konsep kompleks menjadi aplikasi web modular, berkinerja tinggi, dan berstandar internasional.' }}
                </p>

                <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap mb-4">
                    <a href="#projects" class="btn-apple-primary">
                        Eksplorasi Karya
                    </a>
                    @if(isset($settings['cv_link']) && $settings['cv_link'] !== '#')
                        <a href="{{ asset('storage/' . $settings['cv_link']) }}" download class="btn-apple-secondary">
                            Unduh CV <i class="fas fa-arrow-down ms-1" style="font-size: 11px;"></i>
                        </a>
                    @else
                        <a href="#about" class="btn-apple-secondary">
                            Lihat Profil
                        </a>
                    @endif
                    <a href="#contact" class="apple-link-blue ms-1">
                        <span>Konsultasi Proyek</span>
                        <span class="chevron">›</span>
                    </a>
                </div>

                <!-- Centerpiece Developer Visual (Edge-Free, Resting Flush to the Bottom) -->
                <div class="apple-hero-stage-visual">
                    <div class="apple-hero-floating-callout">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="d-inline-block rounded-circle bg-success" style="width: 8px; height: 8px;"></span>
                                <span style="font-size: 13px; font-weight: 600; color: var(--color-ink);">Tersedia untuk Kerja Sama</span>
                            </div>
                            <div style="font-size: 12px; color: var(--color-slate);">
                                IPK {{ $settings['about_gpa'] ?? '3.76' }} • Full-Stack Web Development
                            </div>
                        </div>
                        <a href="#contact" class="btn-pricing-blue-pill py-1 px-3">
                            Hubungi ›
                        </a>
                    </div>

                    <picture>
                        <source srcset="{{ asset('assets/dimas.webp') }}" type="image/webp">
                        <img src="{{ asset('assets/dimas.png') }}" alt="{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }}" class="apple-hero-edgefree-img" fetchpriority="high">
                    </picture>
                </div>
            </div>
        </section>

        <!-- 3. STATS SPEC BAR (Studio Mist) -->
        <section class="apple-stats-bar">
            <div class="container" style="max-width: 1080px;">
                <div class="row g-4 text-center">
                    <div class="col-6 col-md-3">
                        <div class="stat-number">{{ $settings['about_gpa'] ?? '3.76' }}</div>
                        <div class="stat-label">IPK Kumulatif</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-number">{{ count($projects) }}+</div>
                        <div class="stat-label">Projek Selesai</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-number">{{ count($certifications) }}</div>
                        <div class="stat-label">Sertifikasi Resmi</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Dedikasi Kualitas</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. ABOUT SECTION (Gallery White) -->
        <section class="apple-section-white" id="about" data-aos="fade-up">
            <div class="container" style="max-width: 1080px;">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-7">
                        <div class="apple-kicker">Profil & Filosofi</div>
                        <h2 class="apple-section-headline">
                            Kode bersih. Kinerja terukur. Detail yang sempurna.
                        </h2>
                        <p class="apple-lead-text mb-4" style="text-align: justify;">
                            {{ $settings['about_bio'] ?? 'Saya adalah mahasiswa Teknik Informatika di Universitas Muhammadiyah Purwokerto dengan spesialisasi pengembangan full-stack web. Berfokus pada pembangunan arsitektur aplikasi yang tangguh, aman, dan dirancang untuk memberikan pengalaman pengguna tanpa cela.' }}
                        </p>
                        <p class="apple-body-muted mb-0">
                            Pengalaman mencakup integrasi RESTful API, optimalisasi database, penerapan pola desain modern, serta tata letak antarmuka responsif yang memprioritaskan kemudahan akses di semua perangkat.
                        </p>
                    </div>

                    <div class="col-lg-5">
                        <div class="apple-card-white" style="background-color: var(--color-studio-mist);">
                            <div class="apple-kicker mb-3">Spesifikasi Pengembang</div>
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom" style="border-color: var(--color-border-card) !important;">
                                    <span class="apple-body-muted">Fokus Keahlian</span>
                                    <span class="fw-semibold text-dark" style="font-size: 14px;">Full-Stack Web</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom" style="border-color: var(--color-border-card) !important;">
                                    <span class="apple-body-muted">Institusi</span>
                                    <span class="fw-semibold text-dark" style="font-size: 14px;">Univ. Muhammadiyah Purwokerto</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2 border-bottom" style="border-color: var(--color-border-card) !important;">
                                    <span class="apple-body-muted">Prestasi Akademik</span>
                                    <span class="fw-semibold text-dark" style="font-size: 14px;">GPA {{ $settings['about_gpa'] ?? '3.76' }} / 4.00</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center py-2">
                                    <span class="apple-body-muted">Status Kerja</span>
                                    <span class="fw-semibold text-success d-flex align-items-center gap-1" style="font-size: 14px;">
                                        <span class="d-inline-block rounded-circle bg-success" style="width: 6px; height: 6px;"></span>
                                        Open for Hire
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 5. SKILLS & ARCHITECTURE MATRIX (Studio Mist) -->
        <section class="apple-section-mist" id="skills" data-aos="fade-up">
            <div class="container" style="max-width: 1080px;">
                <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-5">
                    <div>
                        <div class="apple-kicker">Spesifikasi Arsitektur</div>
                        <h2 class="apple-section-headline mb-0">Teknologi & Ekosistem.</h2>
                    </div>
                    <a href="#projects" class="apple-link-blue">
                        <span>Lihat Implementasi Proyek</span>
                        <span class="chevron">›</span>
                    </a>
                </div>

                <div class="row g-4">
                    @forelse($skills as $category => $items)
                        <div class="col-md-6 col-lg-4">
                            <div class="apple-card-white">
                                <div>
                                    <div class="apple-kicker mb-2">{{ $category }}</div>
                                    <h3 style="font-size: 20px; font-weight: 700; color: var(--color-ink); margin-bottom: 20px;">
                                        Stack Terpilih
                                    </h3>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($items as $item)
                                            <span class="apple-pill-tag">
                                                <i class="{{ $item->icon ?: 'fas fa-code' }} text-secondary" style="font-size: 12px;"></i>
                                                {{ $item->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="apple-card-white text-center py-5">
                                <p class="apple-body-muted mb-0">Belum ada data skill yang ditambahkan.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- 6. EXPERIENCE & EDUCATION (Gallery White) -->
        <section class="apple-section-white" id="experience" data-aos="fade-up">
            <div class="container" style="max-width: 1080px;">
                <div class="mb-5">
                    <div class="apple-kicker">Rekam Jejak</div>
                    <h2 class="apple-section-headline">Pengalaman & Pendidikan.</h2>
                </div>

                <div class="row g-5">
                    <!-- Left: Pengalaman Kerja -->
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <i class="fas fa-briefcase text-dark"></i>
                            <h3 style="font-size: 20px; font-weight: 700; color: var(--color-ink); margin: 0;">Pengalaman Kerja & Proyek</h3>
                        </div>

                        @php
                            $workTimeline = $timeline->where('type', '!=', 'education');
                        @endphp

                        @forelse($workTimeline as $item)
                            <div class="apple-timeline-box">
                                <div class="apple-kicker mb-1" style="font-size: 11px;">{{ $item->period }}</div>
                                <h4 style="font-size: 18px; font-weight: 700; color: var(--color-ink); margin-bottom: 4px;">{{ $item->title }}</h4>
                                <div style="font-size: 14px; font-weight: 500; color: var(--color-apple-blue); margin-bottom: 10px;">{{ $item->subtitle }}</div>
                                @if($item->description)
                                    <p class="apple-body-muted mb-0" style="text-align: justify; font-size: 14px;">{!! nl2br(e($item->description)) !!}</p>
                                @endif
                            </div>
                        @empty
                            <p class="apple-body-muted">Belum ada riwayat pengalaman.</p>
                        @endforelse
                    </div>

                    <!-- Right: Pendidikan Formal -->
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <i class="fas fa-graduation-cap text-dark"></i>
                            <h3 style="font-size: 20px; font-weight: 700; color: var(--color-ink); margin: 0;">Pendidikan</h3>
                        </div>

                        @php
                            $educationTimeline = $timeline->where('type', 'education');
                        @endphp

                        @forelse($educationTimeline as $item)
                            <div class="apple-timeline-box">
                                <div class="apple-kicker mb-1" style="font-size: 11px;">{{ $item->period }}</div>
                                <h4 style="font-size: 18px; font-weight: 700; color: var(--color-ink); margin-bottom: 4px;">{{ $item->title }}</h4>
                                <div style="font-size: 14px; font-weight: 500; color: var(--color-apple-blue); margin-bottom: 10px;">{{ $item->subtitle }}</div>
                                @if($item->description)
                                    <p class="apple-body-muted mb-0" style="text-align: justify; font-size: 14px;">{!! nl2br(e($item->description)) !!}</p>
                                @endif
                            </div>
                        @empty
                            <p class="apple-body-muted">Belum ada riwayat pendidikan.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. CERTIFICATIONS SHOWCASE (Studio Mist) -->
        <section class="apple-section-mist" id="certifications" data-aos="fade-up">
            <div class="container" style="max-width: 1080px;">
                <div class="mb-5">
                    <div class="apple-kicker">Validasi Resmi</div>
                    <h2 class="apple-section-headline">Sertifikasi Profesional.</h2>
                </div>

                <div class="row g-4">
                    @forelse($certifications as $cert)
                        <div class="col-md-6 col-lg-4">
                            <div class="apple-card-white">
                                <div>
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <i class="{{ $cert->icon ?: 'fas fa-certificate' }} text-dark fs-5"></i>
                                        <span class="apple-kicker mb-0">{{ $cert->year }}</span>
                                    </div>
                                    <h4 style="font-size: 18px; font-weight: 700; color: var(--color-ink); line-height: 1.3; margin-bottom: 8px;">
                                        {{ $cert->name }}
                                    </h4>
                                    <p class="apple-body-muted mb-4" style="font-size: 13px;">
                                        Penerbit: {{ $cert->issuer }}
                                    </p>
                                </div>
                                @if($cert->link)
                                    <div>
                                        <a href="{{ $cert->link }}" target="_blank" class="apple-link-blue" style="font-size: 13px;">
                                            <span>Verifikasi Kredensial</span>
                                            <span class="chevron">›</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="apple-card-white text-center py-5">
                                <p class="apple-body-muted mb-0">Belum ada data sertifikasi.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <!-- 8. PROJECTS SHOWCASE (Gallery White) -->
        <section class="apple-section-white" id="projects" data-aos="fade-up">
            <div class="container" style="max-width: 1080px;">
                <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
                    <div>
                        <div class="apple-kicker">Galeri Inovasi</div>
                        <h2 class="apple-section-headline mb-0">Karya Unggulan.</h2>
                    </div>
                    @if(isset($settings['github_link']))
                        <a href="{{ $settings['github_link'] }}" target="_blank" class="apple-link-blue">
                            <span>Koleksi Lengkap di GitHub</span>
                            <span class="chevron">›</span>
                        </a>
                    @endif
                </div>

                <!-- Filter Controls -->
                <div class="d-flex flex-wrap gap-2 mb-5">
                    <button class="apple-filter-btn active" data-filter="all">Semua</button>
                    @php
                        $categories = collect($projects)->pluck('category')->unique()->filter()->values();
                    @endphp
                    @foreach($categories as $category)
                        <button class="apple-filter-btn" data-filter="{{ $category }}">{{ $category }}</button>
                    @endforeach
                </div>

                <!-- Projects Grid -->
                <div class="row g-4" id="projects-grid">
                    @foreach($projects as $index => $project)
                        <div class="col-md-6 col-lg-4 project-item filter-item" data-category="{{ $project->category }}" data-id="{{ $project->id }}">
                            <div class="apple-card-white">
                                <div>
                                    <!-- Media Frame -->
                                    <div class="apple-media-frame">
                                        <img src="{{ asset('storage/' . $project->image_url) }}" alt="{{ $project->title }}" loading="lazy">
                                    </div>

                                    <div class="apple-kicker mb-1" style="font-size: 11px;">
                                        {{ $project->category }}
                                    </div>

                                    <h4 style="font-size: 20px; font-weight: 700; color: var(--color-ink); margin-bottom: 8px;">
                                        {{ $project->title }}
                                    </h4>

                                    <p class="apple-body-muted mb-3" style="text-align: justify; font-size: 14px;">
                                        {{ Str::limit(strip_tags($project->description), 95) }}
                                    </p>

                                    <!-- Tech tags -->
                                    <div class="d-flex flex-wrap gap-1 mb-4">
                                        @if(is_array($project->tech_stack))
                                            @foreach($project->tech_stack as $tech)
                                                <span class="apple-pill-tag" style="font-size: 11px; padding: 3px 10px;">
                                                    {{ trim($tech) }}
                                                </span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="d-flex align-items-center gap-2 pt-3 border-top" style="border-color: var(--color-border-card) !important;">
                                    <a href="{{ route('project.show', $project->id) }}" class="btn-explore-pill flex-grow-1 text-center py-2">
                                        Detail
                                    </a>

                                    @if($project->link_demo)
                                        <a href="{{ $project->link_demo }}" target="_blank" class="btn-pricing-blue-pill flex-grow-1 text-center py-2">
                                            Live Demo ›
                                        </a>
                                    @else
                                        <span class="btn-explore-pill flex-grow-1 text-center py-2 opacity-50" style="cursor: not-allowed;">
                                            Privat
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Load More Button -->
                @if(count($projects) > 6)
                    <div class="text-center mt-5" id="load-more-container">
                        <button id="load-more-btn" class="btn-apple-secondary px-4 py-2">
                            <span id="load-more-btn-text">Tampilkan Lebih Banyak</span>
                            <i class="fas fa-chevron-down ms-1" id="load-more-btn-icon"></i>
                        </button>
                    </div>
                @endif
            </div>
        </section>

        <!-- 9. CONTACT SECTION (Studio Mist) -->
        <section class="apple-section-mist" id="contact" data-aos="fade-up">
            <div class="container" style="max-width: 1080px;">
                <div class="row g-5 align-items-center">
                    <!-- Left: Contact Editorial Info -->
                    <div class="col-lg-5">
                        <div class="apple-kicker">Mulai Percakapan</div>
                        <h2 class="apple-section-headline mb-4">Wujudkan Ide Digital Anda.</h2>
                        <p class="apple-lead-text mb-4">
                            Siap berdiskusi mengenai proyek web, pengembangan sistem baru, atau peluang kerja sama teknologi.
                        </p>

                        <div class="d-flex flex-column gap-3 mb-4">
                            @if(isset($settings['email_address']))
                                <a href="mailto:{{ $settings['email_address'] }}" class="apple-link-blue">
                                    <i class="fas fa-envelope me-2 text-dark"></i>
                                    <span>{{ $settings['email_address'] }}</span>
                                    <span class="chevron">›</span>
                                </a>
                            @endif

                            @if(isset($settings['github_link']))
                                <a href="{{ $settings['github_link'] }}" target="_blank" class="apple-link-blue">
                                    <i class="fab fa-github me-2 text-dark"></i>
                                    <span>github.com/dimasalvarizki</span>
                                    <span class="chevron">›</span>
                                </a>
                            @endif

                            @if(isset($settings['linkedin_link']))
                                <a href="{{ $settings['linkedin_link'] }}" target="_blank" class="apple-link-blue">
                                    <i class="fab fa-linkedin me-2 text-dark"></i>
                                    <span>LinkedIn Profil</span>
                                    <span class="chevron">›</span>
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Right: Form (28px White Card) -->
                    <div class="col-lg-7">
                        <div class="apple-card-white p-4 p-md-5">
                            @if(session('success'))
                                <div class="alert alert-success border-0 mb-4 rounded-4" style="background-color: #e6f4ea; color: #137333; font-size: 14px;">
                                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                                </div>
                            @endif

                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="apple-body-muted d-block mb-2 fw-medium">Nama Lengkap</label>
                                    <input type="text" name="name" class="apple-input-field" placeholder="Masukkan nama Anda" required>
                                </div>

                                <div class="mb-3">
                                    <label class="apple-body-muted d-block mb-2 fw-medium">Alamat Email</label>
                                    <input type="email" name="email" class="apple-input-field" placeholder="nama@email.com" required>
                                </div>

                                <div class="mb-4">
                                    <label class="apple-body-muted d-block mb-2 fw-medium">Pesan</label>
                                    <textarea name="message" class="apple-textarea-field" rows="4" placeholder="Ceritakan detail proyek atau pertanyaan Anda..." required></textarea>
                                </div>

                                <button type="submit" class="btn-apple-primary w-100 py-3" style="font-size: 14px;">
                                    Kirim Pesan Melalui Sistem ›
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- 10. APPLE INTELLIGENCE CHATBOT WIDGET -->
    <button class="apple-ai-trigger" id="chat-widget-toggle" title="Chat dengan DimasBot AI">
        <i class="fas fa-sparkles"></i>
    </button>

    <div class="apple-ai-window" id="chat-widget-window">
        <div class="apple-ai-header">
            <div class="d-flex align-items-center gap-2">
                <i class="fas fa-sparkles text-primary"></i>
                <div>
                    <div style="font-size: 14px; font-weight: 600; color: var(--color-ink);">DimasBot Intelligence</div>
                    <div class="apple-kicker mb-0" style="font-size: 10px;">Asisten Portofolio</div>
                </div>
            </div>
            <button class="btn-close" id="chat-widget-close" aria-label="Tutup"></button>
        </div>

        <div class="apple-ai-body" id="aiChatBody">
            <div class="chat-bubble-ai" id="bot-welcome-msg">
                Halo! Saya asisten virtual portofolio Dimas Alva Rizki. Ada yang ingin Anda tanyakan seputar pengalaman, keahlian, atau kolaborasi proyek?
            </div>
            <div class="typing-dots" id="typingIndicator">
                <span></span><span></span><span></span>
            </div>
        </div>

        <div class="p-3 border-top" style="background-color: var(--color-paper-frost); border-color: var(--color-border-card) !important;">
            <div class="d-flex gap-2">
                <input type="text" class="apple-input-field" id="aiChatInput" placeholder="Tanyakan seputar keahlian atau projek..." style="height: 42px; font-size: 13px;">
                <button class="btn-apple-primary px-3" id="aiChatSubmit" style="height: 42px; border-radius: 50%; width: 42px; padding: 0;">
                    <i class="fas fa-arrow-up"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- 11. FLOATING WHATSAPP BUTTON -->
    <a href="https://wa.me/{{ $settings['wa_number'] ?? '6281225692689' }}" target="_blank" class="apple-wa-pill" title="Hubungi via WhatsApp">
        <i class="fab fa-whatsapp"></i>
        <span>WhatsApp</span>
    </a>

    <!-- 12. FOOTER (Studio Mist) -->
    <footer class="apple-footer-wrap">
        <div class="container" style="max-width: 1080px;">
            <div class="row g-4 mb-4">
                <div class="col-md-6">
                    <div class="fw-bold text-dark mb-1">{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }}</div>
                    <p class="mb-0 apple-body-muted" style="font-size: 13px;">
                        Full Stack Web Developer & Software Engineer. Dirancang dengan presisi galeri Apple Style Reference.
                    </p>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="d-flex gap-3 justify-content-md-end">
                        <a href="#about" class="text-secondary text-decoration-none">Tentang</a>
                        <a href="#skills" class="text-secondary text-decoration-none">Keahlian</a>
                        <a href="#projects" class="text-secondary text-decoration-none">Karya</a>
                        <a href="#contact" class="text-secondary text-decoration-none">Kontak</a>
                    </div>
                </div>
            </div>

            <div class="pt-3 border-top d-flex justify-content-between flex-wrap gap-2" style="border-color: var(--color-border-card) !important;">
                <div>
                    Copyright &copy; {{ date('Y') }} {{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }}. All rights reserved.
                </div>
                <div>
                    Indonesia • Purwokerto
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof AOS !== 'undefined') {
                AOS.init({ once: true, offset: 30, duration: 600 });
            }

            // Project Filter Logic
            const filterButtons = document.querySelectorAll('.apple-filter-btn');
            const projectItems = Array.from(document.querySelectorAll('.project-item'));
            const loadMoreBtn = document.getElementById('load-more-btn');
            const loadMoreBtnText = document.getElementById('load-more-btn-text');
            const loadMoreBtnIcon = document.getElementById('load-more-btn-icon');
            const loadMoreContainer = document.getElementById('load-more-container');
            
            let activeFilter = 'all';
            const itemsToShow = 6;
            let isExpanded = false;

            function updateProjectVisibility() {
                const filteredItems = projectItems.filter(item => {
                    const itemCategory = item.getAttribute('data-category').toLowerCase().trim();
                    return activeFilter === 'all' || itemCategory.includes(activeFilter) || activeFilter.includes(itemCategory);
                });

                projectItems.forEach(item => {
                    item.style.display = 'none';
                });

                const limit = isExpanded ? filteredItems.length : Math.min(itemsToShow, filteredItems.length);
                for (let i = 0; i < limit; i++) {
                    filteredItems[i].style.display = 'block';
                }

                if (loadMoreContainer) {
                    if (filteredItems.length > itemsToShow) {
                        loadMoreContainer.style.setProperty('display', 'block', 'important');
                        if (isExpanded) {
                            if (loadMoreBtnText) loadMoreBtnText.textContent = 'Tampilkan Lebih Sedikit';
                            if (loadMoreBtnIcon) loadMoreBtnIcon.className = 'fas fa-chevron-up ms-1';
                        } else {
                            if (loadMoreBtnText) loadMoreBtnText.textContent = 'Tampilkan Lebih Banyak';
                            if (loadMoreBtnIcon) loadMoreBtnIcon.className = 'fas fa-chevron-down ms-1';
                        }
                    } else {
                        loadMoreContainer.style.setProperty('display', 'none', 'important');
                    }
                }
            }

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    activeFilter = button.getAttribute('data-filter').toLowerCase().trim();
                    isExpanded = false;
                    updateProjectVisibility();
                });
            });

            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', () => {
                    isExpanded = !isExpanded;
                    updateProjectVisibility();
                    if (!isExpanded) {
                        const projectsSec = document.getElementById('projects');
                        if (projectsSec) projectsSec.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            }

            updateProjectVisibility();

            // AI Chatbot Widget Logic
            const chatToggle = document.getElementById('chat-widget-toggle');
            const chatClose = document.getElementById('chat-widget-close');
            const chatWindow = document.getElementById('chat-widget-window');
            const aiChatInput = document.getElementById('aiChatInput');
            const aiChatSubmit = document.getElementById('aiChatSubmit');
            const aiChatBody = document.getElementById('aiChatBody');
            const typingIndicator = document.getElementById('typingIndicator');

            let conversationHistory = [];

            if (chatToggle) {
                chatToggle.addEventListener('click', () => {
                    chatWindow.classList.toggle('active');
                });
            }

            if (chatClose) {
                chatClose.addEventListener('click', () => {
                    chatWindow.classList.remove('active');
                });
            }

            async function sendMessage() {
                const userText = aiChatInput.value.trim();
                if (!userText) return;

                appendMessage(userText, 'chat-bubble-user');
                aiChatInput.value = '';

                typingIndicator.style.display = 'inline-block';
                aiChatBody.appendChild(typingIndicator);
                aiChatBody.scrollTop = aiChatBody.scrollHeight;

                conversationHistory.push({ role: 'user', content: userText });

                try {
                    const response = await fetch('/api/chatbot', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                        },
                        body: JSON.stringify({
                            messages: conversationHistory,
                            locale: 'id'
                        })
                    });

                    if (!response.ok) throw new Error('API Error');

                    const data = await response.json();
                    const aiResponse = data.choices[0].message.content;

                    conversationHistory.push({ role: 'assistant', content: aiResponse });

                    typingIndicator.style.display = 'none';
                    appendMessage(aiResponse, 'chat-bubble-ai', true);

                } catch (err) {
                    console.error(err);
                    typingIndicator.style.display = 'none';
                    appendMessage('Maaf, koneksi saya sedang terganggu. Silakan hubungi Dimas langsung via form kontak atau WhatsApp.', 'chat-bubble-ai');
                }
            }

            function appendMessage(text, className, isMarkdown = false) {
                const msgDiv = document.createElement('div');
                msgDiv.className = className;
                if (isMarkdown && typeof marked !== 'undefined') {
                    msgDiv.innerHTML = marked.parse(text);
                } else {
                    msgDiv.innerText = text;
                }
                aiChatBody.insertBefore(msgDiv, typingIndicator);
                aiChatBody.scrollTop = aiChatBody.scrollHeight;
            }

            if (aiChatSubmit) aiChatSubmit.addEventListener('click', sendMessage);
            if (aiChatInput) {
                aiChatInput.addEventListener('keypress', (e) => {
                    if (e.key === 'Enter') sendMessage();
                });
            }
        });
    </script>
</body>
</html>