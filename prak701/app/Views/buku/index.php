<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fce4ec;
            min-height: 100vh;
            padding: 2rem;
        }

        .navbar {
            background: linear-gradient(135deg, #e91e63, #c2185b);
            color: white;
            padding: 1rem 2rem;
            border-radius: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(233,30,99,0.3);
        }

        .navbar-brand {
            font-size: 1.3rem;
            font-weight: 700;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar-right span {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .btn-logout {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.85rem;
            border: 1px solid rgba(255,255,255,0.4);
            transition: background 0.2s;
        }

        .btn-logout:hover { background: rgba(255,255,255,0.35); }

        .container {
            max-width: 960px;
            margin: auto;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(233,30,99,0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-header h2 {
            color: #c2185b;
            font-size: 1.3rem;
        }

        .btn-tambah {
            background: linear-gradient(135deg, #e91e63, #c2185b);
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 10px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: opacity 0.2s;
        }

        .btn-tambah:hover { opacity: 0.85; }

        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
            padding: 0.8rem 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead tr {
            background: linear-gradient(135deg, #e91e63, #c2185b);
            color: white;
        }

        th, td {
            padding: 0.85rem 1rem;
            text-align: left;
            font-size: 0.9rem;
        }

        th { font-weight: 600; }

        tbody tr:nth-child(even) { background: #fce4ec33; }
        tbody tr:hover { background: #fce4ec88; }

        td { color: #444; border-bottom: 1px solid #f8bbd0; }

        .btn {
            padding: 0.3rem 0.8rem;
            border-radius: 7px;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .btn-edit   { background: #fff3e0; color: #e65100; border: 1px solid #ffcc80; }
        .btn-delete { background: #fce4ec; color: #c2185b; border: 1px solid #f48fb1; }

        .btn-edit:hover   { background: #ffe0b2; }
        .btn-delete:hover { background: #f8bbd0; }

        .empty-state {
            text-align: center;
            color: #bbb;
            padding: 2rem;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="navbar">
        <div class="navbar-brand">📚 Perpustakaan Digital</div>
        <div class="navbar-right">
            <span>👤 <?= session()->get('username') ?></span>
            <a href="/logout" class="btn-logout">Logout</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2>Daftar Buku</h2>
            <a href="/buku/create" class="btn-tambah">+ Tambah Buku</a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success">✅ <?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($buku)): ?>
                    <tr><td colspan="6" class="empty-state">📭 Belum ada data buku.</td></tr>
                <?php else: ?>
                    <?php foreach ($buku as $i => $b): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= esc($b['judul']) ?></td>
                        <td><?= esc($b['penulis']) ?></td>
                        <td><?= esc($b['penerbit']) ?></td>
                        <td><?= esc($b['tahun_terbit']) ?></td>
                        <td style="display:flex; gap:0.4rem;">
                            <a href="/buku/edit/<?= $b['id'] ?>" class="btn btn-edit">✏️ Edit</a>
                            <a href="/buku/delete/<?= $b['id'] ?>" class="btn btn-delete" onclick="return confirm('Hapus buku ini?')">🗑️ Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>