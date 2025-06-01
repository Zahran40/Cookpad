<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Cookpad</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: #fafafa;
            font-family: 'Montserrat', Arial, sans-serif;
        }
        .signup-container {
            max-width: 370px;
            margin: 40px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.07);
            padding: 32px 28px 18px 28px;
            text-align: center;
        }
        .signup-header {
            margin-bottom: 18px;
        }
        .signup-header img {
            width: 110px;
            margin-bottom: 8px;
        }
        .signup-header .logo-text {
            font-size: 32px;
            font-weight: 700;
            color: #6b2d00;
            margin-bottom: 0;
        }
        .signup-header .country {
            color: #4b4b4b;
            font-size: 15px;
            font-weight: 600;
            text-decoration: underline;
            cursor: pointer;
            margin-bottom: 10px;
            display: inline-block;
        }
        .signup-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 18px;
            color: #222;
        }
        .signup-form {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-bottom: 18px;
        }
        .signup-form input {
            padding: 12px 14px;
            border: 1.5px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            font-family: inherit;
            outline: none;
            transition: border 0.2s;
        }
        .signup-form input:focus {
            border-color: #ff9800;
        }
        .signup-btn {
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
        .signup-btn:hover {
            background: #e68900;
        }
        .signup-footer {
            font-size: 12px;
            color: #888;
            margin-top: 18px;
        }
        .signup-footer a {
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
    </style>
</head>
<body>
    <div class="signup-container">
        <button class="close-btn" onclick="window.location.href='{{ url('/') }}'">&times;</button>
        <div class="signup-header">
            <br>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/33/Cookpad_logo.svg/768px-Cookpad_logo.svg.png" alt="Cookpad Logo">
            <div class="logo-text" style="color:#6b2d00;font-family:Montserrat;font-weight:700;">cookpad</div>
        </div>
        <div class="signup-title">Daftar atau Masuk</div>
        <form class="signup-form" method="POST" action="#">
            @csrf
            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="signup-btn">Daftar</button>
        </form>
        <div class="signup-footer">
            Dengan menggunakan Cookpad, kamu menyetujui <a href="#">Ketentuan Pemakaian</a> &amp; <a href="#">Kebijakan Privasi</a> kami
        </div>
    </div>
</body>
</html>