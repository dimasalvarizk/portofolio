<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }}</title>
    <meta name="description" content="{{ $settings['about_bio'] ?? 'Portofolio Full Stack Developer Dimas Alva Rizki. Rekayasa perangkat lunak modern, arsitektur handal, dan desain interaktif berkelas dunia.' }}">
    <meta name="keywords" content="Dimas Alva Rizki, Apple Portfolio, Web Developer, Full Stack Developer, Laravel, Tailwind CSS, Software Engineer, Purwokerto">
    <meta name="author" content="{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }}">

    <!-- Open Graph & Twitter Cards -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }}">
    <meta property="og:description" content="{{ $settings['about_bio'] ?? 'Portofolio Full Stack Developer Dimas Alva Rizki. Rekayasa perangkat lunak modern, arsitektur handal, dan desain interaktif berkelas dunia.' }}">
    <meta property="og:image" content="{{ asset('assets/dimasdimas.png') }}">
    <meta property="og:site_name" content="{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }}">
    <meta name="twitter:description" content="{{ $settings['about_bio'] ?? 'Portofolio Full Stack Developer Dimas Alva Rizki. Rekayasa perangkat lunak modern, arsitektur handal, dan desain interaktif berkelas dunia.' }}">
    <meta name="twitter:image" content="{{ asset('assets/dimasdimas.png') }}">

    <link rel="icon" href="{{ asset('assets/favicon.svg') }}" type="image/svg+xml">
    <link rel="alternate icon" href="{{ asset('assets/favicon.png') }}" type="image/png">

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
            font-size: clamp(28px, 5.2vw, 64px);
            font-weight: 700;
            line-height: 1.15;
            letter-spacing: -0.035em;
            color: var(--color-ink);
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 100%;
            min-height: 1.25em;
        }

        .apple-rotator-viewport {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            position: relative;
            min-height: 1.25em;
            max-width: 100%;
            overflow: hidden;
            vertical-align: middle;
            padding: 4px 12px;
        }

        .apple-rotator-item {
            display: inline-block;
            background: linear-gradient(135deg, #1d1d1f 0%, #3a3a3c 65%, #0071e3 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            will-change: transform, opacity, filter;
            transition: transform 0.65s cubic-bezier(0.16, 1, 0.3, 1),
                        opacity 0.65s cubic-bezier(0.16, 1, 0.3, 1),
                        filter 0.65s cubic-bezier(0.16, 1, 0.3, 1);
            backface-visibility: hidden;
            transform: translate3d(0, 0, 0);
            white-space: nowrap;
        }

        .apple-rotator-item.slide-out-right {
            transform: translate3d(70px, 0, 0);
            opacity: 0;
            filter: blur(8px);
            position: absolute;
            pointer-events: none;
        }

        .apple-rotator-item.slide-in-left {
            transform: translate3d(-70px, 0, 0);
            opacity: 0;
            filter: blur(8px);
            position: absolute;
        }

        .apple-rotator-item.active {
            transform: translate3d(0, 0, 0);
            opacity: 1;
            filter: blur(0px);
            position: relative;
        }

        @media (max-width: 768px) {
            .apple-hero-headline {
                font-size: clamp(24px, 6.2vw, 36px);
                min-height: 1.35em;
            }
            .apple-rotator-viewport {
                min-height: 1.35em;
            }
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
            padding-top: 148px;
            padding-bottom: 0 !important;
            background-color: var(--color-gallery-white);
            text-align: center;
            overflow: hidden;
            position: relative;
        }

        .apple-hero-container {
            max-width: 980px;
            margin: 0 auto;
            padding: 0 24px;
        }

        .apple-hero-stage-visual {
            position: relative;
            max-width: 440px;
            margin: 36px auto 0;
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

        @media (max-width: 991px) {
            .apple-floating-nav-links { display: none; }
        }

        /* --------------------------------------------------------------------------
           STATS, SECTIONS & CARDS
           -------------------------------------------------------------------------- */
        .apple-stats-bar {
            background-color: var(--color-studio-mist);
            border-top: 1px solid var(--color-border-card);
            border-bottom: 1px solid var(--color-border-card);
            padding: 38px 0;
        }

        .stat-col-divider {
            position: relative;
        }

        @media (min-width: 768px) {
            .stat-col-divider:not(:last-child)::after {
                content: '';
                position: absolute;
                right: 0;
                top: 15%;
                height: 70%;
                width: 1px;
                background-color: var(--color-border-card);
            }
        }

        .stat-number {
            font-size: clamp(28px, 3.5vw, 40px);
            font-weight: 700;
            letter-spacing: -0.03em;
            color: var(--color-ink);
            line-height: 1.1;
            min-height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--color-slate);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-top: 6px;
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

        /* Apple Tech Bento & Skills Matrix (Clean & Balanced) */
        .apple-tech-card {
            background-color: var(--color-gallery-white);
            border: 1px solid var(--color-border-card);
            border-radius: var(--radius-cards);
            padding: 28px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            transition: border-color 0.25s ease, box-shadow 0.25s ease, transform 0.2s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
        }

        .apple-tech-card:hover {
            border-color: #c7c7cc;
            box-shadow: 0 14px 32px -8px rgba(0, 0, 0, 0.06);
            transform: translateY(-2px);
        }

        .apple-tech-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
            padding-bottom: 14px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
        }

        .apple-tech-title {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: -0.02em;
            color: var(--color-ink);
            margin: 0;
            line-height: 1.3;
        }

        .apple-tech-counter {
            font-size: 11px;
            font-weight: 600;
            color: var(--color-slate);
            background-color: var(--color-studio-mist);
            border: 1px solid var(--color-border-card);
            border-radius: var(--radius-pills);
            padding: 3px 10px;
            letter-spacing: 0.02em;
            white-space: nowrap;
        }

        .apple-tech-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .apple-tech-chip {
            background-color: var(--color-studio-mist);
            border: 1px solid rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            padding: 7px 14px;
            font-size: 13px;
            font-weight: 500;
            color: var(--color-ink);
            display: inline-flex;
            align-items: center;
            transition: all 0.2s ease;
            user-select: none;
        }

        .apple-tech-chip:hover {
            background-color: var(--color-gallery-white);
            border-color: var(--color-pricing-blue);
            color: var(--color-pricing-blue);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 113, 227, 0.08);
        }

        /* Apple Credential & Certification Card */
        .apple-cert-card {
            background-color: var(--color-gallery-white);
            border: 1px solid var(--color-border-card);
            border-radius: var(--radius-cards);
            padding: 28px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: border-color 0.25s ease, box-shadow 0.25s ease, transform 0.2s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
            position: relative;
        }

        .apple-cert-card:hover {
            border-color: #c7c7cc;
            box-shadow: 0 14px 32px -8px rgba(0, 0, 0, 0.06);
            transform: translateY(-2px);
        }

        .apple-cert-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 16px;
        }

        .apple-cert-issuer-badge {
            font-size: 11px;
            font-weight: 600;
            color: var(--color-ink);
            background-color: var(--color-studio-mist);
            border: 1px solid var(--color-border-card);
            border-radius: var(--radius-pills);
            padding: 4px 12px;
            letter-spacing: 0.02em;
            max-width: 72%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: inline-block;
        }

        .apple-cert-year-badge {
            font-size: 11px;
            font-weight: 700;
            color: var(--color-launch-orange);
            background-color: rgba(182, 68, 0, 0.08);
            border-radius: var(--radius-pills);
            padding: 3px 9px;
            letter-spacing: 0.04em;
            white-space: nowrap;
        }

        .apple-cert-title {
            font-size: 17px;
            font-weight: 700;
            letter-spacing: -0.015em;
            color: var(--color-ink);
            line-height: 1.35;
            margin-bottom: 10px;
            min-height: 48px;
        }

        .apple-cert-issuer-text {
            font-size: 13px;
            color: var(--color-slate);
            line-height: 1.4;
            margin-bottom: 20px;
        }

        .apple-cert-footer {
            padding-top: 14px;
            border-top: 1px solid rgba(0, 0, 0, 0.06);
            display: flex;
            align-items: center;
            justify-content: space-between;
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

        /* Apple Project Showcase Cards */
        .apple-project-card {
            background-color: var(--color-gallery-white);
            border: 1px solid var(--color-border-card);
            border-radius: var(--radius-cards);
            padding: 24px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: border-color 0.25s ease, box-shadow 0.25s ease, transform 0.2s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.02);
            position: relative;
        }

        .apple-project-card:hover {
            border-color: #c7c7cc;
            box-shadow: 0 16px 36px -10px rgba(0, 0, 0, 0.07);
            transform: translateY(-2px);
        }

        .apple-project-media-wrap {
            border-radius: 16px;
            overflow: hidden;
            background-color: var(--color-studio-mist);
            border: 1px solid var(--color-border-card);
            margin-bottom: 18px;
            position: relative;
        }

        .apple-browser-bar {
            height: 22px;
            background-color: rgba(245, 245, 247, 0.95);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 0 10px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .apple-browser-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #d1d1d6;
        }

        .apple-project-media-img {
            width: 100%;
            height: 190px;
            object-fit: cover;
            object-position: top center;
            display: block;
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .apple-project-card:hover .apple-project-media-img {
            transform: scale(1.03);
        }

        .apple-project-badge {
            font-size: 11px;
            font-weight: 600;
            color: var(--color-launch-orange);
            background-color: rgba(182, 68, 0, 0.07);
            border-radius: var(--radius-pills);
            padding: 3px 10px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            display: inline-block;
            margin-bottom: 8px;
        }

        .apple-project-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--color-ink);
            letter-spacing: -0.015em;
            line-height: 1.35;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 48px;
        }

        .apple-project-desc {
            font-size: 13px;
            color: var(--color-slate);
            line-height: 1.45;
            margin-bottom: 14px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 38px;
        }

        .apple-project-tech-tag {
            background-color: var(--color-studio-mist);
            color: var(--color-ink);
            font-size: 11px;
            font-weight: 500;
            padding: 4px 10px;
            border-radius: 8px;
            border: 1px solid rgba(0, 0, 0, 0.04);
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
        }

        .apple-project-actions {
            padding-top: 14px;
            border-top: 1px solid rgba(0, 0, 0, 0.06);
            display: flex;
            align-items: center;
            gap: 8px;
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
           APPLE INTELLIGENCE CHATBOT WIDGET (Clean Minimalist Apple Design)
           -------------------------------------------------------------------------- */
        .apple-ai-trigger-wrap {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 1050;
        }

        .apple-ai-trigger {
            background-color: rgba(255, 255, 255, 0.95);
            color: var(--color-ink);
            border: 1px solid var(--color-hairline-silver);
            border-radius: var(--radius-pills);
            padding: 8px 18px;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
            backdrop-filter: saturate(180%) blur(20px);
            -webkit-backdrop-filter: saturate(180%) blur(20px);
            font-size: 13px;
            font-weight: 600;
        }

        .apple-ai-trigger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
            border-color: var(--color-pricing-blue);
        }

        .apple-ai-trigger-badge {
            background-color: var(--color-pricing-blue);
            color: #ffffff;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 9999px;
            letter-spacing: 0.03em;
        }

        .apple-ai-window {
            position: fixed;
            bottom: 95px;
            right: 30px;
            width: 380px;
            height: 540px;
            background-color: var(--color-gallery-white);
            border: 1px solid var(--color-border-card);
            border-radius: var(--radius-cards);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            box-shadow: 0 24px 50px rgba(0, 0, 0, 0.12), 0 0 0 1px rgba(0, 0, 0, 0.04);
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
            scrollbar-width: thin;
            scrollbar-color: #d1d1d6 transparent;
        }

        .apple-ai-body::-webkit-scrollbar {
            width: 5px;
        }

        .apple-ai-body::-webkit-scrollbar-track {
            background: transparent;
        }

        .apple-ai-body::-webkit-scrollbar-thumb {
            background-color: #d1d1d6;
            border-radius: 10px;
        }

        .chat-bubble-ai {
            background-color: var(--color-studio-mist);
            color: var(--color-ink);
            padding: 12px 16px;
            border-radius: 18px;
            border-bottom-left-radius: 4px;
            max-width: 88%;
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
            max-width: 88%;
            font-size: 14px;
            line-height: 1.45;
            align-self: flex-end;
        }

        .apple-quick-prompts {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-top: 4px;
            transition: opacity 0.2s ease, max-height 0.3s ease;
        }

        .quick-prompt-chip {
            background-color: var(--color-studio-mist);
            border: 1px solid var(--color-border-card);
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 13px;
            font-weight: 500;
            color: var(--color-ink);
            cursor: pointer;
            transition: all 0.2s ease;
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .quick-prompt-chip .chip-chevron {
            color: var(--color-steel);
            font-size: 16px;
            line-height: 1;
            transition: transform 0.2s ease, color 0.2s ease;
        }

        .quick-prompt-chip:hover {
            background-color: #ffffff;
            border-color: var(--color-pricing-blue);
            color: var(--color-pricing-blue);
            box-shadow: 0 4px 12px rgba(0, 113, 227, 0.08);
        }

        .quick-prompt-chip:hover .chip-chevron {
            color: var(--color-pricing-blue);
            transform: translateX(2px);
        }

        .apple-ai-input-wrap {
            padding: 12px 16px;
            background-color: var(--color-gallery-white);
            border-top: 1px solid var(--color-border-card);
        }

        .apple-ai-input-box {
            display: flex;
            align-items: center;
            background-color: var(--color-studio-mist);
            border: 1px solid var(--color-border-card);
            border-radius: var(--radius-pills);
            padding: 4px 6px 4px 14px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background-color 0.2s ease;
        }

        .apple-ai-input-box:focus-within {
            border-color: var(--color-pricing-blue);
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(0, 113, 227, 0.12);
        }

        .apple-ai-text-input {
            flex-grow: 1;
            border: none;
            background: transparent;
            font-size: 13px;
            color: var(--color-ink);
            outline: none;
            padding: 6px 0;
            font-family: inherit;
        }

        .apple-ai-text-input::placeholder {
            color: var(--color-slate);
        }

        .apple-ai-send-btn {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: var(--color-pricing-blue);
            color: #ffffff;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.15s ease, background-color 0.15s ease;
            flex-shrink: 0;
        }

        .apple-ai-send-btn:hover {
            background-color: var(--color-apple-blue);
            transform: scale(1.05);
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

        @media (max-width: 576px) {
            .apple-ai-trigger-wrap { right: 15px; bottom: 20px; }
            .apple-ai-window {
                right: 15px;
                left: 15px;
                width: auto;
                bottom: 80px;
                height: 480px;
            }
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
                    {{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }} • Software Engineer
                </div>

                <h1 class="apple-hero-headline">
                    <span class="apple-rotator-viewport" id="heroRotatorViewport">
                        <span class="apple-rotator-item active" id="heroRoleCurrent">{{ $settings['hero_title'] ?? 'Full Stack Web Developer' }}</span>
                    </span>
                </h1>

                <p class="apple-lead-text mx-auto mb-4" style="max-width: 640px;">
                    {{ $settings['hero_description'] ?? 'Mengembangkan aplikasi web modern berkinerja tinggi, arsitektur modular yang tangguh, dan integrasi sistem cerdas.' }}
                </p>

                <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap mb-4">
                    <a href="#projects" class="btn-pricing-blue-pill py-2 px-4" style="font-size: 14px; font-weight: 500;">
                        Eksplorasi Karya ›
                    </a>
                    @if(isset($settings['cv_link']) && $settings['cv_link'] !== '#')
                        <a href="{{ asset('storage/' . $settings['cv_link']) }}" download class="btn-explore-pill py-2 px-4" style="font-size: 14px; font-weight: 500;">
                            Unduh CV
                        </a>
                    @else
                        <a href="#about" class="btn-explore-pill py-2 px-4" style="font-size: 14px; font-weight: 500;">
                            Tentang Dimas
                        </a>
                    @endif
                </div>

                <!-- Centerpiece Developer Visual (100% Clean, Unobstructed, Resting Flush to the Bottom) -->
                <div class="apple-hero-stage-visual">
                    <picture>
                        <img src="{{ asset('assets/dimasdimas.png') }}" alt="{{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }}" class="apple-hero-edgefree-img" fetchpriority="high">
                    </picture>
                </div>
            </div>
        </section>

        <!-- 3. STATS SPEC BAR (Studio Mist) -->
        <section class="apple-stats-bar">
            <div class="container" style="max-width: 1080px;">
                <div class="row g-4 text-center">
                    <div class="col-6 col-md-3 stat-col-divider">
                        <div class="stat-number">{{ $settings['about_gpa'] ?? '3.76' }}</div>
                        <div class="stat-label">IPK Kumulatif (4.0)</div>
                    </div>
                    <div class="col-6 col-md-3 stat-col-divider">
                        <div class="stat-number">{{ count($projects) > 0 ? count($projects) : '10' }}+</div>
                        <div class="stat-label">Projek Selesai</div>
                    </div>
                    <div class="col-6 col-md-3 stat-col-divider">
                        <div class="stat-number">{{ count($certifications) > 0 ? count($certifications) : '5' }}</div>
                        <div class="stat-label">Sertifikasi Resmi</div>
                    </div>
                    <div class="col-6 col-md-3 stat-col-divider">
                        <div class="stat-number">100%</div>
                        <div class="stat-label">Dedikasi Kualitas</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4. ABOUT SECTION (Gallery White) -->
        <section class="apple-section-white" id="about" data-aos="fade-up">
            <div class="container" style="max-width: 1080px;">
                <div class="row g-5 align-items-stretch">
                    <div class="col-lg-7 d-flex flex-column justify-content-between">
                        <div>
                            <div class="apple-kicker">Profil & Filosofi</div>
                            <h2 class="apple-section-headline mb-4">
                                Kode bersih. Kinerja terukur. Detail yang sempurna.
                            </h2>
                            <p class="apple-lead-text mb-4" style="text-align: justify; font-size: 16px; line-height: 1.65;">
                                {{ $settings['about_bio'] ?? 'Saya adalah mahasiswa Teknik Informatika di Universitas Muhammadiyah Purwokerto dengan spesialisasi pengembangan full-stack web. Berfokus pada pembangunan arsitektur aplikasi yang tangguh, aman, dan dirancang untuk memberikan pengalaman pengguna tanpa cela.' }}
                            </p>
                        </div>
                        <div class="p-4 rounded-4" style="background-color: var(--color-studio-mist); border: 1px solid var(--color-border-card);">
                            <p class="apple-body-muted mb-0" style="font-size: 14px; line-height: 1.6;">
                                <strong class="text-dark">Fokus Rekayasa:</strong> Pengalaman mencakup integrasi RESTful API terstandarisasi, optimalisasi performa database, penerapan prinsip kode bersih (*clean architecture*), dan desain antarmuka responsif modern.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="apple-card-white h-100" style="background-color: var(--color-studio-mist); padding: 32px;">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="apple-kicker mb-0">Spesifikasi Pengembang</span>
                                    <span class="badge rounded-pill bg-white text-dark border px-2 py-1" style="font-size: 11px; font-weight: 600;">Spec Sheet</span>
                                </div>
                                <h3 style="font-size: 20px; font-weight: 700; color: var(--color-ink); margin-bottom: 20px;">
                                    {{ $settings['hero_name'] ?? 'Dimas Alva Rizki' }}
                                </h3>

                                <div class="d-flex flex-column gap-3 mb-4">
                                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom" style="border-color: var(--color-border-card) !important;">
                                        <span class="apple-body-muted" style="font-size: 13px;">Peran Utama</span>
                                        <span class="fw-semibold text-dark" style="font-size: 13px;">{{ $settings['hero_title'] ?? 'Full-Stack Developer' }}</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom" style="border-color: var(--color-border-card) !important;">
                                        <span class="apple-body-muted" style="font-size: 13px;">Stack Terpilih</span>
                                        <span class="fw-semibold text-dark" style="font-size: 13px;">Laravel, Next.js, Node.js</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom" style="border-color: var(--color-border-card) !important;">
                                        <span class="apple-body-muted" style="font-size: 13px;">Institusi</span>
                                        <span class="fw-semibold text-dark" style="font-size: 13px;">Univ. Muhammadiyah Purwokerto</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center py-2 border-bottom" style="border-color: var(--color-border-card) !important;">
                                        <span class="apple-body-muted" style="font-size: 13px;">Prestasi Akademik</span>
                                        <span class="fw-semibold text-dark" style="font-size: 13px;">GPA {{ $settings['about_gpa'] ?? '3.76' }} / 4.00</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center py-2">
                                        <span class="apple-body-muted" style="font-size: 13px;">Kesiapan Proyek</span>
                                        <span class="fw-semibold text-dark" style="font-size: 13px;">Skala Produksi</span>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-3 border-top" style="border-color: var(--color-border-card) !important;">
                                @if(isset($settings['cv_link']) && $settings['cv_link'] !== '#')
                                    <a href="{{ asset('storage/' . $settings['cv_link']) }}" download class="btn-pricing-blue-pill w-100 text-center py-2" style="font-size: 13px; font-weight: 500;">
                                        Unduh Curriculum Vitae ›
                                    </a>
                                @else
                                    <a href="#contact" class="btn-pricing-blue-pill w-100 text-center py-2" style="font-size: 13px; font-weight: 500;">
                                        Mulai Diskusi Proyek ›
                                    </a>
                                @endif
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
                        <div class="col-md-6 col-lg-6">
                            <div class="apple-tech-card">
                                <div class="apple-tech-header">
                                    <h3 class="apple-tech-title">{{ $category }}</h3>
                                    <span class="apple-tech-counter">{{ count($items) }} Komponen</span>
                                </div>

                                <div class="apple-tech-grid">
                                    @foreach($items as $item)
                                        <div class="apple-tech-chip">
                                            <span>{{ $item->name }}</span>
                                        </div>
                                    @endforeach
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
                <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-5">
                    <div>
                        <div class="apple-kicker">Validasi Resmi</div>
                        <h2 class="apple-section-headline mb-0">Sertifikasi Profesional.</h2>
                    </div>
                    <span class="apple-body-muted d-none d-md-inline" style="font-size: 13px;">
                        {{ count($certifications) }} Kredensial Terverifikasi
                    </span>
                </div>

                <div class="row g-4">
                    @forelse($certifications as $cert)
                        <div class="col-md-6 col-lg-4">
                            <div class="apple-cert-card">
                                <div>
                                    <div class="apple-cert-header">
                                        <span class="apple-cert-issuer-badge" title="{{ $cert->issuer }}">
                                            {{ $cert->issuer }}
                                        </span>
                                        <span class="apple-cert-year-badge">{{ $cert->year }}</span>
                                    </div>

                                    <h3 class="apple-cert-title">{{ $cert->name }}</h3>
                                    <p class="apple-cert-issuer-text">Penerbit: {{ $cert->issuer }}</p>
                                </div>

                                <div class="apple-cert-footer">
                                    @if($cert->link && $cert->link !== '#')
                                        <a href="{{ $cert->link }}" target="_blank" class="apple-link-blue" style="font-size: 13px;">
                                            <span>Verifikasi Kredensial</span>
                                            <span class="chevron">›</span>
                                        </a>
                                    @else
                                        <span class="d-inline-flex align-items-center gap-1 text-secondary" style="font-size: 12px; font-weight: 500;">
                                            <i class="fas fa-check-circle text-primary" style="font-size: 11px;"></i>
                                            <span>Sertifikat Resmi</span>
                                        </span>
                                    @endif
                                </div>
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
                            <div class="apple-project-card">
                                <div>
                                    <!-- Safari Mockup Media Frame -->
                                    <div class="apple-project-media-wrap">
                                        <div class="apple-browser-bar">
                                            <span class="apple-browser-dot"></span>
                                            <span class="apple-browser-dot"></span>
                                            <span class="apple-browser-dot"></span>
                                        </div>
                                        <img src="{{ asset('storage/' . $project->image_url) }}" alt="{{ $project->title }}" class="apple-project-media-img" loading="lazy">
                                    </div>

                                    <div>
                                        <span class="apple-project-badge">{{ $project->category }}</span>
                                    </div>

                                    <h3 class="apple-project-title" title="{{ $project->title }}">
                                        {{ $project->title }}
                                    </h3>

                                    <p class="apple-project-desc">
                                        {{ Str::limit(strip_tags($project->description), 110) }}
                                    </p>

                                    <!-- Tech tags (Clean, max 4 tokens) -->
                                    <div class="d-flex flex-wrap gap-1 mb-3">
                                        @if(is_array($project->tech_stack))
                                            @foreach(array_slice($project->tech_stack, 0, 4) as $tech)
                                                <span class="apple-project-tech-tag">
                                                    {{ trim($tech) }}
                                                </span>
                                            @endforeach
                                            @if(count($project->tech_stack) > 4)
                                                <span class="apple-project-tech-tag text-secondary" style="font-size: 10px;">
                                                    +{{ count($project->tech_stack) - 4 }}
                                                </span>
                                            @endif
                                        @endif
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="apple-project-actions">
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
                                <div class="alert alert-success border-0 mb-4 rounded-4" style="background-color: #e6f4ea; color: #137333; font-size: 14px; padding: 16px 20px;">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle me-2 fs-5"></i>
                                        <div>
                                            <div class="fw-semibold">Pesan Berhasil Terkirim!</div>
                                            <div style="font-size: 13px;">{{ session('success') }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger border-0 mb-4 rounded-4" style="background-color: #fde8e8; color: #9b1c1c; font-size: 14px; padding: 16px 20px;">
                                    <div class="fw-semibold mb-1"><i class="fas fa-exclamation-circle me-2"></i> Mohon lengkapi formulir dengan benar:</div>
                                    <ul class="mb-0 ps-3" style="font-size: 13px;">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('contact.store') }}" method="POST" id="contactForm" onsubmit="const btn = document.getElementById('btnSubmitContact'); btn.disabled = true; btn.innerHTML = 'Mengirim Pesan...';">
                                @csrf
                                <div class="mb-3">
                                    <label class="apple-body-muted d-block mb-2 fw-medium">Nama Lengkap</label>
                                    <input type="text" name="name" class="apple-input-field @error('name') is-invalid @enderror" placeholder="Masukkan nama Anda" value="{{ old('name') }}" minlength="2" required>
                                    @error('name')
                                        <div class="text-danger mt-1" style="font-size: 12px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="apple-body-muted d-block mb-2 fw-medium">Alamat Email</label>
                                    <input type="email" name="email" class="apple-input-field @error('email') is-invalid @enderror" placeholder="nama@email.com" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="text-danger mt-1" style="font-size: 12px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="apple-body-muted d-block mb-2 fw-medium">Pesan</label>
                                    <textarea name="message" class="apple-textarea-field @error('message') is-invalid @enderror" rows="4" placeholder="Ceritakan detail proyek atau pertanyaan Anda..." minlength="3" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="text-danger mt-1" style="font-size: 12px;">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button type="submit" id="btnSubmitContact" class="btn-apple-primary w-100 py-3" style="font-size: 14px;">
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
    <div class="apple-ai-trigger-wrap">
        <button class="apple-ai-trigger" id="chat-widget-toggle" title="Buka Asisten DimasBot" type="button" aria-label="Buka Chat AI">
            <span>DimasBot</span>
            <span class="apple-ai-trigger-badge">AI</span>
        </button>
    </div>

    <div class="apple-ai-window" id="chat-widget-window">
        <div class="apple-ai-header">
            <div class="d-flex align-items-center gap-2">
                <div>
                    <div style="font-size: 14px; font-weight: 600; color: var(--color-ink); line-height: 1.2;">DimasBot Intelligence</div>
                    <div style="font-size: 11px; color: var(--color-slate);">Asisten Portofolio</div>
                </div>
            </div>
            <button class="btn-close" id="chat-widget-close" aria-label="Tutup"></button>
        </div>

        <div class="apple-ai-body" id="aiChatBody">
            <div class="chat-bubble-ai" id="bot-welcome-msg">
                Halo! Saya asisten virtual portofolio <strong>Dimas Alva Rizki</strong>. Ada yang ingin Anda tanyakan seputar keahlian, riwayat proyek, atau peluang kerja sama?
            </div>

            <!-- Quick Action Prompts (Clean Typography Without Icons) -->
            <div class="apple-quick-prompts" id="quickPromptsContainer">
                <button type="button" class="quick-prompt-chip" onclick="sendQuickPrompt('Apa keahlian dan teknologi utama yang dikuasai Dimas?')">
                    <span>Keahlian & Tech Stack</span>
                    <span class="chip-chevron">›</span>
                </button>
                <button type="button" class="quick-prompt-chip" onclick="sendQuickPrompt('Ceritakan tentang proyek-proyek unggulan buatan Dimas.')">
                    <span>Proyek Unggulan</span>
                    <span class="chip-chevron">›</span>
                </button>
                <button type="button" class="quick-prompt-chip" onclick="sendQuickPrompt('Bagaimana riwayat pendidikan dan pencapaian akademik Dimas?')">
                    <span>Riwayat Pendidikan & IPK</span>
                    <span class="chip-chevron">›</span>
                </button>
                <button type="button" class="quick-prompt-chip" onclick="sendQuickPrompt('Bagaimana cara berdiskusi atau memulai kolaborasi proyek dengan Dimas?')">
                    <span>Kolaborasi & Kontak</span>
                    <span class="chip-chevron">›</span>
                </button>
            </div>

            <div class="typing-dots" id="typingIndicator">
                <span></span><span></span><span></span>
            </div>
        </div>

        <div class="apple-ai-input-wrap">
            <div class="apple-ai-input-box">
                <input type="text" class="apple-ai-text-input" id="aiChatInput" placeholder="Tanyakan seputar keahlian atau proyek...">
                <button type="button" class="apple-ai-send-btn" id="aiChatSubmit" title="Kirim Pesan" aria-label="Kirim Pesan">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="19" x2="12" y2="5"></line>
                        <polyline points="5 12 12 5 19 12"></polyline>
                    </svg>
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
                        {{ $settings['hero_title'] ?? 'Full Stack Web Developer' }} & Software Engineer.
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
                    Indonesia • Jakarta
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

                const quickPrompts = document.getElementById('quickPromptsContainer');
                if (quickPrompts) {
                    quickPrompts.style.display = 'none';
                }

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

            window.sendQuickPrompt = function(promptText) {
                if (aiChatInput) {
                    aiChatInput.value = promptText;
                    sendMessage();
                }
            };

            // Silky Smooth Apple Kinetic Role Rotator (Parallel Slide to Right)
            const rotatorViewport = document.getElementById('heroRotatorViewport');
            if (rotatorViewport) {
                let currentItem = document.getElementById('heroRoleCurrent');
                const heroRoles = [
                    "Full Stack Web Developer",
                    "Software Engineer",
                    "Backend Architect",
                    "Frontend Developer"
                ];
                let currentRoleIdx = 0;

                setInterval(() => {
                    currentRoleIdx = (currentRoleIdx + 1) % heroRoles.length;
                    const nextText = heroRoles[currentRoleIdx];

                    // Prepare new element sliding in from left to center
                    const nextItem = document.createElement('span');
                    nextItem.className = 'apple-rotator-item slide-in-left';
                    nextItem.textContent = nextText;
                    rotatorViewport.appendChild(nextItem);

                    // Force browser layout reflow to register initial state
                    void nextItem.offsetWidth;

                    // Transition current item out to right and next item into center
                    if (currentItem) {
                        currentItem.classList.remove('active');
                        currentItem.classList.add('slide-out-right');
                        const staleItem = currentItem;
                        setTimeout(() => {
                            if (staleItem && staleItem.parentNode) {
                                staleItem.parentNode.removeChild(staleItem);
                            }
                        }, 700);
                    }

                    nextItem.classList.remove('slide-in-left');
                    nextItem.classList.add('active');
                    currentItem = nextItem;
                }, 3400);
            }

        });
    </script>
</body>
</html>