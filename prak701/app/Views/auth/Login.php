<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Perpustakaan</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #fce4ec, #f8bbd0, #f48fb1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background: white;
            padding: 2.5rem 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(233,30,99,0.15);
            width: 380px;
        }

        .logo {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .logo span {
            font-size: 2.5rem;
        }

        h2 {
            text-align: center;
            color: #c2185b;
            font-size: 1.5rem;
            margin-bottom: 0.3rem;
        }

        .subtitle {
            text-align: center;
            color: #999;
            font-size: 0.85rem;
            margin-bottom: 1.8rem;
        }

        label {
            display: block;
            font-size: 0.85rem;
            color: #c2185b;
            font-weight: 600;
            margin-bottom: 0.3rem;
        }

        input {
            width: 100%;
            padding: 0.7rem 1rem;
            border: 2px solid #f8bbd0;
            border-radius: 10px;
            font-size: 0.95rem;
            margin-bottom: 1.1rem;
            outline: none;
            transition: border 0.2s;
        }

        input:focus {
            border-color: #e91e63;
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
            transition: opacity 0.2s;
        }

        button:hover { opacity: 0.9; }

        .alert {
            padding: 0.8rem 1rem;
            border-radius: 10px;
            margin-bottom: 1.2rem;
            font-size: 0.9rem;
        }

        .alert-warning {
            background: #fff3e0;
            color: #e65100;
            border: 1px solid #ffcc80;
        }

        .alert-error {
            background: #fce4ec;
            color: #c2185b;
            border: 1px solid #f48fb1;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="logo"><span>📚</span></div>
    <h2>Selamat Datang</h2>
    <p class="subtitle">Silakan login untuk melanjutkan</p>

    <?php if (session()->getFlashdata('warning')): ?>
        <div class="alert alert-warning">⚠️ <?= session()->getFlashdata('warning') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error">❌ <?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form method="POST" action="/login">
        <?= csrf_field() ?>

        <label>Email</label>
        <input type="email" name="email" placeholder="Masukkan email" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password" required>

        <button type="submit">Masuk →</button>
    </form>
</div>
</body>
</html>