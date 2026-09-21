<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <title>{{ $project->title }}</title>
    <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($project->description), 160) }}">
    <meta name="keywords" content="{{ $project->title }}, {{ $project->category }}, Portofolio Projek, Dimas Alva Rizki, Web Developer">
    <meta name="author" content="Dimas Alva Rizki">

    <!-- Open Graph Cards -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $project->title }}">
    <meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($project->description), 160) }}">
    <meta property="og:image" content="{{ asset('storage/' . $project->image_url) }}">
    <meta property="og:site_name" content="Dimas Alva Rizki Portofolio">

    <link rel="icon" href="{{ asset('assets/favicon.svg') }}" type="image/svg+xml">
    <link rel="alternate icon" href="{{ asset('assets/favicon.png') }}" type="image/png">

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap 5 Grid System -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --color-gallery-white: #ffffff;
            --color-studio-mist: #f5f5f7;
            --color-paper-frost: #fafafc;
            --color-hairline-silver: #d6d6d6;
            --color-border-card: #e5e5e7;
            --color-ink: #1d1d1f;
            --color-slate: #6e6e73;
            --color-steel: #86868b;
            --color-apple-blue: #0066cc;
            --color-pricing-blue: #0071e3;
            --color-launch-orange: #b64400;

            --font-family-apple: 'Inter', -apple-system, BlinkMacSystemFont, 'SF Pro Display', 'SF Pro Text', 'Helvetica Neue', Arial, sans-serif;
            --radius-cards: 28px;
            --radius-pills: 9999px;
            --radius-media: 24px;
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
        }

        body {
            background-color: var(--color-gallery-white);
            color: var(--color-ink);
            font-family: var(--font-family-apple);
            font-size: 17px;
            line-height: 1.5;
            letter-spacing: -0.022em;
        }

        /* --------------------------------------------------------------------------
           EXACT FLOATING APPLE PRODUCT LOCAL NAVBAR (20px radius)
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
            font-size: 18px;
            font-weight: 600;
            line-height: 1.21;
            letter-spacing: 0.228px;
            color: var(--color-ink);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 60%;
        }

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

        .apple-kicker {
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--color-launch-orange);
            display: inline-block;
            margin-bottom: 8px;
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
        }

        /* --------------------------------------------------------------------------
           APPLE SLIDER / CAROUSEL SHOWCASE
           -------------------------------------------------------------------------- */
        .apple-carousel-container {
            border-radius: var(--radius-media);
            overflow: hidden;
            background-color: #0d0e11;
            border: 1px solid var(--color-border-card);
            position: relative;
            box-shadow: 0 24px 48px -12px rgba(0, 0, 0, 0.08);
            margin-bottom: 24px;
        }

        .apple-carousel-slide {
            height: 520px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: zoom-in;
            background: #0f1015;
            position: relative;
        }

        .apple-carousel-slide img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.4s ease;
        }

        .apple-carousel-slide:hover img {
            transform: scale(1.015);
        }

        /* Apple Floating Control Bar */
        .apple-carousel-nav-btn {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(0, 0, 0, 0.08);
            border-radius: 50%;
            color: var(--color-ink);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            cursor: pointer;
            transition: transform 0.2s ease, background-color 0.2s ease;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.15);
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 20;
        }

        .apple-carousel-nav-btn:hover {
            background: #ffffff;
            transform: translateY(-50%) scale(1.08);
            color: var(--color-pricing-blue);
        }

        .nav-btn-prev {
            left: 20px;
        }

        .nav-btn-next {
            right: 20px;
        }

        /* Slide Pill Indicators */
        .apple-carousel-indicators-bar {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(210, 210, 215, 0.65);
            backdrop-filter: blur(15px);
            border-radius: var(--radius-pills);
            padding: 6px 14px;
            display: flex;
            align-items: center;
            gap: 8px;
            z-index: 20;
        }

        .apple-indicator-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.35);
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            padding: 0;
        }

        .apple-indicator-dot.active {
            background: var(--color-pricing-blue);
            width: 20px;
            border-radius: 6px;
        }

        /* Thumbnails Strip */
        .apple-thumbnails-strip {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            padding-bottom: 10px;
            margin-bottom: 40px;
        }

        .apple-thumb-item {
            width: 100px;
            height: 64px;
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid transparent;
            cursor: pointer;
            flex-shrink: 0;
            background: #0f1015;
            transition: all 0.2s ease;
            opacity: 0.6;
        }

        .apple-thumb-item.active {
            border-color: var(--color-pricing-blue);
            opacity: 1;
            transform: translateY(-2px);
        }

        .apple-thumb-item:hover {
            opacity: 1;
        }

        .apple-thumb-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Documentation Card */
        .description-card {
            background-color: var(--color-gallery-white);
            border: 1px solid var(--color-border-card);
            border-radius: var(--radius-cards);
            padding: 48px;
            margin-bottom: 48px;
        }

        .description-content {
            font-size: 16px;
            line-height: 1.65;
            color: var(--color-ink);
        }

        .description-content h1, .description-content h2, .description-content h3 {
            font-weight: 700;
            color: var(--color-ink);
            margin-top: 36px;
            margin-bottom: 16px;
            letter-spacing: -0.02em;
        }

        .description-content p {
            margin-bottom: 20px;
        }

        .description-content img {
            max-width: 100% !important;
            height: auto !important;
            border-radius: 16px;
            border: 1px solid var(--color-border-card);
            margin: 24px 0;
        }

        .description-content ul, .description-content ol {
            padding-left: 24px;
            margin-bottom: 24px;
        }

        .description-content li {
            margin-bottom: 8px;
        }

        .apple-footer-wrap {
            background-color: var(--color-studio-mist);
            border-top: 1px solid var(--color-border-card);
            padding: 40px 0 60px;
            font-size: 12px;
            color: var(--color-slate);
            line-height: 1.4;
        }

        @media (max-width: 768px) {
            .apple-carousel-slide {
                height: 280px;
            }
            .description-card {
                padding: 24px 18px;
                border-radius: 20px;
            }
        }

        @media (max-width: 576px) {
            .apple-floating-nav-wrapper {
                top: 10px;
                padding: 0 10px;
            }
            .apple-floating-nav {
                height: 48px;
                padding: 0 12px;
                border-radius: 16px;
            }
            .apple-floating-nav-title {
                font-size: 14px;
                max-width: 140px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .btn-pricing-blue-pill, .btn-explore-pill {
                padding: 5px 12px;
                font-size: 11px;
            }
            .apple-carousel-slide {
                height: 220px;
            }
            .apple-carousel-arrow {
                width: 34px;
                height: 34px;
                font-size: 12px;
            }
            main {
                padding-top: 75px !important;
                padding-bottom: 50px !important;
            }
        }
    </style>
</head>
<body>

    <!-- 1. FLOATING APPLE LOCAL NAVBAR (20px radius) -->
    <div class="apple-floating-nav-wrapper">
        <header class="apple-floating-nav">
            <a href="{{ route('home') }}#projects" class="apple-floating-nav-title">
                <i class="fas fa-chevron-left" style="font-size: 11px; color: var(--color-apple-blue);"></i>
                <span>{{ $project->title }}</span>
            </a>

            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('home') }}#projects" class="btn-explore-pill">
                    Explore
                </a>

                @if($project->link_demo)
                    <a href="{{ $project->link_demo }}" target="_blank" class="btn-pricing-blue-pill">
                        Live Demo
                    </a>
                @else
                    <a href="https://wa.me/{{ $settings['wa_number'] ?? '6281225692689' }}" target="_blank" class="btn-pricing-blue-pill">
                        View pricing
                    </a>
                @endif
            </div>
        </header>
    </div>

    <main style="padding-top: 96px; padding-bottom: 90px;">
        <div class="container" style="max-width: 980px;">
            
            <!-- Header Chapter -->
            <div class="mb-4" data-aos="fade-up">
                <div class="apple-kicker">{{ $project->category }}</div>
                <h1 style="font-size: clamp(28px, 4vw, 42px); font-weight: 700; line-height: 1.15; letter-spacing: -0.03em; color: var(--color-ink); margin-bottom: 16px;">
                    {{ $project->title }}
                </h1>

                <!-- Tech Stack Pills -->
                <div class="d-flex flex-wrap gap-2 mb-4">
                    @if(is_array($project->tech_stack))
                        @foreach($project->tech_stack as $tech)
                            <span class="apple-pill-tag">
                                {{ trim($tech) }}
                            </span>
                        @endforeach
                    @endif
                </div>
            </div>

            @php
                $all_images = [];
                if (!empty($project->image_url)) {
                    $all_images[] = $project->image_url;
                }
                if (!empty($project->additional_images)) {
                    $addImgs = is_array($project->additional_images) ? $project->additional_images : json_decode($project->additional_images, true);
                    if (is_array($addImgs)) {
                        foreach ($addImgs as $img) {
                            if (!empty($img)) {
                                $all_images[] = $img;
                            }
                        }
                    }
                }
                $all_images = array_unique($all_images);
            @endphp

            <!-- Apple Slider / Carousel Component -->
            <div class="apple-carousel-container" data-aos="fade-up" id="galleryShowcase">
                <div id="projectAppleCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4500">
                    
                    <!-- Slides -->
                    <div class="carousel-inner">
                        @foreach($all_images as $index => $img)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="apple-carousel-slide" onclick="openLightbox('{{ asset('storage/'.$img) }}')" title="Klik untuk memperbesar gambar">
                                    <img src="{{ asset('storage/'.$img) }}" alt="Screenshot Projek {{ $index + 1 }}">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if(count($all_images) > 1)
                        <!-- Previous / Next Controls -->
                        <button class="apple-carousel-nav-btn nav-btn-prev" type="button" data-bs-target="#projectAppleCarousel" data-bs-slide="prev" aria-label="Slide Sebelumnya">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="apple-carousel-nav-btn nav-btn-next" type="button" data-bs-target="#projectAppleCarousel" data-bs-slide="next" aria-label="Slide Berikutnya">
                            <i class="fas fa-chevron-right"></i>
                        </button>

                        <!-- Floating Dot Indicators -->
                        <div class="apple-carousel-indicators-bar">
                            @foreach($all_images as $index => $img)
                                <button type="button" data-bs-target="#projectAppleCarousel" data-bs-slide-to="{{ $index }}" class="apple-indicator-dot {{ $index === 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Thumbnail Strip if Multiple Images -->
            @if(count($all_images) > 1)
                <div class="apple-thumbnails-strip" data-aos="fade-up">
                    @foreach($all_images as $index => $img)
                        <div class="apple-thumb-item {{ $index === 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }})">
                            <img src="{{ asset('storage/'.$img) }}" alt="Thumbnail {{ $index + 1 }}">
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Editorial Documentation Card -->
            <div class="description-card" data-aos="fade-up">
                <div class="apple-kicker mb-3">Dokumentasi & Arsitektur</div>
                <div class="description-content">
                    {!! $project->description !!}
                </div>
            </div>

            <!-- Bottom Conversion Callout (Studio Mist) -->
            <div class="p-4 p-md-5 rounded-4 text-center" style="background-color: var(--color-studio-mist); border: 1px solid var(--color-border-card); border-radius: var(--radius-cards);" data-aos="fade-up">
                <div class="apple-kicker mb-2">Ingin Membangun Solusi Serupa?</div>
                <h3 style="font-size: 26px; font-weight: 700; color: var(--color-ink); margin-bottom: 16px; letter-spacing: -0.02em;">
                    Mari diskusikan arsitektur dan kebutuhan spesifik proyek Anda.
                </h3>
                <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
                    <a href="https://wa.me/{{ $settings['wa_number'] ?? '6281225692689' }}" target="_blank" class="btn-pricing-blue-pill px-4 py-2" style="font-size: 14px;">
                        Diskusi via WhatsApp ›
                    </a>
                    <a href="{{ route('home') }}#contact" class="btn-explore-pill px-4 py-2" style="font-size: 14px;">
                        Kirim Pesan Sistem
                    </a>
                </div>
            </div>

        </div>
    </main>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="d-none position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.9); backdrop-filter: blur(15px); z-index: 9999; cursor: pointer;" onclick="closeLightbox()">
        <span class="position-absolute top-0 end-0 m-4 text-white fs-2">&times;</span>
        <img id="lightbox-img" src="" class="img-fluid rounded-4 shadow-lg" style="max-height: 88vh; max-width: 92vw; object-fit: contain;">
    </div>

    <!-- Apple Footer -->
    <footer class="apple-footer-wrap">
        <div class="container" style="max-width: 980px;">
            <div class="d-flex justify-content-between flex-wrap gap-2">
                <div>
                    &copy; {{ date('Y') }} Portofolio Dimas Alva Rizki. All rights reserved.
                </div>
                <div>
                    <a href="{{ route('home') }}" class="text-secondary text-decoration-none">Beranda Portofolio</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof AOS !== 'undefined') {
                AOS.init({ once: true, offset: 30, duration: 600 });
            }

            // Carousel thumbnail & indicator synchronization
            const myCarouselEl = document.getElementById('projectAppleCarousel');
            if (myCarouselEl) {
                myCarouselEl.addEventListener('slide.bs.carousel', function (event) {
                    const nextIndex = event.to;
                    const dots = document.querySelectorAll('.apple-indicator-dot');
                    const thumbs = document.querySelectorAll('.apple-thumb-item');

                    dots.forEach((dot, idx) => {
                        if (idx === nextIndex) dot.classList.add('active');
                        else dot.classList.remove('active');
                    });

                    thumbs.forEach((thumb, idx) => {
                        if (idx === nextIndex) thumb.classList.add('active');
                        else thumb.classList.remove('active');
                    });
                });
            }
        });

        function goToSlide(index) {
            const myCarouselEl = document.getElementById('projectAppleCarousel');
            if (myCarouselEl && typeof bootstrap !== 'undefined') {
                const carousel = bootstrap.Carousel.getOrCreateInstance(myCarouselEl);
                carousel.to(index);
            }
        }

        function openLightbox(src) {
            const lb = document.getElementById('lightbox');
            const img = document.getElementById('lightbox-img');
            img.src = src;
            lb.classList.remove('d-none');
            lb.classList.add('d-flex');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            const lb = document.getElementById('lightbox');
            lb.classList.remove('d-flex');
            lb.classList.add('d-none');
            document.body.style.overflow = '';
        }
    </script>
</body>
</html>