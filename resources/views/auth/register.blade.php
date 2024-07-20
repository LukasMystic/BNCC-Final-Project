<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2>Register</h2>
            <div class="input-field">
                <input type="text" name="name" value="{{ old('name') }}" required autofocus>
                <label>Enter your name</label>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-field">
                <input type="email" name="email" value="{{ old('email') }}" required>
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
            <div class="input-field">
                <input type="password" name="password_confirmation" required>
                <label>Confirm your password</label>
            </div>
            <div class="forget">
                <label for="agreement">
                    <input type="checkbox" id="agreement" name="agreement" {{ old('agreement') ? 'checked' : '' }} required>
                    <p>I agree to the <a href="https://youtu.be/Hc0FJ7FCwEs?si=d_sYvd5lhDEwkrIa" target="_blank">Privacy Policy</a></p>
                </label>
                @error('agreement')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Register</button>
            <div class="planb">
                <p>Already have an account? <a href="{{ route('login') }}">Log In</a></p>
            </div>
        </form>
    </div>
</body>
</html>
