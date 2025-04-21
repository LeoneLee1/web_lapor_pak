<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web Lapor Pak</title>
    <link rel="shortcut icon" href="{{ asset('icon/alarm.png') }}" type="image/x-icon">
    <link
        href="{{ url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <style>
        #loader {
            position: fixed;
            border: 12px solid green;
            border-radius: 50%;
            border-top: 12px solid #ffffff;
            width: 70px;
            height: 70px;
            animation: spin 1s linear infinite;
        }

        .center {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    @stack('after-style')
</head>

<body>
    <div id="loader" class="center"></div>
    @yield('content')
    <div class="mb-4"></div>
    @include('Components.TabNavigator')
    @include('sweetalert::alert')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js') }}">
    </script>
    <script>
        document.onreadystatechange = function() {
            if (document.readyState !== "complete") {
                document.querySelector("body").style.visibility = "hidden";
                document.querySelector("#loader").style.visibility = "visible";
            }
        };

        window.onload = function() {
            setTimeout(function() {
                document.querySelector("#loader").style.display = "none";
                document.querySelector("body").style.visibility = "visible";
            }, 500);
        };
    </script>
    @stack('after-script')
</body>

</html>
