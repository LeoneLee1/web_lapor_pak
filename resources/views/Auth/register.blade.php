<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Pengguna Baru</title>
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
            min-height: 100vh;
        }

        .register-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 128, 0, 0.2);
            max-width: 400px;
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

        input[type="email"],
        input[type="text"],
        input[type="password"],
        input[type="file"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border-radius: 8px;
            border: 1px solid #c8e6c9;
            background-color: #f9fff9;
            outline: none;
            box-shadow: none;
            appearance: none;
        }

        .btn-register {
            width: 100%;
            padding: 0.8rem;
            border: none;
            border-radius: 8px;
            background-color: #2e7d32;
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-top: 0.5rem;
        }

        .btn-register:hover {
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
    <div class="register-container">
        <h2>Daftar sebagai Pengguna Baru</h2>
        <p>Silakan mengisi form di bawah ini untuk mendaftar</p>
        <form action="{{ route('register.proses') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="email" name="email" id="email" placeholder="Email" required />
            <input type="text" name="name" id="name" placeholder="Nama Lengkap" required />
            <input type="password" name="password" id="password" placeholder="Password" required />
            <input type="file" name="foto" id="foto" accept="image/*" onchange="loadFile(event)" required />
            <img class="img-fluid" style="width: 100%;" id="output" />
            <button class="btn-register" type="submit">Daftar</button>
        </form>
        <div class="links">
            <a href="{{ route('login') }}">Sudah punya akun?</a>
        </div>
    </div>
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
</body>

</html>
