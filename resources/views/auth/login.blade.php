<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Portofolio</title>
    <link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        /* --- 1. SETUP UTAMA --- */
        :root {
            --primary-color: #8b5cf6; /* Violet */
            --secondary-color: #06b6d4; /* Cyan */
            --bg-color: #0b0f19; /* Deeper Sleek Dark Navy */
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --text-muted: #94a3b8;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-color);
            margin: 0; padding: 0;
            overflow: hidden; 
            display: flex; justify-content: center; align-items: center;
            min-height: 100vh; min-height: 100dvh;
        }

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

        /* --- 2. ANIMATED BACKGROUND --- */
        .ambient-light { position: absolute; top: 0; left: 0; width: 100%; height: 100%; overflow: hidden; z-index: -1; }
        .blob { position: absolute; border-radius: 50%; filter: blur(120px); opacity: 0.35; animation: float 12s infinite ease-in-out alternate; }
        .blob-1 { width: 400px; height: 400px; background: var(--primary-color); top: -50px; left: -50px; animation-delay: 0s; }
        .blob-2 { width: 350px; height: 350px; background: var(--secondary-color); bottom: -50px; right: -50px; animation-delay: -6s; }
        .blob-3 { width: 200px; height: 200px; background: #8b5cf6; bottom: 20%; left: 20%; opacity: 0.25; animation: float 15s infinite ease-in-out alternate-reverse; }
        @keyframes float { 0% { transform: translate(0, 0) scale(1); } 100% { transform: translate(30px, 40px) scale(1.1); } }

        /* --- 3. GLASSMORPHISM CARD --- */
        .glass-card {
            width: 100%; max-width: 420px; padding: 45px 40px;
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.6);
            border-radius: 24px; text-align: center; color: white;
            position: relative; z-index: 10;
            animation: fadeInUp 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
            opacity: 0; transform: translateY(40px);
            transition: border-color 0.3s;
        }
        .glass-card:hover {
            border-color: rgba(6, 182, 212, 0.15);
        }
        @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }

        /* --- 4. COMPONENT STYLING --- */
        .logo-container {
            width: 80px; height: 80px; background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 50%; display: flex; align-items: center; justify-content: center;
            margin: 0 auto 20px; font-size: 35px; color: #fff;
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.2); animation: pulse 3s infinite;
        }
        @keyframes pulse { 0%, 100% { box-shadow: 0 0 20px rgba(139, 92, 246, 0.2); } 50% { box-shadow: 0 0 40px rgba(6, 182, 212, 0.4); } }
        
        h4 { letter-spacing: 1px; font-weight: 700; margin-bottom: 5px; }
        .subtitle { color: var(--text-muted); font-size: 0.9rem; margin-bottom: 30px; }

        .input-group-text, .form-control {
            background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.06);
            color: white !important; padding: 12px; transition: all 0.3s ease;
        }
        .input-group-text { border-right: none; border-radius: 12px 0 0 12px; color: rgba(255, 255, 255, 0.6); }
        .form-control { border-left: none; border-radius: 0 12px 12px 0; }
        .form-control::placeholder { color: rgba(255, 255, 255, 0.25); }
        
        .input-group:focus-within .input-group-text, .input-group:focus-within .form-control {
            background: rgba(255, 255, 255, 0.04); border-color: var(--secondary-color);
        }
        .input-group:focus-within .input-group-text { color: var(--secondary-color); }

        .form-check-input { background-color: rgba(255,255,255,0.02); border-color: rgba(255,255,255,0.15); }
        .form-check-input:checked { background-color: var(--primary-color); border-color: var(--primary-color); }
        .form-check-label, .forgot-link { color: rgba(255,255,255,0.7); font-size: 0.85rem; }
        .forgot-link { text-decoration: none; transition: 0.3s; }
        .forgot-link:hover { color: #fff; text-shadow: 0 0 10px var(--secondary-color); }

        .btn-glow {
            width: 100%; padding: 14px; border-radius: 12px; border: none;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white; font-weight: 600; letter-spacing: 1px; margin-top: 15px;
            box-shadow: 0 10px 20px -5px rgba(139, 92, 246, 0.35); transition: all 0.3s ease;
        }
        .btn-glow:hover { transform: translateY(-2px); box-shadow: 0 15px 30px -5px rgba(6, 182, 212, 0.45); filter: brightness(1.1); }
        .back-link { display: inline-block; margin-top: 25px; color: var(--text-muted); text-decoration: none; font-size: 0.85rem; transition: 0.3s; }
        .back-link:hover { color: white; }
        .error-msg { color: #ff6b6b; font-size: 0.8rem; text-align: left; margin-top: 5px; padding-left: 10px; }

        @media (max-width: 500px) {
            .glass-card { padding: 30px 20px; margin: 20px; }
            .blob { opacity: 0.8; }
        }
    </style>
</head>
<body>
    <div class="grid-overlay"></div>

    <div class="ambient-light">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <div class="glass-card">
        
        <div class="logo-container">
            <i class="fas fa-rocket"></i>
        </div>

        <h4>Welcome Admin</h4>
        <p class="subtitle">Enter your credentials to access the dashboard</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email Address" required autofocus value="{{ old('email') }}" autocomplete="off">
                </div>
                @error('email')
                    <div class="error-msg"><i class="fas fa-exclamation-circle me-1"></i> {{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                @error('password')
                    <div class="error-msg"><i class="fas fa-exclamation-circle me-1"></i> {{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                    <label class="form-check-label" for="remember_me">Remember Me</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>
                @endif
            </div>

            <button type="submit" class="btn btn-glow">
                SIGN IN <i class="fas fa-arrow-right ms-2"></i>
            </button>

        </form>

        <a href="/" class="back-link">
            <i class="fas fa-chevron-left me-1"></i> Back to Homepage
        </a>

    </div>

</body>
</html>