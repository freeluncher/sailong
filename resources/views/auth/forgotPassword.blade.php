<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto">
        <h1>Forgot Password</h1>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit">Send Password Reset Link</button>
        </form>
    </div>
</body>

</html>
