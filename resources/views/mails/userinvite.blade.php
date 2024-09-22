<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <h1>Hello {{ $user->fname }}</h1>
    <p>Welcome to {{ config('app.name') }}!</p>
    <p>We are pleased to inform you that your new account has been successfully created. Below, you will find your login details:</p>
    <h4>Username: {{ $user->email }}</h4>
    <h4>Temporary Password: {{ $password }}</h4>
    <p>For security reasons, we highly recommend that you change this temporary password as soon as you log in.</p>
    <p>Best regards,<br>The {{ config('app.name') }} Team</p>
</body>
</html>