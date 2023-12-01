<!-- resources/views/password/reset.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body>

    <h2>Reset Password</h2>

    <form method="post">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <div>
            <label for="password">New Password</label>
            <input id="password" type="password" name="password" required>
            {{-- @error('password')
                <span>{{ $message }}</span>
            @enderror --}}
        </div>

        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <div>
            <button type="submit">Reset Password</button>
        </div>
    </form>

</body>
</html>

