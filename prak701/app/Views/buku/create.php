<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fce4ec;
            min-height: 100vh;
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem 2rem;
            box-shadow: 0 8px 30px rgba(233,30,99,0.15);
            width: 100%;
            max-width: 560px;
        }

        .card-title {
            color: #c2185b;
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .back-link {
            color: #e91e63;
            text-decoration: none;
            font-size: 0.85rem;
            display: inline-block;
            margin-bottom: 1.8rem;
        }

        .back-link:hover { text-decoration: underline; }

        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #c2185b;
            margin-bottom: 0.3rem;
        }

        input {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 2px solid #f8bbd0;
            border-radius: 10px;
            font-size: 0.95rem;
            outline: none;
            transition: border 0.2s;
            margin-bottom: 0.3rem;
        }

        input:focus { border-color: #e91e63; }

        .error {
            color: #c2185b;
            font-size: 0.8rem;
            margin-bottom: 0.9rem;
            min-height: 1rem;
        }

        button {
            width: 100%;
            padding: 0.8rem;
            background: linear-gradient(135deg, #e91e63, #c2185b);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 0.5rem;
            transition: opacity 0.2s;
        }

        button:hover { opacity: 0.88; }
    </style>
</head>
<body>
<div class="card">
    <p class="card-title">📖 Tambah Buku</p>
    <a href="/buku" class="back-link">← Kembali ke daftar</a>

    <form method="POST" action="/buku/store">
        <?= csrf_field() ?>

        <label>Judul</label>
        <input type="text" name="judul" placeholder="Judul buku" value="<?= old('judul') ?>">
        <div class="error"><?= isset($validation) ? $validation->getError('judul') : '' ?></div>

        <label>Penulis</label>
        <input type="text" name="penulis" placeholder="Nama penulis" value="<?= old('penulis') ?>">
        <div class="error"><?= isset($validation) ? $validation->getError('penulis') : '' ?></div>

        <label>Penerbit</label>
        <input type="text" name="penerbit" placeholder="Nama penerbit" value="<?= old('penerbit') ?>">
        <div class="error"><?= isset($validation) ? $validation->getError('penerbit') : '' ?></div>

        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" placeholder="cth: 2020" value="<?= old('tahun_terbit') ?>">
        <div class="error"><?= isset($validation) ? $validation->getError('tahun_terbit') : '' ?></div>

        <button type="submit">💾 Simpan Buku</button>
    </form>
</div>
</body>
</html>