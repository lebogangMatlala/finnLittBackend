<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <h1>Password Reset</h1>
    {{-- <p>Hello, {{ $user->name }},</p> --}}
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <p>
        To reset your password, click the link below:
        <a href="{{ url("password/reset/{$token}") }}">Reset Password</a>

        {{-- <a href="{{ $actionUrl }}">Reset Password</a> --}}
    </p>
    <p>If you did not request a password reset, no further action is required.</p>
    <p>Regards, Your Application</p>
</body>
</html>
