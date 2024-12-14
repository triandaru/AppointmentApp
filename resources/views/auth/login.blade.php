<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('asset/style.css') }}">
    <title>Login</title>
</head>

<body class="login-page">

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('error'))
        <div style="color: red;">
            {{ session('error') }}
        </div>
    @endif

    <div class="popup-overlay" id="popup">
        <div class="popup">
            <h3>Daftar Nama User</h3>
            <ul>
                <li>asep</li>
                <li>agus</li>
                <li>ujang</li>
            </ul>
            <button onclick="closePopup()">Close</button>
        </div>
    </div>

    <div class="container">
        <button class="show-popup-btn" onclick="showPopup()">Tampilkan Daftar User</button>

        <form action="{{ route('login') }}" method="POST">
            <h2>Login</h2>
            @csrf
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <button type="submit">Login</button>
        </form>
    </div>

    <script>
        const popup = document.getElementById('popup');

        function showPopup() {
            popup.classList.add('active');
        }

        function closePopup() {
            popup.classList.remove('active');
        }
    </script>
</body>

</html>
