<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Admin</title>
    <link rel="icon" href="{{ asset('assets/favicon.svg') }}" type="image/svg+xml">
    <link rel="alternate icon" href="{{ asset('assets/favicon.png') }}" type="image/png">
    
    <!-- Preconnect CDN Hosts -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Apple Design Tokens */
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
            --radius-inputs: 980px;
            --radius-buttons: 9999px;
        }

        * {
            box-sizing: border-box;
            -webkit-font-smoothing: antialiased;
        }

        body {
            font-family: var(--font-sf-pro);
            background-color: var(--color-studio-mist);
            color: var(--color-ink);
            margin: 0;
            padding: 24px;
            min-height: 100vh;
            min-height: 100dvh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            background: var(--color-gallery-white);
            border: 1px solid var(--color-hairline-silver);
            border-radius: var(--radius-cards);
            padding: 48px 40px 40px;
            text-align: center;
            box-shadow: none;
            position: relative;
        }

        .apple-id-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: var(--color-studio-mist);
            border: 1px solid var(--color-hairline-silver);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            color: var(--color-ink);
            font-size: 24px;
        }

        .login-title {
            font-size: 26px;
            font-weight: 600;
            letter-spacing: -0.5px;
            color: var(--color-ink);
            margin-bottom: 6px;
        }

        .login-subtitle {
            font-size: 14px;
            font-weight: 400;
            letter-spacing: -0.224px;
            color: var(--color-slate);
            margin-bottom: 32px;
            line-height: 1.4;
        }

        .apple-input-group {
            position: relative;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            background: var(--color-gallery-white);
            border: 1px solid var(--color-steel);
            border-radius: var(--radius-inputs);
            padding: 4px 16px 4px 18px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .apple-input-group:focus-within {
            border-color: var(--color-pricing-blue);
            box-shadow: 0 0 0 3px rgba(0, 113, 227, 0.15);
        }

        .apple-input-icon {
            color: var(--color-steel);
            font-size: 14px;
            margin-right: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .apple-input-group input {
            border: none;
            background: transparent;
            width: 100%;
            padding: 10px 0;
            font-family: var(--font-sf-pro);
            font-size: 14px;
            letter-spacing: -0.224px;
            color: var(--color-ink);
            outline: none;
        }

        .apple-input-group input::placeholder {
            color: var(--color-steel);
        }

        .error-msg {
            color: #d70015;
            font-size: 12px;
            letter-spacing: -0.12px;
            text-align: left;
            margin-top: -10px;
            margin-bottom: 14px;
            padding-left: 18px;
        }

        .remember-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 8px;
            margin-bottom: 24px;
            font-size: 13px;
            letter-spacing: -0.15px;
        }

        .form-check-input {
            border-radius: 4px;
            border-color: var(--color-steel);
            margin-top: 0.15rem;
        }

        .form-check-input:checked {
            background-color: var(--color-pricing-blue);
            border-color: var(--color-pricing-blue);
        }

        .form-check-label {
            color: var(--color-slate);
            user-select: none;
            cursor: pointer;
        }

        .btn-pricing-blue {
            background-color: var(--color-pricing-blue);
            color: var(--color-gallery-white);
            border: none;
            border-radius: var(--radius-buttons);
            padding: 12px 24px;
            font-family: var(--font-sf-pro);
            font-size: 14px;
            font-weight: 500;
            letter-spacing: -0.12px;
            width: 100%;
            transition: background-color 0.2s ease, transform 0.1s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-pricing-blue:hover {
            background-color: #0077ed;
            color: var(--color-gallery-white);
        }

        .btn-pricing-blue:active {
            transform: scale(0.99);
        }

        .footer-links {
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid var(--color-hairline-silver);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
        }

        .apple-link {
            color: var(--color-apple-blue);
            text-decoration: none;
            font-size: 13px;
            letter-spacing: -0.15px;
            transition: color 0.15s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .apple-link:hover {
            color: #0055b3;
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 36px 24px 28px;
                border-radius: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="login-card">
        
        <div class="apple-id-icon">
            <i class="fas fa-lock"></i>
        </div>

        <h1 class="login-title">Admin Console</h1>
        <p class="login-subtitle">Masuk dengan kredensial administrator untuk mengelola data portofolio.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <div class="apple-input-group">
                    <span class="apple-input-icon"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" placeholder="Email Administrator" required autofocus value="{{ old('email') }}" autocomplete="username">
                </div>
                @error('email')
                    <div class="error-msg"><i class="fas fa-circle-exclamation me-1"></i> {{ $message }}</div>
                @enderror
            </div>

            <div>
                <div class="apple-input-group">
                    <span class="apple-input-icon"><i class="fas fa-key"></i></span>
                    <input type="password" name="password" placeholder="Kata Sandi" required autocomplete="current-password">
                </div>
                @error('password')
                    <div class="error-msg"><i class="fas fa-circle-exclamation me-1"></i> {{ $message }}</div>
                @enderror
            </div>

            <div class="remember-section">
                <div class="form-check m-0">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                    <label class="form-check-label" for="remember_me">Ingat saya</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="apple-link" style="font-size: 12px;">Lupa Sandi?</a>
                @endif
            </div>

            <button type="submit" class="btn-pricing-blue">
                <span>Masuk ke Dashboard</span>
                <i class="fas fa-arrow-right" style="font-size: 12px;"></i>
            </button>

        </form>

        </div>

    </div>

</body>
</html>