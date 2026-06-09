<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
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
            margin-bottom: 1.1rem;
        }

        input:focus { border-color: #e91e63; }

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
            transition: opacity 0.2s;
        }

        button:hover { opacity: 0.88; }
    </style>
</head>
<body>
<div class="card">
    <p class="card-title">✏️ Edit Buku</p>
    <a href="/buku" class="back-link">← Kembali ke daftar</a>

    <form method="POST" action="/buku/update/<?= $buku['id'] ?>">
        <?= csrf_field() ?>

        <label>Judul</label>
        <input type="text" name="judul" value="<?= esc($buku['judul']) ?>">

        <label>Penulis</label>
        <input type="text" name="penulis" value="<?= esc($buku['penulis']) ?>">

        <label>Penerbit</label>
        <input type="text" name="penerbit" value="<?= esc($buku['penerbit']) ?>">

        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" value="<?= esc($buku['tahun_terbit']) ?>">

        <button type="submit">💾 Update Buku</button>
    </form>
</div>
</body>
</html>