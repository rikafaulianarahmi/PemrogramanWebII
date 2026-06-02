<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ffe0f0, #ffc2e0);
            min-height: 100vh;
        }
        .navbar {
            background: linear-gradient(90deg, #e91e8c, #f06292) !important;
            box-shadow: 0 2px 10px rgba(233, 30, 140, 0.4);
        }
        .navbar-brand img {
            width: 32px;
        }
        .nav-link {
            color: white !important;
            font-weight: 500;
            transition: opacity 0.2s;
        }
        .nav-link:hover {
            opacity: 0.75;
        }
        .welcome-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(233, 30, 140, 0.2);
            padding: 60px 40px;
            text-align: center;
            margin-top: 80px;
        }
        .welcome-card h1 {
            font-size: 3rem;
            font-weight: 700;
            color: #e91e8c;
        }
        .welcome-card p {
            color: #555;
            font-size: 1.1rem;
        }
        .welcome-card strong {
            color: #e91e8c;
        }
        .btn-pink {
            background: linear-gradient(90deg, #e91e8c, #f06292);
            color: white;
            border: none;
            border-radius: 30px;
            padding: 12px 35px;
            font-size: 1rem;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-pink:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(233, 30, 140, 0.4);
            color: white;
        }
        hr {
            border-color: #f9a8d4;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="/">🌸</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="/">Beranda</a>
            <a class="nav-link" href="/profil">Profil</a>
        </div>
    </div>
</nav>

<!-- Konten -->
<div class="container">
    <div class="welcome-card">
        <h1>Welcome! 🌸</h1>
        <hr>
        <p>Nama: <strong><?= $profil['nama'] ?></strong></p>
        <p>NIM: <strong><?= $profil['nim'] ?></strong></p>
        <a href="/profil" class="btn btn-pink mt-3">Lihat Profil Lengkap ✨</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>