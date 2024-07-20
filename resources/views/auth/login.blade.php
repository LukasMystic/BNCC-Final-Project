<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2>Login</h2>
            <div class="input-field">
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
                <label>Enter your email</label>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Enter your password</label>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <p>Remember me</p>
                </label>
            </div>
            <button type="submit">Log In</button>
            <div class="planb">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
            </div>
        </form>
    </div>
</body>
</html>
