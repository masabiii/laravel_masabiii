<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href={{ asset('css/style.css') }} />
</head>

<body>
    <form action="{{ route('actionLogin') }}" method="POST">
        @csrf
        <div class="login-container">
            <div class="login-box">
                <h1>Login</h1>
                @if (session('error'))
                    <div style="color:red">
                        <b style="color:black"></b> {{ session('error') }}
                    </div>
                @endif
                <form action="/login" method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </form>
</body>

</html>
