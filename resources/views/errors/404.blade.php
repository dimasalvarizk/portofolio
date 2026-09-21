<!DOCTYPE html>
<html lang="id">
<head>
    <title>Halaman Tidak Ditemukan</title>
    <link rel="icon" href="{{ asset('assets/favicon.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #0f172a; color: white; height: 100vh; display: flex; align-items: center; justify-content: center; text-align: center; }
        h1 { font-size: 6rem; font-weight: bold; color: #38bdf8; }
    </style>
</head>
<body>
    <div class="container">
        <h1>404</h1>
        <h3 class="mb-4">Waduh! Halaman tidak ditemukan.</h3>
        <p class="text-secondary mb-4">Mungkin kamu tersesat atau halamannya sudah dihapus.</p>
        <a href="{{ route('home') }}" class="btn btn-outline-light rounded-pill px-4">Kembali ke Home</a>
    </div>
</body>
</html>