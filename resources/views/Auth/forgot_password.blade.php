<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lupa Password</title>
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
            min-height: 100vh;
        }

        .forgot-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 128, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            color: #2e7d32;
            margin-bottom: 0.3rem;
        }

        p {
            color: #4caf50;
            margin-bottom: 1.5rem;
        }

        input[type="email"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            border: 1px solid #c8e6c9;
            background-color: #f9fff9;
            outline: none;
            box-shadow: none;
        }

        .btn-reset {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            background-color: #2e7d32;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-reset:hover {
            background-color: #1b5e20;
        }

        .links {
            text-align: center;
            margin-top: 1rem;
        }

        .links a {
            color: #388e3c;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="forgot-container">
        <h2>Lupa Password</h2>
        <p>Masukkan email kamu untuk mendapatkan link reset password.</p>

        <form action="{{ route('forgot_password.proses') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="email" name="email" placeholder="Email" required />
            <button class="btn-reset" type="submit">Kirim Link Reset</button>
        </form>

        <div class="links">
            <a href="{{ route('login') }}">Ingat password? Masuk di sini</a>
        </div>
    </div>
</body>

</html>
