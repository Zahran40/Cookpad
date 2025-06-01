<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Masuk Cookpad</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #fafafa;
            font-family: 'Montserrat', Arial, sans-serif;
        }

        .login-container {
            /* Ganti nama kelas dari signup-container menjadi login-container */
            max-width: 370px;
            margin: 40px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.07);
            padding: 32px 28px 18px 28px;
            text-align: center;
        }

        .login-header {
            /* Ganti nama kelas dari signup-header menjadi login-header */
            margin-bottom: 18px;
        }

        .login-header img {
            width: 110px;
            margin-bottom: 8px;
        }

        .login-header .logo-text {
            font-size: 32px;
            font-weight: 700;
            color: #6b2d00;
            margin-bottom: 0;
        }

        .login-title {
            /* Ganti nama kelas dari signup-title menjadi login-title */
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 18px;
            color: #222;
        }

        .login-form {
            /* Ganti nama kelas dari signup-form menjadi login-form */
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-bottom: 18px;
        }

        .login-form input {
            padding: 12px 14px;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            font-family: inherit;
            outline: none;
            transition: border 0.2s;
        }

        .login-form input:focus {
            border-color: #ff9800;
        }

        .login-btn {
            /* Ganti nama kelas dari signup-btn menjadi login-btn */
            background: #ff9800;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 0;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 6px;
            transition: background 0.2s;
        }

        .login-btn:hover {
            background: #e68900;
        }

        .login-footer {
            /* Ganti nama kelas dari signup-footer menjadi login-footer */
            font-size: 12px;
            color: #888;
            margin-top: 18px;
        }

        .login-footer a {
            color: #888;
            text-decoration: underline;
        }

        .close-btn {
            position: absolute;
            right: 24px;
            top: 18px;
            font-size: 22px;
            color: #888;
            cursor: pointer;
            font-weight: bold;
            background: none;
            border: none;
        }

        .register-link {
            /* Tambahkan style baru untuk link pendaftaran */
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .register-link a {
            color: #ff9800;
            /* Warna yang sama dengan tombol utama */
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <button class="close-btn" onclick="window.location.href='{{ url('/') }}'">&times;</button>
        <div class="login-header">
            <br>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Cookpad_logo.svg/768px-Cookpad_logo.svg.png"
                alt="Cookpad Logo">
            <div class="logo-text" style="color:#6b2d00;font-family:Montserrat;font-weight:700;">cookpad</div>
        </div>
        <div class="login-title">Masuk ke Akun Anda</div>
        <form class="login-form" method="POST" action="#">
            @csrf
            <input type="text" name="name" placeholder="Nama Pengguna" required> <input type="password" name="password"
                placeholder="Password" required>
            <button type="submit" class="login-btn">Masuk</button>
        </form>
        <div class="register-link">
            Belum punya akun? <a href="{{ route('signup') }}">Daftar sekarang</a> </div>
        <div class="login-footer">
            Dengan masuk ke Cookpad, kamu menyetujui <a href="#">Ketentuan Pemakaian</a> &amp; <a href="#">Kebijakan
                Privasi</a> kami
        </div>
    </div>
</body>

</html>