<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berhasil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            text-align: center;
        }

        .checkmark-container {
            position: relative;
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }

        .checkmark-circle {
            width: 100px;
            height: 100px;
            background-color: #2fd072;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: bounce 1s ease;
        }

        .checkmark {
            color: white;
            font-size: 48px;
        }

        @keyframes bounce {
            0% {
                transform: scale(0.3);
                opacity: 0;
            }

            50% {
                transform: scale(1.1);
                opacity: 1;
            }

            70% {
                transform: scale(0.9);
            }

            100% {
                transform: scale(1);
            }
        }

        h2 {
            font-weight: bold;
        }

        p {
            color: #555;
        }

        .btn-laporan {
            background-color: #2d8c2d;
            color: white;
            border: none;
            padding: 12px 24px;
            font-size: 16px;
            border-radius: 50px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn-laporan:hover {
            background-color: #246d24;
        }
    </style>
</head>

<body>
    <div class="checkmark-container">
        <div class="checkmark-circle">
            <i class="fas fa-check checkmark"></i>
        </div>
    </div>
    <h2>Yeay! Laporan kamu berhasil dibuat</h2>
    <p>Kamu bisa melihat laporan yang dibuat di halaman laporan</p>
    <button class="btn-laporan" onclick="lihatLaporan()">Lihat Laporan</button>
    <script>
        function lihatLaporan() {
            window.location.href = "/laporanmu";
        }
    </script>
</body>

</html>
