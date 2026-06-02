<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
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
        .nav-link {
            color: white !important;
            font-weight: 500;
            transition: opacity 0.2s;
        }
        .nav-link:hover {
            opacity: 0.75;
        }
        .profile-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(233, 30, 140, 0.2);
            overflow: hidden;
            margin-top: 60px;
        }
        .profile-header {
            background: linear-gradient(90deg, #e91e8c, #f06292);
            color: white;
            text-align: center;
            padding: 30px;
        }
        .profile-header h3 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 700;
        }
        .table th {
            color: #e91e8c;
            font-weight: 600;
            width: 35%;
        }
        .table td {
            color: #444;
        }
        .table tr:hover {
            background-color: #fff0f7;
        }
        .btn-back {
            background: linear-gradient(90deg, #e91e8c, #f06292);
            color: white;
            border: none;
            border-radius: 30px;
            padding: 10px 30px;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(233, 30, 140, 0.4);
            color: white;
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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="profile-card">
                <div class="profile-header">
                    <h3>👤 Profil Saya</h3>
                </div>
                <div class="p-4">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Lengkap</th>
                            <td><?= $profil['nama'] ?></td>
                        </tr>
                        <tr>
                            <th>NIM</th>
                            <td><?= $profil['nim'] ?></td>
                        </tr>
                        <tr>
                            <th>Asal Prodi</th>
                            <td><?= $profil['prodi'] ?></td>
                        </tr>
                        <tr>
                            <th>Hobi</th>
                            <td><?= $profil['hobi'] ?></td>
                        </tr>
                        <tr>
                            <th>Skill</th>
                            <td><?= $profil['skill'] ?></td>
                        </tr>
                        <tr>
                            <th>Motto</th>
                            <td><?= $profil['motto'] ?></td>
                        </tr>
                    </table>
                    <div class="text-center mt-3">
                        <a href="/" class="btn btn-back">← Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>