<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Lapor Pak</title>
    <link rel="shortcut icon" href="{{ asset('icon/alarm.png') }}" type="image/x-icon">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", sans-serif;
            background: #e8f5e9;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 128, 0, 0.2);
            max-width: 360px;
            width: 100%;
        }

        h2 {
            color: #2e7d32;
            margin-bottom: 0.2rem;
        }

        p {
            color: #4caf50;
            margin-bottom: 1.5rem;
        }

        .btn-google,
        .btn-login {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-google {
            background-color: #ffffff;
            color: #2e7d32;
            border: 1px solid #2e7d32;
        }

        .btn-google:hover {
            background-color: #f1f8e9;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            border: 1px solid #c8e6c9;
            background-color: #f9fff9;
        }

        .btn-login {
            background-color: #2e7d32;
            color: white;
        }

        .btn-login:hover {
            background-color: #1b5e20;
        }

        .links {
            text-align: center;
            margin-top: 1rem;
        }

        .links a {
            color: #388e3c;
            text-decoration: none;
            margin: 0 0.5rem;
            font-size: 0.9rem;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1rem 0;
        }

        .separator::before,
        .separator::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #a5d6a7;
            /* warna hijau muda */
        }

        .separator::before {
            margin-right: 0.75rem;
        }

        .separator::after {
            margin-left: 0.75rem;
        }

        .separator span {
            color: #388e3c;
            font-size: 0.9rem;
        }
    </style>
    <link rel="stylesheet" href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css') }}">
</head>

<body>
    <div class="login-container">
        <h2>Selamat Datang di</h2>
        <h2>Lapor Pak👋</h2>
        <p>Silakan masuk untuk melanjutkan</p>
        <button class="btn-google"><i class="fa-brands fa-google"></i>&nbsp;Masuk dengan
            Google</button>
        <div class="separator"><span>atau</span></div>
        <form action="login/proses" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="email" placeholder="Email" id="email" name="email" required />
            <input type="password" placeholder="Password" id="password" name="password" required />
            <button class="btn-login" type="submit">Masuk</button>
        </form>
        <div class="links">
            <a href="{{ route('register') }}">Belum punya akun?</a> |
            <a href="{{ route('forgot_password') }}">Lupa password?</a>
        </div>
    </div>
</body>

</html>
