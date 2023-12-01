<!DOCTYPE html>
<html>

<head>
    <title>{{ $data['title'] }}</title>
</head>

<body>
    <h1>Password Reset</h1>
    <p>Hello, {{ $data['body'] }},</p>
    <p>You are receiving this email because we received a password reset request for your account.Please click on the link to reset your password</p>
    <a href="{{ route('password.reset', ['token' => $data['token']]) }}">Reset Password</a>
    <p>If you did not initiate this change, please contact us immediately.
    </p>
    <p>email: info@finnlitt.co.za </p>
    <p>phone: 010 447 5442 </p>
    <p>Thank you for using our application!</p>
    <h6>Regards,<br>FinnLitt</h6>
</body>

</html>
